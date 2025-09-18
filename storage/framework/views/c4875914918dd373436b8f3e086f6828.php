<div class="mb-3">
    <label for="title" class="form-label">Título</label>
    <input type="text" name="title" class="form-control" id="title<?php echo e(isset($video->id)?$video->id:''); ?>" value="<?php echo e(isset($video)?$video->title:''); ?>" placeholder="Informe o título do link">
</div>
<div class="mb-3">
    <label for="link" class="form-label">Link</label>
    <input type="text" name="link" class="form-control" id="link<?php echo e(isset($video->id)?$video->id:''); ?>" value="<?php echo e(isset($video)?$video->link:''); ?>" placeholder="Informe o link">
</div>

<div class="mb-3">
    <div class="form-check">
        <input name="active" <?php echo e(isset($video->active) && $video->active == 1 ? 'checked' : ''); ?> type="checkbox" class="form-check-input" id="invalidCheck<?php echo e(isset($video->id)?$video->id:''); ?>" />
        <label class="form-check-label" for="invalidCheck"><?php echo e(__('dashboard.active')); ?>?</label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>

<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/video/form.blade.php ENDPATH**/ ?>