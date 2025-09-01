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
@if (isset($topics) && $topics <> null)
    <section id="topic" class="topic">
        <div class="container py-5">
            <div class="row g-3 justify-content-center">
                @foreach($topics as $topic)                
                    <div class="col-12 col-sm-4 col-md-2 d-flex justify-content-center position-relative">
                        @if (isset($topic->link) && $topic->link <> null)                            
                            <a href="{{$topic->link}}" target="_blank" class="position-absolute top-0 left-0 w-100 h-100" rel="noopener noreferrer"></a>
                        @endif
                        <div class="partner-card {{isset($topics) ? $topic->color : 'dark-background'}} border rounded-2 d-flex flex-column justify-content-center align-items-start gap-3 p-3 w-100">
                            <img src="{{ asset('storage/' . $topic->path_image) }}" 
                                alt="Logo do parceiro" 
                                class="img-fluid" 
                                loading="lazy"/>
                            <h2 class="montserrat-bold montserrat-bold font-18  mb-0 title-blue text-uppercase mb-0 text-white">{{$topic->title}}</h2>                            
                        </div>                        
                    </div>
                @endforeach                   
            </div>
        </div>
    </section>
@endif

@if (isset($blogSuperHighlights) && $blogSuperHighlights <> null)
    <section class="blog mb-5">
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
@endif

@if (isset($about))
    <section class="aboutt">
        <div class="container">
            <div id="about-1" class="d-flex justify-content-between align-items-start about flex-wrap w-100 pt-3 pb-3 pt-lg-5">
                <div class="col-12 col-lg-7 animate-on-scroll" data-animation="animate__fadeInLeft">
                    <div class="border-bottom mb-0">
                        <h2 class="section-title rounded-top-left d-table px-4 w-auto m-0 montserrat-bold font-18 title-blue">{{$about->title}}</h2>
                    </div>
            
                    <div class="description mt-4 text-blog-inner montserrat-medium font-16">
                        {!! $about->text !!}
                    </div>

                    <div class="btn-about my-4">
                        <a href="{{route('about')}}#{{$about->slug}}" class="background-red montserrat-semiBold font-15 py-2 px-4 rounded-4">Saiba mais</a>
                    </div>
                </div>
                <div class="col-11 col-lg-4 animate-on-scroll mb-3" data-animation="animate__fadeInRight">
                    <div class="image d-flex justify-content-end">
                        <img src="{{asset('storage/' . $about->path_image)}}" loading="lazy" alt="About" class="w-100 h-100 about-image d-sm-block" loading="lazy">
                    </div>
                </div>
            </div>     
            
            <div class="partner-about">
                <div class="container pt-3 pb-5">
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
@endif

@include('client.includes.benefit')

@if ($announcements->count())                        
    <div class="mb-3">
        @include('client.includes.announcement')
    </div>
@endif

<section class="video">
    <div class="container-fluid p-0">
        <div class="content-video d-flex justify-content-center align-items-center bg-black">
            <!-- Lista -->
            <div class="left col-5 dark-background h-100 d-flex justify-content-center align-items-end flex-column position-relative">                
                <div class="swiper mySwiper position-relative">
                    <div class="swiper-wrapper py-4 flex-column align-items-start justify-content-start m-auto position-relative">
                        @for ($s = 0; $s < 10; $s++)                        
                            <div class="swiper-slide align-items-center mb-3 justify-content-start" data-video="//www.youtube.com/embed/Z5CEq_8DLwQ?si=-wpVZgp7y6bdbIxI">
                                <svg xmlns="http://www.w3.org/2000/svg" class="external-icon" viewBox="0 0 28.57  20" focusable="false" style="pointer-events: none; display: block; width: 35px; height: auto;">
                                <svg viewBox="0 0 28.57 20" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                    <path d="M27.9727 3.12324C27.6435 1.89323 26.6768 0.926623 25.4468 0.597366C23.2197 2.24288e-07 14.285 0 14.285 0C14.285 0 5.35042 2.24288e-07 3.12323 0.597366C1.89323 0.926623 0.926623 1.89323 0.597366 3.12324C2.24288e-07 5.35042 0 10 0 10C0 10 2.24288e-07 14.6496 0.597366 16.8768C0.926623 18.1068 1.89323 19.0734 3.12323 19.4026C5.35042 20 14.285 20 14.285 20C14.285 20 23.2197 20 25.4468 19.4026C26.6768 19.0734 27.6435 18.1068 27.9727 16.8768C28.5701 14.6496 28.5701 10 28.5701 10C28.5701 10 28.5677 5.35042 27.9727 3.12324Z" fill="#FF0000"></path>
                                    <path d="M11.4253 14.2854L18.8477 10.0004L11.4253 5.71533V14.2854Z" fill="white"></path>
                                    </g>
                                </svg>
                                </svg>
                                <h4 class="title montserrat-medium font-16 mb-0">Protesto contra cortes na educação</h4>                        
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="nav-video position-absolute d-flex flex-column align-items-end me-5">
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

