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
                    <button class="px-2 px-sm-3 montserrat-bold text-uppercase font-18 btn btn-region active" data-regional-id="all">Todas</button>
                    @foreach ($regionais as $regional)                        
                        <button class="px-2 px-sm-3 montserrat-bold text-uppercase font-18 btn btn-region" data-regional-id="{{$regional->id}}">{{$regional->title}}</button>
                    @endforeach
                </div>            
            </div>
        </div>
        <div class="container">
            <div class="row py-5">
                <div class="col-12">
                    <div class="col-12 col-lg-5 ms-lg-auto mb-5">
                        <div class="input-group input-group-lg">
                            <input type="search" id="searchInput" name="search" class="form-control border-end-0 text-color montserrat-regular bg-white py-0 font-15" placeholder="Pesquise aqui">
                            <button type="button" id="searchButton" title="search" class="btn-reset input-group-text bg-white border">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99989 0C3.13331 0 0 3.13427 0 6.99979C0 10.8663 3.13351 14.0004 6.99989 14.0004C8.49916 14.0004 9.88877 13.5285 11.0281 12.7252L15.9512 17.6491C16.4199 18.117 17.1798 18.117 17.6485 17.6491C18.1172 17.1804 18.1172 16.4205 17.6485 15.9518L12.7254 11.0288C13.5279 9.88936 13.9998 8.4997 13.9998 6.99983C13.9998 3.13411 10.8655 0 6.99989 0ZM2.39962 6.99979C2.39962 4.45981 4.45907 2.40019 6.99989 2.40019C9.54072 2.40019 11.6002 4.45961 11.6002 6.99979C11.6002 9.54058 9.54072 11.6 6.99989 11.6C4.45907 11.6 2.39962 9.54058 2.39962 6.99979Z" fill="#31404B"/>
                                </svg>                                    
                            </button>
                        </div>
                    </div>

                    <div class="loading-spinner" id="loadingSpinner">
                        <div class="spinner-border text-blue" role="status">
                            <span class="visually-hidden">Carregando...</span>
                        </div>
                    </div>

                    <div id="municipalityResults">
                        @include('client.ajax.municipality-ajax', ['municipalities' => $municipalities])
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('client.includes.complaint')
    @include('client.includes.social')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elementos DOM
            const regionalButtons = document.querySelectorAll('.btn-region');
            const searchInput = document.getElementById('searchInput');
            const searchButton = document.getElementById('searchButton');
            const resultsContainer = document.getElementById('municipalityResults');
            const loadingSpinner = document.getElementById('loadingSpinner');
            
            // Variáveis para controle do estado
            let currentRegionalId = 'all';
            let currentSearchTerm = '';

            // Adicionar eventos aos botões de regional
            regionalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remover a classe active de todos os botões
                    regionalButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Adicionar a classe active ao botão clicado
                    this.classList.add('active');
                    
                    // Atualizar o ID da regional atual
                    currentRegionalId = this.getAttribute('data-regional-id');
                    
                    // Executar o filtro
                    filterMunicipalities();
                });
            });

            // Adicionar evento ao botão de pesquisa
            searchButton.addEventListener('click', function() {
                currentSearchTerm = searchInput.value;
                filterMunicipalities();
            });

            // Adicionar evento de tecla Enter no campo de pesquisa
            searchInput.addEventListener('keyup', function(event) {
                if (event.key === 'Enter') {
                    currentSearchTerm = searchInput.value;
                    filterMunicipalities();
                }
            });

            // Função para filtrar os municípios via AJAX
            function filterMunicipalities() {
                // Mostrar o spinner de carregamento
                loadingSpinner.style.display = 'block';
                resultsContainer.style.opacity = '0.5';
                
                // Preparar os dados para a requisição
                const formData = new FormData();
                formData.append('regional_id', currentRegionalId);
                formData.append('search', currentSearchTerm);
                formData.append('_token', '{{ csrf_token() }}');
                
                // Fazer a requisição AJAX
                fetch('{{ route("client.filter.municipalities") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na requisição');
                    }
                    return response.text();
                })
                .then(data => {
                    // Atualizar o container com os resultados
                    resultsContainer.innerHTML = data;
                    
                    // Esconder o spinner de carregamento
                    loadingSpinner.style.display = 'none';
                    resultsContainer.style.opacity = '1';
                })
                .catch(error => {
                    console.error('Erro:', error);
                    loadingSpinner.style.display = 'none';
                    resultsContainer.style.opacity = '1';
                    resultsContainer.innerHTML = '<div class="alert alert-danger">Erro ao carregar os dados. Tente novamente.</div>';
                });
            }
        });
    </script>
@endsection