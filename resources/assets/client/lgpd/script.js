// Função para salvar cookies
function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

// Função para ler cookies
function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Função para verificar se o consentimento já foi dado
function checkConsent() {
    const consent = getCookie('lgpdConsent');
    if (!consent) {
        document.getElementById('lgpd-banner').style.display = 'block';
    }
}

// Função para registrar o consentimento com cookies
function giveConsent() {
    setCookie('lgpdConsent', 'accepted', 365); // Salva por 1 ano
    document.getElementById('lgpd-banner').style.display = 'none';
}

// Evento do botão "Aceitar"
document.getElementById('accept-btn').addEventListener('click', giveConsent);

// Verifica o consentimento ao carregar a página
window.onload = checkConsent;