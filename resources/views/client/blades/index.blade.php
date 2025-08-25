@extends('client.core.client')
@section('content')

@if (!empty($slides))
    <section id="hero" class="hero position-relative d-flex flex-column section dark-background overflow-hidden">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <div class="swiper-slide">
                        <picture class="d-flex">
                            <source srcset="{{ asset('storage/' . $slide->path_image_mobile) }}" media="(max-width: 885px)">
                            <img src="{{ asset('storage/' . $slide->path_image) }}" alt="Banner Hero" title="Banner Hero" class="image-hero w-100">
                        </picture>
                        <div class="w-100 d-flex justify-content-center flex-column align-items-center position-absolute description">
                            <div class="max-width container">
                                <h1 class="text-white mb-5 rethink-sans-bold">{!!$slide->title!!}</h1>
                                <p class="text-white mb-5 rethink-sans-regular d-flex no-wrap align-items-center">
                                    {!!$slide->description!!}
                                </p>
                                @if (!empty($slide->link))
                                    <a href="{{$slide->link}}" target=_blank rel="noopener noreferrer" class="rethink-sans-regular ps-5 text-white call-to-action d-flex justify-content-between align-items-center">
                                    Fale com a gente!
                                    <i class="bi bi-whatsapp rounded-circle d-flex justify-content-center align-items-center"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Paginação opcional -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
@endif

<section id="topic" class="topic">
    <div class="container py-5">
        <div class="row g-3 justify-content-center">
            @for ($a = 0; $a < 5; $a++)                    
                <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                    <div class="partner-card dark-background border rounded-2 d-flex flex-column justify-content-center align-items-start gap-3 p-3 w-100">
                        <img src="{{ asset('build/client/images/call.svg') }}" 
                            alt="Logo do parceiro" 
                            class="img-fluid" 
                            loading="lazy"/>
                        <h2 class="montserrat-bold montserrat-bold font-18  mb-0 title-blue text-uppercase mb-0 text-white">Atendimento</h2>                            
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

<section class="blog mb-5">
    <div class="container">
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
                              src="{{ $blogSuperHighlight->path_image_thumbnail ? asset('storage/'.$blogSuperHighlight->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat' }}"
                              alt="{{ $blogSuperHighlight->path_image_thumbnail ? 'Notícia super destaque' : 'Sem imagem'}}"
                              style="object-fit: cover; aspect-ratio: 1.91/1;">

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
                              style="object-fit: cover; aspect-ratio: 1 / 1;">
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

<section class="about">
    <div class="container">
        <div id="about-1" class="d-flex justify-content-between align-items-start about flex-wrap w-100 pt-4 pb-3 pt-lg-5">
            <div class="col-11 col-lg-7 animate-on-scroll" data-animation="animate__fadeInLeft">
                <div class="border-bottom mb-0">
                    <h2 class="section-title rounded-top-left d-table px-4 w-auto m-0 montserrat-bold font-18 title-blue">História</h2>
                </div>
        
                <div class="description mt-4 text-blog-inner montserrat-medium font-16">
                    <p>
                        Nós, o Sindicato dos Trabalhadores em Educação do Terceiro Grau do Estado da Bahia (SINTEST-BA) somos a entidade representativa dos servidores técnicos 
                        administrativos da Universidade do Estado da Bahia (UNEB) e Universidade Estadual de Feira de Santana (UEFS). 
                        <br><br>
                        Desde 09 de março de 1990, temos como propósito a conquista e defesa de direitos da categoria, bem como a valorização dos seus filiados com o intuito de lutar por melhorias no seu bem-estar.
                        <br><br>                            
                        Nosso sindicato se preocupa em assistir aos servidores espalhados por todo o Estado, representados nos 26 campus da UNEB e na UEFS, buscando a união 
                        dos esforços em prol do crescimento e fortalecimento enquanto categoria dos técnicos administrativos das universidades públicas.
                    </p>
                </div>

                <div class="btn-about mt-4">
                    <a href="{{route('about')}}" class="background-red montserrat-semiBold font-15 py-2 px-4 rounded-4">Saiba mais</a>
                </div>
            </div>
            <div class="col-11 col-lg-4 animate-on-scroll mb-3" data-animation="animate__fadeInRight">
                <div class="image d-flex justify-content-end">
                    <img src="{{asset('build/client/images/aboutt.png')}}" loading="lazy" alt="About" class="w-100 h-100 about-image d-sm-block" loading="lazy">
                </div>
            </div>
        </div>     
        
        <div class="partner-about">
            <div class="container py-5">
                <div class="row g-3 justify-content-center">
                    @for ($a = 0; $a < 4; $a++)                    
                        <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                            <div class="partner-card border rounded-2 d-flex justify-content-center align-items-center py-2 px-4 w-100">
                                <img src="{{ asset('build/client/images/cut.png') }}" 
                                    alt="Logo do parceiro" 
                                    class="img-fluid" 
                                    loading="lazy"/>                            
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>

