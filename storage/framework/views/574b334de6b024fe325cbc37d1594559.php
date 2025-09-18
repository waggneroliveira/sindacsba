<?php $__env->startSection('content'); ?>
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">
                            
                            <div class="text-center w-75 m-auto">
                                <div class="auth-brand">
                                    <a href="https://www.whi.dev.br/" target="_blank"  class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="<?php echo e(asset('build/admin/images/whi-black.png')); ?>" alt="Logo WHI" height="50">
                                        </span>
                                    </a>
                
                                    <a href="https://www.whi.dev.br/" target="_blank"  class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="<?php echo e(asset('build/admin/images/whi.png')); ?>" alt="Logo WHI" height="50">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-muted mb-4 mt-3">Digite seu endereço de e-mail e senha para acessar a conta.</p>
                            </div>

                            <form action="<?php echo e(route('admin.user.authenticate')); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">E-mail</label>
                                    <input class="form-control" type="email" id="emailaddress" name="email" required placeholder="Informe seu email">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <h6 class="text-danger"><?php echo e($message); ?></h6>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password" class="form-label">Senha</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Informe sua senha">
                                        
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>

                                        <div class="row col-12 ">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <h6 class="text-danger p-0 mb-0 mt-2"><?php echo e($message); ?></h6>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>                                

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                        <label class="form-check-label" for="checkbox-signin">Lembre-me</label>
                                    </div>
                                </div>

                                <div class="text-center d-grid">
                                    <button class="py-1 px-2 rounded-3 btn-green-whi text-black fw-bold" type="submit"> Entrar </button>
                                </div>

                            </form>

                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <p> <a href="<?php echo e(route('password.request')); ?>" class="text-muted ms-1">Esqueceu sua senha?</a></p>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->



                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    <script>
        document.querySelector('.password-eye').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const passwordEyeIcon = this;

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordEyeIcon.classList.add('show-password');
            } else {
                passwordInput.type = 'password';
                passwordEyeIcon.classList.remove('show-password');
            }
        });
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.core.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>