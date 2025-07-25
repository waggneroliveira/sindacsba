<div class="col-12" data-aos=fade-down data-aos-delay=150>
    <div class="swiper announcement w-75">
        <div class="swiper-wrapper">
            @foreach ($announcements as $announcement)                
                <div class="swiper-slide py-5">
                    <div class="image rounded-3 overflow-hidden">
                        @if(isset($announcement) && !empty($announcement->link))
                            <a href="{{ $announcement->link }}" target="_blank" rel="nofollow noopener noreferrer">
                                <picture>
                                    <source media="(max-width: 576px)" srcset="{{ asset('storage/' . $announcement->path_image_mobile) }}">
                                    <img src="{{ asset('storage/' . $announcement->path_image) }}" alt="Anuncio-{{ $announcement->id }}" class="w-100">
                                </picture>
                            </a>
                        @elseif(isset($announcement) && !empty($announcement->path_image_mobile))
                            <picture>
                                <source media="(max-width: 576px)" srcset="{{ asset('storage/' . $announcement->path_image_mobile) }}">
                                <img src="{{ asset('storage/' . $announcement->path_image) }}" alt="Anuncio-{{ $announcement->id }}" class="w-100">
                            </picture>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
