@extends('client.core.client')
@section('content')
<section id=hero class="hero position-relative d-flex flex-column section dark-background overflow-hidden">
    <img id=profileImage src="{{asset('build/client/images/banner.webp')}}" alt="Banner Hero" title="Banner Hero" class=image-hero>
    <div class="w-100 d-flex justify-content-center flex-column align-items-center position-absolute description">
        <div class="max-width container">
            <h1 class="text-white mb-5 rethink-sans-bold">A <span class=emphasis><b>agência</b></span> que fará a sua presença digital trazer <span class=emphasis><b>resultado</b></span></h1>
            <p class="text-white mb-5 rethink-sans-regular">Faça já <span class=typed data-typed-items="sua  <b>Consultoria Digital</b>, seu <b>Site dinâmico</b>, sua <b>Logomarca</b>, seu <b>Marketing Digital</b>"></span><span class="typed-cursor typed-cursor--blink" aria-hidden=true></span>
                <span class="typed-cursor typed-cursor--blink" aria-hidden=true></span>
            </p>
            <a href=https://wa.me/5571996483853 target=_blank rel="noopener noreferrer" class="rethink-sans-regular ps-5 text-white call-to-action d-flex justify-content-between align-items-center">
Fale com a gente!
<i class="bi bi-whatsapp rounded-circle d-flex justify-content-center align-items-center"></i>
</a>
        </div>
    </div>
