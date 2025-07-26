@extends('client.core.client')
@section('content')
<!-- Pop-up -->
<div id="popup" class="popup" style="display: flex;">
   <div class="popup-content">
      <span class="close-btn font-24 montserrat-bold">x</span>

      <img 
         src="{{ asset('build/client/images/pop-up.png') }}" 
         alt="Pop-up"
         fetchpriority="high" 
         width="500" 
         height="auto"
         decoding="async"
         loading="eager"
      />

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

<section class="blog mb-5" data-aos=fade-up data-aos-delay=150>
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-7 p-0">
             <!-- Swiper Main Carousel -->
             <div class="swiper main-swiper">
                <div class="swiper-wrapper">
                  @foreach($blogSuperHighlights as $blogSuperHighlight)
                     @php
                        \Carbon\Carbon::setLocale('pt_BR');
                        $dataFormatada = \Carbon\Carbon::parse($blogSuperHighlight->date)->translatedFormat('d \d\e F \d\e Y');
                     @endphp
                     <div class="swiper-slide">
                        <article>
                           <div class="position-relative overflow-hidden" style="height: 500px;">
                              <img class="img-fluid h-100 w-100"
                              src="{{ $blogSuperHighlight->path_image ? asset('storage/'.$blogSuperHighlight->path_image) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat' }}"
                              alt="{{ $blogSuperHighlight->title ? $blogSuperHighlight->title : 'Sem imagem'}}"
                              style="object-fit: cover; aspect-ratio: 2 / 1;">

                              <div class="overlay">
                                 <div class="mb-2 d-flex justify-content-center align-items-center gap-1 flex-wrap">
                                    <span class="badge background-red montserrat-semiBold font-12 text-uppercase py-2 px-2 me-2">{{$blogSuperHighlight->category->title}}</span>
                                    <p class="text-white mb-0 montserrat-regular font-15">{{$dataFormatada}}</p>
                                 </div>
                                 <a href="{{route('blog-inner', ['slug' => $blogSuperHighlight->slug])}}">
                                    <h1 class="h2 m-0 text-white text-uppercase montserrat-bold font-32 d-block">{{$blogSuperHighlight->title}}</h1>
                                 </a>
                              </div>
                           </div>
                        </article>
                     </div>
                  @endforeach                    
                </div>
                <!-- Swiper pagination & navigation (optional) -->
                <div class="swiper-pagination news"></div>
             </div>
          </div>
          @if ($blogHighlights->count())            
            <div class="col-lg-5 p-0">
               <div class="row g-0">
                  <!-- Static small boxes as before -->
                  @foreach($blogHighlights as $blogHighlight)
                     @php
                        \Carbon\Carbon::setLocale('pt_BR');
                        $dataFormatada = \Carbon\Carbon::parse($blogHighlight->date)->translatedFormat('d \d\e F \d\e Y');
                     @endphp
                     <div class="col-md-6 box-small">
                        <article>
                           <div class="position-relative overflow-hidden" style="height: 250px;">
                              <img class="img-fluid h-100 w-100"
                              src="{{ $blogHighlight->path_image_thumbnail ? asset('storage/'.$blogHighlight->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat' }}"
                              alt="{{ $blogHighlight->title ? $blogHighlight->title : 'Sem imagem'}}"
                              style="object-fit: cover; aspect-ratio: 2 / 1;">
                              <div class="overlay">
                                 <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                                    <span class="badge background-red text-uppercase montserrat-semiBold font-12 py-2 px-2 me-2">{{$blogHighlight->category->title}}</span>
                                    <p class="text-white mb-0 montserrat-regular font-12">{{$dataFormatada}}</p>
                                 </div>
                                 <a href="{{route('blog-inner', ['slug' => $blogHighlight->slug])}}">                              
                                    <h2 class="h6 m-0 text-white text-uppercase montserrat-bold font-16 d-block">{{$blogHighlight->title}}</h2>
                                 </a>
                              </div>
                           </div>
                        </article>
                     </div>
                  @endforeach
               </div>
            </div>
          @endif
         </div>
      </div>
</section>

