<?php if(!empty($report)): ?>
    <section id="complaint" class="complaint my-5">
        <div class="container">
            <div class="background-red m-auto col-12 col-md-9 text-white rounded-4 py-4 px-3 px-lg-5 d-flex flex-column flex-md-row align-items-center align-items-md-start gap-5 shadow-sm">
                <?php if($report->path_image <> null): ?>
                    <div class="flex-shrink-0">
                        <img src="<?php echo e(asset('storage/' . $report->path_image)); ?>" alt="Denuncie">
                    </div>

                    <div class="text-center text-md-start">
                        <h4 class="fw-bold"><?php echo e($report->title); ?></h4>
                        <p class="montserrat-regular font-18 mb-0 text-start text-white mb-4">
                            <?php echo e($report->description); ?>

                        </p>
                        
                        <?php if($report->path_file <> null): ?>                        
                            <a href="<?php echo e(asset('storage/' . $report->path_file)); ?>" 
                                target="_blank"
                                class="bg-light montserrat-bold font-15 rounded-5 py-1 px-4 px-md-5 text-center d-inline-block text-transparent">
                                Baixar ficha de denuncia
                                <i class="bi bi-download"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php else: ?>
                    <div class="text-center text-md-start w-100">
                        <h4 class="fw-bold"><?php echo e($report->title); ?></h4>
                        <p class="montserrat-regular font-18 mb-0 text-start text-white mb-4">
                            <?php echo e($report->description); ?>

                        </p>
                        
                        <?php if($report->path_file <> null): ?>                        
                            <a href="<?php echo e(asset('storage/' . $report->path_file)); ?>" 
                                target="_blank"
                                class="bg-light montserrat-bold font-15 rounded-5 py-1 px-4 px-md-5 text-center d-inline-block text-transparent">
                                Baixar ficha de denuncia
                                <i class="bi bi-download"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/client/includes/complaint.blade.php ENDPATH**/ ?>