</section>
<section id=project class="project grey-background pb-5" data-aos=fade-up data-aos-delay=100>
    <div class="max-width-project m-auto me-0 d-flex flex-column flex-md-row align-items-center justify-content-between py-5">
        <div class=col-2 data-aos=fade-right data-aos-delay=120>
            <p class="mb-0 text-left-project rethink-sans-regular">
                +20 de tecnologias fazem rotina diária com a WHI
            </p>
        </div>
        <div class=col-lg-9 data-aos=fade-left data-aos-delay=150>
            <div class=max-width>
                <div class="stack-details-slider swiper init-swiper">
                    <script type=application/json class=swiper-config>
                        {
                            "loop": false,
                            "speed": 15000,
                            "initialSlide": 0,
                            "autoplay": {
                                "delay": 0,
                                "disableOnInteraction": false
                            },
                            "slidesPerView": 12,
                            "slidesPerGroup": 12,
                            "pagination": {
                                "type": "progressbar"
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 4,
                                    "slidesPerGroup": 4
                                },
                                "359": {
                                    "slidesPerView": 5,
                                    "slidesPerGroup": 5
                                },
                                "769": {
                                    "slidesPerView": 8,
                                    "slidesPerGroup": 8
                                },
                                "885": {
                                    "slidesPerView": 12,
                                    "slidesPerGroup": 12
                                }
                            }
                        }
                    </script>
                    <div class="carousel-project swiper-wrapper align-items-center">
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/html.svg')}}" alt=Html title=Html loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/css.svg')}}" alt=Css title=Css loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/sass.webp')}}" alt=Sass title=Sass loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/js.svg')}}" alt=JavaScript title=JavaScript loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/jquery.svg')}}" alt=Jquery title=Jquery loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/php.png')}}" alt=Php title=Php loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/laravel.svg')}}" alt=Laravel title=Laravel loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/bs.svg')}}" alt=Booststrap title=Booststrap loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/tailwind.svg')}}" alt=Tailwind title=Tailwind loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/vue.svg')}}" title=Vue loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/wp.svg')}}" alt=WordPress title=WordPress loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/git.svg')}}" alt=Git title=Git loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/github.svg')}}" alt=GitHub title=GitHub loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/mysql.svg')}}" alt=MySQL title=MySQL loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/figma.svg')}}" alt=Figma title=Figma loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/nuvemshop.svg')}}" alt=Nuvemshop title=Nuvemshop loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/adobe.svg')}}" alt=Adobe title=Adobe loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/instagram.svg')}}" alt=Instagram title=Instagram loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/meta.svg')}}" alt=Meta title=Meta loading=lazy>
                        </div>
                        <div class=swiper-slide>
                            <img src="{{asset('build/client/images/photoshop.svg')}}" alt=photoshop title=photoshop loading=lazy>
                        </div>
                    </div>
                    <div class=swiper-pagination></div>
                </div>
            </div>
        </div>
    </div>
    <div class="light-background w-100 py-5 pb-0 position-relative">
        <div class="max-width m-auto content-project d-flex flex-column flex-md-row justify-content-between align-items-baseline position-relative z-1 text-center text-md-start">
            <div class="content-lef col-6" data-aos=fade-left data-aos-delay=300>
                <h2 class=rethink-sans-semiBold>Um projeto personalizado, com a qualidade WHI e dentro do seu
                    <span class="emphasis bg-mobile">orçamento</span>
                </h2>
            </div>
            <div class="content-right col-4" data-aos=fade-right data-aos-delay=300>
                <p class=rethink-sans-regular>
                    Nunca foi tão fácil ser disponível online e impulssionar sua marca com eficiência e economia.
                </p>
                <div data-aos=zoom-in-up data-aos-delay=300>
                    <img src="{{asset('build/client/images/laptop.webp')}}" alt="Imagem computador" title="Imagem computador" class="w-100 laptop-parallax" loading=lazy>
                </div>
            </div>
        </div>
        <div class=firula-project></div>
    </div>
    <div class="project-list-carousel pe-2 m-auto me-0 position-relative" data-aos=fade-up data-aos-delay=150>
        <div class=w-100>
            <div class="project-list-details-slider swiper init-swiper">
                <script type=application/json class=swiper-config>
                    {
                        "speed": 500,
                        "slidesPerView": 5,
                        "slidesPerGroup": 1,
                        "centeredSlides": false,
                        "initialSlide": 0,
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "navigation": {
                            "nextEl": ".swiper-button-next",
                            "prevEl": ".swiper-button-prev"
                        },
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 1.5,
                                "spaceBetween": 5
                            },
                            "475": {
                                "slidesPerView": 2,
                                "spaceBetween": 5
                            },
                            "631": {
                                "slidesPerView": 3,
                                "spaceBetween": 5
                            },
                            "768": {
                                "slidesPerView": 3,
                                "spaceBetween": 5
                            },
                            "1025": {
                                "slidesPerView": 5,
                                "spaceBetween": 10
                            }
                        }
                    }
                </script>
                <div class="swiper-wrapper align-items-center">
                    <div class=swiper-slide>
                        <div class="project-list-item dark-background-medium p-3">
                            <img src="{{asset('build/client/images/ideia.svg')}}" alt=Icon title="Icon ideia" loading=lazy>
                            <h3 class="emphasis mt-3 rethink-sans-bold">Identidade Visual</h3>
                            <ul class=ps-3>
                                <li class="ps-1 rethink-sans-semiBold">Branding</li>
                                <li class="ps-1 rethink-sans-semiBold">Atualização de logo</li>
                                <li class="ps-1 rethink-sans-semiBold">Material de escritório</li>
                                <li class="ps-1 rethink-sans-semiBold">Peças personalizadas</li>
                            </ul>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="project-list-item dark-background-medium p-3">
                            <img src="{{asset('build/client/images/interativo.svg')}}" alt=Icon title="Icon interativo" loading=lazy>
                            <h3 class="emphasis mt-3 rethink-sans-bold">Site Interativo</h3>
                            <ul class=ps-3>
                                <li class="ps-1 rethink-sans-semiBold">Sites Dinâmicos</li>
                                <li class="ps-1 rethink-sans-semiBold">Sites Gerenciáveis <span>(Atualize você mesmo)</span></li>
                                <li class="ps-1 rethink-sans-semiBold">Landing Pages</li>
                            </ul>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="project-list-item dark-background-medium p-3">
                            <img src="{{asset('build/client/images/sitema.svg')}}" alt=Icon title="Icon sistema" loading=lazy>
                            <h3 class="emphasis mt-3 rethink-sans-bold">Sistemas</h3>
                            <ul class=ps-3>
                                <li class="ps-1 rethink-sans-semiBold">Consultoria estratégica de processos</li>
                                <li class="ps-1 rethink-sans-semiBold">Desenvolvimento de Sistemas Personalizados</li>
                            </ul>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="project-list-item dark-background-medium p-3">
                            <img src="{{asset('build/client/images/eccomerce.svg')}}" alt=Icon title="Icon eccomerce" loading=lazy>
                            <h3 class="emphasis mt-3 rethink-sans-bold">E-commerce</h3>
                            <ul class=ps-3>
                                <li class="ps-1 rethink-sans-semiBold">Loja virtual completa</li>
                                <li class="ps-1 rethink-sans-semiBold">Catálogo de produtos</li>
                                <li class="ps-1 rethink-sans-semiBold">Integração com pagamento</li>
                                <li class="ps-1 rethink-sans-semiBold">Carrinho e checkout</li>
                            </ul>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="project-list-item dark-background-medium p-3">
                            <img src="{{asset('build/client/images/marketing.svg')}}" alt=Icon title="Icon marketing" loading=lazy>
                            <h3 class="emphasis mt-3 rethink-sans-bold">Marketing Digital</h3>
                            <ul class=ps-3>
                                <li class="ps-1 rethink-sans-semiBold">Gestão de redes sociais</li>
                                <li class="ps-1 rethink-sans-semiBold">Criação de conteúdo</li>
                                <li class="ps-1 rethink-sans-semiBold">Tráfego pago <span>(Meta e Google)</span></li>
                                <li class="ps-1 rethink-sans-semiBold">Análises e relatórios</li>
                            </ul>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="project-list-item dark-background-medium p-3">
                            <img src="{{asset('build/client/images/hospedagem.svg')}}" alt=Icon title="Icon hospedagem" loading=lazy>
                            <h3 class="emphasis mt-3 rethink-sans-bold">Hospedagem</h3>
                            <ul class=ps-3>
                                <li class="ps-1 rethink-sans-semiBold">Servidores otimizados</li>
                                <li class="ps-1 rethink-sans-semiBold">E-mail corporativo</li>
                                <li class="ps-1 rethink-sans-semiBold">Registro de domínio</li>
                                <li class="ps-1 rethink-sans-semiBold">Suporte técnico</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=btn-navigation>
                    <div class=swiper-button-prev></div>
                    <div class=swiper-button-next></div>
                </div>
            </div>
        </div>
    </div>
    <div id=what-we-do></div>
