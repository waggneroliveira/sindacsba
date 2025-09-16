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
                                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard.about.index')}}">Sobre</a></li>
                                <li class="breadcrumb-item active">Editar Sobre</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Sobre</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <form action="{{ route('admin.dashboard.about.update', ['about' => $about->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        @include('admin.blades.about.form')    
                    </div>
                    @if(Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                        Auth::user()->hasRole('Super') || Auth::user()->hasPermissionTo('sobre nos.visualizar') && Auth::user()->hasPermissionTo('sobre nos.editar'))
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                            <button type="submit" class="btn btn-primary text-black waves-effect waves-light">{{__('dashboard.btn_save')}}</button>
                        </div>        
                    @endif                                                                                                                                                                                    
                </form>
            </div> <!-- fecha a row aberta -->

        </div> <!-- fecha container-fluid -->
    </div> <!-- fecha content -->
</div> <!-- fecha content-page -->

<script>
    // Inicializa o CKEditor para o textarea de criação
    CKEDITOR.replace('textarea-edit', {
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
        filebrowserUploadUrl: "{{ route('admin.dashboard.about.uploadImageCkeditorAbout') }}",
        fileTools_requestHeaders: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

</script>
@endsection