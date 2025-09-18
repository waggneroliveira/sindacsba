<?php $__env->startSection('content'); ?>
<style>
    .btn-group.focus-btn-group{
        display: none;
    }
</style>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('dashboard.title_dashboard')); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo e(__('dashboard.setting_smtp')); ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?php echo e(__('dashboard.setting_smtp')); ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row g-3">
                <div class="col-12 col-lg-6">
                    <div class="card card-body">
                        
                        <p><?php echo e(__('blades/configEmail.explication_config')); ?></p>

                        <div class="accordion custom-accordion mb-4" id="custom-accordion-one">
                            <div class="card mb-1">
                                <div class="card-header" id="headingNine">
                                    <h5 class="m-0 position-relative">
                                        <a
                                            class="custom-accordion-title text-reset d-block collapsed"
                                            data-bs-toggle="collapse"
                                            href="#collapseGamail"
                                            aria-expanded="false"
                                            aria-controls="collapseGamail"
                                        >
                                            <i class="mdi mdi-help-circle me-1 text-dark"></i>
                                            <?php echo e(__('blades/configEmail.step_to_step_config_gmail_title')); ?>

                                            <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                        </a>
                                    </h5>
                                </div>

                                <div
                                    id="collapseGamail"
                                    class="collapse"
                                    aria-labelledby="headingNine"
                                    data-bs-parent="#custom-accordion-one"
                                >
                                    <div class="card-body">
                                        <ul>
                                            <li><b><?php echo e(__('blades/configEmail.host')); ?>:</b> smtp.gmail.com</li>
                                            <li>
                                                <b><?php echo e(__('blades/configEmail.user')); ?>:</b> <?php echo e(__('blades/configEmail.step_to_step_config_user')); ?>

                                                (ex.: you@gmail.com)
                                            </li>
                                            <li>
                                                <b><?php echo e(__('blades/configEmail.password')); ?>:</b> <?php echo e(__('blades/configEmail.step_to_step_config_password')); ?>

                                                <a href="https://support.google.com/mail/answer/185833?hl=pt-BR" target="_blank" rel="noopener noreferrer">
                                                    <?php
                                                        $locales = [
                                                            'pt' => 'Clique aqui',
                                                            'en' => 'Click here',
                                                            'es' => 'Haga clic aquí',
                                                        ];
                                                        $locale = session()->get('locale');
                                                    ?>

                                                    <?php if(array_key_exists($locale, $locales)): ?>
                                                        <?php echo e($locales[$locale]); ?>

                                                    <?php endif; ?>
                                                </a>
                                            </li>
                                            <li><b><?php echo e(__('blades/configEmail.port')); ?></b> 465</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-1">
                                <div class="card-header" id="headingTen">
                                    <h5 class="m-0 position-relative">
                                        <a
                                            class="custom-accordion-title text-reset d-block collapsed"
                                            data-bs-toggle="collapse"
                                            href="#collapseOutlook"
                                            aria-expanded="false"
                                            aria-controls="collapseOutlook"
                                        >
                                            <i class="mdi mdi-help-circle me-1 text-dark"></i>
                                            <?php echo e(__('blades/configEmail.step_to_step_config_outlook_title')); ?>

                                            <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                        </a>
                                    </h5>
                                </div>

                                <div
                                    id="collapseOutlook"
                                    class="collapse"
                                    aria-labelledby="headingTen"
                                    data-bs-parent="#custom-accordion-one"
                                >
                                    <div class="card-body">
                                        <ul>
                                            <li><b><?php echo e(__('blades/configEmail.host')); ?>:</b> smtp.office365.com</li>
                                            <li>
                                                <b><?php echo e(__('blades/configEmail.user')); ?>:</b> <?php echo e(__('blades/configEmail.step_to_step_config_user')); ?>

                                                (ex.: you@outlook.com)
                                            </li>
                                            <li><b><?php echo e(__('blades/configEmail.password')); ?>:</b> <?php echo e(__('blades/configEmail.password_outlook')); ?></li>
                                            <li><b><?php echo e(__('blades/configEmail.port')); ?></b> 587</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if(
                            Auth::user()->hasRole('Super') ||
                            Auth::user()->can('usuario.tornar usuario master') ||
                            (Auth::user()->can('email.visualizar') && Auth::user()->can('email.testar conexao smtp'))
                        ): ?>
                            <div class="d-inline-block">
                                <a href="<?php echo e(route('admin.dashboard.settingEmail.smtpVerify')); ?>" id="testSmtp" class="btn btn-warning">
                                    <?php echo e(__('blades/configEmail.btn_conection_test')); ?>

                                </a>
                            </div>
                            <div class="detailsTestSmtp mt-3"></div>
                        <?php endif; ?>
                    </div> <!-- end card-body -->
                </div> <!-- end col -->

                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form
                                action="<?php echo e((Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || 
                                    (Auth::user()->can('email.visualizar') && Auth::user()->can('email.configurar smtp'))) 
                                    ? (isset($settingEmail) 
                                        ? route('admin.dashboard.settingEmail.update', $settingEmail->id) 
                                        : route('admin.dashboard.settingEmail.store')) 
                                    : ''); ?>"
                                method="post"
                            >
                                <?php echo csrf_field(); ?>
                                <?php if(isset($settingEmail)): ?>
                                    <?php echo method_field('PUT'); ?>
                                <?php endif; ?>
                                <div class="row g-3">
                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="mail_mailer" class="form-label">
                                            <?php echo e(__('blades/configEmail.protocol')); ?> <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            name="mail_mailer"
                                            <?php echo e((Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : ''); ?>

                                            class="form-control"
                                            id="mail_mailer<?php echo e(isset($settingEmail->id) ? $settingEmail->id : ''); ?>"
                                            value="<?php echo e(isset($settingEmail) ? $settingEmail->mail_mailer : ''); ?>"
                                            required
                                        >
                                    </div>
                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="mail_port" class="form-label">
                                            <?php echo e(__('blades/configEmail.port')); ?><span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            name="mail_port"
                                            <?php echo e((Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : ''); ?>

                                            value="<?php echo e(isset($settingEmail) ? $settingEmail->mail_port : ''); ?>"
                                            class="form-control"
                                            id="mail_port<?php echo e(isset($settingEmail->id) ? $settingEmail->id : ''); ?>"
                                            required
                                        >
                                    </div>

                                    <div class="mb-3 col-12 col-md-2">
                                        <label for="mail_encryption" class="form-label">
                                            <?php echo e(__('blades/configEmail.encryption')); ?><span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            name="mail_encryption"
                                            <?php echo e((Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : ''); ?>

                                            value="<?php echo e(isset($settingEmail) ? $settingEmail->mail_encryption : ''); ?>"
                                            class="form-control"
                                            id="mail_encryption<?php echo e(isset($settingEmail->id) ? $settingEmail->id : ''); ?>"
                                            required
                                        >
                                    </div>
                                    <div class="mb-3 col-12 col-md-10">
                                        <label for="mail_host" class="form-label">
                                            <?php echo e(__('blades/configEmail.host')); ?><span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            name="mail_host"
                                            <?php echo e((Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : ''); ?>

                                            value="<?php echo e(isset($settingEmail) ? $settingEmail->mail_host : ''); ?>"
                                            class="form-control"
                                            id="mail_host<?php echo e(isset($settingEmail->id) ? $settingEmail->id : ''); ?>"
                                            required
                                        >
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="mb-3 col-12 col-md-7">
                                        <label for="mail_username" class="form-label">
                                            <?php echo e(__('blades/configEmail.user')); ?><span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="email"
                                            name="mail_username"
                                            <?php echo e((Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : ''); ?>

                                            value="<?php echo e(isset($settingEmail) ? $settingEmail->mail_username : ''); ?>"
                                            class="form-control"
                                            id="mail_username<?php echo e(isset($settingEmail->id) ? $settingEmail->id : ''); ?>"
                                            required
                                        >
                                    </div>
                                    <div class="mb-3 col-12 col-md-5">
                                        <label for="mail_password" class="form-label">
                                            <?php echo e(__('blades/configEmail.password')); ?><span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="password"
                                            name="mail_password"
                                            <?php echo e((Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : ''); ?>

                                            value="<?php echo e(isset($settingEmail) ? $settingEmail->mail_password : ''); ?>"
                                            class="form-control"
                                            id="mail_password<?php echo e(isset($settingEmail->id) ? $settingEmail->id : ''); ?>"
                                            <?php echo e(!isset($settingEmail) ? 'required' : ''); ?>

                                        >
                                        <div class="row">
                                            <span class="mt-2 text-warning">
                                                <i class="mdi mdi-alert"></i> <?php echo e(__('blades/configEmail.text_password')); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="mail_from_address" class="form-label">
                                            <?php echo e(__('blades/configEmail.sender_email')); ?><span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="email"
                                            name="mail_from_address"
                                            <?php echo e((Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : ''); ?>

                                            value="<?php echo e(isset($settingEmail) ? $settingEmail->mail_from_address : ''); ?>"
                                            class="form-control"
                                            id="mail_from_address<?php echo e(isset($settingEmail->id) ? $settingEmail->id : ''); ?>"
                                            required
                                        >
                                    </div>
                                    <div class="mb-3 col-12 col-md-6">
                                        <label for="mail_from_name" class="form-label">
                                            <?php echo e(__('blades/configEmail.email_identifier')); ?>

                                        </label>
                                        <input
                                            type="text"
                                            name="mail_from_name"
                                            <?php echo e((Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : ''); ?>

                                            value="<?php echo e(isset($settingEmail) ? $settingEmail->mail_from_name : ''); ?>"
                                            class="form-control"
                                            id="mail_from_name<?php echo e(isset($settingEmail->id) ? $settingEmail->id : ''); ?>"
                                        >
                                    </div>
                                </div>

                                <?php if(
                                    Auth::user()->hasRole('Super') ||
                                    Auth::user()->can('usuario.tornar usuario master') ||
                                    (Auth::user()->can('email.visualizar') && Auth::user()->can('email.configurar smtp'))
                                ): ?>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-danger waves-effect waves-light">
                                            <?php echo e(__('dashboard.btn_cancel')); ?>

                                        </a>
                                        <button type="submit" class="btn btn-primary text-black waves-effect waves-light">
                                            <?php echo e(__('dashboard.btn_save')); ?>

                                        </button>
                                    </div>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>

<script>
    // Passa a tradução para uma variável JavaScript
    const connectionReasonMessage = <?php echo json_encode(__('blades/configEmail.message_conection_smtp_reason'), 15, 512) ?>;
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.core.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/admin/blades/seetingEmail/form.blade.php ENDPATH**/ ?>