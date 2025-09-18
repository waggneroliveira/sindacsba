<div class="col-12 col-lg-6">
    <div class="row">
        <div class="mb-3 col-12 col-lg-6 d-flex align-items-start flex-column">
            <label for="category-select" class="form-label">Categoria(s) <span class="text-danger">*</span></label>
            <?php
                $currentCategory = isset($blog) ? $blog->blog_category_id : null;
            ?>
        
            <select name="blog_category_id" class="form-select" id="category-select" required>
                <option value="" disabled selected>Selecione o Cliente</option>
                <?php $__currentLoopData = $blogCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryValue => $categoryLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($categoryValue); ?>" <?php echo e($categoryValue == $currentCategory ? 'selected' : ''); ?>>
                        <?php echo e($categoryLabel); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        
        <div class="mb-3 col-12 col-lg-6">
            <label for="date" class="form-label">Data de publicação <span class="text-danger">*</span></label>
            <input type="date" name="date" class="form-control" id="date<?php echo e(isset($blog->id)?$blog->id:''); ?>" value="<?php echo e(isset($blog)?$blog->date:''); ?>" required>
        </div>
    </div>
    
    <div class="mb-3 col-12">
        <label for="title" class="form-label">Título <span class="text-danger">*</span></label>
        <input type="text" name="title" class="form-control" id="title<?php echo e(isset($blog->id)?$blog->id:''); ?>" value="<?php echo e(isset($blog)?$blog->title:''); ?>" required placeholder="Digite seu nome">
    </div>
    
    <div class="mb-3 col-12 d-flex align-items-start flex-column">
        <label for="textarea-edit" class="form-label">Texto </label>
        <textarea name="text" class="form-control col-12" id="textarea-edit" rows="5">
            <?php echo isset($blog)?$blog->text:''; ?>

        </textarea>
    </div>
        <div class="mb-3">
        <div class="form-check">
            <input name="active" <?php echo e(isset($blog->active) && $blog->active == 1 ? 'checked' : ''); ?> type="checkbox" class="form-check-input" id="invalidCheck<?php echo e(isset($blog->id)?$blog->id:''); ?>" />
            <label class="form-check-label" for="invalidCheck"><?php echo e(__('dashboard.active')); ?>?</label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
        <div class="form-check">
            <input name="super_highlight" <?php echo e(isset($blog->super_highlight) && $blog->super_highlight == 1 ? 'checked' : ''); ?> type="checkbox" class="form-check-input" id="invalidCheck2<?php echo e(isset($blog->id)?$blog->id:''); ?>" />
            <label class="form-check-label" for="invalidCheck2<?php echo e(isset($blog->id)?$blog->id:''); ?>">Super destaque?</label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
        <div class="form-check">
            <input name="highlight" <?php echo e(isset($blog->highlight) && $blog->highlight == 1 ? 'checked' : ''); ?> type="checkbox" class="form-check-input" id="invalidCheck3<?php echo e(isset($blog->id)?$blog->id:''); ?>" />
            <label class="form-check-label" for="invalidCheck3<?php echo e(isset($blog->id)?$blog->id:''); ?>">Destaque?</label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-lg-6">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="mt-3">
                <label for="path_image_thumbnail" class="form-label">Imagem de capa</label>
                <input type="file" name="path_image_thumbnail" data-plugins="dropify" data-default-file="<?php echo e(isset($blog)?$blog->path_image_thumbnail<>''?url('storage/'.$blog->path_image_thumbnail):'':''); ?>"  />
                <p class="text-muted text-center mt-2 mb-0"><?php echo e(__('dashboard.text_img_size')); ?> <b class="text-danger">2 MB</b>.</p>
            </div>
        </div>
        
        
    </div>
</div>

<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/blog/form.blade.php ENDPATH**/ ?>