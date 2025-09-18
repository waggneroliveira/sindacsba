<div class="row">
    <?php if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can('usuario.atribuir grupos')): ?>
        <span class="text-danger mt-0 mb-3"><i class="mdi mdi-alert-circle"></i> <?php echo e(__('blades/group.not_permission')); ?></span>
    <?php endif; ?>
    <input type="hidden" name="active" value="<?php echo e(isset($user->active) && $user->active == 1 ? 'on' : 'off'); ?>">

    <?php if($user->currentRoles->isNotEmpty()): ?>
        <h5 class="page-title"><?php echo e(__('blades/group.current_group')); ?></h5>
        <div>
            <ul class="list-group w-100 h-25" style="column-count: 2">
                <?php $__currentLoopData = $user->currentRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <label>
                            <?php echo e(ucfirst($role->name)); ?>

                        </label>
                        <input type="checkbox" name="roles[]" checked value="<?php echo e($role->name); ?>" 
                            <?php if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can('usuario.atribuir grupos')): ?> 
                            <?php else: ?> 
                                disabled 
                            <?php endif; ?>>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if($user->otherRoles->isNotEmpty()): ?>
        <div>
            <ul class="list-group w-100 h-25" style="column-count: 2">
                <div class="mt-2">
                    <h5 class="page-title"><?php echo e(__('blades/group.add_group')); ?></h5>

                    <?php $__currentLoopData = $user->otherRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <label>
                                <?php echo e(ucfirst($role->name)); ?>

                            </label>
                            <input type="checkbox" name="roles[]" value="<?php echo e($role->name); ?>" 
                                <?php if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can('usuario.atribuir grupos')): ?> 
                                <?php else: ?> 
                                    disabled 
                                <?php endif; ?>>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </ul>
        </div>
    <?php endif; ?>

</div>

<?php if(Auth::user()->hasPermissionTo('usuario.atribuir grupos') ||
Auth::user()->hasPermissionTo('usuario.tornar usuario master') ||
Auth::user()->hasRole('Super')): ?>   
    <div class="d-flex justify-content-end gap-2 mt-3">
        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal"><?php echo e(__('dashboard.btn_cancel')); ?></button>
        <button type="submit" class="btn btn-primary text-black waves-effect waves-light"><?php echo e(__('dashboard.btn_create')); ?></button>
    </div>
<?php endif; ?>


<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/user/modal-group.blade.php ENDPATH**/ ?>