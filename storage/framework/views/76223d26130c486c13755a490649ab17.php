<!DOCTYPE html>
<html  lang="en" data-layout-mode="detached" data-topbar-color="dark" data-sidenav-user="true">
    <head>
        <meta charset="utf-8" />
        <title><?php echo e(env('APP_NAME')); ?> - Painel Gerenciador</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistema de gerenciamento do site <?php echo e(env('APP_NAME')); ?>" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('assets/admin/images/logo-hoom.png')); ?>">

        <link href="<?php echo e(asset('build/admin/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('build/admin/css/app.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('build/admin/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('build/admin/css/custom.css')); ?>" rel="stylesheet" type="text/css" />

        <script src="<?php echo e(asset('build/admin/js/head.js')); ?>"></script>
   
    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <?php echo $__env->yieldContent('content'); ?>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Authentication js -->
        
    </body>
</html>
<?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/core/auth.blade.php ENDPATH**/ ?>