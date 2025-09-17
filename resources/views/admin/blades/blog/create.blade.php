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
                                <li class="breadcrumb-item "><a href="{{route('admin.dashboard.blog.index')}}">Notícias</a></li>
                                <li class="breadcrumb-item active">Cadastrar Notícia</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Notícias</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <form action="{{route('admin.dashboard.blog.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6">
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
                                    <label for="date" class="form-label">Data de publicação <span class="text-danger">*</span></label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                            </div>
        
                            <div class="mb-3">
                                <label for="title" class="form-label">Título <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Digite seu nome" required>
                            </div>
                            
                            <div class="mb-3 col-12 d-flex align-items-start flex-column">
                                <label for="textarea-create" class="form-label">Texto</label>
                                <textarea name="text" class="form-control col-12" id="textarea-create" rows="5"></textarea>
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
                        </div>
                        
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="mt-3">
                                        <label for="path_image_thumbnail" class="form-label">Imagem de capa</label>
                                        <input type="file" name="path_image_thumbnail" data-plugins="dropify" />
                                        <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
                                    </div>
                                </div>
                                
                                {{-- <div class="col-12">
                                    <div class="mt-3">
                                        <label for="path_image" class="form-label">Imagem</label>
                                        <input type="file" name="path_image" data-plugins="dropify" />
                                        <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
                                    </div>
                                </div> --}}
                            </div>                            
                            
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                                <button type="submit" class="btn btn-primary text-black waves-effect waves-light">{{__('dashboard.btn_create')}}</button>
                            </div>                                                 
                        </div>
                    </div>
                </form> 
            </div> <!-- fecha a row aberta -->

        </div> <!-- fecha container-fluid -->
    </div> <!-- fecha content -->
</div> <!-- fecha content-page -->

<!-- Modal de confirmação -->
<div class="modal fade" tabindex="-1" role="dialog" id="agenda-alert" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document"> 
        <div class="modal-content text-center p-3">
            <div class="modal-body">
                <div class="mb-3">
                    <i class="bi bi-question-circle-fill text-warning" style="font-size: 3rem;"></i>
                </div>

                <h5 class="modal-title mb-3">Cadastrar na Agenda?</h5>
                <p class="text-muted">Deseja cadastrar esta notícia também na Agenda de Eventos?</p>
            </div>

            <div class="modal-footer border-0 justify-content-center">
                <!-- Botão SIM: abre o outro modal -->
                <button type="button" class="btn btn-primary text-black" data-bs-toggle="modal" data-bs-target="#event-create" data-bs-dismiss="modal">
                    <i class="bi bi-check-circle text-black"></i> Sim
                </button>

                <!-- Botão NÃO: apenas fecha -->
                <button type="button" class="btn btn-outline-secondary">
                    <a href="{{route('admin.dashboard.blog.index')}}">
                        <i class="bi bi-x-circle"></i> Não
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="event-create" tabindex="-1" role="dialog" aria-hidden="true">                        
    <div class="modal-dialog modal-dialog-centered" style="max-width: 1300px">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Cadastrar agenda</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>                                
            <div class="modal-body p-4">
                @if(Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                Auth::user()->hasRole('Super') || 
                Auth::user()->hasPermissionTo('sobre nos.visualizar') && 
                Auth::user()->hasPermissionTo('sobre nos.criar'))
                    <form action="{{ route('admin.dashboard.event.storeTheBlog')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.blades.event.form', ['textareaId' => 'textarea-create'])
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                            <button type="submit" class="btn btn-primary text-black waves-effect waves-light">{{__('dashboard.btn_create')}}</button>
                        </div>
                    </form>

                    @else
                    <div class="text-center p-4">
                    <i class="bi bi-exclamation-triangle-fill text-warning" style="font-size: 3rem;"></i>
                    <h4 class="mt-3">Acesso Negado</h4>
                    <p class="text-muted">Você não possui permissão para visualizar esta página.</p>
                    </div>
                @endif
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    // Inicializa o CKEditor para o textarea de criação
    CKEDITOR.replace('textarea-create', {
        allowedContent: true,
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'] },
            { name: 'paragraph', items: [
                'NumberedList', 'BulletedList', '-', 
                'Outdent', 'Indent', '-', 
                'Blockquote', '-', 
                'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'
            ] },
            { name: 'links', items: ['Link', 'Unlink'] },
            { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
            { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize'] }
        ],
        filebrowserUploadUrl: "{{ route('admin.dashboard.blog.uploadImageCkeditor') }}",
        fileTools_requestHeaders: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

</script>
@endsection