</section>
<section id=portfolio class="d-flex gap-4 flex-column dark-background py-4">
    <div class="d-flex justify-content-between flex-md-row">
        <div class="carousel-top-width w-100-md position-relative" data-aos=fade-left data-aos-delay=450>
            <div class="portfolio-top-details-slider swiper init-swiper">
                <script type=application/json class=swiper-config>
                    {
                        "loop": true,
                        "loopAdditionalSlides": 1,
                        "speed": 10100,
                        "autoplay": {
                            "delay": 0,
                            "pauseOnMouseEnter": false,
                            "reverseDirection": true
                        },
                        "slidesPerView": 4,
                        "slidesPerGroup": 1,
                        "spaceBetween": 10,
                        "centeredSlides": false,
                        "watchSlidesProgress": true,
                        "watchSlidesVisibility": true,
                        "pagination": {
                            "type": "progressbar"
                        },
                        "simulateTouch": false,
                        "breakpoints": {
                            "1024": {
                                "slidesPerView": 4,
                                "spaceBetween": 10
                            },
                            "830": {
                                "slidesPerView": 3,
                                "spaceBetween": 10
                            },
                            "768": {
                                "slidesPerView": 2,
                                "spaceBetween": 10
                            },
                            "475": {
                                "slidesPerView": 2,
                                "spaceBetween": 10
                            },
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 10
                            }
                        }
                    }
                </script>
                <div class="portfolio-top swiper-wrapper align-items-center">
                    <div class=swiper-slide>
                        <picture>
                            <source srcset="{{asset('build/client/images/mckup/telenordeste-mobile.webp ')}}" media="(max-width: 600px)" type=image/webp>
                            <source srcset="{{asset('build/client/images/mckup/telenordeste.webp')}}" type=image/webp>
                            <img src="{{asset('build/client/images/mckup/telenordeste.webp')}}" alt=Telenordeste title=Telenordeste loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                        </picture>
                    </div>
                    <div class=swiper-slide>
                        <picture>
                            <source srcset="{{asset('build/client/images/mckup/sushitan-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                            <source srcset="{{asset('build/client/images/mckup/sushitan.webp')}}" type=image/webp>
                            <img src="{{asset('build/client/images/mckup/sushitan.webp')}}" alt=Sushitan title=Sushitan loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                        </picture>
                    </div>
                    <div class=swiper-slide>
                        <picture>
                            <source srcset="{{asset('build/client/images/mckup/pindalar-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                            <source srcset="{{asset('build/client/images/mckup/pindalar.webp')}}" type=image/webp>
                            <img src="{{asset('build/client/images/mckup/pindalar.webp')}}" alt=Pindalar title=Pindalar loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                        </picture>
                    </div>
                    <div class=swiper-slide>
                        <picture>
                            <source srcset="{{asset('build/client/images/mckup/depyl-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                            <source srcset="{{asset('build/client/images/mckup/depyl.webp')}}" type=image/webp>
                            <img src="{{asset('build/client/images/mckup/depyl.webp')}}" alt=DepylCare title=DepylCare loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                        </picture>
                    </div>
                    <div class=swiper-slide>
                        <picture>
                            <source srcset="{{asset('build/client/images/mckup/viva-ervas-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                            <source srcset="{{asset('build/client/images/mckup/viva-ervas.webp')}}" type=image/webp>
                            <img src="{{asset('build/client/images//mckup/viva-ervas.webp')}}" alt="Viva ervas" title="Viva ervas" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                        </picture>
                    </div>
                    <div class=swiper-slide>
                        <picture>
                            <source srcset="{{asset('build/client/images/mckup/portfolio-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                            <source srcset="{{asset('build/client/images/mckup/portfolio.webp')}}" type=image/webp>
                            <img src="{{asset('build/client/images/mckup/portfolio.webp')}}" alt=Protfolio title=Protfolio loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                        </picture>
                    </div>
                </div>
                <div class=swiper-pagination></div>
            </div>
        </div>
        <div class="rating w-100-md">
            <div class="col-7 width-md m-auto d-flex justify-content-center align-items-baseline flex-column h-100 gap-2" data-aos=fade-down data-aos-delay=450>
                <span class="fa fa-star rethink-sans-medium"><img src="{{asset('build/client/images/somar.png')}}" alt="Icone mais" class="me-2 w-100" loading=lazy> Criatividade</span>
                <span class="fa fa-star rethink-sans-medium"><img src="{{asset('build/client/images/somar.png')}}" alt="Icone mais" class="me-2 w-100" loading=lazy> Modernidade</span>
                <span class="fa fa-star rethink-sans-medium"><img src="{{asset('build/client/images/somar.png')}}" alt="Icone mais" class="me-2 w-100" loading=lazy> Satisfação</span>
                <div class="clients d-flex flex-wrap mt-3">
                    <div class=client-img>
                        <img src="{{asset('build/client/images/client-group.png')}}" alt="Logo de clientes" title="Logo de clientes" class=w-100 loading=lazy>
                    </div>
                </div>
                <div class="count-star d-flex flex-column justify-content-center align-items-start col-12 gap-3">
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <div id=stars-container class="d-flex justify-content-center align-content-center"></div>
                        <p class="mb-0 rethink-sans-semiBold">4.9 (5.0)</p>
                    </div>
                    <p class="mb-0 rethink-sans-semiBold">Qualidade garantida.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-bottom-details-slider swiper init-swiper" data-aos=fade-right data-aos-delay=350>
        <script type=application/json class=swiper-config>
            {
                "loop": true,
                "loopAdditionalSlides": 0,
                "speed": 10000,
                "autoplay": {
                    "delay": 0,
                    "pauseOnMouseEnter": false,
                    "reverseDirection": true
                },
                "slidesPerView": 5,
                "slidesPerGroup": 1,
                "spaceBetween": 10,
                "centeredSlides": false,
                "watchSlidesProgress": true,
                "watchSlidesVisibility": true,
                "pagination": {
                    "type": "progressbar"
                },
                "simulateTouch": false,
                "breakpoints": {
                    "0": {
                        "slidesPerView": 2
                    },
                    "416": {
                        "slidesPerView": 4
                    },
                    "769": {
                        "slidesPerView": 5
                    }
                }
            }
        </script>
        <div class="portfolio-bottom swiper-wrapper align-items-center">
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/hey-arte-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/hey-arte.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/hey-arte.webp')}}" alt="Hey Arte" title="Hey Arte" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/flygo-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/flygo.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/flygo.webp')}}" alt="Flygo Turismo" title="Flygo Turismo" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/anilda-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/anilda.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/anilda.webp')}}" alt="Anilda Advogado" title="Anilda Advogado" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/hive-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/hive.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/hive.webp')}}" alt=Hive title=Hive loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/eau-sports-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/eau-sports.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/eau-sports.webp')}}" alt="EAU Sports" title="EAU Sports" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
            <div class=swiper-slide>
                <picture>
                    <source srcset="{{asset('build/client/images/mckup/painel-gerenciador-mobile.webp')}}" media="(max-width: 600px)" type=image/webp>
                    <source srcset="{{asset('build/client/images/mckup/painel-gerenciador.webp')}}" type=image/webp>
                    <img src="{{asset('build/client/images/mckup/painel-gerenciador.webp')}}" alt="Painel gerenciador de conteúdo" title="Painel gerenciador de conteúdo" loading=lazy style=width:100%;max-width:300px;height:auto;object-fit:cover;border-radius:35px>
                </picture>
            </div>
        </div>
        <div class=swiper-pagination></div>
    </div>
