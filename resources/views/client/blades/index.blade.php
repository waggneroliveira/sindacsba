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
@endsection
