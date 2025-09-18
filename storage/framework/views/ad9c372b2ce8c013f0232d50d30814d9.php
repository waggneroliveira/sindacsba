
<div class="swiper announcementVertical">
    <div class="swiper-wrapper">
        <?php $__currentLoopData = $announcementVerticals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
            <?php if($announcement->path_image != null): ?>                
                <div class="swiper-slide">
                    <div class="text-center px-0 overflow-hidden">
                        <?php if(isset($announcement) && !empty($announcement->link)): ?>
                            <a href="<?php echo e($announcement->link); ?>" target="_blank" rel="nofollow noopener noreferrer">
                                <img loading="lazy" src="<?php echo e(asset('storage/' . $announcement->path_image)); ?>" alt="Anuncio-<?php echo e($announcement->id); ?>" class="img-fluid w-100 annun">
                            </a>
                        <?php else: ?>
                            <img loading="lazy" src="<?php echo e(asset('storage/' . $announcement->path_image)); ?>" alt="Anuncio-<?php echo e($announcement->id); ?>" class="img-fluid w-100 annun">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>              
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/client/includes/announcementVertical.blade.php ENDPATH**/ ?>