</section>
<section id=proccess class="light-background py-5">
    <div class="proccess-top max-width m-auto">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-5 text-center text-md-start" data-aos=fade-left data-aos-delay=150>
            <div class=proccess-top__title>
                <h2 class="rethink-sans-bold mb-0">ENTENDA</h2>
                <h3 class="rethink-sans-semiBold emphasis mb-0"> O Processo</h3>
            </div>
            <p class="rethink-sans-regular col-12 col-md-3">Veja como transformamos suas ideias em projetos incríveis em apenas 4 passos</p>
            <a href=https://wa.me/5571996483853 target=_blank rel="noopener noreferrer" class="rethink-sans-regular ps-5 text-white call-to-action d-flex justify-content-between align-items-center">
Fale com a gente!
<i class="bi bi-whatsapp rounded-circle d-flex justify-content-center align-items-center"></i>
</a>
        </div>
        <div class=d-flex>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 g-3 mt-5">
                <div class=col data-aos=fade-up data-aos-delay=150>
                    <div class="proccess-list-item grey-medium-background p-3">
                        <h2 class="emphasis mt-3 rethink-sans-bold">01</h2>
                        <h3 class="mt-2 rethink-sans-bold">Definição das Necessidades</h3>
                        <p class="text mt-3">Ajudamos você a identificar as principais necessidades do seu projeto, alinhando expectativas desde o início.</p>
                    </div>
                </div>
                <div class=col data-aos=fade-up data-aos-delay=300>
                    <div class="proccess-list-item grey-medium-background p-3">
                        <h2 class="emphasis mt-3 rethink-sans-bold">02</h2>
                        <h3 class="mt-2 rethink-sans-bold">Captação de informações</h3>
                        <p class="text mt-3">Coletamos todas as informações essenciais para entender o seu objetivo e garantir que cada detalhe seja atendido.</p>
                    </div>
                </div>
                <div class=col data-aos=fade-up data-aos-delay=450>
                    <div class="proccess-list-item grey-medium-background p-3">
                        <h2 class="emphasis mt-3 rethink-sans-bold">03</h2>
                        <h3 class="mt-2 rethink-sans-bold">Seguimento do Projeto</h3>
                        <p class="text mt-3">Nossa equipe começa a criar o projeto com base nas informações coletadas, mantendo você atualizado a cada etapa.</p>
                    </div>
                </div>
                <div class=col data-aos=fade-up data-aos-delay=600>
                    <div class="proccess-list-item grey-medium-background p-3">
                        <h2 class="emphasis mt-3 rethink-sans-bold">04</h2>
                        <h3 class="mt-2 rethink-sans-bold">Entrega Final do Projeto</h3>
                        <p class="text mt-3">Aprovou? Baixe seu projeto finalizado ou acesse os arquivos através da plataforma ou drive compartilhado.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id=transformed class="transformed position-relative green-background">
    <div class="max-width m-auto transformed-padding d-flex flex-column flex-md-row align-items-center">
        <div class="col-12 col-md-8 text-center text-md-start" data-aos=fade-down data-aos-delay=200>
            <h2 class="rethink-sans-bold mb-0">TRANSFORME</h2>
            <h3 class="rethink-sans-semiBold mt-3 mb-0 text-white">
                Chegou a hora de ser orientado por quem realmente entende do assunto!
            </h3>
            <p class="text-white rethink-sans-regular mt-3 col-12 col-md-11">
                Nossa equipe, com mais de 10 anos de experiência, vai trabalhar ao seu lado para criar soluções digitais personalizadas e focadas em resultados reais. Temos atendimento humanizado e dedicado para garantir que suas necessidades sejam atendidas de forma
                eficiente e com qualidade.
            </p>
            <a href=https://wa.me/5571996483853 target=_blank rel="noopener noreferrer" class="mt-4 rethink-sans-regular ps-5 text-white call-to-action d-flex justify-content-between align-items-center">