<section class="category-blog-home py-0 mt-5">
    <div class="container-fluid p-0">
        <div class="row g-3 justify-content-center">
            @for ($cat = 0; $cat < 5; $cat++)
                <div class="col-6 col-sm-4 col-md-2 col-lg d-flex justify-content-center p-0 mt-0">
                    <div class="box-category text-center w-100 position-relative overflow-hidden">
                        <img src="{{asset('build/client/images/blg.png')}}" alt="" class="w-100 img-fluid mx-auto">
                        <div class="overlay">
                            <a href="" class="w-100 text-center">
                                <h4 class="title montserrat-semiBold font-18 text-white mt-2">Saúde</h4>
                            </a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

<section class="news-home py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9 animate-on-scroll mb-3" data-animation="animate__fadeInLeft">
                <div class="border-bottom news mb-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-end">
                        <h2 class="section-title d-table px-4 py-2 w-auto m-0 montserrat-bold font-18 title-blue text-uppercase rounded-top-left">
                            Últimas notícias
                        </h2>

                        <nav class="mt-3 mt-md-0">
                            <ul class="list-unstyled d-flex flex-row flex-wrap gap-2 gap-md-3 justify-content-start justify-content-md-center mb-0">
                                <li class="py-2 px-3 text-uppercase montserrat-semiBold text-white background-red font-14 active">
                                    <a href="#" class="text-decoration-none text-white">Jurídico</a>
                                </li>
                                <li class="py-2 px-3 text-uppercase montserrat-semiBold text-black font-14">
                                    <a href="#" class="text-decoration-none text-black">Política</a>
                                </li>
                                <li class="py-2 px-3 text-uppercase montserrat-semiBold text-black font-14">
                                    <a href="#" class="text-decoration-none text-black">Educação</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <article>
                    <div class="col-12">
                        <div class="row news-lg mx-0 mb-3 border rounded-2 align-items-center overflow-hidden bg-white flex-column flex-md-row">
                            <div class="col-12 col-md-6 h-auto px-0 d-flex justify-content-center align-items-center" style="aspect-ratio:1.91/1;">
                                <img loading="lazy" class="img-fluid w-100 h-auto"
                                    src="{{ asset('build/client/images/news-800x500-1.jpg') }}"
                                    alt="Sem imagem"
                                    style="object-fit: cover;">
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-column bg-white px-3 px-md-0">
                                <div class="p-3 p-md-4">
                                    <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                                        <span class="badge badge-primary montserrat-semiBold font-12 me-2 background-red text-uppercase p-2">
                                            Política
                                        </span>
                                        <p class="text-color mb-0 montserrat-regular font-14">
                                            11 de Janeiro de 2025
                                        </p>
                                    </div>
                                    <a href="" class="underline">
                                        <h2 class="h5 h-md4 mb-3 text-uppercase montserrat-semiBold font-18 font-md-20 title-blue">
                                            PARTICIPE DA REELEIÇÃO DA SINCADS BA! AS ELEIÇÕES CONTecem NO DIA....
                                        </h2>
                                    </a>
                                    <p class="m-0 text-color montserrat-medium font-14 font-md-16">
                                        Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna rebum clita rebum dolor stet amet justo Dolor lorem eos dolor duo et eirmod sea.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <div class="row">
                    @for ($rel = 0; $rel < 10; $rel++)
                        <article class="col-12 col-sm-12 col-md-6">
                            <div class="d-flex align-items-center bg-white mb-3 overflow-hidden" style="height: 110px;">
                                <img loading="lazy" class="img-fluid col-3"
                                src="{{asset('build/client/images/news-110x110-3.jpg')}}"
                                alt="Sem imagem"
                                style="height: 110px;aspect-ratio:1/1;">
                                <div class="col-9 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                                    <span class="badge badge-primary montserrat-semiBold font-10 text-uppercase py-1 px-2 mr-2 background-red">Política</span>
                                    <p class="text-color mb-0 montserrat-regular font-12">11 de Janeiro de 2025</p>
                                    </div>
                                    <a href="" class="underline">
                                    <h3 class="h6 m-0 text-uppercase montserrat-bold font-14 title-blue">exclusivo, ELEIÇÃO DA SINCADS BAhia, ainda hoje, não...</h3>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endfor
                </div>
            </div>
            <div class="col-lg-3" data-aos="fade-left" data-aos-delay="100">
                <div class="section-title mb-0 rounded-top-left">
                    <h3 class="m-0 text-uppercase montserrat-bold font-18 title-blue">Agenda</h3>
                </div>

                <div class="bg-white p-3">      
                    @for ($art = 0; $art < 5; $art++)                        
                        <article>
                            <div class="d-flex align-items-center bg-white mb-3 overflow-hidden" style="height: 80px;">
                                <div class="date col-4 h-100 d-flex justify-content-center align-items-center flex-column border border-right-1">
                                    <span class="montserrat-bold w-100 h-50 d-flex justify-content-center align-items-center font-14 title-blue">02</span>
                                    <span class="montserrat-medium w-100 h-50 d-flex justify-content-center align-items-center font-14 title-blue background-red text-white">Dezembro</span>
                                </div>
                                <div class="col-8 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <a href="" class="underline">
                                    <h3 class="h6 m-0 montserrat-bold font-14 title-blue">Eleição Sindacs BA novo presidente 2025</h3>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endfor  
                    <div class="btn-about d-table m-auto mt-5">
                        <a href="{{route('about')}}" class="background-red montserrat-semiBold font-18 py-2 px-4 rounded-5">Ver todos</a>
                    </div>                      
                </div>
            </div>
        </div>
    </div>
