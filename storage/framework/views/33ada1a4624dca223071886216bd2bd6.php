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
                                    <li class="breadcrumb-item active">Jurídico</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Jurídico</h4>
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
                                            <?php if(Auth::user()->can('juridico.visualizar') &&
                                            Auth::user()->can('juridico.remover') ||
                                            Auth::user()->can('usuario.tornar usuario master') || 
                                            Auth::user()->hasRole('Super')): ?>
                                                <button id="btSubmitDelete" data-route="<?php echo e(route('admin.dashboard.juridico.destroySelected')); ?>" type="button" class="btSubmitDelete btn btn-danger" style="display: none;"><?php echo e(__('dashboard.btn_delete_all')); ?></button>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <?php if(Auth::user()->can('juridico.visualizar') &&
                                            Auth::user()->can('juridico.criar') ||
                                            Auth::user()->can('usuario.tornar usuario master') || 
                                            Auth::user()->hasRole('Super')): ?>
                                                <button type="button" class="btn btn-primary text-black waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#juridicos-create"><i class="mdi mdi-plus-circle me-1"></i> <?php echo e(__('dashboard.btn_create')); ?></button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="juridicos-create" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" style="max-width: 980px;">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-light">
                                                                <h4 class="modal-title" id="myCenterModalLabel"><?php echo e(__('dashboard.btn_create')); ?></h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                            </div>
                                                            <div class="modal-body p-2 px-3 px-md-4">
                                                                <form action="<?php echo e(route('admin.dashboard.juridico.store')); ?>" method="POST" enctype="multipart/form-data">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo $__env->make('admin.blades.juridico.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>   
                                                                    
                                                                    <div class="d-flex justify-content-end gap-2">
                                                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">
                                                                            <?php echo e(__('dashboard.btn_cancel')); ?>

                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary text-black waves-effect waves-light">
                                                                            <?php echo e(__('dashboard.btn_create')); ?>

                                                                        </button>
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
                                    <table class="table-sortable table table-centered table-nowrap table-striped">
                                        <thead>
                                            <tr>
                                                
                                                <th class="bs-checkbox">
                                                    <label><input name="btnSelectAll" type="checkbox"></label>
                                                </th>
                                                
                                                <th>Título</th>
                                                <th>Ano</th>
                                                <th>Arquivo</th>
                                                <th>Status</th>
                                                <th style="width: 85px;">Ações</th>
                                            </tr>
                                        </thead>
    
                                        <tbody data-route="<?php echo e(route('admin.dashboard.juridico.sorting')); ?>">
                                            <?php $__currentLoopData = $juridicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $juridico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $year = \Carbon\Carbon::parse($juridico->date)->format('Y')
                                                ?>
                                                <tr data-code="<?php echo e($juridico->id); ?>">
                                                    
                                                    <td class="bs-checkbox">
                                                        <label><input data-index="<?php echo e($key); ?>" name="btnSelectItem" class="btnSelectItem" type="checkbox" value="<?php echo e($juridico->id); ?>"></label>
                                                    </td>
                                                    <td><?php echo e($juridico->title); ?></td>
                                                    <td><?php echo e($year); ?></td>
                                                    <td class="table-user">
                                                        <?php if($juridico->path_file): ?>                                                            
                                                            <a href="<?php echo e(asset('storage/'.$juridico->path_file)); ?>" target="_blank" rel="noopener noreferrer" download="arquivo">
                                                                <span class="mdi mdi-file-download-outline"></span>
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php switch($juridico->active):
                                                            case (0): ?> <span class="badge bg-danger">Inativo</span> <?php break; ?>
                                                            <?php case (1): ?> <span class="badge bg-success">Ativo</span> <?php break; ?>
                                                        <?php endswitch; ?>
                                                    </td>
                                                    <td class="d-flex gap-lg-1 justify-center">
                                                        <?php if(Auth::user()->can('juridico.visualizar') &&
                                                        Auth::user()->can('juridico.editar') ||
                                                        Auth::user()->can('usuario.tornar usuario master') || 
                                                        Auth::user()->hasRole('Super')): ?>
                                                            <button class="table-edit-button btn btn-primary text-black" data-bs-toggle="modal" data-bs-target="#modal-group-edit-<?php echo e($juridico->id); ?>" style="padding: 2px 8px;width: 30px"><span class="mdi mdi-pencil"></span></button>
                                                            <div class="modal fade" id="modal-group-edit-<?php echo e($juridico->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" style="max-width: 980px;">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-light">
                                                                            <h4 class="modal-title" id="myCenterModalLabel"><?php echo e(__('dashboard.group_and_permission')); ?></h4>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                        </div>
                                                                        <div class="modal-body  p-2 px-3 px-md-4">
                                                                            <form action="<?php echo e(route('admin.dashboard.juridico.update', ['juridico' => $juridico->id])); ?>" method="POST" enctype="multipart/form-data">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('PUT'); ?>
                                                                                <?php echo $__env->make('admin.blades.juridico.form', ['textareaId' => 'textarea-edit-' . $juridico->id], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>    
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

                                                        <?php if(Auth::user()->can('juridico.visualizar') &&
                                                        Auth::user()->can('juridico.remover') ||
                                                        Auth::user()->can('usuario.tornar usuario master') || 
                                                        Auth::user()->hasRole('Super')): ?>
                                                            <form action="<?php echo e(route('admin.dashboard.juridico.destroy',['juridico' => $juridico->id])); ?>" style="width: 30px" method="POST">
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

                                
                                <div class="mt-3 float-end">
                                   
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.core.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/juridico/index.blade.php ENDPATH**/ ?>