<?php if($featuredNews): ?>
    <?php
        \Carbon\Carbon::setLocale('pt_BR');
        $dataFormatada = \Carbon\Carbon::parse($featuredNews->date)->translatedFormat('d \d\e F \d\e Y');
    ?>
    <article>
        <div class="col-12">
            <div class="row news-lg mx-0 mb-3 border rounded-2 align-items-center overflow-hidden bg-white flex-column flex-md-row">
                <div class="col-12 col-md-6 h-auto px-0 d-flex justify-content-center align-items-center">
                    <img loading="lazy" class="img-fluid w-100 h-auto"
                        src="<?php echo e($featuredNews->path_image_thumbnail ? asset('storage/' . $featuredNews->path_image_thumbnail) : asset('build/client/images/news-800x500-1.jpg')); ?>"
                        alt="<?php echo e($featuredNews->title); ?>"
                        style="object-fit: cover;aspect-ratio:1.91/1;">
                </div>
                <div class="col-12 col-md-6 d-flex flex-column bg-white px-3 px-md-0">
                    <div class="p-3 p-md-4">
                        <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                            <span class="badge badge-primary montserrat-semiBold font-12 me-2 background-red text-uppercase p-2">
                                <?php echo e($featuredNews->category->title); ?>

                            </span>
                            <p class="text-color mb-0 montserrat-regular font-14">
                                <?php echo e($dataFormatada); ?>

                            </p>
                        </div>
                        <a href="<?php echo e(route('blog-inner', $featuredNews->slug)); ?>" class="underline">
                            <h2 class="h5 mb-3 text-uppercase montserrat-semiBold font-18 font-md-20 title-blue">
                                <?php echo e(Str::limit($featuredNews->title, 80)); ?>

                            </h2>
                        </a>
                        <p class="m-0 text-color montserrat-medium font-14 font-md-16">
                            <?php echo substr(strip_tags($featuredNews->text), 0, 150); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php endif; ?>

<?php if($latestNews->count() > 0): ?>  
    <div class="row" id="news-grid">
        <?php $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                \Carbon\Carbon::setLocale('pt_BR');
                $dataFormatada = \Carbon\Carbon::parse($news->date)->translatedFormat('d \d\e F \d\e Y');
            ?>
            <article class="col-12 col-sm-12 col-md-6">
                <div class="d-flex align-items-center bg-white mb-3 overflow-hidden" style="height: 110px;">
                    <img loading="lazy" class="img-fluid col-3"
                    src="<?php echo e($news->path_image_thumbnail ? asset('storage/' . $news->path_image_thumbnail) : asset('build/client/images/news-110x110-3.jpg')); ?>"
                    alt="<?php echo e($news->title); ?>"
                    style="height: 110px;aspect-ratio:1/1;object-fit: cover;">
                    <div class="col-9 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                        <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                            <span class="badge badge-primary montserrat-semiBold font-10 text-uppercase py-1 px-2 mr-2 background-red">
                                <?php echo e($news->category->title); ?>

                            </span>
                            <p class="text-color mb-0 montserrat-regular font-12">
                                <?php echo e($dataFormatada); ?>

                            </p>
                        </div>
                        <a href="<?php echo e(route('blog-inner', $news->slug)); ?>" class="underline">
                            <h3 class="h6 m-0 text-uppercase montserrat-bold font-14 title-blue">
                                <?php echo e(Str::limit($news->title, 60)); ?>

                            </h3>
                        </a>
                    </div>
                </div>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/client/ajax/filter-blog-homePage.blade.php ENDPATH**/ ?>