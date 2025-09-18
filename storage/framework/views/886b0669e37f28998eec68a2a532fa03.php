<?php $__env->startSection('content'); ?>
    <div class="forbidden account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">
    
                        <div class="card-body p-4">
                            
                            <div class="auth-brand">
                                <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="<?php echo e(asset('build/admin/images/whi.png')); ?>" class="h-100" alt="WHI - Web de alta inspiração" height="22" title="WHI - Web de Alta Inspiração" style="width: 50px;">
                                    </span>
                                </a>
            
                                <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="<?php echo e(asset('build/admin/images/whi.png')); ?>" class="h-100" alt="WHI - Web de alta inspiração" height="22" title="WHI - Web de Alta Inspiração" style="width: 50px;">
                                    </span>
                                </a>
                            </div>
    
                            <div class="text-center mt-4">
                                <h1 class="text-error">403</h1>
                                <h3 class="mt-3 mb-2">FORBIDDEN</h3>
                                <p class="text-muted mb-3">O usuário não tem permissão para acessar essa página. Entre em contato com o administrador do painel. <a href="" class="text-dark"><b>Support</b></a></p>
    
                                <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-success waves-effect waves-light">Voltar para o dashboard</a>
                            </div>
    
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
    
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
    <?php echo $__env->make('admin.loadPage.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.core.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/error/403.blade.php ENDPATH**/ ?>