Fale com a gente!
<i class="bi bi-whatsapp rounded-circle d-flex justify-content-center align-items-center"></i>
</a>
        </div>
    </div>
    <img src="{{asset('build/client/images/firula-transformed.webp')}}" alt=firula-transformed title=firula-transformed class="position-absolute bottom-0 w-auto img-fluid d-none d-md-block" data-aos=fade-up data-aos-delay=200 loading=lazy>
</section>
<section id=perfect-choice class="perfect-choice py-5 grey-medium-background" data-aos=fade data-aos-delay=350>
    <div class="max-width m-auto d-flex flex-column flex-md-row justify-content-between align-items-center py-4">
        <div class="content-lef col-12 col-md-4 text-center text-md-end">
            <h2 class=rethink-sans-semiBold> <span>WHI</span>, a escolha perfeita para empresas que precisam:</h2>
            <div class="position-relative d-flex justify-content-center flex-column align-items-center">
                <img src="{{asset('build/client/images/robot-hand.png')}}" alt="Mão de robô com lâmpada" title="Mão de robô com lâmpada" class="w-100 robot-lamp m-auto me-md-5 d-none d-md-block" loading=lazy>
                <a href=https://wa.me/5571996483853 target=_blank rel="noopener noreferrer" class="mt-0 rethink-sans-regular ps-5 text-white call-to-action d-flex justify-content-between align-items-center">
