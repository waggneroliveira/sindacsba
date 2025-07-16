<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta http-equiv=X-UA-Compatible content="ie=edge">
    <meta name=theme-color content=#0d0d0d>
    <meta name=description content="Criação de sites, lojas virtuais e estratégias de marketing digital em Salvador. A WHI desenvolve soluções profissionais e personalizadas para o seu negócio crescer online.">
    <meta name=keywords content="Agência de marketing Salvador, criação de sites Salvador, marketing digital, desenvolvimento web, loja virtual, SEO local, redes sociais, tráfego pago, Google Ads, branding, identidade visual, WHI">
    <title>WHI | Agência de Marketing Digital e Criação de Sites em Salvador</title>
    <meta property=og:url content=https://whi.dev.br>
    <meta property=og:type content=website>
    <meta property=og:title content="WHI | Agência de Marketing Digital e Criação de Sites em Salvador">
    <meta property=og:description content="Soluções digitais completas em Salvador: sites profissionais, marketing de performance, identidade visual e presença online com a WHI.">
    <meta name=twitter:card content=summary_large_image>
    <meta name=twitter:url content=https://whi.dev.br>
    <meta name=twitter:title content="WHI | Agência de Marketing Digital e Criação de Sites em Salvador">
    <meta name=twitter:description content="Soluções digitais completas em Salvador: sites profissionais, marketing de performance, identidade visual e presença online com a WHI.">
    <meta name=twitter:image content=https://whi.dev.br/assets/images/logo.png>
    <link rel=canonical href=https://www.whi.dev.br/>
    <meta name=copyright content="Direitos reservados WHI">
    <meta name=author content=WHI>
    <link rel="shortcut icon" href=https://whi.dev.br/assets/images/favicon.svg>

    <link rel=preconnect href=https://fonts.googleapis.com>
    <link rel=preconnect href=https://fonts.gstatic.com crossorigin>    
    <link rel=preload as=style href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" onload='this.onload=null,this.rel="stylesheet"'>
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap">
    </noscript>



    <link rel=preload as=image href="{{asset('build/client/images/banner.webp')}}">
    <link rel="preload" as="image" href="{{asset('build/client/images/banner-mob.webp')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    @vite([
        'resources/assets/client/css/bootstrap/css/bootstrap.min.css',
        'resources/assets/client/css/bootstrap-icons/bootstrap-icons.css',
        'resources/assets/client/css/style.css',
    ])
    
    <script defer src=https://cdn.userway.org/widget.js data-account=qSpdtrySSt></script>
    <link rel=preconnect href=https://vlibras.gov.br crossorigin>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6RXZ6TZT0V"></script>
    <script defer>
        function gtag() {
            dataLayer.push(arguments)
        }
        window.dataLayer = window.dataLayer || [], gtag("js", new Date), gtag("config", "G-6RXZ6TZT0V")
    </script>
    <script type=application/ld+json>
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "@id": "https://whi.dev.br/#organization",
            "name": "WHI",
            "legalName": "WHI Agência Digital",
            "url": "https://whi.dev.br",
            "logo": "https://whi.dev.br/assets/images/logo.png",
            "image": "https://whi.dev.br/assets/images/logo.png",
            "description": "Agência de desenvolvimento web e marketing digital em Salvador - Criação de sites, lojas virtuais e estratégias digitais personalizadas.",
            "foundingDate": "2023",
            "email": "contato@whi.dev.br",
            "telephone": "+55-71-99648-3853",
            "sameAs": [
                "https://www.instagram.com/agenciawhi",
                "https://www.linkedin.com/company/106948313"
            ],
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Rua Ápio Patrocínio, 148 - Boa Vista de São Caetano",
                "addressLocality": "Salvador",
                "addressRegion": "BA",
                "postalCode": "40386-050",
                "addressCountry": "BR"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+55-71-99648-3853",
                "contactType": "customer service",
                "email": "contato@whi.dev.br",
                "areaServed": "BR",
                "availableLanguage": ["Portuguese", "English"]
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday"
                ],
                "opens": "09:00",
                "closes": "18:00"
            },
            "duns": "39.985.136/0001-33",
            "slogan": "Web de Alta Inspiração",
            "keywords": [
                "Criação de sites",
                "Lojas virtuais",
                "Marketing digital",
                "Agência WHI",
                "Salvador",
                "Desenvolvimento Web",
                "Google Ads",
                "Tráfego pago",
                "SEO",
                "Agência de Desenvolvimento Web em Salvador",
                "WHI",
            ]
        }
    </script>
