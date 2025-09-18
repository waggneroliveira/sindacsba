<?php $__env->startSection('content'); ?>
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
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active">Agenda</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Agenda</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <form action="<?php echo e(route('admin.dashboard.event.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-7"> 
                            <div class="mb-3 col-12">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Título">
                            </div>
                            <div class="row">
                                <div class="mb-3 col-12 col-lg-6">
                                    <label for="date" class="form-label">Data do evento</label>
                                    <input type="date" name="date" class="form-control" id="date">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="hours" class="form-label">Horário do evento</label>
                                    <input type="text" name="hours" class="form-control" id="hours"placeholder="Horário do evento">
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" name="link" class="form-control" id="link" placeholder="Link">
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-check">
                                    <input name="active" type="checkbox" class="form-check-input" id="invalidCheck<?php echo e(isset($event->id)?$event->id:''); ?>" />
                                    <label class="form-check-label" for="invalidCheck"><?php echo e(__('dashboard.active')); ?>?</label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>                                                                   
                        </div>
                        <div class="col-5">
                            <div class="mb-3 col-12 d-flex align-items-end flex-column">
                                <label for="textarea-create" class="form-label text-start w-100">Texto</label>
                                <textarea name="description" class="form-control col-12" id="textarea-create" rows="5">
                                    
                                </textarea>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal"><?php echo e(__('dashboard.btn_cancel')); ?></button>
                                <button type="submit" class="btn btn-primary text-black waves-effect waves-light"><?php echo e(__('dashboard.btn_create')); ?></button>
                            </div>
                        </div>
                    </div>
                </form> 
            </div> <!-- fecha a row aberta -->

        </div> <!-- fecha container-fluid -->
    </div> <!-- fecha content -->
</div> <!-- fecha content-page -->

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
            { name: 'tools', items: ['Maximize'] }
        ],
        fileTools_requestHeaders: {
            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
        }
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.core.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/event/create.blade.php ENDPATH**/ ?>