Fale com a gente!
<i class="bi bi-whatsapp rounded-circle d-flex justify-content-center align-items-center"></i>
</a>
            </div>
        </div>
        <div class="content-right col-12 col-md-7 mt-4 mt-md-0">
            <div class="d-flex justify-content-center align-content-center flex-wrap gap-4 px-3">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="perfect-choice-list-item bg-white p-3 rounded-4 w-100">
                        <h3 class="mt-2 rethink-sans-bold">Transformar a Imagem da Sua Marca</h3>
                        <p class="text mt-3">Buscam criar uma identidade visual forte e impactante. Moldamos uma imagem que conecte sua empresa aos seus valores e ao público-alvo.</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="perfect-choice-list-item bg-white p-3 rounded-4 w-100">
                        <h3 class="mt-2 rethink-sans-bold">Impulsionar o Crescimento Digital</h3>
                        <p class="text mt-3">Para negócios que desejam aumentar sua visibilidade online e alcançar mais clientes com estratégias eficazes.</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="perfect-choice-list-item bg-white p-3 rounded-4 w-100">
                        <h3 class="mt-2 rethink-sans-bold">Maximizar Suas Vendas Online</h3>
                        <p class="text mt-3">Para empresas que querem expandir sua operação de e-commerce e alcançar novos mercados com uma experiência de compra eficiente.</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="perfect-choice-list-item bg-white p-3 rounded-4 w-100">
                        <h3 class="mt-2 rethink-sans-bold">Fortalecer a Conexão com Seu Público</h3>
                        <p class="text mt-3">Para negócios que buscam engajar sua audiência de forma contínua e estratégica, através de marketing digital e redes sociais.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id=trust-whi class="trust-whi position-relative py-5 trust-whi-background">
    <img src="{{asset('build/client/images/hand.png')}}" alt="image of hand" title="image of hand" class="position-absolute top-0 hand" data-aos=fade-left data-aos-delay=950 loading=lazy>
    <div class="max-width m-auto d-flex flex-column flex-md-row justify-content-end align-items-center text-center text-md-start py-5" data-aos=zoom-in data-aos-delay=150>
        <h2 class="rethink-sans-semiBold col-12 col-md-8 mt-4 ps-md-4">
            <span>AS PESSOAS</span> <br> que confiam na WHI como parceira de crescimento
        </h2>
        <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-end align-items-center mt-3 mt-md-0">
            <a href=https://wa.me/5571996483853 target=_blank rel="noopener noreferrer" class="mt-0 rethink-sans-regular ps-5 text-white call-to-action d-flex justify-content-between align-items-center">
