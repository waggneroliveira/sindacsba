<div class="col-12" data-aos=fade-down data-aos-delay=150>
    <div class="swiper announcement w-75">
        <div class="swiper-wrapper">
            @foreach ($announcements as $announcement)                
                <div class="swiper-slide py-5">
                    <div class="image rounded-3 overflow-hidden">
                        @if(isset($announcement) && !empty($announcement->link))
                            <a href="{{ $announcement->link }}" target="_blank" rel="nofollow noopener noreferrer">
                                <img src="{{ asset('storage/' . $announcement->path_image) }}" alt="Anuncio-{{ $announcement->id }}" class="w-100">
                            </a>
                        @else
                            <img src="{{ asset('storage/' . $announcement->path_image) }}" alt="Anuncio-{{ $announcement->id }}" class="w-100">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>