$(document).ready(function () {
    if ($("#loading-indicator")) {
        $("#loading-indicator").fadeIn("fast"); 
    
        let minimumLoadTimePassed = false;
    
        setTimeout(function () {
            minimumLoadTimePassed = true;

            if (window.pageFullyLoaded) {
                $("#loading-indicator").fadeOut("slow");
            }
        }, 2000); 
    }
});

$(window).on('load', function () {
    window.pageFullyLoaded = true; 

    // Define um valor padrão para minimumLoadTimePassed caso não exista
    if (typeof minimumLoadTimePassed === "undefined") {
        minimumLoadTimePassed = false;
    }

    // Se o tempo mínimo de exibição já passou, oculta o indicador de carregamento
    if (minimumLoadTimePassed) {
        $("#loading-indicator").fadeOut("slow");
    }
});

