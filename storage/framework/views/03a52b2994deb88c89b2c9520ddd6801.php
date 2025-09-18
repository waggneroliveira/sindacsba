<?php
    $textareaId = $textareaId ?? 'description' . (isset($slide->id) ? $slide->id : '');
    $titleInputId = 'title' . (isset($slide->id) ? $slide->id : '');
?>

<div class="d-flex justify-content-between">
    <div class="row col-lg-6">
        <div class="mb-3">
            <label for="title" class="form-label">Título </label>
            <input type="text" name="title" class="form-control" id="<?php echo e($titleInputId); ?>" value="<?php echo e(isset($slide)?$slide->title:''); ?>" placeholder="Título">
            
        </div>
        
        <div class="mb-3">
            <label for="link" class="form-label">Link </label>
            <input type="text" name="link" class="form-control" id="link<?php echo e(isset($slide->id)?$slide->id:''); ?>" value="<?php echo e(isset($slide)?$slide->link:''); ?>" placeholder="Link">
        </div>
        
        <div class="row">    
            <div class="mb-3 col-12">
                <label for="<?php echo e($textareaId); ?>" class="form-label text-white">Descrição</label>
                <textarea name="description" id="<?php echo e($textareaId); ?>" placeholder="Texto" class="col-12" rows="10">
                    <?php echo isset($slide->description)?$slide->description: ''; ?>

                </textarea>
            </div>
        </div>
        
        <div class="mb-3">
            <div class="form-check">
                <input name="active" <?php echo e(isset($slide->active) && $slide->active == 1 ? 'checked' : ''); ?> type="checkbox" class="form-check-input" id="invalidCheck<?php echo e(isset($slide->id)?$slide->id:''); ?>" />
                <label class="form-check-label" for="invalidCheck"><?php echo e(__('dashboard.active')); ?>?</label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
    </div>
    
    <div class="row col-lg-6">
        <div class="col-lg-12">
            <div class="mt-3">
                <label for="title" class="form-label">Imagem desktop </label>
                <input type="file" name="path_image" data-plugins="dropify" data-default-file="<?php echo e(isset($slide)?$slide->path_image<>''?url('storage/'.$slide->path_image):'':''); ?>"  />
                <p class="text-muted text-center mt-2 mb-0"><?php echo e(__('dashboard.text_img_size')); ?> <b class="text-danger">2 MB</b>.</p>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mt-3">
                <label for="title" class="form-label">Imagem mobile </label>
                <input type="file" name="path_image_mobile" data-plugins="dropify" data-default-file="<?php echo e(isset($slide)?$slide->path_image_mobile<>''?url('storage/'.$slide->path_image_mobile):'':''); ?>"  />
                <p class="text-muted text-center mt-2 mb-0"><?php echo e(__('dashboard.text_img_size')); ?> <b class="text-danger">2 MB</b>.</p>
            </div>
        </div>
    </div>
</div>

<script>
    function boldSelectionTitle() {
        var input = document.getElementById("<?php echo e($titleInputId); ?>")
        if (!input) return;
        var start = input.selectionStart;
        var end = input.selectionEnd;
        if (start === end) return; // nada selecionado
        var selected = input.value.substring(start, end);
        var before = input.value.substring(0, start);
        var after = input.value.substring(end);
        // Se já está em bold, remove
        if (selected.startsWith('<b>') && selected.endsWith('</b>')) {
            selected = selected.replace(/^<b>(.*)<\/b>$/i, '$1');
        } else {
            selected = '<b>' + selected + '</b>';
        }
        input.value = before + selected + after;
        // Ajusta seleção para o novo texto
        input.setSelectionRange(before.length, before.length + selected.length);
        input.focus();
    }
    document.addEventListener("DOMContentLoaded", function() {
        if (document.getElementById("<?php echo e($textareaId); ?>")) {
            CKEDITOR.replace("<?php echo e($textareaId); ?>");
        }
    });
</script><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/slide/form.blade.php ENDPATH**/ ?>