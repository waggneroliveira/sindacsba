<div class="row g-3 mt-3">
    @forelse($juridicos as $juridico)
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 box-notices">                        
            <div class="section-title rounded-top-left rounded-3 d-flex flex-column justify-content-start align-items-start h-100">
                <div>
                    <h6 class="mb-1 montserrat-bold font-15 title-blue text-uppercase">{{$juridico->title}}</h6>
                    <p class="text-muted text-color montserrat-regular font-15 title-blue">{{$juridico->description}}</p>
                </div>

                <div class="d-flex justify-content-between align-items-center w-100">
                    @if ($juridico->link)                                  
                        <a href="{{$juridico->link}}" target="_blank" 
                           class="background-red montserrat-medium font-15 rounded-5 py-2 px-4 text-center d-inline-block w-auto">
                            Saiba mais
                        </a>
                    @endif
                    
                    @if ($juridico->path_file)                                    
                        <a href="{{asset('storage/' . $juridico->path_file)}}" target="_blank"
                           class="text-decoration-none background-red montserrat-medium font-15 rounded-5 py-2 px-4 text-center d-inline-block w-auto">
                            Baixar
                            <svg width="17" height="18" viewBox="0 0 29 30" class="ms-2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.30541 22.1292C0.766585 22.1292 0.327148 22.5397 0.327148 23.0431V24.8711C0.327148 27.3899 2.52252 29.441 5.21848 29.441H23.8055C26.5015 29.441 28.6968 27.3899 28.6968 24.8711V23.0431C28.6968 22.5397 28.2574 22.1292 27.7186 22.1292C27.1798 22.1292 26.7403 22.5397 26.7403 23.0431V24.8711C26.7403 26.3831 25.4239 27.613 23.8055 27.613H5.21848C3.60013 27.613 2.28368 26.3831 2.28368 24.8711V23.0431C2.28368 22.5397 1.84422 22.1292 1.30541 22.1292Z" fill="#FFF"/>
                                <path d="M14.9754 0.193604C14.4377 0.193604 13.9992 0.634347 13.9992 1.17473V17.9383L9.39661 13.3125C9.17735 13.0921 8.87991 12.9637 8.58056 12.9637C8.3899 12.9637 8.22021 13.0174 8.07724 13.1151C7.82748 13.2914 7.68258 13.5462 7.65207 13.8414C7.62728 14.1307 7.73024 14.4163 7.93425 14.6213L12.6398 19.3353C13.2651 19.9581 14.0888 20.3011 14.9677 20.3011C15.8466 20.3011 16.676 19.9581 17.2957 19.3353L22.005 14.6155C22.2109 14.4086 22.312 14.125 22.2872 13.8356C22.2624 13.5367 22.1156 13.2856 21.862 13.1093C21.4959 12.8487 20.9144 12.9369 20.5445 13.3048L15.942 17.9307L15.9458 1.17493C15.9458 0.634519 15.5073 0.193794 14.9696 0.193794L14.9754 0.193604Z" fill="#FFF"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>                        
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="montserrat-bold font-18 text-muted">Nenhum resultado encontrado.</p>
        </div>
    @endforelse
</div>
