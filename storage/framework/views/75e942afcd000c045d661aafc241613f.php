<?php $__env->startSection('content'); ?>
<!-- Pop-up -->
<?php if(isset($popUp)): ?>
   <div id="popup" class="popup" style="display: flex;">
      <div class="popup-content">
         <span class="close-btn font-24 montserrat-bold">x</span>
         <?php if($popUp->link != null): ?>            
            <a href="<?php echo e($popUp->link); ?>" target="_blank" rel="noopener noreferrer">
               <img 
                  src="<?php echo e(asset('storage/' . $popUp->path_image)); ?>" 
                  alt="Pop-up"
                  fetchpriority="high" 
                  width="500" 
                  height="auto"
                  decoding="async"
                  loading="eager"
               />
            </a>
            <?php else: ?>
            <img 
               src="<?php echo e(asset('storage/' . $popUp->path_image)); ?>" 
               alt="Pop-up"
               fetchpriority="high" 
               width="500" 
               height="auto"
               decoding="async"
               loading="eager"
            />
         <?php endif; ?>

      </div>
   </div>
   <script defer>
      document.addEventListener("DOMContentLoaded", function () {
         let popup = document.getElementById("popup");
         let closeBtn = document.querySelector(".close-btn");
         popup.style.display = "flex";
         closeBtn.addEventListener("click", () => popup.style.display = "none");
         window.addEventListener("click", (e) => { if (e.target === popup) popup.style.display = "none"; });
      });
   </script>
<?php endif; ?>

