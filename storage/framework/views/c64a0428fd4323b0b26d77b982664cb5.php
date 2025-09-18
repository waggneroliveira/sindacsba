<?php
    $textareaId = $textareaId ?? 'description' . (isset($announcement->id) ? $announcement->id : '');
?>

<div class="row">
    <div class="mb-3 col-12 d-flex align-items-start flex-column">
        <label for="exhibition" class="form-label">Tipo <span class="text-danger">*</span></label>
        <?php
            $currentExhibition = isset($announcement) ? $announcement->exhibition : null;
        ?>
    
        <select name="exhibition" class="form-select" id="exhibition" required>
            <option value="" disabled selected>Selecione o tipo</option>
            <option value="mobile" <?php echo e('mobile' == $currentExhibition ? 'selected' : ''); ?>>
                Anuncio Horizontal Mobile (versão para celular)
            </option>
            <option value="horizontal" <?php echo e('horizontal' == $currentExhibition ? 'selected' : ''); ?> data-subtext="versão para computador">
                
                Anuncio Horizontal Desktop (versão para computador)
            </option>
            <option value="vertical" <?php echo e('vertical' == $currentExhibition ? 'selected' : ''); ?>>
                Anuncio Vertical
            </option>
        </select>
        <div class="instructions">
            <h5>Resoluções recomendadas:</h5>
            <ol>
                <li>Versão para computador - <b class="text-danger">1137x171px</b></li>
                <li>Versão para celular - <b class="text-danger">576x111px</b></li>
                <li>Versão vertical - <b class="text-danger">355x433px</b></li>
            </ol>
        </div>
    </div>
    <div class="col-12 mb-3">
        <label for="link" class="form-label">Link</label>
        <input type="text" name="link" class="form-control" id="link<?php echo e(isset($announcement->id) ? $announcement->id : ''); ?>" value="<?php echo e(isset($announcement) ? $announcement->link : ''); ?>" placeholder="Link">
    </div>

    <div class="col-12 mb-3">
        <label for="path_image" class="form-label">Imagem<span class="text-danger">*</span></label>
        <input type="file" name="path_image" data-plugins="dropify" data-default-file="<?php echo e(isset($announcement) ? ($announcement->path_image != '' ? url('storage/' . $announcement->path_image) : '') : ''); ?>" />
        <p class="text-muted text-center mt-2 mb-0"><?php echo e(__('dashboard.text_img_size')); ?> <b class="text-danger">2 MB</b>.</p>
    </div>

    <div class="col-12 mb-3">
        <div class="form-check">
            <input name="active" <?php echo e(isset($announcement->active) && $announcement->active == 1 ? 'checked' : ''); ?> type="checkbox" class="form-check-input" id="invalidCheck<?php echo e(isset($announcement->id) ? $announcement->id : ''); ?>" />
            <label class="form-check-label" for="invalidCheck"><?php echo e(__('dashboard.active')); ?>?</label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/announcement/form.blade.php ENDPATH**/ ?>