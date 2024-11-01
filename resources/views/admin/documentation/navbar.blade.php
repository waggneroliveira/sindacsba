<div class="left-sidebar col-2">
    <div class="slimscroll-menu">
        <div class="list-group list-group-transparent mb-0">

            <span class="list-group-item disabled">
                Getting Started
            </span>

            <a href="#introduction" class="list-group-item list-group-item-action active">
                <span class="mr-2">
                    <i class="mdi mdi-flag-variant-outline"></i>
                </span>Introdução
            </a>

            <a href="#setup" class="list-group-item list-group-item-action ">
                <span class="mr-2">
                    <i class="mdi mdi-apps"></i>
                </span>Setup
            </a>

            <span class="list-group-item disabled">
                Customization
            </span>

            <a href="customization.html" class="list-group-item list-group-item-action ">
                <span class="mr-2">
                    <i class="mdi mdi-square-edit-outline"></i>
                </span>Layout & Themes
            </a>


            <span class="list-group-item disabled">
                Other
            </span>

            <a href="plugins-uses.html" class="list-group-item list-group-item-action ">
                <span class="mr-2">
                    <i class="mdi mdi-widgets"></i>
                </span>How to use plugins
            </a>

            <a href="changelog.html" class="list-group-item list-group-item-action ">
                <span class="mr-2">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>Changelog
            </a>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Seleciona todos os itens de navegação (links)
    const navItems = document.querySelectorAll('.list-group-item');
    
    // Função para ocultar todos os conteúdos
    function hideAllContents() {
        const contents = document.querySelectorAll('.page-content');
        contents.forEach(content => {
            content.style.display = 'none'; // Oculta o conteúdo
        });
    }

    // Função para exibir o conteúdo com base no id
    function showContentById(id) {
        hideAllContents(); // Oculta todos os conteúdos
        const contentToShow = document.getElementById(id);
        if (contentToShow) {
            contentToShow.style.display = 'block'; // Exibe o conteúdo específico
        }
    }

    // Adiciona o evento de clique em cada item da navbar
    navItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault(); // Evita a navegação padrão

            // Verifica se o href existe e contém '#'
            const href = this.getAttribute('href');
            if (href && href.includes('#')) {
                // Recupera o id do conteúdo a ser exibido
                const targetId = href.split('#')[1];

                // Chama a função para exibir o conteúdo correspondente
                showContentById(targetId);
            } else {
                console.error('Link inválido ou sem ID no href.');
            }
        });
    });

    // Oculta todos os conteúdos ao carregar a página, exceto o "introduction"
    hideAllContents();
        const introductionItem = document.querySelector('a[href$="#introduction"]');
        if (introductionItem) {
            const introductionId = introductionItem.getAttribute('href').split('#')[1];
            showContentById(introductionId); // Exibe o conteúdo de "introduction" ao carregar a página
        }
    });
</script>