@include('client.includes.benefit')

@if ($announcements->count())                        
    <div class="mb-3">
        @include('client.includes.announcement')
    </div>
@endif

  <style>
    /* .mySwiper.swiper {
      width: 100%;
      height: 100%;
      min-height: 480px;
    } */
    .mySwiper .swiper-slide {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px;
      cursor: pointer;
      border-radius: 6px;
    }
    .mySwiper .swiper-slide.active {
      background: #fff;
      color: #000;
      font-weight: bold;
    }
    .mySwiper .swiper-slide img {
      width: 30px;
      height: 30px;
    }
    .mySwiper .swiper-button-up,
    .mySwiper .swiper-button-down {
      color: white;
      font-size: 20px;
      margin: 5px 0;
      cursor: pointer;
    }
    .content-video, .right, .mySwiper.swiper, .right iframe{
        min-height: 460px;
    }
    .nav-video{
        right: 50px;
        bottom: 50px;
    }
     
    .right iframe {
      border: none;
    }
  </style>
<section class="video">
    <div class="container">
        <div class="content-video d-flex justify-content-center align-items-center">
            <!-- Carrossel -->
            <div class="left col-5 dark-background h-100 position-relative">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper flex-column align-items-start justify-content-start col-10 m-auto">
                        <div class="swiper-slide align-items-center justify-content-start" data-video="https://www.youtube.com/embed/ysz5S6PUM-U">
                            <svg xmlns="http://www.w3.org/2000/svg" class="external-icon" viewBox="0 0 28.57  20" focusable="false" style="pointer-events: none; display: block; width: 40px; height: auto;">
                            <svg viewBox="0 0 28.57 20" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                <path d="M27.9727 3.12324C27.6435 1.89323 26.6768 0.926623 25.4468 0.597366C23.2197 2.24288e-07 14.285 0 14.285 0C14.285 0 5.35042 2.24288e-07 3.12323 0.597366C1.89323 0.926623 0.926623 1.89323 0.597366 3.12324C2.24288e-07 5.35042 0 10 0 10C0 10 2.24288e-07 14.6496 0.597366 16.8768C0.926623 18.1068 1.89323 19.0734 3.12323 19.4026C5.35042 20 14.285 20 14.285 20C14.285 20 23.2197 20 25.4468 19.4026C26.6768 19.0734 27.6435 18.1068 27.9727 16.8768C28.5701 14.6496 28.5701 10 28.5701 10C28.5701 10 28.5677 5.35042 27.9727 3.12324Z" fill="#FF0000"></path>
                                <path d="M11.4253 14.2854L18.8477 10.0004L11.4253 5.71533V14.2854Z" fill="white"></path>
                                </g>
                            </svg>
                            </svg>
                            <h4 class="title montserrat-medium font-16 mb-0">Protesto a favor do governo de Obama</h4>                        
                        </div>
                        <div class="swiper-slide align-items-center justify-content-start" data-video="https://www.youtube.com/embed/ScMzIvxBSi4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="external-icon" viewBox="0 0 28.57  20" focusable="false" style="pointer-events: none; display: block; width: 40px; height: auto;">
                            <svg viewBox="0 0 28.57 20" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                <path d="M27.9727 3.12324C27.6435 1.89323 26.6768 0.926623 25.4468 0.597366C23.2197 2.24288e-07 14.285 0 14.285 0C14.285 0 5.35042 2.24288e-07 3.12323 0.597366C1.89323 0.926623 0.926623 1.89323 0.597366 3.12324C2.24288e-07 5.35042 0 10 0 10C0 10 2.24288e-07 14.6496 0.597366 16.8768C0.926623 18.1068 1.89323 19.0734 3.12323 19.4026C5.35042 20 14.285 20 14.285 20C14.285 20 23.2197 20 25.4468 19.4026C26.6768 19.0734 27.6435 18.1068 27.9727 16.8768C28.5701 14.6496 28.5701 10 28.5701 10C28.5701 10 28.5677 5.35042 27.9727 3.12324Z" fill="#FF0000"></path>
                                <path d="M11.4253 14.2854L18.8477 10.0004L11.4253 5.71533V14.2854Z" fill="white"></path>
                                </g>
                            </svg>
                            </svg>
                            <h4 class="title montserrat-medium font-16 mb-0">Protesto pelo aumento do salário mínimo</h4>                        
                        </div>
                        <div class="swiper-slide align-items-center justify-content-start" data-video="//www.youtube.com/embed/Z5CEq_8DLwQ?si=-wpVZgp7y6bdbIxI">
                            <svg xmlns="http://www.w3.org/2000/svg" class="external-icon" viewBox="0 0 28.57  20" focusable="false" style="pointer-events: none; display: block; width: 40px; height: auto;">
                            <svg viewBox="0 0 28.57 20" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                <path d="M27.9727 3.12324C27.6435 1.89323 26.6768 0.926623 25.4468 0.597366C23.2197 2.24288e-07 14.285 0 14.285 0C14.285 0 5.35042 2.24288e-07 3.12323 0.597366C1.89323 0.926623 0.926623 1.89323 0.597366 3.12324C2.24288e-07 5.35042 0 10 0 10C0 10 2.24288e-07 14.6496 0.597366 16.8768C0.926623 18.1068 1.89323 19.0734 3.12323 19.4026C5.35042 20 14.285 20 14.285 20C14.285 20 23.2197 20 25.4468 19.4026C26.6768 19.0734 27.6435 18.1068 27.9727 16.8768C28.5701 14.6496 28.5701 10 28.5701 10C28.5701 10 28.5677 5.35042 27.9727 3.12324Z" fill="#FF0000"></path>
                                <path d="M11.4253 14.2854L18.8477 10.0004L11.4253 5.71533V14.2854Z" fill="white"></path>
                                </g>
                            </svg>
                            </svg>
                            <h4 class="title montserrat-medium font-16 mb-0">Protesto contra cortes na educação</h4>                        
                        </div>
                    </div>
                </div>
                <div class="nav-video position-absolute">
                    <div class="swiper-button-up">▲</div>
                    <div class="swiper-button-down">▼</div>
                </div>
            </div>
            <!-- Player -->
            <div class="right col-7 bg-black d-flex justify-content-center align-items-center">
                <iframe id="videoPlayer" class="w-100 h-100" src="//www.youtube.com/embed/Z5CEq_8DLwQ?si=-wpVZgp7y6bdbIxI" allowfullscreen></iframe>
            </div>
            </div>
        </div>
</section>

<script>
  const swiper = new Swiper(".mySwiper", {
    direction: "vertical",
    slidesPerView: 5,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-down",
      prevEl: ".swiper-button-up",
    },
  });

  // Trocar vídeo ao clicar
  const slides = document.querySelectorAll(".swiper-slide");
  const player = document.getElementById("videoPlayer");

  slides.forEach(slide => {
    slide.addEventListener("click", () => {
      slides.forEach(s => s.classList.remove("active"));
      slide.classList.add("active");
      player.src = slide.getAttribute("data-video");
    });
  });

  // Marcar o primeiro ativo
  slides[0].classList.add("active");
</script>
@endsection
