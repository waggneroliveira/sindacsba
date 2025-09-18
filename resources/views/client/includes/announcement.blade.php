<div class="col-12">
    <div class="swiper announcement w-75">
        <div class="swiper-wrapper">
            @foreach ($announcements as $announcement)
                <div class="swiper-slide py-5">
                    <div class="image rounded-3 overflow-hidden">
                        @php
                            $hasImage = !empty($announcement->path_image);
                            $hasMobileImage = !empty($announcement->path_image_mobile);
                            $hasVerticalImage = !empty($announcement->path_image_vertical);
                        @endphp

                        {{-- Seu código de exibição de imagens aqui --}}
                        @if (!empty($announcement->link))
                            <a href="{{ $announcement->link }}" target="_blank" rel="nofollow noopener noreferrer">
                                <picture>
                                    @if ($hasMobileImage)
                                        <source media="(max-width: 576px)" srcset="{{ asset('storage/' . $announcement->path_image_mobile) }}">
                                    @endif
                                    @if ($hasImage)                                            
                                        <img src="{{ asset('storage/' . $announcement->path_image) }}" alt="Anuncio-{{ $announcement->id }}" class="w-100">
                                    @endif
                                </picture>
                            </a>
                        @else
                            <picture>
                                @if ($hasMobileImage)
                                    <source media="(max-width: 576px)" srcset="{{ asset('storage/' . $announcement->path_image_mobile) }}">
                                @endif
                                @if ($hasImage)                                        
                                    <img src="{{ asset('storage/' . $announcement->path_image) }}" alt="Anuncio-{{ $announcement->id }}" class="w-100">
                                @endif
                            </picture>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>