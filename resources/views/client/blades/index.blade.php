@extends('client.core.client')
@section('content')
<style>
    .announcement{
        display: none;
    }
</style>
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
@endsection
