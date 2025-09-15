<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\SettingThemeRepository;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class TopicController extends Controller
{
    protected $pathUpload = 'admin/uploads/project/image/';
    public function index()
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        if(!Auth::user()->hasRole('Super') && 
          !Auth::user()->can('usuario.tornar usuario master') && 
          !Auth::user()->hasPermissionTo('topicos.visualizar')){
            return view('admin.error.403', compact('settingTheme'));
        }

        $topics = Topic::select(
            'id',
            'title',
            'active',
            'color',
            'sorting',
            'path_image',
        )->sorting()->get();

        return view('admin.blades.topic.index', compact('topics'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['path_image', 'path_image_mobile']);
        $manager = new ImageManager(GdDriver::class);
        $data['active'] = $request->active?1:0;

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
        ]);

        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filename, $image);
            }

        $data['path_image'] = $this->pathUpload . $filename;
    }

        try {
            DB::beginTransaction();
                Topic::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();            
            Alert::error('error', __('dashboard.response_item_error_create'));
            return redirect()->back();
        }
    }

    public function update(Request $request, Topic $topic)
    {
        $data = $request->except(['path_image', 'path_image_mobile']);
        $manager = new ImageManager(GdDriver::class);
        $data['active'] = $request->active?1:0;
        
        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
        ]);

        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filename, $image);
            }

            Storage::delete(isset($topic->path_image)??$topic->path_image);
            $data['path_image'] = $this->pathUpload . $filename;
        }
        try {
            DB::beginTransaction();
                $topic->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('error', __('dashboard.response_item_error_update'));
            return redirect()->back();
        }
    }

    public function destroy(Topic $topic)
    {
        Storage::delete(isset($topic->path_image)??$topic->path_image);
        $topic->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $topicId) {
            $topic = Topic::find($topicId);
    
            if ($topic) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($topic)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $topicId,
                            'title' => $topic->title,
                            'path_image' => $topic->path_image,
                            'sorting' => $topic->sorting,
                            'active' => $topic->active,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $topicId não encontrado.");
            }
        }
    
        $deleted = Topic::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $topic = Topic::find($id);
    
            if ($topic) {
                $topic->sorting = $sorting;
                $topic->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($topic) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($topic)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'title' => $topic->title,
                            'path_image' => $topic->path_image,
                            'sorting' => $topic->sorting,
                            'active' => $topic->active,
                            'event' => 'order_updated',
                        ]
                    ])
                    ->log('order_updated');
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }
        }
    
        return Response::json(['status' => 'success']);
    }
}
