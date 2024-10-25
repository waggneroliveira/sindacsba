$(document).ready(function () {
    $("#loading-indicator").fadeIn("fast"); // Mostra o indicador quando o DOM está pronto

    // Variável para controlar se o carregamento mínimo de 5 segundos foi concluído
    let minimumLoadTimePassed = false;

    // Garante que o indicador de carregamento seja exibido por pelo menos 5 segundos
    setTimeout(function () {
        minimumLoadTimePassed = true;

        // Se a página já tiver sido completamente carregada, oculta o indicador
        if (window.pageFullyLoaded) {
            $("#loading-indicator").fadeOut("slow");
        }
    }, 3000); // 5 segundos de tempo mínimo
});

// Quando a página e todos os recursos forem carregados
$(window).on('load', function () {
    window.pageFullyLoaded = true; // Marca que a página foi carregada completamente

    // Se o tempo mínimo de exibição já passou, oculta o indicador de carregamento
    if (minimumLoadTimePassed) {
        $("#loading-indicator").fadeOut("slow");
    }
});
