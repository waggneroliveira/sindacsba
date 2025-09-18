
<div class="col-12 d-block d-sm-none">
    <div class="swiper announcement-mobile w-75">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $announcements->where('exhibition', 'mobile'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide py-5">
                    <div class="image rounded-3 overflow-hidden">
                        <?php if(!empty($announcement->link)): ?>
                            <a href="<?php echo e($announcement->link); ?>" target="_blank" rel="nofollow noopener noreferrer">
                                <img src="<?php echo e(asset('storage/' . $announcement->path_image)); ?>"
                                     alt="Anuncio-<?php echo e($announcement->id); ?>" class="w-100">
                            </a>
                        <?php else: ?>
                            <img src="<?php echo e(asset('storage/' . $announcement->path_image)); ?>"
                                 alt="Anuncio-<?php echo e($announcement->id); ?>" class="w-100">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>


<div class="col-12 d-none d-sm-block">
    <div class="swiper announcement-desktop w-75">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $announcements->where('exhibition', 'horizontal'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide py-5">
                    <div class="image rounded-3 overflow-hidden">
                        <?php if(!empty($announcement->link)): ?>
                            <a href="<?php echo e($announcement->link); ?>" target="_blank" rel="nofollow noopener noreferrer">
                                <img src="<?php echo e(asset('storage/' . $announcement->path_image)); ?>"
                                     alt="Anuncio-<?php echo e($announcement->id); ?>" class="w-100">
                            </a>
                        <?php else: ?>
                            <img src="<?php echo e(asset('storage/' . $announcement->path_image)); ?>"
                                 alt="Anuncio-<?php echo e($announcement->id); ?>" class="w-100">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/client/includes/announcement.blade.php ENDPATH**/ ?>