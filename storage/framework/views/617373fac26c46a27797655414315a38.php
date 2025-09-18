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
                                <li class="breadcrumb-item active"><a href="<?php echo e(route('admin.dashboard.event.index')); ?>">Agendas</a></li>
                                <li class="breadcrumb-item active">Editar Agenda</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Agenda</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <form action="<?php echo e(route('admin.dashboard.event.update', ['event' => $event->id])); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <?php echo $__env->make('admin.blades.event.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>    
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal"><?php echo e(__('dashboard.btn_cancel')); ?></button>
                        <button type="submit" class="btn btn-primary text-black waves-effect waves-light"><?php echo e(__('dashboard.btn_save')); ?></button>
                    </div>                                                                                                                                                                                            
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
            { name: 'tools', items: ['Maximize'] }
        ],
        fileTools_requestHeaders: {
            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
        }
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.core.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/event/edit.blade.php ENDPATH**/ ?>