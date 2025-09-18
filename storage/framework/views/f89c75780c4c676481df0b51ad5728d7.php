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
                                    <li class="breadcrumb-item active">Regionais</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Regionais</h4>
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
                                            <?php if(Auth::user()->can('regionais.visualizar') &&
                                            Auth::user()->can('regionais.remover') ||
                                            Auth::user()->can('usuario.tornar usuario master') || 
                                            Auth::user()->hasRole('Super')): ?>
                                                <button id="btSubmitDelete" data-route="<?php echo e(route('admin.dashboard.regional.destroySelected')); ?>" type="button" class="btSubmitDelete btn btn-danger" style="display: none;"><?php echo e(__('dashboard.btn_delete_all')); ?></button>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <?php if(Auth::user()->can('regionais.visualizar') &&
                                            Auth::user()->can('regionais.criar') ||
                                            Auth::user()->can('usuario.tornar usuario master') || 
                                            Auth::user()->hasRole('Super')): ?>
                                                <button type="button" class="btn btn-primary text-black waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#regional-create"><i class="mdi mdi-plus-circle me-1"></i> <?php echo e(__('dashboard.btn_create')); ?></button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="regional-create" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-light">
                                                                <h4 class="modal-title" id="myCenterModalLabel"><?php echo e(__('dashboard.btn_create')); ?></h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                            </div>
                                                            <div class="modal-body p-4">
                                                                <form action="<?php echo e(route('admin.dashboard.regional.store')); ?>" method="POST" enctype="multipart/form-data">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo $__env->make('admin.blades.regional.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>  
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
                                    <table class="table-sortable table table-centered table-nowrap table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="bs-checkbox">
                                                    <label><input name="btnSelectAll" type="checkbox"></label>
                                                </th>
                                                
                                                <th>Título</th>
                                                <th>Status</th>
                                                <th style="width: 85px;">Ações</th>
                                            </tr>
                                        </thead>
    
                                        <tbody data-route="<?php echo e(route('admin.dashboard.regional.sorting')); ?>">
                                            <?php $__currentLoopData = $regionais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $regional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr data-code="<?php echo e($regional->id); ?>">
                                                    <td><span class="btnDrag mdi mdi-drag-horizontal font-22"></span></td>
                                                    <td class="bs-checkbox">
                                                        <label><input data-index="<?php echo e($key); ?>" name="btnSelectItem" class="btnSelectItem" type="checkbox" value="<?php echo e($regional->id); ?>"></label>
                                                    </td>
                                                    <td><?php echo e($regional->title); ?></td>
                                                    <td>
                                                        <?php switch($regional->active):
                                                            case (0): ?> <span class="badge bg-danger">Inativo</span> <?php break; ?>
                                                            <?php case (1): ?> <span class="badge bg-success">Ativo</span> <?php break; ?>
                                                        <?php endswitch; ?>
                                                    </td>
                                                    <td class="d-flex gap-lg-1 justify-center">
                                                        <?php if(Auth::user()->can('regionais.visualizar') &&
                                                        Auth::user()->can('regionais.editar') ||
                                                        Auth::user()->can('usuario.tornar usuario master') || 
                                                        Auth::user()->hasRole('Super')): ?>
                                                            <button class="table-edit-button btn btn-primary text-black" data-bs-toggle="modal" data-bs-target="#modal-group-edit-<?php echo e($regional->id); ?>" style="padding: 2px 8px;width: 30px"><span class="mdi mdi-pencil"></span></button>
                                                            <div class="modal fade" id="modal-group-edit-<?php echo e($regional->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-light">
                                                                            <h4 class="modal-title" id="myCenterModalLabel">Categoria</h4>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                        </div>
                                                                        <div class="modal-body p-4">
                                                                            <form action="<?php echo e(route('admin.dashboard.regional.update', ['regional' => $regional->id])); ?>" method="POST" enctype="multipart/form-data">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('PUT'); ?>
                                                                                <?php echo $__env->make('admin.blades.regional.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>    
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

                                                        <?php if(Auth::user()->can('regionais.visualizar') &&
                                                        Auth::user()->can('regionais.remover') ||
                                                        Auth::user()->can('usuario.tornar usuario master') || 
                                                        Auth::user()->hasRole('Super')): ?>
                                                            <form action="<?php echo e(route('admin.dashboard.regional.destroy',['regional' => $regional->id])); ?>" style="width: 30px" method="POST">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.core.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/regional/index.blade.php ENDPATH**/ ?>