@extends('client.core.client')

@section('content')
    <style>
        .announcement{
            display: none;
        }
    </style>
    <div class="d-flex justify-content-start gap-2 align-items-start flex-nowrap my-5">
        <span class="firula-contact mt-2"></span>
        <div class="description">
            <h1 class="montserrat-bold font-30 mb-0 title-blue text-uppercase">Jurídico</h1>
        </div>
    </div>

    <section class="juridico mb-5">
        <div class="container">
            <div class="filter">
                <div class="row  d-flex flex-wrap gap-3 justify-content-center">
                    {{-- <div class="col-11 col-lg-12 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="filter-esq col-8">
                            <button class="px-5 w-auto rounded-0 border btn-title montserrat-bold text-uppercase font-15 btn btn-juridico active">Leis</button>
                            <button class="px-5 w-auto rounded-0 border btn-title montserrat-bold text-uppercase font-15 btn btn-juridico">Decretos</button>
                            <button class="px-5 w-auto rounded-0 border btn-title montserrat-bold text-uppercase font-15 btn btn-juridico">Portaria</button>
                        </div>
    
                        <div class="filter-dir col-4 d-flex justify-content-end align-items-center gap-3">
                            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.44 2.6C10.92 1.04 9.49 0 7.8 0C6.11 0 4.68 1.04 4.16 2.6H0V5.2H4.16C4.68 6.76 6.11 7.8 7.8 7.8C9.49 7.8 10.92 6.76 11.44 5.2H26V2.6H11.44ZM7.8 5.2C7.02 5.2 6.5 4.68 6.5 3.9C6.5 3.12 7.02 2.6 7.8 2.6C8.58 2.6 9.1 3.12 9.1 3.9C9.1 4.68 8.58 5.2 7.8 5.2Z" fill="#2F368B"/>
                            <path d="M7.8 15.6001C6.11 15.6001 4.68 16.6401 4.16 18.2001H0V20.8001H4.16C4.68 22.3601 6.11 23.4001 7.8 23.4001C9.49 23.4001 10.92 22.3601 11.44 20.8001H26V18.2001H11.44C10.92 16.6401 9.49 15.6001 7.8 15.6001ZM7.8 20.8001C7.02 20.8001 6.5 20.2801 6.5 19.5001C6.5 18.7201 7.02 18.2001 7.8 18.2001C8.58 18.2001 9.1 18.7201 9.1 19.5001C9.1 20.2801 8.58 20.8001 7.8 20.8001Z" fill="#2F368B"/>
                            <path d="M18.2 7.80005C16.51 7.80005 15.08 8.84005 14.56 10.4H0V13H14.56C15.08 14.56 16.51 15.6 18.2 15.6C19.89 15.6 21.32 14.56 21.84 13H26V10.4H21.84C21.32 8.84005 19.89 7.80005 18.2 7.80005ZM18.2 13C17.42 13 16.9 12.48 16.9 11.7C16.9 10.92 17.42 10.4 18.2 10.4C18.98 10.4 19.5 10.92 19.5 11.7C19.5 12.48 18.98 13 18.2 13Z" fill="#2F368B"/>
                            </svg>

                            <button class="px-4 rounded-0 montserrat-bold text-uppercase font-15 btn btn-juridico btn-title-filter active">NACIONAL</button>
                            <button class="px-4 rounded-0 montserrat-bold text-uppercase font-15 btn btn-juridico btn-title-filter">Municipal</button>
                        </div>
                    </div> --}}
                    <div class="row align-items-center">
                        <div class="filter-esq col-12 col-md-8 d-flex flex-wrap justify-content-center justify-content-md-start gap-2 mb-3 mb-md-0">
                            <button class="px-5 w-auto rounded-0 border btn-title montserrat-bold text-uppercase font-15 btn btn-juridico active">Leis</button>
                            <button class="px-5 w-auto rounded-0 border btn-title montserrat-bold text-uppercase font-15 btn btn-juridico">Decretos</button>
                            <button class="px-5 w-auto rounded-0 border btn-title montserrat-bold text-uppercase font-15 btn btn-juridico">Portaria</button>
                        </div>
                        <div class="filter-dir col-12 col-md-4 d-flex justify-content-center justify-content-md-end align-items-center gap-3">
                            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.44 2.6C10.92 1.04 9.49 0 7.8 0C6.11 0 4.68 1.04 4.16 2.6H0V5.2H4.16C4.68 6.76 6.11 7.8 7.8 7.8C9.49 7.8 10.92 6.76 11.44 5.2H26V2.6H11.44ZM7.8 5.2C7.02 5.2 6.5 4.68 6.5 3.9C6.5 3.12 7.02 2.6 7.8 2.6C8.58 2.6 9.1 3.12 9.1 3.9C9.1 4.68 8.58 5.2 7.8 5.2Z" fill="#2F368B"/>
                                <path d="M7.8 15.6001C6.11 15.6001 4.68 16.6401 4.16 18.2001H0V20.8001H4.16C4.68 22.3601 6.11 23.4001 7.8 23.4001C9.49 23.4001 10.92 22.3601 11.44 20.8001H26V18.2001H11.44C10.92 16.6401 9.49 15.6001 7.8 15.6001ZM7.8 20.8001C7.02 20.8001 6.5 20.2801 6.5 19.5001C6.5 18.7201 7.02 18.2001 7.8 18.2001C8.58 18.2001 9.1 18.7201 9.1 19.5001C9.1 20.2801 8.58 20.8001 7.8 20.8001Z" fill="#2F368B"/>
                                <path d="M18.2 7.80005C16.51 7.80005 15.08 8.84005 14.56 10.4H0V13H14.56C15.08 14.56 16.51 15.6 18.2 15.6C19.89 15.6 21.32 14.56 21.84 13H26V10.4H21.84C21.32 8.84005 19.89 7.80005 18.2 7.80005ZM18.2 13C17.42 13 16.9 12.48 16.9 11.7C16.9 10.92 17.42 10.4 18.2 10.4C18.98 10.4 19.5 10.92 19.5 11.7C19.5 12.48 18.98 13 18.2 13Z" fill="#2F368B"/>
                            </svg>

                            <button class="px-4 rounded-0 montserrat-bold text-uppercase font-15 btn btn-juridico btn-title-filter active">Nacional</button>
                            <button class="px-4 rounded-0 montserrat-bold text-uppercase font-15 btn btn-juridico btn-title-filter">Municipal</button>
                        </div>
                    </div>

                    <div class="search col-11 col-md-12">
                        <div class="col-12 col-lg-5 ms-lg-auto mb-5">
                            <form id="juridicoForm" action="">
                                <div class="input-group input-group-lg">
                                    <input type="search" id="searchJuridico" name="search" class="form-control border-end-0 text-color montserrat-regular bg-white py-0 font-15" placeholder="Pesquise aqui">
                                    <button type="submit" title="search" class="btn-reset input-group-text bg-white border">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99989 0C3.13331 0 0 3.13427 0 6.99979C0 10.8663 3.13351 14.0004 6.99989 14.0004C8.49916 14.0004 9.88877 13.5285 11.0281 12.7252L15.9512 17.6491C16.4199 18.117 17.1798 18.117 17.6485 17.6491C18.1172 17.1804 18.1172 16.4205 17.6485 15.9518L12.7254 11.0288C13.5279 9.88936 13.9998 8.4997 13.9998 6.99983C13.9998 3.13411 10.8655 0 6.99989 0ZM2.39962 6.99979C2.39962 4.45981 4.45907 2.40019 6.99989 2.40019C9.54072 2.40019 11.6002 4.45961 11.6002 6.99979C11.6002 9.54058 9.54072 11.6 6.99989 11.6C4.45907 11.6 2.39962 9.54058 2.39962 6.99979Z" fill="#31404B"/>
                                        </svg>                                    
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>

            <div id="juridicoResults">
                @include('client.ajax.juridico-ajax', ['juridicos' => $juridicos])
            </div>
        </div>
    </section>

    @include('client.includes.complaint')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let search = '';
    let legal = 'leis'; // default
    let region = 'nacional'; // default

    function loadResults() {
        $.ajax({
            url: "{{ route('search-juridico') }}",
            type: "GET",
            data: { search, legal, region },
            success: function (response) {
                $("#juridicoResults").html(response); // Certifique-se que o ID está correto
            },
            error: function () {
                $("#juridicoResults").html('<p class="text-danger montserrat-bold font-16 text-center">Erro ao carregar resultados.</p>');
            }
        });
    }

    $(document).ready(function () {
        // Lê parâmetro 'legal' da URL (ex: /juridico?legal=decretos)
        const urlParams = new URLSearchParams(window.location.search);
        const legalParam = urlParams.get('legal');
        if (legalParam) {
            legal = legalParam.toLowerCase();
        }

        // Ativa o botão correspondente
        $('.filter-esq .btn-juridico').removeClass('active');
        $('.filter-esq .btn-juridico').each(function() {
            if ($(this).text().toLowerCase() === legal) {
                $(this).addClass('active');
            }
        });

        // filtros
        $(document).on('click', '.filter-esq .btn-juridico', function () {
            $('.filter-esq .btn-juridico').removeClass('active');
            $(this).addClass('active');
            legal = $(this).text().toLowerCase();
            loadResults();
        });

        $(document).on('click', '.filter-dir .btn-title-filter', function () {
            $('.filter-dir .btn-title-filter').removeClass('active');
            $(this).addClass('active');
            region = $(this).text().toLowerCase();
            loadResults();
        });

        // busca
        $(document).on('keyup', '#searchJuridico', function () {
            search = $(this).val();
            loadResults();
        });

        // carrega resultados iniciais
        loadResults();
    });
</script>
@endsection