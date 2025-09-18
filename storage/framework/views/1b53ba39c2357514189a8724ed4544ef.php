<div class="row g-3">
    <div class="mb-3 col-12">
        <label for="title" class="form-label">Título</label>
        <input 
            type="text" 
            name="title" 
            class="form-control" 
            id="title<?php echo e(isset($unionized->id) ? $unionized->id : ''); ?>" 
            value="<?php echo e(isset($unionized) ? $unionized->title : ''); ?>" 
            placeholder="Digite seu nome"
        >
    </div>
</div>
<div class="row g-3">
    <div class="mb-3 col-12">
        <label for="description" class="form-label">Descrição</label>
        <input 
            type="text" 
            name="description" 
            class="form-control" 
            id="description<?php echo e(isset($unionized->id) ? $unionized->id : ''); ?>" 
            value="<?php echo e(isset($unionized) ? $unionized->description : ''); ?>" 
            placeholder="Digite seu nome"
        >
    </div>
</div>

<div class="mb-3 col-12">
    <label for="path_file" class="form-label">Arquivo</label>
    <input 
        type="file" 
        name="path_file" 
        accept="application/pdf" 
        data-plugins="dropify" 
        data-default-file="<?php echo e(isset($unionized) && $unionized->path_file != '' ? url('storage/'.$unionized->path_file) : ''); ?>" 
        class="form-control"
    />
    <p class="text-muted text-center mt-2 mb-0">
        <?php echo e(__('dashboard.text_img_size')); ?> <b class="text-danger">3 MB</b>.
    </p>
</div>

<div class="mb-3 col-12">
    <div class="form-check">
        <input 
            name="active" 
            <?php echo e(isset($unionized->active) && $unionized->active == 1 ? 'checked' : ''); ?> 
            type="checkbox" 
            class="form-check-input" 
            id="invalidCheck<?php echo e(isset($unionized->id) ? $unionized->id : ''); ?>" 
        />
        <label class="form-check-label" for="invalidCheck<?php echo e(isset($unionized->id) ? $unionized->id : ''); ?>">
            <?php echo e(__('dashboard.active')); ?>?
        </label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/unionized/form.blade.php ENDPATH**/ ?>