<div class="row g-3">
    <div class="mb-3 col-12">
        <label for="title" class="form-label">Título</label>
        <input 
            type="text" 
            name="title" 
            class="form-control" 
            id="title<?php echo e(isset($report->id) ? $report->id : ''); ?>" 
            value="<?php echo e(isset($report) ? $report->title : ''); ?>" 
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
            id="description<?php echo e(isset($report->id) ? $report->id : ''); ?>" 
            value="<?php echo e(isset($report) ? $report->description : ''); ?>" 
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
        data-default-file="<?php echo e(isset($report) && $report->path_file != '' ? url('storage/'.$report->path_file) : ''); ?>" 
        class="form-control"
    />
    <p class="text-muted text-center mt-2 mb-0">
        <?php echo e(__('dashboard.text_img_size')); ?> <b class="text-danger">3 MB</b>.
    </p>
</div>
<div class="col-lg-12 mb-3">
    <label for="title" class="form-label">Imagem</label>
    <input type="file" name="path_image" data-plugins="dropify" data-default-file="<?php echo e(isset($report)?$report->path_image<>''?url('storage/'.$report->path_image):'':''); ?>"  />
    <p class="text-muted text-center mt-2 mb-0"><?php echo e(__('dashboard.text_img_size')); ?> <b class="text-danger">2 MB</b>.</p>
</div>

<div class="mb-3 col-12">
    <div class="form-check">
        <input 
            name="active" 
            <?php echo e(isset($report->active) && $report->active == 1 ? 'checked' : ''); ?> 
            type="checkbox" 
            class="form-check-input" 
            id="invalidCheck<?php echo e(isset($report->id) ? $report->id : ''); ?>" 
        />
        <label class="form-check-label" for="invalidCheck<?php echo e(isset($report->id) ? $report->id : ''); ?>">
            <?php echo e(__('dashboard.active')); ?>?
        </label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/report/form.blade.php ENDPATH**/ ?>