</section>

@include('client.includes.complaint')

<script>
const section = document.querySelector('section.video');
if (section) {
    const wrapper = section.querySelector('.mySwiper .swiper-wrapper');
    const slides  = Array.from(section.querySelectorAll(".mySwiper .swiper-slide"));
    const player  = section.querySelector("#videoPlayer");

    let currentIndex = 0; // controla o slide ativo
    let firstLoad = true;  // flag para controlar rolagem no carregamento

    // Normaliza URL
    function norm(url) {
        if (!url) return "";
        return url.startsWith("//") ? window.location.protocol + url : url;
    }

    // Marca ativo e troca vídeo
    function setActiveByIndex(index, userTriggered = false) {
        if (index < 0 || index >= slides.length) return;

        slides.forEach(s => s.classList.remove("active"));
        const slide = slides[index];
        slide.classList.add("active");

        const url = norm(slide.getAttribute("data-video"));
        if (url) player.src = url;

        currentIndex = index;

        // Só rola se foi clique do usuário ou se não é o primeiro load
        if (!firstLoad || userTriggered) {
            slide.scrollIntoView({ behavior: "smooth", block: "nearest" });
        }
    }

    // Clique direto em um item da lista
    slides.forEach((slide, idx) => {
        slide.addEventListener("click", () => setActiveByIndex(idx, true));
    });

    // Inicializa no primeiro slide (sem rolagem)
    if (slides.length > 0) setActiveByIndex(0);

    // Depois do carregamento da página, libera rolagem para próximas interações
    window.addEventListener("load", () => {
        setTimeout(() => {
            firstLoad = false;
        }, 500);
    });

    // Navegação ↑ ↓ para trocar de vídeo
    const btnUp = section.querySelector(".swiper-button-up");
    const btnDown = section.querySelector(".swiper-button-down");

    btnUp && btnUp.addEventListener("click", () => {
        if (currentIndex > 0) {
            setActiveByIndex(currentIndex - 1, true);
        }
    });

    btnDown && btnDown.addEventListener("click", () => {
        if (currentIndex < slides.length - 1) {
            setActiveByIndex(currentIndex + 1, true);
        }
    });
}
</script>

@endsection
