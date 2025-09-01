<div class="partner-about">
    <div class="container pt-3 pb-5">
        <div class="row g-3 justify-content-center">
            @foreach ($partners as $partner)                            
                <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                    <div class="partner-card border rounded-2 d-flex justify-content-center align-items-center py-2 px-4 w-100">
                        @if ($partner->link <> null)                                        
                            <a href="{{$partner->link}}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('storage/' . $partner->path_image) }}" 
                                    alt="Logo do parceiro" 
                                    class="img-fluid" 
                                    loading="lazy"/>                            
                            </a>
                            @else
                            <img src="{{ asset('storage/' . $partner->path_image) }}" 
                            alt="Logo do parceiro" 
                            class="img-fluid" 
                            loading="lazy"/>  
                        @endif
                    </div>
                </div>
            @endforeach               
        </div>
    </div>
</div>