Fale com a gente!
<i class="bi bi-whatsapp rounded-circle d-flex justify-content-center align-items-center"></i>
</a>
        </div>
    </div>
    <div class="max-width-project m-auto" data-aos=zoom-in data-aos-delay=150>
        <div class="carousel-trust-whi position-relative">
            <div class="trust-whi-details-slider swiper init-swiper">
                <script type=application/json class=swiper-config>
                    {
                        "speed": 500,
                        "slidesPerView": 3,
                        "slidesPerGroup": 1,
                        "spaceBetween": 10,
                        "centeredSlides": true,
                        "initialSlide": 1,
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "navigation": {
                            "nextEl": ".swiper-button-next",
                            "prevEl": ".swiper-button-prev"
                        },
                        "breakpoints": {
                            "1024": {
                                "slidesPerView": 3,
                                "spaceBetween": 10
                            },
                            "769": {
                                "slidesPerView": 2,
                                "spaceBetween": 15
                            },
                            "480": {
                                "slidesPerView": 2,
                                "spaceBetween": 15
                            },
                            "359": {
                                "slidesPerView": 1,
                                "spaceBetween": 5
                            },
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 5
                            }
                        }
                    }
                </script>
                <div class="carousel-trust-whi swiper-wrapper align-items-center py-2 px-2">
                    <div class=swiper-slide>
                        <div class="trust-whi-list-item bg-white p-4 rounded-4 border border-dark">
                            <img src="{{asset('build/client/images/aspas-left.svg')}}" alt="Aspas Left" title="Aspas Left" class=apas-left loading=lazy>
                            <p class="text mt-3">Recomendo o trabalho da WHI, especialistas em desenvolvimento de sites, integrações e atividades correlatas. Foram os responsáveis por criar, integrar e configurar o site de vendas da minha fábrica, entregando um design
                                funcional, intuitivo e alinhado às nossas necessidades. Além de oferecerem suporte técnico confiável e rápido. Parceiros essenciais para minha presença online.</p>
                            <h3 class="rethink-sans-bold text-primary mb-0">Pedro Manot</h3>
                            <h4 class="text-secondary small">CEO da EAU Sports</h4>
                            <img src="{{asset('build/client/images/aspas-right.svg')}}" alt="Aspas Right" title="Aspas Right" class=apas-right loading=lazy>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="trust-whi-list-item bg-white p-4 rounded-4 border border-dark">
                            <img src="{{asset('build/client/images/aspas-left.svg')}}" alt="Aspas Left" title="Aspas Left" class=apas-left loading=lazy>
                            <p class="text mt-3">Tivemos uma experiência muito bacana com a WHI durante o desenvolvimento de nossos sites. A equipe demonstrou grande comprometimento com os prazos e esteve sempre disponível para ajudar na resolução de problemas, garantindo
                                um processo ágil e eficiente. Sem dúvida, continuaremos cultivando essa parceria de sucesso.</p>
                            <h3 class="rethink-sans-bold text-primary mb-0">Laura Camilo</h3>
                            <h4 class="text-secondary small">Diretora executiva L7Design</h4>
                            <img src="{{asset('build/client/images/aspas-right.svg')}}" alt="Aspas Right" title="Aspas Right" class=apas-right loading=lazy>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="trust-whi-list-item bg-white p-4 rounded-4 border border-dark">
                            <img src="{{asset('build/client/images/aspas-left.svg')}}" alt="Aspas Left" title="Aspas Left" class=apas-left loading=lazy>
                            <p class="text mt-3">Trabalhar com a WHI foi uma experiência incrível! Desde o início, se mostraram extremamente profissionais e talentosos. Entenderam perfeitamente a visão que eu tinha para o meu site e trouxe ideias criativas que superaram
                                minhas expectativas. O processo de desenvolvimento foi fluido. Estou muito satisfeito com o resultado final; meu site não apenas tem uma aparência incrível, mas também é funcional e fácil de navegar.</p>
                            <h3 class="rethink-sans-bold text-primary mb-0">Manuel Santos</h3>
                            <h4 class="text-secondary small">Diretor Executivo da Pindalar</h4>
                            <img src="{{asset('build/client/images/aspas-right.svg')}}" alt="Aspas Right" title="Aspas Right" class=apas-right loading=lazy>
                        </div>
                    </div>
                    <div class=swiper-slide>
                        <div class="trust-whi-list-item bg-white p-3 rounded-4 border border-dark">
                            <img src="{{asset('build/client/images/aspas-left.svg ')}}" alt="Aspas Left" title="Aspas Left" class=apas-left loading=lazy>
                            <p class="text mt-3">Na WHI tivemos o melhor custo-benefício que encontramos no mercado, além de rápidos e criativos, fazem uma reunião de apresentação da empresa e do projeto final, confirmando se está a contento. Gostei bastante e agora
                                darei seguimento aos demais projetos da empresa.</p>
                            <h3 class="rethink-sans-bold text-primary mb-0">Wesley de Morais</h3>
                            <h4 class="text-secondary small">Diretor Executivo da Flygo Turismo</h4>
                            <img src="{{asset('build/client/images/aspas-right.svg')}}" alt="Aspas Right" title="Aspas Right" class=apas-right loading=lazy>
                        </div>
                    </div>
                </div>
                <div class=btn-navigation>
                    <div class=swiper-button-prev></div>
                    <div class=swiper-button-next></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id=faq class="faq blue-background">
    <div class=me-5>
        <div class="d-flex flex-wrap">
            <div class=col-md-6 data-aos=zoom-in data-aos-delay=150>
                <div class=eng-title>
                    <h2 class="ex title rethink-sans-bold">AQUI,</h2>
                    <h3 class="ex emphasis rethink-sans-semiBold">a gente explica!</h3>
                </div>
                <div class=img>
                    <img src="{{asset('build/client/images/hand-faq.png')}}" alt=hand-faq title=hand-faq class="img-fluid mt-3 hand-faq" loading=lazy>
                </div>
            </div>
            <div class=col-md-6>
                <div class=answer>
                    <div class=accordion id=faqAccordion>
                        <div class="accordion-item mb-3 rounded-4" data-aos=fade-up data-aos-delay=150>
                            <h2 class="accordion-header w-100 ms-0" id=headingOne>
                                <button class="accordion-button collapsed rethink-sans-semiBold" type=button data-bs-toggle=collapse data-bs-target=#collapseOne aria-expanded=false aria-controls=collapseOne>
