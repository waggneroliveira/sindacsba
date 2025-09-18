<ul class="municipios list-unstyled row row-cols-2 row-cols-md-3 row-cols-lg-5">
    <?php $__currentLoopData = $municipalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3"><?php echo e($municipality->title); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<div class="mt-3 w-100">
    <?php echo e($municipalities->links()); ?>

</div>

<?php if(count($municipalities) === 0): ?>
    <div class="w-100 text-center py-5">
        <p class="montserrat-bold font-18 text-muted">Nenhum resultado encontrado.</p>
    </div>
<?php endif; ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/client/ajax/municipality-ajax.blade.php ENDPATH**/ ?>