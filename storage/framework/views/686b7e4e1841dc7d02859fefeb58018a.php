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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-12 d-flex justify-between">
                                        <div class="col-6">
                                            <?php if(Auth::user()->hasPermissionTo('agenda.visualizar') &&
                                            Auth::user()->hasPermissionTo('agenda.remover') ||
                                            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                            Auth::user()->hasRole('Super')): ?>
                                                <button id="btSubmitDelete" data-route="<?php echo e(route('admin.dashboard.event.destroySelected')); ?>" type="button" class="btSubmitDelete btn btn-danger" style="display: none;"><?php echo e(__('dashboard.btn_delete_all')); ?></button>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <?php if(Auth::user()->hasPermissionTo('agenda.visualizar') &&
                                            Auth::user()->hasPermissionTo('agenda.criar') ||
                                            Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                            Auth::user()->hasRole('Super')): ?>
                                                <a href="<?php echo e(route('admin.dashboard.event.create')); ?>" class="mdi mdi-plus-circle me-1 btn btn-primary text-black waves-effect waves-light"><?php echo e(__('dashboard.btn_create')); ?></a>
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
    
                                        <tbody data-route="<?php echo e(route('admin.dashboard.event.sorting')); ?>">
                                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    \Carbon\Carbon::setLocale('pt_BR');
                                                    $dataFormatada = \Carbon\Carbon::parse($event->date)->translatedFormat('d \d\e F \d\e Y');
                                                ?>

                                                <tr data-code="<?php echo e($event->id); ?>">
                                                    <td><span class="btnDrag mdi mdi-drag-horizontal font-22"></span></td>
                                                    <td class="bs-checkbox">
                                                        <label><input data-index="<?php echo e($key); ?>" name="btnSelectItem" class="btnSelectItem" type="checkbox" value="<?php echo e($event->id); ?>"></label>
                                                    </td>
                                                    <td><?php echo e(substr(strip_tags($event->title), 0, 40)); ?>...</td>
                                                 
                                                    <td class="text-start">
                                                        <?php switch($event->active):
                                                            case (0): ?> <span class="badge bg-danger">Inativo</span> <?php break; ?>
                                                            <?php case (1): ?> <span class="badge bg-success">Ativo</span> <?php break; ?>
                                                        <?php endswitch; ?>
                                                    </td>
                                                    <td class="d-flex gap-lg-1 justify-center">
                                                        <?php if(Auth::user()->hasPermissionTo('agenda.visualizar') &&
                                                        Auth::user()->hasPermissionTo('agenda.editar') ||
                                                        Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                                        Auth::user()->hasRole('Super')): ?>
                                                            <a href="<?php echo e(route('admin.dashboard.event.edit', ['event' => $event->id])); ?>" class="mdi mdi-pencil table-edit-button btn btn-primary text-black" style="padding: 2px 8px;width: 30px"></a>
                                                        <?php endif; ?>

                                                        <?php if(Auth::user()->hasPermissionTo('agenda.visualizar') &&
                                                        Auth::user()->hasPermissionTo('agenda.remover') ||
                                                        Auth::user()->hasPermissionTo('usuario.tornar usuario master') || 
                                                        Auth::user()->hasRole('Super')): ?>
                                                            <form action="<?php echo e(route('admin.dashboard.event.destroy',['event' => $event->id])); ?>" style="width: 30px" method="POST">
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

<?php echo $__env->make('admin.core.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/event/index.blade.php ENDPATH**/ ?>