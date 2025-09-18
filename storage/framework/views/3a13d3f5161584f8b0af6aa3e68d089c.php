<?php $__env->startSection('content'); ?>

    <style>
        .announcement{
            display: none;
        }
    </style>
    
    <div class="d-flex justify-content-start gap-2 align-items-start flex-nowrap my-5">
        <span class="firula-contact mt-2"></span>
        <div class="description">
            <h1 class="montserrat-bold font-30 mb-0 title-blue text-uppercase">Serviços aos Sindicalizados</h1>
        </div>
    </div>

    <?php if(!empty($agreement)): ?>
        <section id="partner" class="partner bg-light py-5">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-7 col-md-6 col-12 mb-4 mb-md-0 d-flex align-items-center gap-5">
                        
                        <img src="<?php echo e(asset('storage/' . $agreement->path_image)); ?>" alt="HandShake">
                        <p class="montserrat-semiBold font-25 font-md-20 m-0">
                            <?php echo e($agreement->title); ?>

                        </p>
                    </div>

                    <?php if($agreement->path_file <> null ): ?>                    
                        <div class="col-lg-4 col-md-5 col-12 text-md-end text-center">
                            <a href="<?php echo e(asset('storage/' . $agreement->path_file)); ?>" target="_blank" rel="noopener noreferrer" 
                            class="background-red montserrat-bold font-15 rounded-5 py-2 px-4 px-md-5 text-center text-uppercase d-inline-block w-100 w-md-auto">
                            Baixar PDF da lista de parceiros
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php echo $__env->make('client.includes.benefit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->make('client.includes.complaint', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.core.client', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/client/blades/unionized.blade.php ENDPATH**/ ?>