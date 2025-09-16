<ul class="municipios list-unstyled row row-cols-2 row-cols-md-3 row-cols-lg-5">
    @foreach ($municipalities as $municipality)                            
        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">{{$municipality->title}}</li>
    @endforeach
</ul>
<div class="mt-3 w-100">
    {{$municipalities->links()}}
</div>

@if(count($municipalities) === 0)
    <div class="w-100 text-center py-5">
        <p class="montserrat-bold font-18 text-muted">Nenhum resultado encontrado.</p>
    </div>
@endif