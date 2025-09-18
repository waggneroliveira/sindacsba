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
                                <li class="breadcrumb-item active"><?php echo e(__('dashboard.users')); ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?php echo e(__('dashboard.users')); ?></h4>
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
                                        <?php if(Auth::user()->hasPermissionTo('usuario.visualizar') && 
                                        Auth::user()->hasPermissionTo('usuario.remover') ||
                                        Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                        Auth::user()->hasRole('Super')): ?>
                                                <button button id="btSubmitDelete" data-route="<?php echo e(route('admin.dashboard.user.destroySelected')); ?>" type="button" class="btSubmitDelete btn btn-danger" style="display: none;"><?php echo e(__('dashboard.btn_delete_all')); ?></button>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <?php if(Auth::user()->hasPermissionTo('usuario.visualizar') &&
                                        Auth::user()->hasPermissionTo('usuario.criar') ||
                                        Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                        Auth::user()->hasRole('Super')): ?>  
                                            <button type="button" class="btn btn-primary text-black waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#user-create"><i class="mdi mdi-plus-circle me-1"></i> <?php echo e(__('dashboard.btn_create')); ?></button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="user-create" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light">
                                                            <h4 class="modal-title" id="myCenterModalLabel"><?php echo e(__('dashboard.btn_create')); ?></h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body  p-2 px-3 px-md-4">
                                                            <form action="<?php echo e(route('admin.dashboard.user.store')); ?>" method="POST" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo $__env->make('admin.blades.user.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>  
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
                                            <th><?php echo e(__('dashboard.users')); ?></th>
                                            <th><?php echo e(__('blades/configEmail.email')); ?></th>
                                            <th><?php echo e(__('dashboard.created_at')); ?></th>
                                            <th><?php echo e(__('dashboard.status')); ?></th>
                                            <th style="width: 85px;"><?php echo e(__('dashboard.action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody data-route="<?php echo e(route('admin.dashboard.user.sorting')); ?>">
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr data-code="<?php echo e($user->id); ?>">
                                                <td><span class="btnDrag mdi mdi-drag-horizontal font-22"></span></td>
                                                <td class="bs-checkbox">
                                                    <label><input data-index="<?php echo e($key); ?>" name="btnSelectItem" class="btnSelectItem" type="checkbox" value="<?php echo e($user->id); ?>"></label>
                                                </td>
                                                <td class="table-user">
                                                    <?php if($user->path_image): ?>
                                                        <img src="<?php echo e(asset('storage/'.$user->path_image)); ?>" alt="table-user" class="me-2 rounded-circle">
                                                        <?php else: ?>      
                                                        <img src="<?php echo e(asset('build/admin/images/users/user-3.jpg')); ?>" alt="table-user" class="me-2 rounded-circle">
                                                    <?php endif; ?>
                                                    <a href="javascript:void(0);" class="text-body fw-semibold"><?php echo e($user->name); ?></a>
                                                </td>
                                                <td>
                                                   <?php echo e($user->email); ?>

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
                                                        <?php if($user && $user->created_at): ?>
                                                            <?php if(array_key_exists($locale, $locales)): ?>
                                                                <?php echo e($user->created_at->format($locales[$locale])); ?>

                                                                <?php else: ?>
                                                                <?php echo e($user->created_at->format('d/m/Y H:i:s')); ?>

                                                            <?php endif; ?>
                                                            <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php switch($user->active):
                                                        case (0): ?> <span class="badge bg-soft text-danger"><?php echo e(__('dashboard.inactive')); ?></span> <?php break; ?>
                                                        <?php case (1): ?> <span class="badge bg-soft-success text-success"><?php echo e(__('dashboard.active')); ?></span><?php break; ?>
                                                    <?php endswitch; ?>                                                    
                                                </td>
            
                                                <td class="d-flex gap-lg-1 justify-center" style="padding: 18px 15px 0px 0px;">
                                                    <?php if(Auth::user()->hasPermissionTo('grupo.visualizar') ||
                                                    Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                                    Auth::user()->hasRole('Super')): ?>   
                                                        <button class="table-edit-button btn btn-primary text-black" data-bs-toggle="modal" data-bs-target="#modal-group-edit-<?php echo e($user->id); ?>" style="padding: 2px 8px;width: 30px"><span class="mdi mdi-account-group-outline"></span></button>
                                                        <div class="modal fade" id="modal-group-edit-<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-light">
                                                                        <h4 class="modal-title" id="myCenterModalLabel"><?php echo e(__('dashboard.group_and_permission')); ?></h4>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                    </div>
                                                                    <div class="modal-body  p-2 px-3 px-md-4">
                                                                        <form action="<?php echo e(route('admin.dashboard.user.update', ['user' => $user->id])); ?>" method="POST" enctype="multipart/form-data">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('PUT'); ?>
                                                                            <?php echo $__env->make('admin.blades.user.modal-group', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>                                                                                                                                                                                               
                                                                        </form>                                                                    
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                    <?php endif; ?>
                                                    
                                                    <?php if(Auth::user()->hasPermissionTo('usuario.visualizar') && 
                                                    Auth::user()->hasPermissionTo('usuario.editar') ||
                                                    Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                                    Auth::user()->hasRole('Super')): ?>
                                                        <button data-bs-toggle="modal" data-bs-target="#user-edit-<?php echo e($user->id); ?>" class="tabledit-edit-button btn btn-primary text-black" style="padding: 2px 8px;width: 30px"><span class="mdi mdi-pencil"></span></button>
                                                        <div class="modal fade" id="user-edit-<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-light">
                                                                        <h4 class="modal-title" id="myCenterModalLabel"><?php echo e(__('dashboard.btn_edit')); ?></h4>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                    </div>
                                                                    <div class="modal-body p-2 px-3 px-md-4">
                                                                        <form action="<?php echo e(route('admin.dashboard.user.update', ['user' => $user->id])); ?>" method="POST" enctype="multipart/form-data">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('PUT'); ?>
                                                                            <?php echo $__env->make('admin.blades.user.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>   
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
                                                    
                                                    <?php if(Auth::user()->hasPermissionTo('usuario.visualizar') &&
                                                    Auth::user()->hasPermissionTo('usuario.remover') ||
                                                    Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                                    Auth::user()->hasRole('Super')): ?>                                                        
                                                        <form action="<?php echo e(route('admin.dashboard.user.destroy',['user' => $user->id])); ?>" style="width: 30px" method="POST">
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

<?php echo $__env->make('admin.core.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/user/index.blade.php ENDPATH**/ ?>