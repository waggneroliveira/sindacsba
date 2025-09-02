@extends('client.core.client')

@section('content')
    <style>
        .announcement{
            display: none;
        }
    </style>
    <div class="d-flex justify-content-start gap-2 align-items-start flex-nowrap mt-5 mb-3">
        <span class="firula-contact mt-2"></span>
        <div class="description">
            <h1 class="montserrat-bold font-30 mb-0 title-blue text-uppercase">Sobre Nós</h1>
        </div>
    </div>

    @if (isset($abouts) && $abouts <> null)        
        <section id="about" class="position-relative mb-5">
            <div class="container">
                @foreach ($abouts as $about)
                    <div id="{{$about->slug}}" class="d-flex justify-content-between align-items-start about flex-wrap w-100 pt-4 pt-lg-5">
                        @if ($about->path_image)
                            <div class="col-11 col-lg-4 animate-on-scroll mb-3" data-animation="animate__fadeInRight">
                                <div class="image d-flex justify-content-end">
                                    <img src="{{asset('storage/' . $about->path_image)}}" alt="About"
                                        class="w-100 h-100 about-image d-sm-block" loading="lazy">
                                </div>
                            </div>

                            <div class="col-11 col-lg-7 animate-on-scroll" data-animation="animate__fadeInLeft">
                                <div class="border-bottom mb-0">
                                    <h2 class="section-title rounded-top-left d-table px-4 w-auto m-0 montserrat-bold font-18 title-blue">
                                        {{$about->title}}
                                    </h2>
                                </div>
                        
                                <div class="description mt-4 text-blog-inner montserrat-medium font-16">
                                    {!! $about->text !!}
                                </div>
                            </div>
                        @else
                            <div class="col-12 animate-on-scroll w-100" data-animation="animate__fadeInLeft">
                                <div class="border-bottom mb-0">
                                    <h2 class="section-title rounded-top-left d-table px-4 w-auto m-0 montserrat-bold font-18 title-blue">
                                        {{$about->title}}
                                    </h2>
                                </div>
                        
                                <div class="description mt-4 text-blog-inner montserrat-medium font-16">
                                    {!! $about->text !!}
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach

            </div>

            @include('client.includes.partner')
        </section>        
    @endif

<!-- Diretoria -->
<section id="board" class="board container my-5">
    <div class="border-bottom mb-0">
        <h2 class="section-title rounded-top-left d-table px-4 w-auto m-0 montserrat-bold font-18 title-blue">Diretoria</h2>
    </div>
    <div class="row g-4 mt-4">
        <div class="col-md-4 col-sm-12">
            <div class="d-flex justify-content-start gap-3 align-items-center">
                <div class="image">
                    <img src="{{asset('build/client/images/user.png')}}" loading="lazy" class="rounded-circle" width="100" height="100" alt="Clayton Ferreira da Silva">
                </div>
                <div class="description d-flex flex-column justify-content-center">
                    <h5 class="mb-1 montserrat-bold font-18 title-blue">Clayton Ferreira da Silva</h5>
                    <p class="function montserrat-regular font-16 mb-0">Diretora Geral do Sindicato Baiano</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="d-flex justify-content-start gap-3 align-items-center">
                <div class="image">
                    <img src="{{asset('build/client/images/user.png')}}" loading="lazy" class="rounded-circle" width="100" height="100" alt="Clayton Ferreira da Silva">
                </div>
                <div class="description d-flex flex-column justify-content-center">
                    <h5 class="mb-1 montserrat-bold font-18 title-blue">Clayton Ferreira da Silva</h5>
                    <p class="function montserrat-regular font-16 mb-0">Diretora Geral do Sindicato Baiano</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="d-flex justify-content-start gap-3 align-items-center">
                <div class="image">
                    <img src="{{asset('build/client/images/user.png')}}" loading="lazy" class="rounded-circle" width="100" height="100" alt="Clayton Ferreira da Silva">
                </div>
                <div class="description d-flex flex-column justify-content-center">
                    <h5 class="mb-1 montserrat-bold font-18 title-blue">Clayton Ferreira da Silva</h5>
                    <p class="function montserrat-regular font-16 mb-0">Diretora Geral do Sindicato Baiano</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="d-flex justify-content-start gap-3 align-items-center">
                <div class="image">
                    <img src="{{asset('build/client/images/user.png')}}" loading="lazy" class="rounded-circle" width="100" height="100" alt="Clayton Ferreira da Silva">
                </div>
                <div class="description d-flex flex-column justify-content-center">
                    <h5 class="mb-1 montserrat-bold font-18 title-blue">Clayton Ferreira da Silva</h5>
                    <p class="function montserrat-regular font-16 mb-0">Diretora Geral do Sindicato Baiano</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="d-flex justify-content-start gap-3 align-items-center">
                <div class="image">
                    <img src="{{asset('build/client/images/user.png')}}" loading="lazy" class="rounded-circle" width="100" height="100" alt="Clayton Ferreira da Silva">
                </div>
                <div class="description d-flex flex-column justify-content-center">
                    <h5 class="mb-1 montserrat-bold font-18 title-blue">Clayton Ferreira da Silva</h5>
                    <p class="function montserrat-regular font-16 mb-0">Diretora Geral do Sindicato Baiano</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="d-flex justify-content-start gap-3 align-items-center">
                <div class="image">
                    <img src="{{asset('build/client/images/user.png')}}" loading="lazy" class="rounded-circle" width="100" height="100" alt="Clayton Ferreira da Silva">
                </div>
                <div class="description d-flex flex-column justify-content-center">
                    <h5 class="mb-1 montserrat-bold font-18 title-blue">Clayton Ferreira da Silva</h5>
                    <p class="function montserrat-regular font-16 mb-0">Diretora Geral do Sindicato Baiano</p>
                </div>
            </div>
        </div>
    </div>
</section>
@if (!empty($statute))
    <section id="statute" class="dark-background py-5">
    <div class="container">
        <div class="row align-items-center">
            @if ($statute->path_file)
                <!-- Texto -->
                <div class="col-lg-8 col-md-7 col-12 mb-4 mb-md-0">
                    <h4 class="font-25 mb-4 montserrat-medium">
                    {{$statute->title}}
                    </h4>
                    <p class="montserrat-regular font-16 text-white">
                    {{$statute->description}}
                    </p>
                </div>
                            <!-- Botão -->
                @if ($statute <> null)
                    <div class="col-lg-4 col-md-5 col-12 text-md-end text-center">
                        <a href="{{asset('storage/' . $statute->path_file)}}" target="_blank" rel="noopener noreferrer" 
                        class="background-red montserrat-bold font-15 rounded-5 py-2 px-5 text-uppercase d-inline-block">
                        Baixar PDF do estatuto
                        </a>
                    </div>
                @endif
                @else
                <!-- Texto -->
                <div class="col-12 mb-4 mb-md-0">
                    <h4 class="font-25 mb-4 montserrat-medium">
                    {{$statute->title}}
                    </h4>
                    <p class="montserrat-regular font-16 text-white">
                    {{$statute->description}}
                    </p>
                </div>
            @endif

        </div>
    </div>
    </section>
@endif

@include('client.includes.social')

@endsection