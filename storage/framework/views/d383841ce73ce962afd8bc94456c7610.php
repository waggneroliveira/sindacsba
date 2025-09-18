<div class="mb-3">
    <label for="name" class="form-label"><?php echo e(__('blades/configEmail.user')); ?> <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control" id="name<?php echo e(isset($user->id)?$user->id:''); ?>" value="<?php echo e(isset($user)?$user->name:''); ?>" placeholder="Digite seu nome" required>
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><?php echo e(__('blades/configEmail.email')); ?> <span class="text-danger">*</span></label>
    <input type="email" name="email" value="<?php echo e(isset($user)?$user->email:''); ?>" class="form-control" id="exampleInputEmail1<?php echo e(isset($user->id)?$user->id:''); ?>" placeholder="Digite seu email" required>
</div>

<div class="mb-3">
    <label for="password" class="form-label"><?php echo e(__('blades/configEmail.password')); ?> <span class="text-danger">*</span></label>
    <div class="input-group input-group-merge">
        <input type="password" name="password" id="password-<?php echo e(isset($user->id) ? $user->id : ''); ?>" class="form-control" placeholder="Digite sua senha" <?php echo e(!isset($user) ? 'required' : ''); ?>>
    </div>
</div>

<div class="col-lg-12">
    <div class="mt-3">
        <input type="file" name="path_image" data-plugins="dropify" data-default-file="<?php echo e(isset($user)?$user->path_image<>''?url('storage/'.$user->path_image):'':''); ?>"  />
        <p class="text-muted text-center mt-2 mb-0"><?php echo e(__('dashboard.text_img_size')); ?> <b class="text-danger">2 MB</b>.</p>
    </div>
</div>
<div class="mb-3">
    <div class="form-check">
        <input name="active" <?php echo e(isset($user->active) && $user->active == 1 ? 'checked' : ''); ?> type="checkbox" class="form-check-input" id="invalidCheck<?php echo e(isset($user->id)?$user->id:''); ?>" />
        <label class="form-check-label" for="invalidCheck"><?php echo e(__('dashboard.active')); ?>?</label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>

<?php if($currentRoles->isNotEmpty()): ?>
    <?php $__currentLoopData = $currentRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
        <input type="hidden" name="roles[]" value="<?php echo e($role->name); ?>">                    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
<?php endif; ?>
<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/user/form.blade.php ENDPATH**/ ?>