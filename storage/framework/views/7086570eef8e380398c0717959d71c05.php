<div class="mb-3 col-12 d-flex align-items-start flex-column">
    <label for="category-select" class="form-label">Regionais <span class="text-danger">*</span></label>
    <?php
        $currentCategory = isset($municipality) ? $municipality->regional_id : null;
    ?>

    <select name="regional_id" class="form-select" id="category-select" required>
        <option value="" disabled selected>Selecione a Regional</option>
        <?php $__currentLoopData = $regionalCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryValue => $categoryLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($categoryValue); ?>" <?php echo e($categoryValue == $currentCategory ? 'selected' : ''); ?>>
                <?php echo e($categoryLabel); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<div class="mb-3">
    <label for="title" class="form-label">Município</label>
    <input type="text" name="title" class="form-control" id="title<?php echo e(isset($municipality->id)?$municipality->id:''); ?>" value="<?php echo e(isset($municipality)?$municipality->title:''); ?>" placeholder="Digite o município">
</div>

<div class="mb-3">
    <div class="form-check">
        <input name="active" <?php echo e(isset($municipality->active) && $municipality->active == 1 ? 'checked' : ''); ?> type="checkbox" class="form-check-input" id="invalidCheck<?php echo e(isset($municipality->id)?$municipality->id:''); ?>" />
        <label class="form-check-label" for="invalidCheck"><?php echo e(__('dashboard.active')); ?>?</label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>

<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/municipality/form.blade.php ENDPATH**/ ?>