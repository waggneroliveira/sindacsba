//Deletar item
$('.btSubmitDeleteItem').on('click', function (e) {
    e.preventDefault()
    var $this = $(this)
    Swal.fire({
        title: `${responseAreYouSure}`,
        text: `${responseTextSweetAlert}`,
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: `${responseConfirmAction}`,
        cancelButtonText: `${responseCancelAction}`,
        confirmButtonClass: "btn btn-success mt-2",
        cancelButtonClass: "btn btn-danger ms-2 mt-2",
        buttonsStyling: !1,
    }).then(function (e) {
        if (e.value) {

            window.onload = function() {
                Swal.fire({
                    title: `${responseDeleted}`,
                    text: `${responseItemDelete}`,
                    icon: "success",
                    showConfirmButton: false
                });
            };
            
            setTimeout(() => {
                $this.parents('form').submit()
            }, 1000);
        }
    });
})

// Função para mostrar a mensagem de sucesso com efeito suave
function showSuccessMessage() {
    var successMessage = document.getElementById('successMessage');
    if (successMessage) {
        successMessage.style.opacity = '1';
        successMessage.style.transition = 'opacity 0.5s ease';
        setTimeout(function () {
            successMessage.style.opacity = '0';
        }, 3000); // 3 segundos
    }
}

// Chamar a função de exibição da mensagem de sucesso quando a página carregar
window.onload = function () {
    showSuccessMessage();
};

$.each($('.modal'), function (i, value) {
    if ($(this).find('.modal').length) {
        $(this).find('.modal').appendTo("body");
        // $(this).find('.modal').remove()
    }
})

const channelSelect = document.querySelectorAll('.channel-select');

if (channelSelect) {

    channelSelect.forEach((el) => {
        const containerChannels = el.parentNode.querySelector('.channels');

        el.addEventListener('change', ev => {
            const channelSelectedValue = ev.target.value;
            const channelSelectedOption = ev.target.querySelector(`option[value="${channelSelectedValue}"]`).innerText;

            if (!containerChannels.querySelector(`[value="${channelSelectedValue}"]`)) {
                containerChannels.innerHTML += ` <label class="btn btn-light btn-xs waves-effect waves-light">${channelSelectedOption} <i class="mdi mdi-close" onclick="deleteChannelHandler(event)"></i>
                 <input type="hidden" value='${channelSelectedValue}' name="channels_id[]" required></label>`
            }
        });
    })
}

function deleteChannelHandler(event) {
    event.target.parentNode.parentNode.removeChild(event.target.parentNode);
}

const userSelect = document.querySelectorAll('.user-select');

if (userSelect) {

    userSelect.forEach((el) => {
        const containerusers = el.parentNode.querySelector('.users');

        el.addEventListener('change', ev => {
            const userSelectedValue = ev.target.value;
            const userSelectedOption = ev.target.querySelector(`option[value="${userSelectedValue}"]`).innerText;

            if (!containerusers.querySelector(`[value="${userSelectedValue}"]`)) {
                containerusers.innerHTML += ` <label class="btn btn-light btn-xs waves-effect waves-light">${userSelectedOption} <i class="mdi mdi-close" onclick="deleteUserHandler(event)"></i>
                 <input type="hidden" value='${userSelectedValue}' name="users_id[]"></label>`
            }
        });
    })
}

function deleteUserHandler(event) {
    event.target.parentNode.parentNode.removeChild(event.target.parentNode);
}

