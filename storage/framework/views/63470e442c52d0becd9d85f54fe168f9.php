<?php $__env->startSection('content'); ?>
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
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('dashboard.title_dashboard')); ?></a></li>
                                <li class="breadcrumb-item active">Slides</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Slides</h4>
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
                                        <?php if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['slide.visualizar', 'slide.remover'])): ?>
                                            <button id="btSubmitDelete" data-route="<?php echo e(route('admin.dashboard.slide.destroySelected')); ?>" type="button" class="btSubmitDelete btn btn-danger" style="display: none;"><?php echo e(__('dashboard.btn_delete_all')); ?></button>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <?php if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['slide.visualizar', 'slide.criar'])): ?>
                                            <button type="button" class="btn btn-primary text-black waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#slide-create"><i class="mdi mdi-plus-circle me-1"></i> <?php echo e(__('dashboard.btn_create')); ?></button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="slide-create" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="slide modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light">
                                                            <h4 class="modal-title" id="myCenterModalLabel"><?php echo e(__('dashboard.btn_create')); ?></h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body p-4">
                                                            <form action="<?php echo e(route('admin.dashboard.slide.store')); ?>" method="POST" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo $__env->make('admin.blades.slide.form', ['textareaId' => 'textarea-create'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>  
                                                                <div class="d-flex justify-content-end gap-2">
                                                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal"><?php echo e(__('dashboard.btn_cancel')); ?></button>
                                                                    <button type="submit" class="btn btn-primary text-black waves-effect waves-light"><?php echo e(__('dashboard.btn_create')); ?></button>
                                                                </div>                                                 
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        <?php endif; ?>
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
                                            <th>Imagem Desktop</th>
                                            <th>Imagem Mobile</th>
                                            <th><?php echo e(__('dashboard.created_at')); ?></th>
                                            <th><?php echo e(__('dashboard.status')); ?></th>
                                            <th style="width: 85px;"><?php echo e(__('dashboard.action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody data-route="<?php echo e(route('admin.dashboard.slide.sorting')); ?>">
                                        <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr data-code="<?php echo e($slide->id); ?>">
                                                <td><span class="btnDrag mdi mdi-drag-horizontal font-22"></span></td>
                                                <td class="bs-checkbox">
                                                    <label><input data-index="<?php echo e($key); ?>" name="btnSelectItem" class="btnSelectItem" type="checkbox" value="<?php echo e($slide->id); ?>"></label>
                                                </td>
                                                <td>
                                                   <?php echo isset($slide->title)?$slide->title:'-'; ?>

                                                </td>
                                                <td class="table-slide text-center">
                                                    <?php if($slide->path_image): ?>
                                                        <img src="<?php echo e(asset('storage/'.$slide->path_image)); ?>" alt="table-slide" class="me-2 rounded-circle" style="width: 40px; height: 40px;">
                                                        <?php else: ?>      
                                                        <img src="<?php echo e(asset('build/admin/images/slides/slide-3.jpg')); ?>" alt="table-slide" class="me-2 rounded-circle">
                                                    <?php endif; ?>
                                                </td>                                                
                                                <td class="table-slide text-center">
                                                    <?php if($slide->path_image_mobile): ?>
                                                        <img src="<?php echo e(asset('storage/'.$slide->path_image_mobile)); ?>" alt="table-slide" class="me-2 rounded-circle" style="width: 40px; height: 40px;">
                                                        <?php else: ?>      
                                                        <img src="<?php echo e(asset('build/admin/images/slides/slide-3.jpg')); ?>" alt="table-slide" class="me-2 rounded-circle">                                                        
                                                    <?php endif; ?>
                                                </td>                                                
                                                <td>
                                                    <?php
                                                        $locales = [
                                                            'pt' => 'd/m/Y H:i:s',
                                                            'en' => 'Y-m-d H:i A',          
                                                            'es' => 'Y-m-d H:i A',          

                                                        ];
                                                        $locale = session()->get('locale');
                                                    ?>
                                                        <?php if($slide && $slide->created_at): ?>
                                                            <?php if(array_key_exists($locale, $locales)): ?>
                                                                <?php echo e($slide->created_at->format($locales[$locale])); ?>

                                                                <?php else: ?>
                                                                <?php echo e($slide->created_at->format('d/m/Y H:i:s')); ?>

                                                            <?php endif; ?>
                                                            <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php switch($slide->active):
                                                        case (0): ?> <span class="badge bg-soft text-danger"><?php echo e(__('dashboard.inactive')); ?></span> <?php break; ?>
                                                        <?php case (1): ?> <span class="badge bg-soft-success text-success"><?php echo e(__('dashboard.active')); ?></span><?php break; ?>
                                                    <?php endswitch; ?>                                                    
                                                </td>
            
                                                <td class="d-flex gap-lg-1 justify-center" style="padding: 18px 15px 0px 0px;">
                                                    <?php if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['slide.visualizar', 'slide.editar'])): ?> 
                                                        <button data-bs-toggle="modal" data-bs-target="#slide-edit-<?php echo e($slide->id); ?>" class="tabledit-edit-button btn btn-primary text-black" style="padding: 2px 8px;width: 30px"><span class="mdi mdi-pencil"></span></button>
                                                        <div class="modal fade" id="slide-edit-<?php echo e($slide->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="slide modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-light">
                                                                        <h4 class="modal-title" id="myCenterModalLabel"><?php echo e(__('dashboard.btn_edit')); ?></h4>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                    </div>
                                                                    <div class="modal-body p-4">
                                                                        <form action="<?php echo e(route('admin.dashboard.slide.update', ['slide' => $slide->id])); ?>" method="POST" enctype="multipart/form-data">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('PUT'); ?>
                                                                            <?php echo $__env->make('admin.blades.slide.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>   
                                                                            <div class="d-flex justify-content-end gap-2">
                                                                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal"><?php echo e(__('dashboard.btn_cancel')); ?></button>
                                                                                <button type="submit" class="btn btn-primary text-black waves-effect waves-light"><?php echo e(__('dashboard.btn_save')); ?></button>
                                                                            </div>                                                                                                                      
                                                                        </form>                                                                    
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                    <?php endif; ?>
                                                    <?php if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['slide.visualizar', 'slide.remover'])): ?>
                                                        <form action="<?php echo e(route('admin.dashboard.slide.destroy',['slide' => $slide->id])); ?>" style="width: 30px" method="POST">
                                                            <?php echo method_field('DELETE'); ?> <?php echo csrf_field(); ?>        
                                                            
                                                            <button type="button" style="width: 30px"class="demo-delete-row btn btn-danger btn-xs btn-icon btSubmitDeleteItem"><i class="fa fa-times"></i></button>
                                                        </form>                                                    
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.core.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/slide/index.blade.php ENDPATH**/ ?>