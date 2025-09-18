<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-start gap-2 align-items-start flex-nowrap mt-5 mb-3">
        <span class="firula-contact mt-2"></span>
        <div class="description">
            <h1 class="montserrat-bold font-30 mb-0 title-blue text-uppercase">Sobre Nós</h1>
        </div>
    </div>

    <?php if(isset($abouts) && $abouts <> null): ?>        
        <section id="about" class="position-relative mb-5">
            <div class="container">
                <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div id="<?php echo e($about->slug); ?>" class="d-flex justify-content-between align-items-start about flex-wrap w-100 pt-4 pt-lg-5">
                        <?php if($about->path_image): ?>
                            <div class="col-12 col-lg-4 animate-on-scroll mb-3" data-animation="animate__fadeInRight">
                                <div class="image d-flex justify-content-end">
                                    <img src="<?php echo e(asset('storage/' . $about->path_image)); ?>" alt="About"
                                        class="w-100 h-100 about-image d-sm-block" loading="lazy">
                                </div>
                            </div>

                            <div class="col-12 col-lg-7 animate-on-scroll" data-animation="animate__fadeInLeft">
                                <div class="border-bottom mb-0">
                                    <h2 class="section-title rounded-top-left d-table px-4 w-auto m-0 montserrat-bold font-18 title-blue">
                                        <?php echo e($about->title); ?>

                                    </h2>
                                </div>
                        
                                <div class="description mt-4 text-blog-inner montserrat-medium font-16">
                                    <?php echo $about->text; ?>

                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-12 animate-on-scroll w-100" data-animation="animate__fadeInLeft">
                                <div class="border-bottom mb-0">
                                    <h2 class="section-title rounded-top-left d-table px-4 w-auto m-0 montserrat-bold font-18 title-blue">
                                        <?php echo e($about->title); ?>

                                    </h2>
                                </div>
                        
                                <div class="description mt-4 text-blog-inner montserrat-medium font-16">
                                    <?php echo $about->text; ?>

                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <?php echo $__env->make('client.includes.partner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </section>        
    <?php endif; ?>

<?php if(!empty($directions)): ?>
    <!-- Diretoria -->
    <section id="board" class="board container my-5">
        <div class="border-bottom mb-0">
            <h2 class="section-title rounded-top-left d-table px-4 w-auto m-0 montserrat-bold font-18 title-blue">Diretoria</h2>
        </div>
        <div class="row g-4 mt-4">
            <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 col-sm-12">
                    <div class="d-flex justify-content-start gap-3 align-items-center">
                        <?php if($direction->path_image <> null): ?>
                            <div class="image">
                                <img src="<?php echo e(asset('storage/' . $direction->path_image)); ?>" loading="lazy" class="rounded-circle h-100" alt="Clayton Ferreira da Silva">
                            </div>
                            <div class="description d-flex flex-column justify-content-center">
                                <h5 class="mb-1 montserrat-bold font-18 title-blue"><?php echo e($direction->title); ?></h5>
                                <p class="function montserrat-regular font-16 mb-0"><?php echo e($direction->description); ?></p>
                            </div>
                        <?php else: ?>
                            <div class="description d-flex flex-column justify-content-center">
                                <h5 class="mb-1 montserrat-bold font-18 title-blue"><?php echo e($direction->title); ?></h5>
                                <p class="function montserrat-regular font-16 mb-0"><?php echo e($direction->description); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php endif; ?>
<?php if(!empty($statute)): ?>
    <section id="statute" class="dark-background py-5">
    <div class="container">
        <div class="row align-items-center">
            <?php if($statute->path_file): ?>
                <!-- Texto -->
                <div class="col-lg-8 col-md-7 col-12 mb-4 mb-md-0">
                    <h4 class="font-25 mb-4 montserrat-medium">
                    <?php echo e($statute->title); ?>

                    </h4>
                    <p class="montserrat-regular font-16 text-white">
                    <?php echo e($statute->description); ?>

                    </p>
                </div>
                            <!-- Botão -->
                <?php if($statute <> null): ?>
                    <div class="col-lg-4 col-md-5 col-12 text-md-end text-center">
                        <a href="<?php echo e(asset('storage/' . $statute->path_file)); ?>" target="_blank" rel="noopener noreferrer" 
                        class="background-red montserrat-bold font-15 rounded-5 py-2 px-5 text-uppercase d-inline-block">
                        Baixar PDF do estatuto
                        </a>
                    </div>
                <?php endif; ?>
                <?php else: ?>
                <!-- Texto -->
                <div class="col-12 mb-4 mb-md-0">
                    <h4 class="font-25 mb-4 montserrat-medium">
                    <?php echo e($statute->title); ?>

                    </h4>
                    <p class="montserrat-regular font-16 text-white">
                    <?php echo e($statute->description); ?>

                    </p>
                </div>
            <?php endif; ?>

        </div>
    </div>
    </section>
<?php endif; ?>

<?php echo $__env->make('client.includes.social', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.core.client', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/client/blades/about.blade.php ENDPATH**/ ?>