<section class="blog mb-5">
    <div class="container-fluid">
       <div class="row">
         
          <?php echo $__env->make('client.includes.announcement', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 

          <div class="col-lg-7 p-0">
             <!-- Swiper Main Carousel -->
             <div class="swiper main-swiper">
                <div class="swiper-wrapper">
                  <?php $__currentLoopData = $blogSuperHighlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogSuperHighlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php
                        \Carbon\Carbon::setLocale('pt_BR');
                        $dataFormatada = \Carbon\Carbon::parse($blogSuperHighlight->date)->translatedFormat('d \d\e F \d\e Y');
                     ?>
                     <div class="swiper-slide">
                        <article>
                           <div class="position-relative overflow-hidden" style="height: 500px;">
                              <img class="img-fluid h-100 w-100"
                              src="<?php echo e($blogSuperHighlight->path_image_thumbnail ? asset('storage/'.$blogSuperHighlight->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat'); ?>"
                              alt="<?php echo e($blogSuperHighlight->path_image_thumbnail ? 'Notícia super destaque' : 'Sem imagem'); ?>"
                              style="object-fit: cover; aspect-ratio: 1.91/1;">

                              <div class="overlay">
                                 <div class="mb-2 d-flex justify-content-center align-items-center gap-1 flex-wrap">
                                    <span class="badge background-red montserrat-semiBold font-12 text-uppercase py-2 px-2 me-2"><?php echo e($blogSuperHighlight->category->title); ?></span>
                                    <p class="text-white mb-0 montserrat-regular font-15"><?php echo e($dataFormatada); ?></p>
                                 </div>
                                 <a href="<?php echo e(route('blog-inner', ['slug' => $blogSuperHighlight->slug])); ?>">
                                    <h1 class="h2 m-0 text-white text-uppercase montserrat-bold font-32 d-block"><?php echo e($blogSuperHighlight->title); ?></h1>
                                 </a>
                              </div>
                           </div>
                        </article>
                     </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                </div>
                <!-- Swiper pagination & navigation (optional) -->
                <div class="swiper-pagination news"></div>
             </div>
          </div>
          <?php if($blogHighlights->count()): ?>            
            <div class="col-lg-5 p-0">
               <div class="row g-0">
                  <!-- Static small boxes as before -->
                  <?php $__currentLoopData = $blogHighlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogHighlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php
                        \Carbon\Carbon::setLocale('pt_BR');
                        $dataFormatada = \Carbon\Carbon::parse($blogHighlight->date)->translatedFormat('d \d\e F \d\e Y');
                     ?>
                     <div class="col-md-6 box-small">
                        <article>
                           <div class="position-relative overflow-hidden" style="height: 250px;">
                              <img class="img-fluid h-100 w-100"
                              src="<?php echo e($blogHighlight->path_image_thumbnail ? asset('storage/'.$blogHighlight->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat'); ?>"
                              alt="<?php echo e($blogHighlight->title ? $blogHighlight->title : 'Sem imagem'); ?>"
                              style="object-fit: cover; aspect-ratio: 1 / 1;">
                              <div class="overlay">
                                 <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                                    <span class="badge background-red text-uppercase montserrat-semiBold font-12 py-2 px-2 me-2"><?php echo e($blogHighlight->category->title); ?></span>
                                    <p class="text-white mb-0 montserrat-regular font-12"><?php echo e($dataFormatada); ?></p>
                                 </div>
                                 <a href="<?php echo e(route('blog-inner', ['slug' => $blogHighlight->slug])); ?>">                              
                                    <h2 class="h6 m-0 text-white text-uppercase montserrat-bold font-16 d-block"><?php echo e($blogHighlight->title); ?></h2>
                                 </a>
                              </div>
                           </div>
                        </article>
                     </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
            </div>
          <?php endif; ?>
         </div>
      </div>
</section>

<section id="news" class="blog-content pt-3 my-5">
   <!-- News With Sidebar Start -->
   <div class="container-fluid">
       <div class="container">
           <div class="row">
               <div class="col-lg-8 mb-4" data-aos="fade-right" data-aos-delay="100">
                  <?php if($blogAll->count()): ?>                     
                     <div class="mb-5 rounded-top-left">
                        <h3 class="m-0 text-uppercase montserrat-bold font-22 title-blue">Notícias</h3>
                     </div>
                     <div class="row">
                        <div class="col-12 col-lg-9 mb-5 pb-4 d-flex justify-content-between gap-3 flex-wrap align-items-center">
                           <form action="<?php echo e(route('blog-search')); ?>#news" class="search col-12 col-lg-10" method="post">
                              <?php echo csrf_field(); ?>
                              <div class="input-group input-group-lg">
                                 <input type="search" name="search" class="form-control border-end-0 text-color montserrat-regular bg-white py-0" placeholder="Pesquise aqui">
                                 <button type="submit" title="search" class="btn-reset input-group-text bg-white border">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99989 0C3.13331 0 0 3.13427 0 6.99979C0 10.8663 3.13351 14.0004 6.99989 14.0004C8.49916 14.0004 9.88877 13.5285 11.0281 12.7252L15.9512 17.6491C16.4199 18.117 17.1798 18.117 17.6485 17.6491C18.1172 17.1804 18.1172 16.4205 17.6485 15.9518L12.7254 11.0288C13.5279 9.88936 13.9998 8.4997 13.9998 6.99983C13.9998 3.13411 10.8655 0 6.99989 0ZM2.39962 6.99979C2.39962 4.45981 4.45907 2.40019 6.99989 2.40019C9.54072 2.40019 11.6002 4.45961 11.6002 6.99979C11.6002 9.54058 9.54072 11.6 6.99989 11.6C4.45907 11.6 2.39962 9.54058 2.39962 6.99979Z" fill="#31404B"/>
                                    </svg>                                    
                                 </button>
                              </div>
                           </form>
                           
                           <?php if(Route::currentRouteName() == 'blog-search'): ?>
                              <a href="<?php echo e(route('blog')); ?>#news" class="btn background-red text-white montserrat-medium py-2 font-15">Limpar</a>
                           <?php endif; ?>
                        </div>

                        <?php $__currentLoopData = $blogAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                              <?php
                                 \Carbon\Carbon::setLocale('pt_BR');
                                 $dataFormatada = \Carbon\Carbon::parse($blog->date)->translatedFormat('d \d\e F \d\e Y');
                              ?>                     
                              <article>
                                 <div class="col-lg-12">
                                    <div class="row align-items-center news-lg mx-0 mb-3 border rounded-2 overflow-hidden bg-white">
                                       <div class="col-md-6 h-100 px-0 overflow-hidden d-flex justify-content-center align-items-center" style="aspect-ratio:1/1;">
                                             <img loading="lazy" class="img-fluid h-auto w-auto"
                                             src="<?php echo e($blog->path_image_thumbnail ? asset('storage/'.$blog->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat'); ?>"
                                             alt="<?php echo e($blog->title ? $blog->title : 'Sem imagem'); ?>"
                                             style="aspect-ratio: 1 / 1;object-fit: contain;">
                                       </div>
                                       <div class="col-md-6 d-flex flex-column bg-white h-100 px-0">
                                             <div class="mt-auto p-4">
                                                <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                                                   <span class="badge badge-primary montserrat-semiBold font-12 me-2 background-red text-uppercase font-weight-semi-bold p-2">
                                                         <?php echo e($blog->category->title); ?>

                                                   </span>
                                                   <p class="text-color mb-0 montserrat-regular font-14">
                                                      <?php echo e($dataFormatada); ?>

                                                   </p>
                                                </div>
                                                <a href="<?php echo e(route('blog-inner', ['slug' => $blog->slug])); ?>" class="underline">
                                                   <h2 class="h4 d-block mb-3 text-uppercase montserrat-semiBold font-20 title-blue">
                                                      <?php echo e($blog->title); ?>

                                                   </h2>
                                                </a>
                                                <p class="m-0 text-color montserrat-medium font-16">
                                                   <?php echo substr(strip_tags($blog->text), 0, 280); ?>...
                                                </p>
                                             </div>
                                       </div>
                                    </div>
                                 </div>
                              </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                     <div class="mt-3 float-end">
                        <?php echo e($blogAll->links()); ?>

                     </div>
                     <?php else: ?>
                     <div class="alert alert-warning d-flex align-items-center flex-column text-center py-4" role="alert">
                        <i class="bi bi-emoji-frown fs-1 mb-2"></i>
                        <h3 class="alert-heading text-uppercase montserrat-bold font-20">Nenhuma notícia encontrada</h3>
                     </div>
                  <?php endif; ?>
               </div>
               
               <div class="col-lg-4" data-aos="fade-left" data-aos-delay="100">
                  <aside>
                     <?php if($blogCategories->count()): ?>                        
                        <!-- Tags Start -->
                        <div class="mb-3">
                           <div class="section-title mb-0 rounded-top-left">                              
                                 <h3 class="m-0 text-uppercase montserrat-bold font-22 title-blue">CATEGORIAS</h3>
                           </div>
                           <div class="bg-white border border-top-0 p-3">
                                 <div class="d-flex flex-wrap m-n1">
                                    <?php $__currentLoopData = $blogCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <a href="<?php echo e(route('blog', ['category' => $blogCategory->slug])); ?>#news"
                                          class="btn btn-sm btn-outline-secondary montserrat-semiBold font-14 m-1
                                          <?php echo e((request()->routeIs('blog') && request()->route('category') === $blogCategory->slug) ? 'active background-red' : ''); ?>">
                                          <?php echo e($blogCategory->title); ?>

                                       </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </div>
                           </div>
                        </div>
                        <!-- Tags End -->
                     <?php endif; ?>
   
                      <?php if($blogSeeAlso->count()): ?>                        
                        <!-- Popular News Start -->
                        <div class="mb-3">
                           <div class="section-title mb-0 rounded-top-left">
                                 <h3 class="m-0 text-uppercase montserrat-bold font-22 title-blue">VEJA TAMBÉM</h3>
                           </div>
                           <div class="bg-white border border-top-0 p-3">
                                 <?php $__currentLoopData = $blogSeeAlso; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seeAlso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                    <?php
                                       \Carbon\Carbon::setLocale('pt_BR');
                                       $dataFormatada = \Carbon\Carbon::parse($seeAlso->date)->translatedFormat('d \d\e F \d\e Y');
                                    ?>                                
                                    <article>
                                       <div class="d-flex align-items-center bg-white mb-3 overflow-hidden" style="height: 110px;">
                                          <img loading="lazy" class="img-fluid"
                                          src="<?php echo e($seeAlso->path_image_thumbnail ? asset('storage/'.$seeAlso->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat'); ?>"
                                          alt="<?php echo e($seeAlso->title ? $seeAlso->title : 'Sem imagem'); ?>"
                                          style="height: 110px;">
                                          <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                             <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                                                <span class="badge badge-primary montserrat-semiBold font-10 text-uppercase py-1 px-2 mr-2 background-red"><?php echo e($seeAlso->category->title); ?></span>
                                                <p class="text-color mb-0 montserrat-regular font-12"><?php echo e($dataFormatada); ?></p>
                                             </div>
                                             <a href="<?php echo e(route('blog-inner', ['slug' => $seeAlso->slug])); ?>" class="underline">
                                                <h3 class="h6 m-0 text-uppercase montserrat-bold font-14 title-blue"><?php echo e($seeAlso->title); ?></h3>
                                             </a>
                                          </div>
                                       </div>
                                    </article>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                        </div>
                        <!-- Popular News End -->
                      <?php endif; ?>
   
                      <!-- Newsletter Start -->
                      <div class="mb-3">
                          <div class="section-title mb-0 rounded-top-left">
                              <h3 class="m-0 text-uppercase montserrat-bold font-22 title-blue">Newsletter</h3>
                          </div>
                          <?php echo $__env->make('client.includes.newsletter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                      </div>
                      <!-- Newsletter End -->
   
                      <!-- Ads Start -->
                      <?php if($announcementVerticals->count()): ?>                        
                        <div class="mb-3">
                           <?php echo $__env->make('client.includes.announcementVertical', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                      <?php endif; ?>
                      <!-- Ads End -->
                  </aside>
               </div>
           </div>
       </div>
   </div>
   <!-- News With Sidebar End -->
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.core.client', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/client/blades/blog.blade.php ENDPATH**/ ?>