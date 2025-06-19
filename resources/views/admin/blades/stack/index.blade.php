@extends('admin.core.admin')
@section('content')
<style>
    .btn-group.focus-btn-group{
        display: none;
    }
</style>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('dashboard.title_dashboard')}}</a></li>
                                <li class="breadcrumb-item active">Tecnologias</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tecnologias</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-12 d-flex justify-between">
                                    <div class="col-6">
                                        @if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['stack.visualizar', 'stack.remover']))
                                            <button id="btSubmitDelete" data-route="{{route('admin.dashboard.stack.destroySelected')}}" type="button" class="btSubmitDelete btn btn-danger" style="display: none;">{{__('dashboard.btn_delete_all')}}</button>
                                        @endif
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        @if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['stack.visualizar', 'stack.criar']))
                                            @if ($stackSessionTitle == null)                                            
                                                <button type="button" class="btn btn-primary me-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#stack-title-session-create"><i class="mdi mdi-plus-circle me-1"></i> Título da Sessão</button>
                                                <div class="modal fade" id="stack-title-session-create" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="stack modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-light">
                                                                <h4 class="modal-title" id="myCenterModalLabel">{{__('dashboard.btn_create')}}</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                            </div>
                                                            <div class="modal-body p-4">
                                                                <form action="{{route('admin.dashboard.stackSessionTitle.store')}}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Título </label>
                                                                        <input type="text" name="title" class="form-control" id="{{isset($stackSessionTitle)?$stackSessionTitle->id:''}}" value="{{isset($stackSessionTitle)?$stackSessionTitle->title:''}}" placeholder="Título" required>
                                                                    </div>   
                                                                    <div class="mb-3">
                                                                        <div class="form-check">
                                                                            <input name="active" {{ isset($stackSessionTitle->active) && $stackSessionTitle->active == 1 ? 'checked' : '' }} type="checkbox" class="form-check-input" id="invalidCheck{{isset($stackSessionTitle->id)?$stackSessionTitle->id:''}}" />
                                                                            <label class="form-check-label" for="invalidCheck">{{__('dashboard.active')}}?</label>
                                                                            <div class="invalid-feedback">
                                                                                You must agree before submitting.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex justify-content-end gap-2">
                                                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                                                                        <button type="submit" class="btn btn-success waves-effect waves-light">{{__('dashboard.btn_create')}}</button>
                                                                    </div>                                                 
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            @else
                                                <button type="button" class="btn btn-primary me-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#stack-title-session-edit-{{$stackSessionTitle->id}}"><i class="mdi mdi-pencil me-1"></i> Editar Título da Sessão</button>
                                                <div class="modal fade" id="stack-title-session-edit-{{$stackSessionTitle->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="stack modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light">
                                                            <h4 class="modal-title" id="myCenterModalLabel">{{__('dashboard.btn_create')}}</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body p-4">    
                                                            <div class="d-flex justify-content-end gap-2">
                                                                @if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['stack.visualizar', 'stack.remover']))
                                                                    <form action="{{route('admin.dashboard.stackSessionTitle.destroy',['stackSessionTitle' => $stackSessionTitle->id])}}" class="d-flex" method="POST">
                                                                        @method('DELETE') @csrf        
                                                                        
                                                                        <label for="title" class="form-label">Remover </label>
                                                                        <button type="button" style="width:20px;height:20px;font-size:10px;"class="ms-2 demo-delete-row btn btn-danger btn-xs m-0 p-0 btn-icon btSubmitDeleteItem"><i class="fa fa-times"></i></button>
                                                                    </form>                                                    
                                                                @endif
                                                            </div>                                                        
                                                            <form action="{{route('admin.dashboard.stackSessionTitle.update', ['stackSessionTitle' => $stackSessionTitle->id])}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="title" class="form-label">Título </label>
                                                                    <input type="text" name="title" class="form-control" id="{{isset($stackSessionTitle)?$stackSessionTitle->id:''}}" value="{{isset($stackSessionTitle)?$stackSessionTitle->title:''}}" placeholder="Título" required>
                                                                </div>   
                                                                <div class="mb-3">
                                                                    <div class="form-check">
                                                                        <input name="active" {{ isset($stackSessionTitle->active) && $stackSessionTitle->active == 1 ? 'checked' : '' }} type="checkbox" class="form-check-input" id="invalidCheck{{isset($stackSessionTitle->id)?$stackSessionTitle->id:''}}" />
                                                                        <label class="form-check-label" for="invalidCheck">{{__('dashboard.active')}}?</label>
                                                                        <div class="invalid-feedback">
                                                                            You must agree before submitting.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-end gap-2">
                                                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                                                                    <button type="submit" class="btn btn-success waves-effect waves-light">{{__('dashboard.btn_create')}}</button>
                                                                </div>                                                 
                                                            </form>                                                            
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            @endif
                                            <!-- Modal -->
                                            
                                            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#stack-create"><i class="mdi mdi-plus-circle me-1"></i> {{__('dashboard.btn_create')}}</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="stack-create" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="stack modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light">
                                                            <h4 class="modal-title" id="myCenterModalLabel">{{__('dashboard.btn_create')}}</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body p-4">
                                                            <form action="{{route('admin.dashboard.stack.store')}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @include('admin.blades.stack.form', ['textareaId' => 'textarea-create'])  
                                                                <div class="d-flex justify-content-end gap-2">
                                                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                                                                    <button type="submit" class="btn btn-success waves-effect waves-light">{{__('dashboard.btn_create')}}</button>
                                                                </div>                                                 
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        @endif
                                    </div>
                                </div>
                            </div>
    
                            <div class="table-responsive">
                                <table class="table-sortable table table-centered table-nowrap table-striped" id="products-datatable">
                                    <thead>                                        
                                        <tr>
                                            <th></th>
                                            <th class="bs-checkbox">
                                                <label><input name="btnSelectAll" type="checkbox"></label>
                                            </th>
                                            <th>Título</th>
                                            <th>Imagem</th>
                                            <th>{{__('dashboard.created_at')}}</th>
                                            <th>{{__('dashboard.status')}}</th>
                                            <th style="width: 85px;">{{__('dashboard.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody data-route="{{route('admin.dashboard.stack.sorting')}}">
                                        @foreach($stacks as $key => $stack)
                                            <tr data-code="{{$stack->id}}">
                                                <td><span class="btnDrag mdi mdi-drag-horizontal font-22"></span></td>
                                                <td class="bs-checkbox">
                                                    <label><input data-index="{{$key}}" name="btnSelectItem" class="btnSelectItem" type="checkbox" value="{{$stack->id}}"></label>
                                                </td>
                                                <td>
                                                   {!!isset($stack->title)?$stack->title:'-'!!}
                                                </td>
                                                <td class="table-stack">
                                                    @if ($stack->path_image)
                                                        <img src="{{ asset('storage/'.$stack->path_image) }}" alt="table-stack" class="me-2 rounded-circle" style="width: 35px; height: 35px;">
                                                        @else      
                                                        <img src="{{Vite::asset('resources/assets/admin/images/stacks/stack-3.jpg')}}" alt="table-stack" class="me-2 rounded-circle">
                                                    @endif
                                                </td>                                                   
                                                <td>
                                                    @php
                                                        $locales = [
                                                            'pt' => 'd/m/Y H:i:s',
                                                            'en' => 'Y-m-d H:i A',          
                                                            'es' => 'Y-m-d H:i A',          

                                                        ];
                                                        $locale = session()->get('locale');
                                                    @endphp
                                                        @if ($stack && $stack->created_at)
                                                            @if (array_key_exists($locale, $locales))
                                                                {{$stack->created_at->format($locales[$locale])}}
                                                                @else
                                                                {{$stack->created_at->format('d/m/Y H:i:s')}}
                                                            @endif
                                                            @else
                                                            -
                                                        @endif
                                                </td>
                                                <td>
                                                    @switch($stack->active)
                                                        @case(0) <span class="badge bg-soft text-danger">{{__('dashboard.inactive')}}</span> @break
                                                        @case(1) <span class="badge bg-soft-success text-success">{{__('dashboard.active')}}</span>@break
                                                    @endswitch                                                    
                                                </td>
            
                                                <td class="d-flex gap-lg-1 justify-center" style="padding: 18px 15px 0px 0px;">
                                                    @if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['stack.visualizar', 'stack.editar'])) 
                                                        <button data-bs-toggle="modal" data-bs-target="#stack-edit-{{$stack->id}}" class="tabledit-edit-button btn btn-success" style="padding: 2px 8px;width: 30px"><span class="mdi mdi-pencil"></span></button>
                                                        <div class="modal fade" id="stack-edit-{{$stack->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="stack modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-light">
                                                                        <h4 class="modal-title" id="myCenterModalLabel">{{__('dashboard.btn_edit')}}</h4>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                    </div>
                                                                    <div class="modal-body p-4">
                                                                        <form action="{{ route('admin.dashboard.stack.update', ['stack' => $stack->id]) }}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            @include('admin.blades.stack.form')   
                                                                            <div class="d-flex justify-content-end gap-2">
                                                                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                                                                                <button type="submit" class="btn btn-success waves-effect waves-light">{{__('dashboard.btn_save')}}</button>
                                                                            </div>                                                                                                                      
                                                                        </form>                                                                    
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                    @endif
                                                    @if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['stack.visualizar', 'stack.remover']))
                                                        <form action="{{route('admin.dashboard.stack.destroy',['stack' => $stack->id])}}" style="width: 30px" method="POST">
                                                            @method('DELETE') @csrf        
                                                            
                                                            <button type="button" style="width: 30px"class="demo-delete-row btn btn-danger btn-xs btn-icon btSubmitDeleteItem"><i class="fa fa-times"></i></button>
                                                        </form>                                                    
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection
