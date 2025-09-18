<?php $__env->startSection('content'); ?>
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
                    <?php $__currentLoopData = $regionais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $regional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                        
                        <button class="px-2 px-sm-3 montserrat-bold text-uppercase font-18 btn btn-region" data-regional-id="<?php echo e($regional->id); ?>"><?php echo e($regional->title); ?></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <?php echo $__env->make('client.ajax.municipality-ajax', ['municipalities' => $municipalities], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('client.includes.complaint', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('client.includes.social', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const regionalButtons = document.querySelectorAll('.btn-region');
            const searchInput = document.getElementById('searchInput');
            const searchButton = document.getElementById('searchButton');
            const resultsContainer = document.getElementById('municipalityResults');
            const loadingSpinner = document.getElementById('loadingSpinner');

            let currentRegionalId = 'all';
            let currentSearchTerm = '';
            let currentPage = 1;

            // Normaliza links de paginação: adiciona data-page e evita navegação real.
            function normalizePaginationLinks() {
                const links = resultsContainer.querySelectorAll('.pagination a');
                links.forEach(link => {
                const href = link.getAttribute('href') || '';
                let page = '1';
                try {
                    const parsed = new URL(href, window.location.origin);
                    page = parsed.searchParams.get('page') || '1';
                } catch (err) {
                    const m = href.match(/page=(\d+)/);
                    if (m) page = m[1];
                }
                link.setAttribute('data-page', page);
                // evita navegação real (acessibilidade mínima preservada)
                link.setAttribute('href', '#page-' + page);
                link.setAttribute('role', 'button');
                });
            }

            // Faz o POST via AJAX e injeta o partial
            function loadMunicipalities(page = 1, updateUrl = true) {
                currentPage = parseInt(page, 10) || 1;

                loadingSpinner.style.display = 'block';
                resultsContainer.style.opacity = '0.5';

                const formData = new FormData();
                formData.append('regional_id', currentRegionalId);
                formData.append('search', currentSearchTerm);
                formData.append('page', currentPage);
                formData.append('_token', '<?php echo e(csrf_token()); ?>');

                // Atualiza a URL sem reload (remove ?page quando page = 1)
                if (updateUrl) {
                const params = new URLSearchParams();
                if (currentRegionalId && currentRegionalId !== 'all') params.append('regional_id', currentRegionalId);
                if (currentSearchTerm) params.append('search', currentSearchTerm);
                if (currentPage && currentPage > 1) params.append('page', currentPage);
                const newUrl = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
                window.history.replaceState({}, document.title, newUrl);
                }

                fetch('<?php echo e(route("client.filter.municipalities")); ?>', {
                method: 'POST',
                body: formData,
                headers: {'X-Requested-With': 'XMLHttpRequest'}
                })
                .then(res => {
                if(!res.ok) throw new Error('Erro na requisição');
                return res.text();
                })
                .then(html => {
                resultsContainer.innerHTML = html;
                // Normaliza os links injetados
                normalizePaginationLinks();
                loadingSpinner.style.display = 'none';
                resultsContainer.style.opacity = '1';
                // debug opcional: console.log('AJAX carregado - página', currentPage);
                })
                .catch(err => {
                console.error('Erro AJAX:', err);
                loadingSpinner.style.display = 'none';
                resultsContainer.style.opacity = '1';
                resultsContainer.innerHTML = '<div class="alert alert-danger">Erro ao carregar os dados. Tente novamente.</div>';
                });
            }

            // Intercepta cliques (fase de captura para prevenir navegação antes do handler)
            document.addEventListener('click', function(e) {
                // 1) Paginação dentro do container
                const pagLink = e.target.closest('#municipalityResults .pagination a');
                if (pagLink) {
                e.preventDefault();
                const page = pagLink.getAttribute('data-page') || (new URL(pagLink.href, window.location.origin).searchParams.get('page')) || 1;
                loadMunicipalities(page);
                return;
                }

                // 2) Botões de regional que sejam anchors (se forem <a href="...">)
                const reg = e.target.closest('.btn-region');
                if (reg && reg.tagName === 'A') {
                e.preventDefault();
                // o listener abaixo cuidará de ativar a regional e recarregar
                reg.click();
                return;
                }
            }, true); // observe: true -> captura

            // Botões de regional (se forem botões normais ou elementos não-anchor)
            regionalButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                // se for anchor, evitar navegação redundante
                if (this.tagName === 'A') e.preventDefault();

                regionalButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                currentRegionalId = this.getAttribute('data-regional-id') || 'all';
                currentSearchTerm = (searchInput && searchInput.value) ? searchInput.value.trim() : '';
                currentPage = 1; // reset

                loadMunicipalities(currentPage);
                });
            });

            // Busca
            if (searchButton) {
                searchButton.addEventListener('click', function(e) {
                if (this.tagName === 'A') e.preventDefault();
                currentSearchTerm = searchInput.value.trim();
                currentPage = 1;
                loadMunicipalities(currentPage);
                });
            }
            if (searchInput) {
                searchInput.addEventListener('keyup', function(ev) {
                if (ev.key === 'Enter') {
                    currentSearchTerm = searchInput.value.trim();
                    currentPage = 1;
                    loadMunicipalities(currentPage);
                }
                });
            }

            // Normaliza links já renderizados no carregamento inicial
            normalizePaginationLinks();

            // opcional: se quiser carregar via AJAX na primeira visita, descomente
            // loadMunicipalities(currentPage, false);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.core.client', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\wagner\sindacsba\resources\views/client/blades/regional.blade.php ENDPATH**/ ?>