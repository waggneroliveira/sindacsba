<div class="partner-about">
    <div class="container pt-3 pb-5">
        <div class="row g-3 justify-content-center">
            <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
                <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                    <div class="partner-card border rounded-2 d-flex justify-content-center align-items-center py-2 px-4 w-100">
                        <?php if($partner->link <> null): ?>                                        
                            <a href="<?php echo e($partner->link); ?>" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo e(asset('storage/' . $partner->path_image)); ?>" 
                                    alt="Logo do parceiro" 
                                    class="img-fluid" 
                                    loading="lazy"/>                            
                            </a>
                            <?php else: ?>
                            <img src="<?php echo e(asset('storage/' . $partner->path_image)); ?>" 
                            alt="Logo do parceiro" 
                            class="img-fluid" 
                            loading="lazy"/>  
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>               
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/client/includes/partner.blade.php ENDPATH**/ ?>