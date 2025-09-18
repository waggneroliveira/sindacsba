<div class="mb-3">
    <label for="title" class="form-label">Título</label>
    <input type="text" name="title" class="form-control" id="title<?php echo e(isset($direction->id)?$direction->id:''); ?>" value="<?php echo e(isset($direction)?$direction->title:''); ?>" placeholder="Digite seu nome">
</div>
<div class="mb-3">
    <label for="description" class="form-label">Função</label>
    <input type="text" name="description" class="form-control" id="description<?php echo e(isset($direction->id)?$direction->id:''); ?>" value="<?php echo e(isset($direction)?$direction->description:''); ?>" placeholder="Função">
</div>
<div class="col-12">
    <div class="mt-3">
        <label for="path_image" class="form-label">Imagem</label>
        <input type="file" name="path_image" data-plugins="dropify" data-default-file="<?php echo e(isset($direction)?$direction->path_image<>''?url('storage/'.$direction->path_image):'':''); ?>"  />
        <p class="text-muted text-center mt-2 mb-0"><?php echo e(__('dashboard.text_img_size')); ?> <b class="text-danger">2 MB</b>.</p>
    </div>
</div> 
<div class="mb-3">
    <div class="form-check">
        <input name="active" <?php echo e(isset($direction->active) && $direction->active == 1 ? 'checked' : ''); ?> type="checkbox" class="form-check-input" id="invalidCheck<?php echo e(isset($direction->id)?$direction->id:''); ?>" />
        <label class="form-check-label" for="invalidCheck"><?php echo e(__('dashboard.active')); ?>?</label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>

<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/direction/form.blade.php ENDPATH**/ ?>