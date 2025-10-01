@if($featuredNews)
    @php
        \Carbon\Carbon::setLocale('pt_BR');
        $dataFormatada = \Carbon\Carbon::parse($featuredNews->date)->translatedFormat('d \d\e F \d\e Y');
    @endphp
    <article>
        <div class="col-12">
            <div class="row news-lg mx-0 mb-3 border rounded-2 align-items-center overflow-hidden bg-white flex-column flex-md-row">
                <div class="col-12 col-md-6 h-auto px-0 d-flex justify-content-center align-items-center">
                    <img loading="lazy" class="img-fluid w-100 h-auto"
                        src="{{ $featuredNews->path_image_thumbnail ? asset('storage/' . $featuredNews->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat' }}"
                        alt="{{ $featuredNews->title }}"
                        style="object-fit: cover;aspect-ratio:1.91/1;">
                </div>
                <div class="col-12 col-md-6 d-flex flex-column bg-white px-3 px-md-0">
                    <div class="p-3 p-md-4">
                        <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                            <span class="badge badge-primary montserrat-semiBold font-12 me-2 background-red text-uppercase p-2">
                                {{ $featuredNews->category->title }}
                            </span>
                            <p class="text-color mb-0 montserrat-regular font-14">
                                {{ $dataFormatada }}
                            </p>
                        </div>
                        <a href="{{ route('blog-inner', $featuredNews->slug) }}" class="underline">
                            <h2 class="h5 mb-3 text-uppercase montserrat-semiBold font-18 font-md-20 title-blue">
                                {{ Str::limit($featuredNews->title, 80) }}
                            </h2>
                        </a>
                        <p class="m-0 text-color montserrat-medium font-14 font-md-16">
                            {!! substr(strip_tags($featuredNews->text), 0, 150) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endif

@if ($latestNews->count() > 0)  
    <div class="row" id="news-grid">
        @foreach($latestNews as $news)
            @php
                \Carbon\Carbon::setLocale('pt_BR');
                $dataFormatada = \Carbon\Carbon::parse($news->date)->translatedFormat('d \d\e F \d\e Y');
            @endphp
            <article class="col-12 col-sm-12 col-md-6">
                <div class="d-flex align-items-center bg-white mb-3 overflow-hidden" style="height: 110px;">
                    <img loading="lazy" class="img-fluid col-3"
                    src="{{ $news->path_image_thumbnail ? asset('storage/' . $news->path_image_thumbnail) : 'https://placehold.co/600x400?text=Sem+imagem&font=montserrat' }}"
                    alt="{{ $news->title }}"
                    style="height: 110px;aspect-ratio:1/1;object-fit: cover;">
                    <div class="col-9 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                        <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                            <span class="badge badge-primary montserrat-semiBold font-10 text-uppercase py-1 px-2 mr-2 background-red">
                                {{ $news->category->title }}
                            </span>
                            <p class="text-color mb-0 montserrat-regular font-12">
                                {{ $dataFormatada }}
                            </p>
                        </div>
                        <a href="{{ route('blog-inner', $news->slug) }}" class="underline">
                            <h3 class="h6 m-0 text-uppercase montserrat-bold font-14 title-blue">
                                {{ Str::limit($news->title, 60) }}
                            </h3>
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endif