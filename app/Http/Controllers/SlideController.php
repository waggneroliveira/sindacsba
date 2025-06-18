<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\SettingThemeRepository;
use App\Repositories\UserPermissionRepository;
use App\Http\Controllers\Helpers\HelperArchive;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class SlideController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/slide/';
    public function index(UserPermissionRepository $userPermissionRepository)
    {
        $slides = Slide::sorting()->get();
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        $users = User::excludeSuper()->with('roles');
        $filteredUsers = $userPermissionRepository->filterUsersByPermissions($users);

        if ($filteredUsers === 'forbidden') {
            return view('admin.error.403', compact('settingTheme'));
        }
        
        return view('admin.blades.slide.index', compact('slides'));
        
    }

    public function store(Request $request)
    {
        $data = $request->except(['path_image', 'path_image_mobile']);
        $helper = new HelperArchive();
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
            'path_image_mobile' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
        ]);
    
        //Slide desktop
        $path_image = $helper->renameArchiveUpload($request, 'path_image', $this->pathUpload, true);
        if ($path_image) {
            $data['path_image'] = $this->pathUpload . $path_image;
            $image = $manager->read($request->file('path_image'))->toWebp()->toString();
            Storage::put($this->pathUpload . $path_image, $image);
        }

        $data['active'] = $request->active ? 1 : 0;

        //Slide mobile
        $path_image_mobile = $helper->renameArchiveUpload($request, 'path_image_mobile', $this->pathUpload, true);
        if ($path_image_mobile) {
            $data['path_image_mobile'] = $this->pathUpload . $path_image_mobile;
            $imageMobile = $manager->read($request->file('path_image_mobile'))->toWebp()->toString();
            Storage::put($this->pathUpload . $path_image_mobile, $imageMobile);
        }

        try {
            DB::beginTransaction();
                Slide::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::success('error', __('dashboard.response_item_error_create'));
            return redirect()->back();
        }
    }

    public function update(Request $request, Slide $slide)
    {
        $data = $request->all();
        $helper = new HelperArchive();
        $manager = new ImageManager(GdDriver::class);

        //slide desktop
        $path_image = $helper->renameArchiveUpload($request, 'path_image', $this->pathUpload, true);
        if ($path_image) {
            $data['path_image'] = $this->pathUpload . $path_image;
            $image = $manager->read($request->file('path_image'))->toWebp()->toString();
            Storage::put($this->pathUpload . $path_image, $image);
            Storage::delete(isset($slide->path_image)?$slide->path_image:'');
        }
        if(isset($request->delete_path_image) && !$path_image){
            $inputFile = $request->delete_path_image;
            Storage::delete($slide->$inputFile);
            $data['path_image'] = null;
        }

        //slide mobile
        $path_image_mobile = $helper->renameArchiveUpload($request, 'path_image_mobile', $this->pathUpload, true);
        if ($path_image_mobile) {
            $data['path_image_mobile'] = $this->pathUpload . $path_image_mobile;
            $imageMobile = $manager->read($request->file('path_image_mobile'))->toWebp()->toString();
            Storage::put($this->pathUpload . $path_image_mobile, $imageMobile);
            Storage::delete(isset($slide->path_image_mobile)?$slide->path_image_mobile:'');
        }
        if(isset($request->delete_path_image_mobile) && !$path_image_mobile){
            $inputFile = $request->delete_path_image_mobile;
            Storage::delete($slide->$inputFile);
            $data['path_image_mobile'] = null;
        }

        try {
            DB::beginTransaction();
                $data['active'] = $request->active ? 1 : 0;
                
                $slide->fill($data)->save();

                //slide desktop 
                if ($path_image) {
                    Storage::delete($this->pathUpload . $path_image);
                }
                if ($path_image) {
                    $request->file('path_image')->storeAs($this->pathUpload, $path_image);
                }
                //slide mobile
                if ($path_image_mobile) {
                    Storage::delete($this->pathUpload . $path_image_mobile);
                }
                if ($path_image_mobile) {
                    $request->file('path_image_mobile')->storeAs($this->pathUpload, $path_image_mobile);
                }
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
            return redirect()->back();
        }
    }

    public function destroy(Slide $slide)
    {
        Storage::delete(isset($slide->path_image)??$slide->path_image);
        Storage::delete(isset($slide->path_image_mobile)??$slide->path_image_mobile);
        $slide->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $slideId) {
            $slide = Slide::find($slideId);
    
            if ($slide) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($slide)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $slideId,
                            'path_image' => $slide->path_image,
                            'path_image_mobile' => $slide->path_image_mobile,
                            'title' => $slide->title,
                            'description' => $slide->description,
                            'sorting' => $slide->sorting,
                            'active' => $slide->active,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $slideId não encontrado.");
            }
        }
    
        $deleted = Slide::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $slide = Slide::find($id);
    
            if ($slide) {
                $slide->sorting = $sorting;
                $slide->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($slide) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($slide)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'path_image' => $slide->path_image,
                            'path_image_mobile' => $slide->path_image_mobile,
                            'title' => $slide->title,
                            'description' => $slide->description,
                            'sorting' => $slide->sorting,
                            'active' => $slide->active,
                            'event' => 'order_updated',
                        ]
                    ])
                    ->log('order_updated');
            } else {
                \Log::warning("Item com ID $id não encontrado.");
            }
        }
    
        return Response::json(['status' => 'success']);
    }
}
