@extends('client.core.client')
@section('content')

<div  class="mt-5">
   @include('client.includes.announcement')
</div>

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
                              <img class="img-fluid h-100 w-100" src="{{asset('storage/'.$blogSuperHighlight->path_image)}}" alt="{{$blogSuperHighlight->title}}" style="object-fit: cover;aspect-ratio: 2 / 1">
                              <div class="overlay">
                                 <div class="mb-2 d-flex justify-content-center align-items-center">
                                    <span class="badge background-red montserrat-semiBold font-12 text-uppercase py-2 px-2 me-2">{{$blogSuperHighlight->category->title}}</span>
                                    <p class="text-white mb-0 montserrat-regular font-12">{{$dataFormatada}}</p>
                                 </div>
                                 <a href="{{route('blog-inner')}}">
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
                              <img class="img-fluid w-100 h-100" src="{{asset('storage/'.$blogHighlight->path_image)}}" alt="{{$blogHighlight->title}}" style="object-fit: cover;">
                              <div class="overlay">
                                 <div class="mb-2 d-flex justify-content-center align-items-center">
                                    <span class="badge background-red text-uppercase montserrat-semiBold font-12 py-2 px-2 me-2">{{$blogHighlight->category->title}}</span>
                                    <p class="text-white mb-0 montserrat-regular font-12">{{$dataFormatada}}</p>
                                 </div>
                                 <a href="{{route('blog-inner')}}">                              
                                    <h3 class="h6 m-0 text-white text-uppercase montserrat-bold font-16 d-block">{{$blogHighlight->title}}</h3>
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
<section class="blog-content my-5">
   <!-- News With Sidebar Start -->
   <div class="container-fluid">
       <div class="container">
           <div class="row">
               <div class="col-lg-8 mb-4" data-aos=fade-right data-aos-delay=150>
                   <div class="row">
                       <div class="col-12">
                          <form action="">
                              <input type="search" name="search" class="form-control form-control-lg" placeholder="Pesquise aqui">
                          </form>
                       </div>

                       @foreach($blogAll as $blog)   
                           @php
                              \Carbon\Carbon::setLocale('pt_BR');
                              $dataFormatada = \Carbon\Carbon::parse($blog->date)->translatedFormat('d \d\e F \d\e Y');
                           @endphp                     
                           <article>
                              <div class="col-lg-12 mt-4">
                                 <div class="row news-lg mx-0 mb-3 border rounded-2 overflow-hidden">
                                    <div class="col-md-6 h-100 px-0 overflow-hidden">
                                          <img class="img-fluid h-100" src="{{ asset('storage/'.$blog->path_image) }}" alt="{{$blog->title}}" style="object-fit: cover;">
                                    </div>
                                    <div class="col-md-6 d-flex flex-column bg-white h-100 px-0">
                                          <div class="mt-auto p-4">
                                             <div class="mb-2 d-flex justify-content-start align-items-center gap-3">
                                                <span class="badge badge-primary montserrat-semiBold font-12 background-red text-uppercase font-weight-semi-bold p-2 mr-2">
                                                      {{$blog->category->title}}
                                                </span>
                                                <p class="text-color mb-0 montserrat-regular font-12">
                                                   {{$dataFormatada}}
                                                </p>
                                             </div>
                                             <a href="{{route('blog-inner')}}" class="underline">
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
               </div>
               
               <div class="col-lg-4" data-aos=fade-left data-aos-delay=150>
                  <aside>
                     <!-- Tags Start -->
                      <div class="mb-3">
                          <div class="section-title mb-0 rounded-top-left">
                              <h4 class="m-0 text-uppercase montserrat-bold font-28 title-blue">CATEGORIAS</h4>
                          </div>
                          <div class="bg-white border border-top-0 p-3">
                              <div class="d-flex flex-wrap m-n1">
                                  {{-- <a href="" class="btn btn-sm btn-outline-secondary montserrat-semiBold font-14 m-1 active background-red">Politics</a> --}}
                                  @foreach ($blogCategories as $blogCategory)                                    
                                    <a href="" class="btn btn-sm btn-outline-secondary montserrat-semiBold font-14 m-1">{{$blogCategory->title}}</a>
                                  @endforeach
                                  
                              </div>
                          </div>
                      </div>
                      <!-- Tags End -->
   
                      @if ($blogSeeAlso->count())                        
                        <!-- Popular News Start -->
                        <div class="mb-3">
                           <div class="section-title mb-0 rounded-top-left">
                                 <h4 class="m-0 text-uppercase montserrat-bold font-28 title-blue">VEJA TAMBÉM</h4>
                           </div>
                           <div class="bg-white border border-top-0 p-3">
                                 @foreach ($blogSeeAlso as $seeAlso)  
                                    @php
                                       \Carbon\Carbon::setLocale('pt_BR');
                                       $dataFormatada = \Carbon\Carbon::parse($seeAlso->date)->translatedFormat('d \d\e F \d\e Y');
                                    @endphp                                
                                    <article>
                                       <div class="d-flex align-items-center bg-white mb-3 overflow-hidden" style="height: 110px;">
                                          <img class="img-fluid" src="{{asset('storage/'.$seeAlso->path_image)}}" alt="{{$seeAlso->title}}">
                                          <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                             <div class="mb-2 d-flex justify-content-start align-items-center gap-3">
                                                <span class="badge badge-primary montserrat-semiBold font-10 text-uppercase py-1 px-2 mr-2 background-red">{{$seeAlso->category->title}}</span>
                                                <p class="text-color mb-0 montserrat-regular font-12">{{$dataFormatada}}</p>
                                             </div>
                                             <a href="{{route('blog-inner')}}" class="underline">
                                                <h3 class="h6 m-0 text-uppercase montserrat-bold font-15 title-blue">{{$seeAlso->title}}</h3>
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
                              <h4 class="m-0 text-uppercase montserrat-bold font-28 title-blue">Newsletter</h4>
                          </div>
                          <div class="bg-white text-center border border-top-0 p-3">
                              <p class="text-color montserrat-regular font-16 text-start">Cadastre-se abaixo e receba as principais novidades via e-mail!</p>
                              <div class="input-group mb-2" style="width: 100%;">
                                  <input type="text" class="form-control form-control-lg montserrat-regular text-color font-14" placeholder="Seu e-mail">
                                  <div class="input-group-append">
                                      <button class="btn background-red text-white montserrat-semiBold font-16 px-3 h-100 rounded-3">Enviar</button>
                                  </div>
                              </div>
                              <div class="d-flex justify-content-start align-items-center gap-2">
                                 <input type="checkbox" id="check">
                                 <label for="check" class="montserrat-regular text-color font-12">Aceito os termos descritos na Política de Privacidade</label>
                              </div>
                          </div>
                      </div>
                      <!-- Newsletter End -->
   
                      <!-- Ads Start -->
                      <div class="mb-3">
                          <div class="bg-white text-center px-0 overflow-hidden">
                              <a href=""><img class="img-fluid w-100" src="{{asset('build/client/images/anuncio.png')}}" alt=""></a>
                          </div>
                      </div>
                      <!-- Ads End -->
                  </aside>
               </div>
           </div>
       </div>
   </div>
   <!-- News With Sidebar End -->
</section>
@endsection