</head>
<body>
    <header id="header" class="w-100 d-flex flex-column position p-0">   
        <div class="w-100 py-2 py-sm-2 header-color">
            <div class="container m-auto d-flex align-items-center justify-content-between flex-row">
                <div class="logo-img px-3 py-2 rounded-2 d-flex justify-content-start align-items-center">
                    <a href="{{route('blog')}}">
                        <img src="{{asset('build/client/images/logo.svg')}}" alt="Instituto Baiano de Medicina Desportivao" title="Instituto Baiano de Medicina Desportivao" class="img-fluid">
                    </a>
                </div>
                <!-- Botão menu sandwich -->
                <button id="menu-toggle" class="d-lg-none btn btn-link p-0 ms-2" aria-label="Abrir menu" type="button">
                    <span class="menu-icon" style="display:inline-block;width:32px;height:32px;">
                        <span class="d-block w-100 rounded-1" style="height:4px;background:#FFF;margin:6px 0;"></span>
                        <span class="d-block w-100 rounded-1" style="height:4px;background:#FFF;margin:6px 0;"></span>
                        <span class="d-block w-100 rounded-1" style="height:4px;background:#FFF;margin:6px 0;"></span>
                    </span>
                </button>
        
                <div class="social-links d-flex justify-content-between gap-4 text-center col-9">
                    <nav class="site-navigation ul position-relative text-end width-75">
                        <ul class="d-flex flex-row justify-content-start align-items-center gap-4 mb-0 list-unstyled">
                            <li><a href="{{route('blog')}}" class="nav-link montserrat-regular font-18 {{ request()->routeIs('blog') ? 'active' : '' }} {{ request()->routeIs('blog-inner') ? 'active' : '' }}">Notícias</a></li>
                            <li><a href="{{route('noticies')}}" class="nav-link montserrat-regular font-18 {{ request()->routeIs('noticies') ? 'active' : '' }}">Editais</a></li>
                            <li><a href="{{route('contact')}}" class="nav-link montserrat-regular font-18 {{ request()->routeIs('contact') ? 'active' : '' }}">Contato</a></li>
                        </ul>                      
                    </nav>
                    <nav class="site-navigation position-relative text-end w-auto redes-sociais">
                        <ul class="p-0 d-flex justify-content-start gap-4 flex-row mb-0">
                            <li class="li d-flex justify-content-start align-items-center rounded-circle">
                                <a href="" rel="nofollow noopener noreferrer" target="_blank">
                                    <img src="{{asset('build/client/images/wpp.svg')}}" alt="Whatsapp">
                                </a>
                            </li>
                            <li class="li d-flex justify-content-start align-items-center rounded-circle">
                                <a href="https://www.instagram.com/sindacsbahia/" rel="nofollow noopener noreferrer" target="_blank">
                                    <img src="{{asset('build/client/images/insta.svg')}}" alt="Instagram">
                                </a>
                            </li>
                            <li class="li d-flex justify-content-start align-items-center rounded-circle">
                                <a href="https://x.com/SindacsBahia" rel="nofollow noopener noreferrer" target="_blank">
                                    <img src="{{asset('build/client/images/x.svg')}}" alt="X">
                                </a>
                            </li>
                            <li class="li d-flex justify-content-start align-items-center rounded-circle">
                                <a href="https://www.youtube.com/channel/UCG0q-E25LZ2Lx73N50tCD8Q" rel="nofollow noopener noreferrer" target="_blank">
                                    <img src="{{asset('build/client/images/youtube.svg')}}" alt="Youtube">
                                </a>
                            </li>
                            <li class="li d-flex justify-content-start align-items-center rounded-circle">
                                <a href="https://www.facebook.com/sindacsbahia.org.br/" rel="nofollow noopener noreferrer" target="_blank">
                                    <img src="{{asset('build/client/images/face.svg')}}" alt="Facebook">
                                </a>
                            </li>
                            <li class="li d-flex justify-content-start align-items-center rounded-circle">
                                <a href="https://www.tiktok.com/@sindacsbahia" rel="nofollow noopener noreferrer" target="_blank">
                                    <img src="{{asset('build/client/images/tiktok.svg')}}" alt="Tiktok">
                                </a>
                            </li>
                        </ul> 
                    </nav>
                </div>         
            </div>
        </div>     
        @if ($blogCategories->count())
            <div class="header--category w-100 grey-medium-background social-links">
                <nav>
                    <ul class="d-flex justify-content-center align-items-center mb-0 py-2 gap-4 px-0">
                        @foreach ($blogCategories as $category)
                            <li class="nav-link">
                                <a href="{{ route('blog', ['category' => $category->slug]) }}#news"
                                class="title-blue montserrat-semiBold font-14
                                {{ (request()->routeIs('blog-inner') && isset($blogInner) && $blogInner->category->id === $category->id) ||
                                (request()->routeIs('blog') && request()->route('category') === $category->slug)
                                ? 'active' : '' }}">
                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        @endif
    </header>

    <div id="menu-mobile" class="menu-mobile d-flex flex-column justify-content-center align-items-center">
        <div class="logo-img px-3 py-2 mb-4 rounded-2 d-flex justify-content-center align-items-center">
            <img src="{{asset('build/client/images/logo.svg')}}" alt="Instituto Baiano de Medicina Desportivao" title="Instituto Baiano de Medicina Desportivao" class="img-fluid">
        </div>

        <button id="menu-close" aria-label="Fechar menu" class="btn-close-menu" type="button">&times;</button>

        <nav>
            <ul class="list-unstyled text-center">
                <li><a href="{{route('blog')}}" class=" text-white nav-link montserrat-regular font-18">Notícias</a></li>
                <li><a href="{{route('noticies')}}" class=" text-white nav-link montserrat-regular font-18">Editais</a></li>
                <li><a href="{{route('contact')}}" class=" text-white nav-link montserrat-regular font-18">Contato</a></li>
            </ul>
        </nav>
    </div>

    <main>
        <div  class="mt-0">
            @include('client.includes.announcement')
        </div>
        @yield('content') 
    </main>

    <footer id=footer class="footer position-relative dark-background" data-aos=fade-down data-aos-delay=150>
        <div class="container pt-5 pb-3">
            <div class="sitemap mt-2 mb-5 row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 g-3 justify-content-between align-items-center">
                <div class=logo>
                    <img src="{{asset('build/client/images/logo-footer.svg')}}" alt="WHI - Web de Alta Inovação" title="WHI - Web de Alta Inovação" loading=lazy>
                </div>
                <ul class="list-unstyled text-start">
                    <li class="montserrat-regular font-16 mb-3"><a href="{{route('blog')}}">Blog</a></li>
                    <li class="montserrat-regular font-16 mb-3"><a href="{{route('noticies')}}">Editais</a></li>
                    <li class="montserrat-regular font-16 mb-3"><a href="{{route('contact')}}">Contato</a></li>
                </ul>
                <div class="d-flex justify-content-end flex-column w-auto montserrat-semiBold">
                    <span>
                        <a href="" target=_blank rel="noopener noreferrer" class="montserrat-regular font-15 d-flex justify-content-start gap-3 align-item-center">
                            <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0C4.03157 0 0 4.125 0 9.20857C0 18.7864 8.63908 21.9136 8.72355 21.9529C8.8157 21.9843 8.90017 22 9 22C9.09215 22 9.1843 21.9843 9.26877 21.9529C9.36092 21.9214 18 18.7943 18 9.20857C18 4.125 13.9608 0 9 0ZM9 14.0407C6.36604 14.0407 4.23123 11.8486 4.23123 9.16929C4.23123 6.47429 6.37372 4.29 9 4.29C11.6263 4.29 13.7611 6.48214 13.7611 9.16929C13.7611 11.8486 11.6263 14.0407 9 14.0407Z" fill="#F9F9F9"/>
                            </svg>

                            Rua Do Tesouro, 56 - Edif Santa Cruz Andar 7 <br> Sala 700 - Comércio - Salvador/BA, CEP: 40020-056
                        </a>
                    </span>
                    <span>
                        <a href="" target=_blank rel="noopener noreferrer" class="montserrat-regular font-15 d-flex justify-content-start gap-3 align-item-center">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.34863 5.87552L1.72205 6.89199C1.57774 6.98287 1.45218 7.08811 1.347 7.2061L3.34861 8.81489L3.34863 5.87552ZM10 7.13034C10.2422 7.13034 10.4615 7.03388 10.6197 6.87921C10.7778 6.72455 10.8765 6.5101 10.8765 6.27331C10.8765 6.03653 10.7778 5.82209 10.6197 5.66741C10.4615 5.51195 10.2422 5.41628 10 5.41628C9.75785 5.41628 9.53854 5.51195 9.38035 5.66741C9.22218 5.82207 9.12352 6.03653 9.12352 6.27331C9.12352 6.5101 9.22217 6.72453 9.38035 6.87921C9.53852 7.03387 9.75785 7.13034 10 7.13034ZM11.2972 7.54171C10.9645 7.86698 10.5063 8.06787 10 8.06787C9.49371 8.06787 9.03466 7.86697 8.70284 7.54171C8.37101 7.21724 8.16554 6.76839 8.16554 6.27333C8.16554 5.77827 8.371 5.32942 8.70284 5.00496C9.03466 4.6805 9.49371 4.47959 10 4.47959C10.3775 4.47959 10.7281 4.59121 11.02 4.78175C11.1064 4.69884 11.2254 4.64781 11.3559 4.64781C11.6209 4.64781 11.8353 4.85747 11.8353 5.11659V6.27416C11.8353 6.42962 11.9014 6.57152 12.0065 6.67515L12.0049 6.67675C12.1109 6.77879 12.256 6.84257 12.4158 6.84257C12.5748 6.84257 12.7199 6.77879 12.8259 6.67515C12.9319 6.57152 12.9971 6.43041 12.9971 6.27416C12.9971 5.46499 12.6612 4.73153 12.119 4.20143C11.5768 3.67127 10.8276 3.34283 9.99926 3.34283C9.17171 3.34283 8.4216 3.67129 7.87947 4.20143C7.33727 4.73159 7.00137 5.46423 7.00137 6.27416C7.00137 7.08333 7.33729 7.81679 7.87947 8.34689C8.42167 8.87705 9.17094 9.20549 9.99926 9.20549C10.8268 9.20549 11.5769 8.87783 12.119 8.34689C12.2952 8.17469 12.4484 7.98175 12.5764 7.77209C12.5234 7.77767 12.4696 7.78006 12.4158 7.78006C12.0351 7.78006 11.6853 7.64294 11.4154 7.41654C11.3779 7.46039 11.3388 7.50344 11.2972 7.5441L11.2972 7.54171ZM12.7966 9.0078C12.0807 9.70776 11.0917 10.1407 9.99926 10.1407C8.90753 10.1407 7.91772 9.70776 7.20195 9.0078C6.48609 8.30784 6.04256 7.3408 6.04256 6.2726C6.04256 5.20511 6.48528 4.23728 7.20195 3.5374C7.91781 2.83743 8.9068 2.40454 9.99926 2.40454C11.091 2.40454 12.0808 2.83743 12.7966 3.5374C13.5124 4.23736 13.956 5.20439 13.956 6.2726C13.956 7.34009 13.5132 8.30792 12.7966 9.0078ZM4.30655 9.58498L8.20382 12.7182L8.34079 12.6081C8.82835 12.2159 9.41376 12.0206 9.99916 12.0206C10.5846 12.0206 11.1708 12.2167 11.6575 12.6081L11.7945 12.7182L15.6918 9.58498V2.44513C15.6918 2.02977 15.5181 1.65349 15.2393 1.38003C14.9596 1.10659 14.5748 0.937565 14.15 0.937565H5.84761C5.42365 0.937565 5.03799 1.10737 4.75833 1.38003C4.47868 1.65347 4.30581 2.02977 4.30581 2.44513V9.58498H4.30655ZM16.6515 8.81408L18.6531 7.20528C18.5479 7.08729 18.4223 6.98205 18.278 6.89117L16.6514 5.87471L16.6515 8.81408ZM16.6515 4.76658L18.7909 6.10353C19.1757 6.34429 19.4782 6.6592 19.6836 7.02591C19.6934 7.04345 19.7024 7.06099 19.7122 7.07773L19.713 7.07933L19.7187 7.08969C19.903 7.44207 20 7.8367 20 8.25602V17.4433C20 18.1472 19.7065 18.7866 19.2328 19.2498C18.7591 19.713 18.106 20 17.3852 20H2.61476C1.89483 20 1.24094 19.713 0.767224 19.2498C0.293527 18.7866 0 18.1481 0 17.4433V8.25602C0 7.83747 0.0970227 7.44205 0.281296 7.08969L0.287003 7.07933L0.287818 7.07773C0.297602 7.06019 0.306571 7.04265 0.316355 7.02591C0.522632 6.65839 0.823489 6.34348 1.20913 6.10353L3.34854 4.76658V2.44507C3.34854 1.77141 3.62902 1.16074 4.08232 0.717496C4.53483 0.275031 5.161 0 5.84912 0H14.1515C14.8404 0 15.465 0.274255 15.9183 0.717496C16.3708 1.15996 16.6521 1.77143 16.6521 2.44507V4.76658H16.6515ZM3.5566 10.19C3.53377 10.1749 3.51258 10.1574 3.49301 10.139L0.965582 8.10691C0.961505 8.15554 0.959059 8.20577 0.959059 8.25599V17.4433C0.959059 17.7677 1.05771 18.0707 1.22731 18.325L7.45143 13.3224L3.55582 10.1908L3.5566 10.19ZM16.5064 10.139C16.4868 10.1582 16.4656 10.1749 16.4428 10.19L12.5472 13.3216L18.7713 18.3242C18.9409 18.0699 19.0396 17.7678 19.0396 17.4425V8.25522C19.0396 8.205 19.0371 8.15557 19.033 8.10614L16.5056 10.1383L16.5064 10.139ZM8.51377 13.6771L8.49991 13.6883L1.97315 18.9348C2.17045 19.0161 2.38734 19.0616 2.61399 19.0616H17.3845C17.6119 19.0616 17.8288 19.0161 18.0253 18.9348L11.4986 13.6883L11.4847 13.6771L11.0518 13.3287C10.7427 13.0808 10.3718 12.9572 9.99917 12.9572C9.62739 12.9572 9.25559 13.0816 8.94658 13.3287L8.51377 13.6771Z" fill="#F9F9F9"/>
                            </svg>

                            Atendimento@sindacsba.org.br
                        </a>
                    </span>
                    <span>                        
                        <a href="" target=_blank rel="noopener noreferrer" class="montserrat-regular font-15 d-flex justify-content-start gap-3 align-item-center">
                            <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 17H2V3H11M6.5 21C6.10218 21 5.72064 20.842 5.43934 20.5607C5.15804 20.2794 5 19.8978 5 19.5C5 19.1022 5.15804 18.7206 5.43934 18.4393C5.72064 18.158 6.10218 18 6.5 18C6.89782 18 7.27936 18.158 7.56066 18.4393C7.84196 18.7206 8 19.1022 8 19.5C8 19.8978 7.84196 20.2794 7.56066 20.5607C7.27936 20.842 6.89782 21 6.5 21ZM10.5 0H2.5C1.83696 0 1.20107 0.263392 0.732233 0.732233C0.263392 1.20107 0 1.83696 0 2.5V19.5C0 20.163 0.263392 20.7989 0.732233 21.2678C1.20107 21.7366 1.83696 22 2.5 22H10.5C11.163 22 11.7989 21.7366 12.2678 21.2678C12.7366 20.7989 13 20.163 13 19.5V2.5C13 1.83696 12.7366 1.20107 12.2678 0.732233C11.7989 0.263392 11.163 0 10.5 0Z" fill="#F9F9F9"/>
                            </svg>
                            (71) 3017-4112
                        </a>
                    </span>
                    <span>
                        <a href=https://wa.me/5571996483853 target=_blank rel="noopener noreferrer" class="bg-webmail rounded-3 mt-4 montserrat-medium text-white d-flex justify-content-center align-items-center">
                            <p class="title-blue mb-0">
                                Webmail
                            </p>
                        </a>
                    </span>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-5">
                <div class="text-center"> 
                    <p class="montserrat-regular font-12 text-start text-white mb-0">Sindicato dos Agentes Comunitários de Saúde (ACS) e <br> Agentes de Combate às Endemias (ACE) <br> CNPJ: 06.953.941/0001-26 </p>                                       
                </div>
                <div class="copyright">
                    <p id="footer-text" class="montserrat-regular font-16 text-start text-white mb-0"></p>  
                    <script defer>
                        const currentYear = (new Date).getFullYear();
                        document.getElementById("footer-text").innerHTML = `Copyright© ${currentYear} <span> SINDAC todos os direitos reservados.</span>`
                    </script>
                </div>
                <div class=credits>
                    <a href=https://whi.dev.br/>
                        <img src="{{asset('build/client/images/developed.svg')}}"  alt="WHI - Web de Alta Inovação" title="WHI - Web de Alta Inovação" loading=lazy>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <a href=# id=scroll-top class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    @vite([
        'resources/assets/client/css/bootstrap/js/bootstrap.bundle.js',
        'resources/assets/client/css/typed.js/typed.umd.js',
        'resources/assets/client/js/default.js',
    ])

    <div vw class=enabled>
        <div vw-access-button class=active></div>
        <div vw-plugin-wrapper>
            <div class=vw-plugin-top-wrapper></div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", (function() {
            const o = document.createElement("script");
            o.src = "https://vlibras.gov.br/app/vlibras-plugin.js", o.onload = function() {
                window.VLibras && window.VLibras.Widget ? (new window.VLibras.Widget("https://vlibras.gov.br/app")) : console.warn("VLibras não foi carregado corretamente.")
            }, document.body.appendChild(o)
        }))
    </script>
</body>
</html>