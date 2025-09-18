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
                                <li class="breadcrumb-item active"><?php echo e(__('dashboard.group_and_permission')); ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?php echo e(__('dashboard.group_and_permission')); ?></h4>
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
                                        <?php if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['grupo.visualizar','grupo.remover'])): ?>
                                            <button id="btSubmitDelete" data-route="<?php echo e(route('admin.dashboard.group.destroySelected')); ?>" type="button" class="btSubmitDelete btn btn-danger" style="display: none;">Deletar selecionados</button>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <?php if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['grupo.visualizar', 'grupo.criar'])): ?>                                                        
                                            <button type="button" class="btn btn-primary text-black waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#group-create"><i class="mdi mdi-plus-circle me-1"></i> <?php echo e(__('dashboard.btn_create')); ?> </button>
                                        <?php endif; ?>
                                        <!-- Modal -->
                                        <div class="modal fade" id="group-create" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" style="max-width: 760px">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h4 class="modal-title" id="myCenterModalLabel"><?php echo e(__('dashboard.btn_create')); ?> </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <div class="modal-body p-2 px-3 px-md-4">
                                                        <form action="<?php echo e(route('admin.dashboard.group.store')); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo $__env->make('admin.blades.group.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>                                                   
                                                        </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div>
                                </div>
                            </div>
    
                            <div class="table-responsive">
                                <table class="table-sortable table table-centered table-nowrap table-striped" id="products-datatable">
                                    <thead>                                        
                                        <tr>
                                            <th class="bs-checkbox">
                                                <label><input name="btnSelectAll" type="checkbox"></label>
                                            </th>
                                            <th><?php echo e(__('blades/group.name_of_group')); ?></th>
                                            <th><?php echo e(__('dashboard.created_at')); ?></th>
                                            <th style="width: 85px;"><?php echo e(__('dashboard.action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody data-route="">
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr data-code="<?php echo e($group->id); ?>">
                                                <td class="bs-checkbox">
                                                    <label><input data-index="<?php echo e($key); ?>" name="btnSelectItem" class="btnSelectItem" type="checkbox" value="<?php echo e($group->id); ?>"></label>
                                                </td>
                                                <td>
                                                   <?php echo e($group->name); ?>

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
                                                    <?php if($group && $group->created_at): ?>
                                                        <?php if(array_key_exists($locale, $locales)): ?>
                                                            <?php echo e($group->created_at->format($locales[$locale])); ?>

                                                            <?php else: ?>
                                                            <?php echo e($group->created_at->format('d/m/Y H:i:s')); ?>

                                                        <?php endif; ?>
                                                        <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                </td>
                                                
                                                <td class="d-flex flex-row gap-2">
                                                    <?php if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['grupo.visualizar', 'grupo.editar'])): ?>                                                        
                                                        <button data-bs-toggle="modal" data-bs-target="#group-edit-<?php echo e($group->id); ?>" class="tabledit-edit-button btn btn-primary text-black" style="padding: 2px 8px;width: 30px"><span class="mdi mdi-pencil"></span></button>
                                                    <?php endif; ?>
                                                    <div class="modal fade" id="group-edit-<?php echo e($group->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" style="max-width: 760px">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-light">
                                                                    <h4 class="modal-title" id="myCenterModalLabel">Editar grupo</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                </div>
                                                                <div class="modal-body p-2 px-3 px-md-4">
                                                                    <form action="<?php echo e(route('admin.dashboard.group.update', ['role' => $group->id])); ?>" method="POST" enctype="multipart/form-data">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('PUT'); ?>
                                                                        <?php echo $__env->make('admin.blades.group.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>                                                                                                                         
                                                                    </form>
                                                                    
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                    <?php if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['grupo.visualizar', 'grupo.remover'])): ?>                                                        
                                                        <form action="<?php echo e(route('admin.dashboard.group.destroy',['role' => $group->id])); ?>" style="width: 30px" method="POST">
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

<?php echo $__env->make('admin.core.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/group/index.blade.php ENDPATH**/ ?>