<section id="news" class="blog-content pt-3 my-5">
   <!-- News With Sidebar Start -->
   <div class="container-fluid">
       <div class="container">
           <div class="row">
               <div class="col-lg-8 mb-4" data-aos=fade-right data-aos-delay=150>
                  @if ($blogAll->count())                     
                     <div class="mb-5 rounded-top-left">
                        <h3 class="m-0 text-uppercase montserrat-bold font-22 title-blue">Notícias</h3>
                     </div>
                     <div class="row">
                        <div class="col-12 col-lg-9 mb-5 pb-4 d-flex justify-content-between gap-3 flex-wrap align-items-center">
                           <form action="{{route('blog-search')}}#news" class="search col-12 col-lg-10" method="post">
                              @csrf
                              <div class="input-group input-group-lg">
                                 <input type="search" name="search" class="form-control border-end-0 text-color montserrat-regular bg-white py-0" placeholder="Pesquise aqui">
                                 <button type="submit" title="search" class="btn-reset input-group-text bg-white border">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99989 0C3.13331 0 0 3.13427 0 6.99979C0 10.8663 3.13351 14.0004 6.99989 14.0004C8.49916 14.0004 9.88877 13.5285 11.0281 12.7252L15.9512 17.6491C16.4199 18.117 17.1798 18.117 17.6485 17.6491C18.1172 17.1804 18.1172 16.4205 17.6485 15.9518L12.7254 11.0288C13.5279 9.88936 13.9998 8.4997 13.9998 6.99983C13.9998 3.13411 10.8655 0 6.99989 0ZM2.39962 6.99979C2.39962 4.45981 4.45907 2.40019 6.99989 2.40019C9.54072 2.40019 11.6002 4.45961 11.6002 6.99979C11.6002 9.54058 9.54072 11.6 6.99989 11.6C4.45907 11.6 2.39962 9.54058 2.39962 6.99979Z" fill="#31404B"/>
                                    </svg>                                    
                                 </button>
                              </div>
                           </form>
                           {{-- {{dd(Route::currentRouteName())}} --}}
                           @if (Route::currentRouteName() == 'blog-search')
                              <a href="{{ route('blog') }}#news" class="btn background-red text-white montserrat-medium py-2 font-15">Limpar</a>
                           @endif
                        </div>

                        @foreach($blogAll as $blog)   
                              @php
                                 \Carbon\Carbon::setLocale('pt_BR');
                                 $dataFormatada = \Carbon\Carbon::parse($blog->date)->translatedFormat('d \d\e F \d\e Y');
                              @endphp                     
                              <article>
                                 <div class="col-lg-12">
                                    <div class="row news-lg mx-0 mb-3 border rounded-2 overflow-hidden bg-white">
                                       <div class="col-md-6 h-100 px-0 overflow-hidden">
                                             <img class="img-fluid h-100"
                                             src="{{ $blog->path_image_thumbnail ? asset('storage/'.$blog->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat' }}"
                                             alt="{{ $blog->title ? $blog->title : 'Sem imagem'}}"
                                             style="object-fit: cover;">
                                       </div>
                                       <div class="col-md-6 d-flex flex-column bg-white h-100 px-0">
                                             <div class="mt-auto p-4">
                                                <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                                                   <span class="badge badge-primary montserrat-semiBold font-12 me-2 background-red text-uppercase font-weight-semi-bold p-2">
                                                         {{$blog->category->title}}
                                                   </span>
                                                   <p class="text-color mb-0 montserrat-regular font-14">
                                                      {{$dataFormatada}}
                                                   </p>
                                                </div>
                                                <a href="{{route('blog-inner', ['slug' => $blog->slug])}}" class="underline">
                                                   <h2 class="h4 d-block mb-3 text-uppercase montserrat-semiBold font-20 title-blue">
                                                      {{$blog->title}}
                                                   </h2>
                                                </a>
                                                <p class="m-0 text-color montserrat-regular font-16">
                                                   {!!substr(strip_tags($blog->text), 0, 150)!!}
                                                </p>
                                             </div>
                                       </div>
                                    </div>
                                 </div>
                              </article>
                        @endforeach
                     </div>
                     <div class="mt-3 float-end">
                        {{$blogAll->links()}}
                     </div>
                     @else
                     <div class="alert alert-warning d-flex align-items-center flex-column text-center py-4" role="alert">
                        <i class="bi bi-emoji-frown fs-1 mb-2"></i>
                        <h3 class="alert-heading text-uppercase montserrat-bold font-20">Nenhuma notícia encontrada</h3>
                     </div>
                  @endif
               </div>
               
               <div class="col-lg-4" data-aos=fade-left data-aos-delay=150>
                  <aside>
                     @if ($blogCategories->count())                        
                        <!-- Tags Start -->
                        <div class="mb-3">
                           <div class="section-title mb-0 rounded-top-left">                              
                                 <h3 class="m-0 text-uppercase montserrat-bold font-22 title-blue">CATEGORIAS</h3>
                           </div>
                           <div class="bg-white border border-top-0 p-3">
                                 <div class="d-flex flex-wrap m-n1">
                                    @foreach ($blogCategories as $blogCategory)
                                       <a href="{{ route('blog', ['category' => $blogCategory->slug]) }}#news"
                                          class="btn btn-sm btn-outline-secondary montserrat-semiBold font-14 m-1
                                          {{ (request()->routeIs('blog') && request()->route('category') === $blogCategory->slug) ? 'active background-red' : '' }}">
                                          {{$blogCategory->title}}
                                       </a>
                                    @endforeach
                                 </div>
                           </div>
                        </div>
                        <!-- Tags End -->
                     @endif
   
                      @if ($blogSeeAlso->count())                        
                        <!-- Popular News Start -->
                        <div class="mb-3">
                           <div class="section-title mb-0 rounded-top-left">
                                 <h3 class="m-0 text-uppercase montserrat-bold font-22 title-blue">VEJA TAMBÉM</h3>
                           </div>
                           <div class="bg-white border border-top-0 p-3">
                                 @foreach ($blogSeeAlso as $seeAlso)  
                                    @php
                                       \Carbon\Carbon::setLocale('pt_BR');
                                       $dataFormatada = \Carbon\Carbon::parse($seeAlso->date)->translatedFormat('d \d\e F \d\e Y');
                                    @endphp                                
                                    <article>
                                       <div class="d-flex align-items-center bg-white mb-3 overflow-hidden" style="height: 110px;">
                                          <img class="img-fluid"
                                          src="{{ $seeAlso->path_image_thumbnail ? asset('storage/'.$seeAlso->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat' }}"
                                          alt="{{ $seeAlso->title ? $seeAlso->title : 'Sem imagem'}}"
                                          style="height: 110px;">
                                          <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                             <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                                                <span class="badge badge-primary montserrat-semiBold font-10 text-uppercase py-1 px-2 mr-2 background-red">{{$seeAlso->category->title}}</span>
                                                <p class="text-color mb-0 montserrat-regular font-12">{{$dataFormatada}}</p>
                                             </div>
                                             <a href="{{route('blog-inner', ['slug' => $seeAlso->slug])}}" class="underline">
                                                <h3 class="h6 m-0 text-uppercase montserrat-bold font-14 title-blue">{{$seeAlso->title}}</h3>
                                             </a>
                                          </div>
                                       </div>
                                    </article>
                                 @endforeach
                           </div>
                        </div>
                        <!-- Popular News End -->
                      @endif
   
                      <!-- Newsletter Start -->
                      <div class="mb-3">
                          <div class="section-title mb-0 rounded-top-left">
                              <h3 class="m-0 text-uppercase montserrat-bold font-22 title-blue">Newsletter</h3>
                          </div>
                          @include('client.includes.newsletter')
                      </div>
                      <!-- Newsletter End -->
   
                      <!-- Ads Start -->
                      @if ($announcements->count())                        
                        <div class="mb-3">
                           @include('client.includes.announcementVertical')
                        </div>
                      @endif
                      <!-- Ads End -->
                  </aside>
               </div>
           </div>
       </div>
   </div>
   <!-- News With Sidebar End -->
</section>
@endsection