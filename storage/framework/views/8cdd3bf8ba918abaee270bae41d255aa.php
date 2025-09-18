<?php if(isset($contact) && $contact->name_section_social_media || 
isset($contact) && $contact->mention != null || isset($contact) && $contact->link_insta
|| isset($contact) && $contact->link_face || isset($contact) && $contact->link_tik_tok ||
isset($contact) && $contact->link_youtube || isset($contact) && $contact->link_x): ?>
    <!-- Redes Sociais -->
    <div class="bg-light padding-t-80 pb-0 mt-5 d-flex flex-wrap align-items-start justify-content-between socials-network">
        <?php if(isset($contact) && $contact->name_section_social_media): ?>                
            <div class="d-flex justify-content-start gap-2 align-items-start flex-nowrap mt-4">
                <span class="firula-contact mt-2"></span>
                <div class="description">
                    <h3 class="montserrat-bold font-30 mb-0 title-blue"><?php echo e($contact->name_section_social_media); ?></h3>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-6 sc">
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 flex-column">
                <div class="dark-background rounded-3 px-5 py-4">
                    <nav class="site-navigation position-relative text-end w-25 redes-sociais">
                        <ul class="p-0 d-flex justify-content-start gap-5 flex-row mb-0">
                            <?php if(isset($contact) && $contact->link_insta): ?>
                                <li class="li d-flex justify-content-start align-items-center rounded-circle">
                                    <a href="<?php echo e($contact->link_insta); ?>" rel="nofollow noopener noreferrer" target="_blank">
                                        <img src="<?php echo e(asset('build/client/images/insta.svg')); ?>" alt="Instagram">
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($contact) && $contact->link_x): ?>
                                <li class="li d-flex justify-content-start align-items-center rounded-circle">
                                    <a href="<?php echo e($contact->link_x); ?>" rel="nofollow noopener noreferrer" target="_blank">
                                        <img src="<?php echo e(asset('build/client/images/x.svg')); ?>" alt="X">
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($contact) && $contact->link_youtube): ?>
                                <li class="li d-flex justify-content-start align-items-center rounded-circle">
                                    <a href="<?php echo e($contact->link_youtube); ?>" rel="nofollow noopener noreferrer" target="_blank">
                                        <img src="<?php echo e(asset('build/client/images/youtube.svg')); ?>" alt="Youtube">
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($contact) && $contact->link_face): ?>
                                <li class="li d-flex justify-content-start align-items-center rounded-circle">
                                    <a href="<?php echo e($contact->link_face); ?>" rel="nofollow noopener noreferrer" target="_blank">
                                        <img src="<?php echo e(asset('build/client/images/face.svg')); ?>" alt="Facebook">
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($contact) && $contact->link_tik_tok): ?>
                                <li class="li d-flex justify-content-start align-items-center rounded-circle">
                                    <a href="<?php echo e($contact->link_tik_tok); ?>a" rel="nofollow noopener noreferrer" target="_blank">
                                        <img src="<?php echo e(asset('build/client/images/tiktok.svg')); ?>" alt="Tiktok">
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul> 
                    </nav>
                </div>
                <?php if(isset($contact) && $contact->mention != null): ?>                        
                    <span class="montserrat-ExtraBold font-20 ms-2 title-blue text-uppercase">@ <?php echo e($contact->mention); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/client/includes/social.blade.php ENDPATH**/ ?>