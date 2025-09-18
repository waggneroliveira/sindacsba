<div class="mb-3">
    <label for="title" class="form-label">Título</label>
    <input type="text" name="title" class="form-control" id="title<?php echo e(isset($regional->id)?$regional->id:''); ?>" value="<?php echo e(isset($regional)?$regional->title:''); ?>" placeholder="Digite seu nome">
</div>

<div class="mb-3">
    <div class="form-check">
        <input name="active" <?php echo e(isset($regional->active) && $regional->active == 1 ? 'checked' : ''); ?> type="checkbox" class="form-check-input" id="invalidCheck<?php echo e(isset($regional->id)?$regional->id:''); ?>" />
        <label class="form-check-label" for="invalidCheck"><?php echo e(__('dashboard.active')); ?>?</label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>

<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/regional/form.blade.php ENDPATH**/ ?>