//Ckeditor em multiplos modais
document.addEventListener('DOMContentLoaded', function() {
    // Selecionar todos os modais
    document.querySelectorAll('.modal').forEach(modal => {
        // Inicializar o CKEditor quando o modal for mostrado
        modal.addEventListener('shown.bs.modal', function() {
            // Encontrar o textarea dentro do modal
            const textarea = modal.querySelector('textarea');
            if (textarea && !CKEDITOR.instances[textarea.id]) {
                CKEDITOR.replace(textarea.id, {
                    allowedContent: false,
                    toolbar: [
                        { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'] },
                        { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                        { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
                        { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
                        { name: 'colors', items: ['TextColor', 'BGColor'] },
                        { name: 'tools', items: ['Maximize'] }
                    ],
                    height: 260,
                });
            }
        });
    });
});

$("body").on("click", ".dropify-clear", function () {
    var nameInput = $(this).parent().find("input:first").attr("name");
    $(this).parent().find(`input[name=delete_${nameInput}]`).remove();
    $(this)
        .parent()
        .find(`.preview-image`)
        .css("background-image", "url()");
    $(this).parent().find(`.content-area-image-crop`).show();
    $(this)
        .parent()
        .append(
            `<input type="hidden" name="delete_${nameInput}" value="${nameInput}" />`
        );
});

$('.table-sortable tbody').sortable({
    handle: '.btnDrag'
}).on('sortupdate', function(e, ui) {

    var arrId = []
    $(this).find('tr').each(function() {
        var id = $(this).data('code')
        arrId.push(id)
    });

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: $(this).data('route'),        
        data: { arrId: arrId },

        success: function(data) {
            if (data.status) {
                Swal.fire({
                    title: `${responseSuccessName}`,
                    text: `${responseItemOrderSuccess}`,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            } else {
                Swal.fire({
                    title: `${responseItemErrorName}`,
                    text: `${responseItemOrderError}`,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        },
        error: function() {
            Swal.fire({
                title: `${responseItemErrorName}`,
                text: `${responseItemOrderError}`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});


$('input[name=btnSelectItem]').on('click', function() {
    var btnDelete = $(this).closest('table').find('input[name=btnSelectAll]').val();
    var $table = $(this).closest('table'); // Referência da tabela

    if (!$table.find('.btnSelectItem:checked').length) {
        $(`.${btnDelete}`).fadeOut('fast');
        $('.btSubmitDelete').hide(); // Esconder o botão de deletar se nenhum item estiver selecionado
    } else if ($table.find('.btnSelectItem:checked').length > 1) {
        $table.find('input[name=btnSelectAll]').prop('checked', true);
        $(`.${btnDelete}`).fadeIn('fast');
        $('.btSubmitDelete').show(); // Mostrar o botão de deletar
    } else {
        $table.find('input[name=btnSelectAll]').prop('checked', false);
        $('.btSubmitDelete').hide(); // Esconder o botão de deletar se apenas um item estiver selecionado
    }
});

$('input[name=btnSelectAll]').on('click', function() {
    var btnDelete = $(this).val();
    var $table = $(this).closest('table'); // Referência da tabela
    var $btnSubmitDelete = $('.btSubmitDelete'); // Seletor para o botão de deletar (para ambos os casos)

    if ($table.find('.btnSelectItem:checked').length === $table.find('.btnSelectItem').length) {
        $(`.${btnDelete}`).fadeOut('fast');
        $btnSubmitDelete.hide(); // Esconder o botão de deletar
    } else {
        $table.find('input[name=btnSelectAll]').prop('checked', true);
        $(`.${btnDelete}`).fadeIn('fast');
        $btnSubmitDelete.show(); // Mostrar o botão de deletar
    }

    // Marcar todos os itens com base na seleção
    var checked = $(this).is(':checked');
    $table.find('.btnSelectItem').each(function() {
        $(this).prop("checked", checked);
    });
});

$('.btConfirmDelete, #btSubmitDelete').on('click', function() {
    var $this = $(this),
        val = [];

    $('.btnSelectItem:checked').each(function() {
        val.push($(this).val());
    });

    Swal.fire({
        title: `${responseAreYouSure}`,
        text: `${responseTextSweetAlert}`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: `${responseConfirmAction}`,
        cancelButtonText: `${responseCancelAction}`,
        confirmButtonClass: "btn btn-success mt-2",
        cancelButtonClass: "btn btn-danger ms-2 mt-2",
        buttonsStyling: false,
    }).then(function(e) {
        if (e.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: $this.data('route'), // URL para deleção
                data: { deleteAll: val }, // Dados a serem enviados
                dataType: 'JSON',
                success: function(response) {
                    switch (response.status) {
                        case 'success':
                            Swal.fire({ title: `${responseDeleted}`, text: response.message, icon: "success", showConfirmButton: false });
                            setTimeout(() => {
                                window.location.href = window.location.href; // Atualiza a página
                            }, 1000);
                            break;
                        default:
                            Swal.fire({ title: "Erro!", text: response.message, icon: "error", confirmButtonColor: "#4a4fea" });
                            break;
                    }
                }
            });
        }
    });
});

$("#settingTheme input[type=radio]").on("click", function () {
    setTimeout(() => {
        var formData = new FormData(),
            route = $(this).parents("form").attr("action");

        formData.append(
            "user_id",
            $(this).parents("form").find("[name=user_id]").val()
        );
        formData.append(
            "data_bs_theme",
            $(this).parents("form").find("[name=data-bs-theme]:checked").val()
        );
        formData.append(
            "data_layout_width",
            $(this).parents("form").find("[name=data-layout-width]:checked").val()
        );
        formData.append(
            "data_layout_mode",
            $(this).parents("form").find("[name=data-layout-mode]:checked").val()
        );
        formData.append(
            "data_topbar_color",
            $(this).parents("form").find("[name=data-topbar-color]:checked").val()
        );
        formData.append(
            "data_menu_color",
            $(this).parents("form").find("[name=data-menu-color]:checked").val()
        );
        formData.append(
            "data_two_column_color",
            $(this).parents("form").find("[name=data-two-column-color]:checked").val()
        );
        formData.append(
            "data_menu_icon",
            $(this).parents("form").find("[name=data-menu-icon]:checked").val()
        );
        formData.append(
            "data_sidenav_size",
            $(this).parents("form").find("[name=data-sidenav-size]:checked").val()
        );

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: route,
            data: formData,
            processData: false,
            contentType: false,
        });
        console.log(route);
    }, 800);
});

//Atualizar thema no click do icno superio do painel
$("#light-dark-mode").on("click", function() {
    var form = $(this).find("form");
    var currentTheme = form.find('input[name="data-bs-theme"]').val();
    // Alterna entre "light" e "dark"
    var newTheme = (currentTheme === 'light') ? 'dark' : 'light';

    form.find('input[name="data-bs-theme"]').val(newTheme); // Atualiza o valor do input

    // Pega o ID do usuário autenticado
    var userId = form.find('input[name="user_id"]').val();
    var formData = new FormData(form[0]);

    formData.set('user_id', userId);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: form.attr("action"),
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            if (data.status) {
                console.log(`${responseItemThemeSuccess}`);
                // location.reload();
            } else {
                console.log(`${responseItemThemeError}`);
            }
        },
        error: function(xhr, status, error) {
            console.error(`${responseItemThemeError}`+":", error);
        }
    });
});


$(document).ready(function() {
    // Aguarde até que as configurações sejam definidas corretamente
    if (userThemeSettings) {
        document.documentElement.setAttribute('data-bs-theme', userThemeSettings.data_bs_theme);
        document.documentElement.setAttribute('data-layout-width', userThemeSettings.data_layout_width);
        document.documentElement.setAttribute('data-layout-mode', userThemeSettings.data_layout_mode);
        document.documentElement.setAttribute('data-two-column-color', userThemeSettings.data_two_column_color);
        document.documentElement.setAttribute('data-menu-icon', userThemeSettings.data_menu_icon);
        document.documentElement.setAttribute('data-sidenav-size', userThemeSettings.data_sidenav_size);
        setTimeout(function() {
            document.documentElement.setAttribute('data-topbar-color', userThemeSettings.data_topbar_color);
            document.documentElement.setAttribute('data-menu-color', userThemeSettings.data_menu_color);
        }, 500);
    }
});

//Remover notificacao
function marcarComoLida(notificacaoId) {
    fetch(`/painel/auditorias/${notificacaoId}/mark-as-read`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        }
        throw new Error('Network response was not ok.');
    })
    .then(data => {
        if (data.status === 'success') {
            // Remover a notificação do DOM
            const notificacaoElement = document.getElementById(`notificacao-${notificacaoId}`);
            if (notificacaoElement) {
                notificacaoElement.remove();

                // Atualizar o contador de notificações
                const badge = document.querySelector('.noti-icon-badge');
                let currentCount = parseInt(badge.innerText);
                badge.innerText = currentCount > 0 ? currentCount - 1 : 0; // Decrementa o contador
            }
        }
    })
    .catch(error => console.error('Erro:', error));
}

//Remover todas as notificaç~eos de um vez 
if (document.getElementById('clear-all-notifications')) {
    document.getElementById('clear-all-notifications').addEventListener('click', function() {
        Swal.fire({
            title: 'Você tem certeza?',
            text: "Deseja marcar todas as notificações como lidas?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, marcar como lidas!',
            cancelButtonText: 'Não, cancelar!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('/painel/auditorias/mark-all-as-read', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    }
                    throw new Error('Network response was not ok.');
                })
                .then(data => {
                    if (data.status === 'success') {
                        // Remover a classe de notificação não lida de todas as notificações
                        const notificationList = document.querySelectorAll('.notify-item'); // Supondo que suas notificações tenham a classe notify-item
                        notificationList.forEach(notification => {
                            notification.classList.remove('unread-noti'); // Altere conforme a classe que indica notificação não lida
                        });
    
                        // Atualizar o contador de notificações
                        const badge = document.querySelector('.noti-icon-badge');
                        badge.innerText = "0"; // Atualiza para zero
    
                        // Mostrar mensagem de sucesso
                        Swal.fire(
                            'Marcou como lidas!',
                            'Todas as notificações foram marcadas como lidas.',
                            'success'
                        );
    
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
    
                    }
                })
                .catch(error => console.error('Erro:', error));
            }
        });
    });
}

$("#testSmtp").on("click", function (event) {
    event.preventDefault();
    var action = $(this).attr("href");
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        },
        type: "POST",
        url: action,
        processData: false,
        contentType: false,
        success: function (response) {
            switch (response.status) {
                case "success":
                    $(".detailsTestSmtp").append(
                        `<span class="badge bg-success mt-2">${response.message}</span>`
                    );
                    break;
                case "error":
                    $(".detailsTestSmtp").append(`
                        <span class="badge bg-danger my-2">${response.message}</span>
                        <p><b>${connectionReasonMessage}</b></p>
                        <p>${response.details}</p>
                    `);
                    break;
            }
        },
        error: function (error) {},
    });
});






