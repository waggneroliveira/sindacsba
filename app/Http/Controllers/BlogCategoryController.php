<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\BlogCategoryRequest;
use App\Repositories\SettingThemeRepository;
use App\Http\Requests\BlogCategoryRequestUpdate;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        if(!Auth::user()->hasRole('Super') && 
          !Auth::user()->can('usuario.tornar usuario master') && 
          !Auth::user()->hasPermissionTo('categorias do noticias.visualizar')){
            return view('admin.error.403', compact('settingTheme'));
        }

        $blogCategories = BlogCategory::sorting()->get();

        return view('admin.blades.blogCategory.index', compact('blogCategories'));
    }

    public function store(BlogCategoryRequest $request){
        $data = $request->all();
        $data['active'] = $request->active?1:0;
        $data['slug'] = Str::slug($request->title);

        try {
            DB::beginTransaction();
                BlogCategory::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();            
            Alert::error('error', __('dashboard.response_item_error_create'));
            return redirect()->back();
        }
    }

    public function update(BlogCategoryRequestUpdate $request, BlogCategory $blogCategory)
    {
        $data = $request->all();
        $data['active'] = $request->active?1:0;
        $data['slug'] = Str::slug($request->title);
        try {
            DB::beginTransaction();
                $blogCategory->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Alert::error('error', __('dashboard.response_item_error_update'));
            return redirect()->back();
        }
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $blogCategoryId) {
            $blogCategory = BlogCategory::find($blogCategoryId);
    
            if ($blogCategory) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($blogCategory)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $blogCategoryId,
                            'title' => $blogCategory->title,
                            'slug' => $blogCategory->slug,
                            'sorting' => $blogCategory->sorting,
                            'active' => $blogCategory->active,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $blogCategoryId não encontrado.");
            }
        }
    
        $deleted = BlogCategory::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $blogCategory = BlogCategory::find($id);
    
            if ($blogCategory) {
                $blogCategory->sorting = $sorting;
                $blogCategory->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($blogCategory) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($blogCategory)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'title' => $blogCategory->title,
                            'slug' => $blogCategory->slug,
                            'sorting' => $blogCategory->sorting,
                            'active' => $blogCategory->active,
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
