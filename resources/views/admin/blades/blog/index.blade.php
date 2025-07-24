@extends('admin.core.admin')
@section('content')
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
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Notícias</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Notícias</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-12 d-flex justify-between">
                                        <div class="col-6">
                                            @if (Auth::user()->hasPermissionTo('noticias.visualizar') &&
                                            Auth::user()->hasPermissionTo('noticias.remover') ||
                                            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                            Auth::user()->hasRole('Super'))
                                                <button id="btSubmitDelete" data-route="{{route('admin.dashboard.blog.destroySelected')}}" type="button" class="btSubmitDelete btn btn-danger" style="display: none;">{{__('dashboard.btn_delete_all')}}</button>
                                            @endif
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            @if (Auth::user()->hasPermissionTo('noticias.visualizar') &&
                                            Auth::user()->hasPermissionTo('noticias.criar') ||
                                            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                            Auth::user()->hasRole('Super'))
                                                <button type="button" class="btn btn-primary text-black waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#blog-create"><i class="mdi mdi-plus-circle me-1"></i> {{__('dashboard.btn_create')}}</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="blog-create" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" style="max-width: 980px;">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-light">
                                                                <h4 class="modal-title" id="myCenterModalLabel">{{__('dashboard.btn_create')}}</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                            </div>
                                                            <div class="modal-body p-4">
                                                                <form action="{{route('admin.dashboard.blog.store')}}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="mb-3 col-6 d-flex align-items-start flex-column">
                                                                            <label for="category-select" class="form-label">Categoria(s) <span class="text-danger">*</span></label>
                                                                            @php
                                                                                $currentCategory = isset($blog) ? $blog->blog_category : null;
                                                                            @endphp
                                                                        
                                                                            <select name="blog_category_id" class="form-select" id="category-select" required>
                                                                                <option value="" disabled selected>Selecione o Cliente</option>
                                                                                @foreach ($blogCategory as $categoryValue => $categoryLabel)
                                                                                    <option value="{{ $categoryValue }}" {{ $categoryValue == $currentCategory ? 'selected' : '' }}>
                                                                                        {{ $categoryLabel }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3 col-6">
                                                                            <label for="date" class="form-label">Data de publicação</label>
                                                                            <input type="date" name="date" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Título</label>
                                                                        <input type="text" name="title" class="form-control" id="title" placeholder="Digite seu nome">
                                                                    </div>
                                                                    
                                                                    <div class="mb-3 col-12 d-flex align-items-start flex-column">
                                                                        <label for="textarea-create" class="form-label">Texto</label>
                                                                        <textarea name="text" class="form-control col-12" id="textarea-create" rows="5"></textarea>
                                                                    </div>
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-12 col-lg-6">
                                                                            <div class="mt-3">
                                                                                <label for="path_image_thumbnail" class="form-label">Imagem de capa</label>
                                                                                <input type="file" name="path_image_thumbnail" data-plugins="dropify" />
                                                                                <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-12 col-lg-6">
                                                                            <div class="mt-3">
                                                                                <label for="path_image" class="form-label">Imagem</label>
                                                                                <input type="file" name="path_image" data-plugins="dropify" />
                                                                                <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="mb-3">
                                                                        <div class="form-check">
                                                                            <input name="active" type="checkbox" class="form-check-input" id="invalidCheck{{isset($blog->id)?$blog->id:''}}" />
                                                                            <label class="form-check-label" for="invalidCheck">{{__('dashboard.active')}}?</label>
                                                                            <div class="invalid-feedback">
                                                                                You must agree before submitting.
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input name="super_highlight" {{ isset($blog->super_highlight) && $blog->super_highlight == 1 ? 'checked' : '' }} type="checkbox" class="form-check-input" id="invalidCheck2{{isset($blog->id)?$blog->id:''}}" />
                                                                            <label class="form-check-label" for="invalidCheck2{{isset($blog->id)?$blog->id:''}}">Super destaque?</label>
                                                                            <div class="invalid-feedback">
                                                                                You must agree before submitting.
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input name="highlight" {{ isset($blog->highlight) && $blog->highlight == 1 ? 'checked' : '' }} type="checkbox" class="form-check-input" id="invalidCheck3{{isset($blog->id)?$blog->id:''}}" />
                                                                            <label class="form-check-label" for="invalidCheck3{{isset($blog->id)?$blog->id:''}}">Destaque?</label>
                                                                            <div class="invalid-feedback">
                                                                                You must agree before submitting.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex justify-content-end gap-2">
                                                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                                                                        <button type="submit" class="btn btn-primary text-black waves-effect waves-light">{{__('dashboard.btn_create')}}</button>
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
                                    <table class="table-sortable table table-centered table-nowrap table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="bs-checkbox">
                                                    <label><input name="btnSelectAll" type="checkbox"></label>
                                                </th>
                                                {{-- <th>Link</th> --}}
                                                <th>Título</th>
                                                <th>Categoria</th>
                                                <th>Imagem</th>
                                                <th>Publicado</th>
                                                <th>Status</th>
                                                <th>Super destaque</th>
                                                <th>Destaque</th>
                                                <th style="width: 85px;">Ações</th>
                                            </tr>
                                        </thead>
    
                                        <tbody data-route="{{route('admin.dashboard.blog.sorting')}}">
                                            @foreach ($blogs as $key => $blog)
                                                @php
                                                    if ($blog->blog_category_id) {
                                                        $categoria = $blogCategory[$blog->blog_category_id] ?? 'Nenhuma categoria';
                                                    } 
                                                    \Carbon\Carbon::setLocale('pt_BR');
                                                    $dataFormatada = \Carbon\Carbon::parse($blog->date)->translatedFormat('d \d\e F \d\e Y');
                                                @endphp

                                                <tr data-code="{{$blog->id}}">
                                                    <td><span class="btnDrag mdi mdi-drag-horizontal font-22"></span></td>
                                                    <td class="bs-checkbox">
                                                        <label><input data-index="{{$key}}" name="btnSelectItem" class="btnSelectItem" type="checkbox" value="{{$blog->id}}"></label>
                                                    </td>
                                                    <td>{{substr(strip_tags($blog->title), 0, 40)}}...</td>
                                                    <td>{{$categoria}}</td>
                                                    <td class="table-user text-center">
                                                        @if ($blog->path_image)
                                                            <img src="{{ asset('storage/'.$blog->path_image) }}" name="path_image" alt="table-user" class="me-2 rounded-circle">
                                                        @endif
                                                    </td>
                                                    <td>{{$dataFormatada}}</td>
                                                    <td class="text-center">
                                                        @switch($blog->active)
                                                            @case(0) <span class="badge bg-danger">Inativo</span> @break
                                                            @case(1) <span class="badge bg-success">Ativo</span> @break
                                                        @endswitch
                                                    </td>
                                                    <td class="text-center">
                                                        @switch($blog->super_highlight)
                                                            @case(0) <span class="badge bg-danger">Inativo</span> @break
                                                            @case(1) <span class="badge bg-success">Ativo</span> @break
                                                        @endswitch
                                                    </td>
                                                    <td class="text-center">
                                                        @switch($blog->highlight)
                                                            @case(0) <span class="badge bg-danger">Inativo</span> @break
                                                            @case(1) <span class="badge bg-success">Ativo</span> @break
                                                        @endswitch
                                                    </td>
                                                    <td class="d-flex gap-lg-1 justify-center">
                                                        @if (Auth::user()->hasPermissionTo('noticias.visualizar') &&
                                                        Auth::user()->hasPermissionTo('noticias.aprovar, reprovar ou remover comentário') ||
                                                        Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                                        Auth::user()->hasRole('Super'))
                                                            @php
                                                                $pendingCount = $blog->comments->where('active', 0)->count();
                                                            @endphp
                                                            
                                                            <button class="table-edit-button btn btn-secondary position-relative" data-bs-toggle="modal" data-bs-target="#modal-blog-{{$blog->id}}" style="padding: 2px 8px;width: 30px">
                                                                <span class="mdi mdi-message-bulleted"></span> 
                                                                @if($pendingCount > 0)
                                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">
                                                                    {{ $pendingCount }}
                                                                </span>
                                                            @endif
                                                            </button>
                                                            <div class="modal fade" id="modal-blog-{{$blog->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" style="max-width: 980px;">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-light">
                                                                            <h4 class="modal-title" id="myCenterModalLabel">Comentários</h4>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                        </div>
                                                                        <div class="modal-body p-4">  
                                                                            @if (isset($blog->comments))   
                                                                                <div class="col-12 col-lg-12 mb-3">
                                                                                    <label for="form-label">Título da notícia</label>
                                                                                    <input type="text" class="form-control" value="{{$blog->title}}" readonly>
                                                                                </div>
                                                                                @foreach ($blog->comments as $comment)
                                                                                    @php
                                                                                        \Carbon\Carbon::setLocale('pt_BR');
                                                                                        $dataFormatada = \Carbon\Carbon::parse($comment->date)->translatedFormat('d \d\e F \d\e Y');
                                                                                        $client = $comment->client;
                                                                                    @endphp

                                                                                    @if ($client)
                                                                                        <div class="d-flex flex-column gap-2 mb-4">
                                                                                            <div class="d-flex flex-column flex-md-row gap-3">
                                                                                                <img src="{{ $client->path_image ? url($client->path_image) : asset('build/client/images/user.jpg') }}"
                                                                                                    alt="Imagem do cliente"
                                                                                                    class="img-fluid rounded-circle"
                                                                                                    style="width: 50px; height: 50px; object-fit: cover;">

                                                                                                <div class="flex-grow-1 w-100">
                                                                                                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start">
                                                                                                        <div>
                                                                                                            <h6 class="title-blue montserrat-bold font-15 mb-0">{{ $client->name }}</h6>
                                                                                                            <small class="title-blue mb-0 montserrat-regular font-12">{{ $dataFormatada }}</small>
                                                                                                        </div>

                                                                                                        <div class="d-flex flex-wrap justify-content-md-end justify-content-start align-items-center gap-2 mt-2 mt-md-0">
                                                                                                            @if ($comment->active == 1)
                                                                                                                <form action="{{ route('comment.desactive.update', $comment->id) }}" method="POST">
                                                                                                                    @csrf
                                                                                                                    @method('put')
                                                                                                                    <button type="submit" class="btn btn-primary btn-sm text-black">Desativar comentário</button>
                                                                                                                </form>
                                                                                                            @else
                                                                                                                <form action="{{ route('comment.active.update', $comment->id) }}" method="POST">
                                                                                                                    @csrf
                                                                                                                    @method('put')
                                                                                                                    <button type="submit" class="btn btn-secondary btn-sm">Ativar comentário</button>
                                                                                                                </form>
                                                                                                            @endif

                                                                                                            <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                                                                                                                @csrf
                                                                                                                @method('DELETE')
                                                                                                                <button type="submit" class="btn btn-danger btn-sm">Excluir comentário</button>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="mt-3">
                                                                                                        <label for="textarea-commit-edit-{{ $comment->id }}" class="form-label">Comentário</label>
                                                                                                        <textarea name="text" readonly class="form-control ck-readonly" id="textarea-commit-edit-{{ $comment->id }}" rows="5">{!! $comment->comment !!}</textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    @endif
                                                                                @endforeach                                                                         
                                                                            @endif
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->   
                                                        @endif 
                                                        @if (Auth::user()->hasPermissionTo('noticias.visualizar') &&
                                                        Auth::user()->hasPermissionTo('noticias.editar') ||
                                                        Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                                        Auth::user()->hasRole('Super'))
                                                            <button class="table-edit-button btn btn-primary text-black" data-bs-toggle="modal" data-bs-target="#modal-group-edit-{{$blog->id}}" style="padding: 2px 8px;width: 30px"><span class="mdi mdi-pencil"></span></button>
                                                            <div class="modal fade" id="modal-group-edit-{{$blog->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" style="max-width: 980px;">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-light">
                                                                            <h4 class="modal-title" id="myCenterModalLabel">Editar notícia</h4>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                        </div>
                                                                        <div class="modal-body p-4">
                                                                            <form action="{{ route('admin.dashboard.blog.update', ['blog' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                @include('admin.blades.blog.form', ['textareaId' => 'textarea-edit-' . $blog->id])    
                                                                                <div class="d-flex justify-content-end gap-2">
                                                                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                                                                                    <button type="submit" class="btn btn-primary text-black waves-effect waves-light">{{__('dashboard.btn_save')}}</button>
                                                                                </div>                                                                                                                                                                                            
                                                                            </form>                                                                    
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->                                                        
                                                        @endif

                                                        @if (Auth::user()->hasPermissionTo('noticias.visualizar') &&
                                                        Auth::user()->hasPermissionTo('noticias.remover') ||
                                                        Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                                        Auth::user()->hasRole('Super'))
                                                            <form action="{{route('admin.dashboard.blog.destroy',['blog' => $blog->id])}}" style="width: 30px" method="POST">
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

                                {{-- PAGINATION --}}
                                <div class="mt-3 float-end">
                                   {{-- {{$blog->links()}} --}}
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
    <style>
        .cke_notification_warning{
            opacity: -1;
            z-index: -2;
        }
        .cke_chrome{
            width: 100%;
        }
    </style>


    <script>
        // Inicializa o CKEditor para o textarea de criação
                // Inicializa o CKEditor para o textarea de criação
        CKEDITOR.replace('textarea-create', {
                filebrowserUploadUrl: "{{ route('admin.dashboard.blog.uploadImageCkeditor') }}",
                // filebrowserUploadMethod: 'form',
                fileTools_requestHeaders: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
        });

        // Inicializa o CKEditor para todos os textareas de edição
        @foreach ($blogs as $blog)
            CKEDITOR.replace('textarea-edit-{{ $blog->id }}', {
                filebrowserUploadUrl: "{{ route('admin.dashboard.blog.uploadImageCkeditor', ['_token' => csrf_token() ]) }}",
                filebrowserUploadMethod: 'form'
            });
        @endforeach

        // Inicializa o CKEditor para todos os textareas de comentários
  
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".ck-readonly").forEach(function(el) {
                CKEDITOR.replace(el.id, {
                    filebrowserUploadUrl: "{{ route('admin.dashboard.blog.uploadImageCkeditor', ['_token' => csrf_token() ]) }}",
                    filebrowserUploadMethod: 'form',
                    readOnly: true
                });
            });
        });
    </script>
@endsection
