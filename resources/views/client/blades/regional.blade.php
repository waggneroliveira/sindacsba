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
            <h1 class="montserrat-bold font-30 mb-0 title-blue text-uppercase">Regionais</h1>
        </div>
    </div>
    <section id="regional" class="mt-5 regional">
        <div class="bg-light py-5">
            <div class="container">
                <div class="col-11 col-lg-12 d-flex flex-wrap gap-3 justify-content-center">
                    <button class="px-3 montserrat-bold text-uppercase font-18 btn btn-region active">REGIONAL RECÔNCAVO</button>
                    <button class="px-3 montserrat-bold text-uppercase font-18 btn btn-region">REGIONAL NORTE</button>
                    <button class="px-3 montserrat-bold text-uppercase font-18 btn btn-region">REGIONAL SEMI ÁRIDO</button>
                    <button class="px-3 montserrat-bold text-uppercase font-18 btn btn-region">REGIONAL NORDESTE</button>
                    <button class="px-3 montserrat-bold text-uppercase font-18 btn btn-region">REGIONAL LESTE</button>
                    <button class="px-3 montserrat-bold text-uppercase font-18 btn btn-region">REGIONAL SUDOESTE</button>
                    <button class="px-3 montserrat-bold text-uppercase font-18 btn btn-region">REGIONAL LOREM</button>
                </div>            
            </div>
        </div>
        <div class="container">
            <div class="row py-5">
                <div class="col-12">
                    <div class="col-12 col-lg-5 ms-lg-auto mb-5">
                        <div class="input-group input-group-lg">
                            <input type="search" name="search" class="form-control border-end-0 text-color montserrat-regular bg-white py-0 font-15" placeholder="Pesquise aqui">
                            <button type="submit" title="search" class="btn-reset input-group-text bg-white border">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99989 0C3.13331 0 0 3.13427 0 6.99979C0 10.8663 3.13351 14.0004 6.99989 14.0004C8.49916 14.0004 9.88877 13.5285 11.0281 12.7252L15.9512 17.6491C16.4199 18.117 17.1798 18.117 17.6485 17.6491C18.1172 17.1804 18.1172 16.4205 17.6485 15.9518L12.7254 11.0288C13.5279 9.88936 13.9998 8.4997 13.9998 6.99983C13.9998 3.13411 10.8655 0 6.99989 0ZM2.39962 6.99979C2.39962 4.45981 4.45907 2.40019 6.99989 2.40019C9.54072 2.40019 11.6002 4.45961 11.6002 6.99979C11.6002 9.54058 9.54072 11.6 6.99989 11.6C4.45907 11.6 2.39962 9.54058 2.39962 6.99979Z" fill="#31404B"/>
                                </svg>                                    
                            </button>
                        </div>
                    </div>

                    <ul class="municipios list-unstyled row row-cols-2 row-cols-md-3 row-cols-lg-5">
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Salvador</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Feira de Santana</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Tancredo Neves</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Vitória da Conquista</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Barreiras</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Itabuna</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Ilhéus</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Juazeiro</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Senhor do Bonfim</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Jacobina</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Brumado</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Alagoinhas</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Santo Antônio de Jesus</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Paulo Afonso</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Valença</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Irecê</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Seabra</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Camaçari</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Eunápolis</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Itamaraju</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Porto Seguro</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Cruz das Almas</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Jequié</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Guanambi</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Bom Jesus da Lapa</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Ipirá</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Luís Eduardo Magalhães</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Serrinha</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Itaberaba</li>
                        <li class="col d-flex justify-content-start align-items-center montserrat-medium font-15 border-bottom pb-3 mb-3">Município Ribeira do Pombal</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @include('client.includes.complaint')

    @include('client.includes.social')
@endsection