Qual o valor de um projeto com a WHI?
</button>
                            </h2>
                            <div id=collapseOne class="accordion-collapse collapse" aria-labelledby=headingOne data-bs-parent=#faqAccordion>
                                <div class=accordion-body>
                                    O valor de um projeto começa a partir de R$ 300, mas como cada projeto tem seu próprio toque especial, o preço pode variar conforme o que você precisa, o objetivo e a complexidade. Vamos entender juntos o que você quer e criar algo que se encaixe no seu
                                    orçamento e atenda suas expectativas.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4" data-aos=fade-up data-aos-delay=350>
                            <h2 class="accordion-header w-100 ms-0" id=headingTwo>
                                <button class="accordion-button collapsed rethink-sans-semiBold" type=button data-bs-toggle=collapse data-bs-target=#collapseTwo aria-expanded=false aria-controls=collapseTwo>
Como posso iniciar meu projeto com a WHI?
</button>
                            </h2>
                            <div id=collapseTwo class="accordion-collapse collapse" aria-labelledby=headingTwo data-bs-parent=#faqAccordion>
                                <div class=accordion-body>
                                    Basta entrar em contato conosco através do “Fale com a gente!”. Ou agende seu bate papo aqui no site.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4" data-aos=fade-up data-aos-delay=550>
                            <h2 class="accordion-header w-100 ms-0" id=headingThree>
                                <button class="accordion-button collapsed rethink-sans-semiBold" type=button data-bs-toggle=collapse data-bs-target=#collapseThree aria-expanded=false aria-controls=collapseThree>
Quais são os prazos para entrega de um site ou sistema?
</button>
                            </h2>
                            <div id=collapseThree class="accordion-collapse collapse" aria-labelledby=headingThree data-bs-parent=#faqAccordion>
                                <div class=accordion-body>
                                    Os prazos variam conforme a complexidade do projeto. Trabalhamos para entregar dentro do tempo estimado, garantindo qualidade e resultados, com transparência em todas as etapas.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4" data-aos=fade-up data-aos-delay=750>
                            <h2 class="accordion-header w-100 ms-0" id=headingFour>
                                <button class="accordion-button collapsed rethink-sans-semiBold" type=button data-bs-toggle=collapse data-bs-target=#collapseFour aria-expanded=false aria-controls=collapseFour>
Como funciona o suporte após a entrega do projeto?
</button>
                            </h2>
                            <div id=collapseFour class="accordion-collapse collapse" aria-labelledby=headingFour data-bs-parent=#faqAccordion>
                                <div class=accordion-body>
                                    Oferecemos um suporte contínuo garantindo que todas as suas dúvidas sejam sanadas e que seu projeto continue atendendo às suas necessidades ao longo do tempo.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4" data-aos=fade-up data-aos-delay=950>
                            <h2 class="accordion-header w-100 ms-0" id=headingFive>
                                <button class="accordion-button collapsed rethink-sans-semiBold" type=button data-bs-toggle=collapse data-bs-target=#collapseFive aria-expanded=false aria-controls=collapseFive>
Posso gerenciar meu próprio site depois que ele for entregue?
</button>
                            </h2>
                            <div id=collapseFive class="accordion-collapse collapse" aria-labelledby=headingFive data-bs-parent=#faqAccordion>
                                <div class=accordion-body>
                                    Sim! Desenvolvemos sites dinâmicos e gerenciáveis. Através do nosso painel é muito fácil e intuitivo alterar qualquer informação. Dessa forma, você pode inserir ou modificar o seu conteúdo sempre que necessário, sem depender de suporte técnico.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4" data-aos=fade-right data-aos-delay=1150>
                            <h2 class="accordion-header w-100 ms-0" id=headingSix>
                                <button class="accordion-button collapsed rethink-sans-semiBold" type=button data-bs-toggle=collapse data-bs-target=#collapseSix aria-expanded=false aria-controls=collapseSix>
Quais os benefícios de trabalhar com a WHI em vez de outras agências?
</button>
                            </h2>
                            <div id=collapseSix class="accordion-collapse collapse" aria-labelledby=headingSix data-bs-parent=#faqAccordion>
                                <div class=accordion-body>
                                    Oferecemos flexibilidade no pagamento. Nosso diferencial é atendermos conforme o seu orçamento. Nossa equipe experiente entrega resultados eficazes, com soluções criativas e práticas para impulsionar o seu negócio
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection
