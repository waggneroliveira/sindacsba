<div class="row g-3">
    <div class="mb-3 col-12 col-lg-6 d-flex align-items-start flex-column">
        <label for="legal" class="form-label">Tipo <span class="text-danger">*</span></label>
        <?php
            $currentLegal = isset($juridico) ? $juridico->legal : null;
        ?>
    
        <select name="legal" class="form-select" id="legal" required>
            <option value="" disabled selected>Selecione o tipo</option>
                <option value="leis" <?php echo e('leis' == $currentLegal ? 'selected' : ''); ?>>
                    Leis
                </option>
                <option value="decretos" <?php echo e('decretos' == $currentLegal ? 'selected' : ''); ?>>
                    Decretos
                </option>
                <option value="portaria" <?php echo e('portaria' == $currentLegal ? 'selected' : ''); ?>>
                    Portaria
                </option>
        </select>
    </div>
    <div class="mb-3 col-12 col-lg-6 d-flex align-items-start flex-column">
        <label for="region" class="form-label">Tipo <span class="text-danger">*</span></label>
        <?php
            $currentRegion = isset($juridico) ? $juridico->region : null;
        ?>
    
        <select name="region" class="form-select" id="region" required>
            <option value="" disabled selected>Selecione a região</option>
                <option value="nacional" <?php echo e('nacional' == $currentRegion ? 'selected' : ''); ?>>
                    Nacional
                </option>
                <option value="municipal" <?php echo e('municipal' == $currentRegion ? 'selected' : ''); ?>>
                    Municipal
                </option>
        </select>
    </div>

    <div class="mb-3 col-12">
        <label for="title" class="form-label">Título</label>
        <input 
            type="text" 
            name="title" 
            class="form-control" 
            id="title<?php echo e(isset($juridico->id) ? $juridico->id : ''); ?>" 
            value="<?php echo e(isset($juridico) ? $juridico->title : ''); ?>" 
            placeholder="Digite seu nome"
        >
    </div>
    <div class="mb-3 col-12">
        <label for="link" class="form-label">Link</label>
        <input 
            type="text" 
            name="link" 
            class="form-control" 
            id="link<?php echo e(isset($juridico->id) ? $juridico->id : ''); ?>" 
            value="<?php echo e(isset($juridico) ? $juridico->link : ''); ?>" 
            placeholder="Link"
        >
    </div>
    <div class="mb-3 col-12">
        <label for="description" class="form-label">Descrição</label>
        <input 
            type="text" 
            name="description" 
            class="form-control" 
            id="description<?php echo e(isset($juridico->id) ? $juridico->id : ''); ?>" 
            value="<?php echo e(isset($juridico) ? $juridico->description : ''); ?>" 
            placeholder="Descrição"
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
        data-default-file="<?php echo e(isset($juridico) && $juridico->path_file != '' ? url('storage/'.$juridico->path_file) : ''); ?>" 
        class="form-control"
    />
    <p class="text-muted text-center mt-2 mb-0">
        <?php echo e(__('dashboard.text_img_size')); ?> <b class="text-danger">2 MB</b>.
    </p>
</div>

<div class="mb-3 col-12">
    <div class="form-check">
        <input 
            name="active" 
            <?php echo e(isset($juridico->active) && $juridico->active == 1 ? 'checked' : ''); ?> 
            type="checkbox" 
            class="form-check-input" 
            id="invalidCheck<?php echo e(isset($juridico->id) ? $juridico->id : ''); ?>" 
        />
        <label class="form-check-label" for="invalidCheck<?php echo e(isset($juridico->id) ? $juridico->id : ''); ?>">
            <?php echo e(__('dashboard.active')); ?>?
        </label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/juridico/form.blade.php ENDPATH**/ ?>