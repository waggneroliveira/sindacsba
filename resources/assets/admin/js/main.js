//Deletar item
$('.btSubmitDeleteItem').on('click', function (e) {
    e.preventDefault()
    var $this = $(this)
    Swal.fire({
        title: "Tem certeza?",
        text: "Os itens serão deletados permanentemente. Esta ação não poderá ser revertida.",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "Sim, exclua!",
        cancelButtonText: "Não, cancele!",
        confirmButtonClass: "btn btn-success mt-2",
        cancelButtonClass: "btn btn-danger ms-2 mt-2",
        buttonsStyling: !1,
    }).then(function (e) {
        if (e.value) {
            Swal.fire({
                title: "Deletado!",
                text: "Item deletado com sucesso!",
                icon: "success",
                showConfirmButton: false
            })
            setTimeout(() => {
                $this.parents('form').submit()
            }, 1000);
        }
    });
})

//gerar codigo de acesso
$('.geraCodigo').on('click', function (e) {
    e.preventDefault()
    var $this = $(this)
    Swal.fire({
        title: "Tem certeza?",
        text: "Ao gerar um novo código, o mesmo será enviado para o e-mail informado. Deseja continuar?",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "Sim, gerar código!",
        cancelButtonText: "Não, cancele!",
        confirmButtonClass: "btn btn-success mt-2",
        cancelButtonClass: "btn btn-danger ms-2 mt-2",
        buttonsStyling: !1,
    }).then(function (e) {
        if (e.value) {
            Swal.fire({
                title: "Sucesso!",
                text: "Aguarde a verificação do e-mail informado.",
                icon: "success",
                showConfirmButton: false
            })
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
console.log(userSelect);
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
                    toolbar: [
                        { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'] },
                        { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                        { name: 'links', items: ['Link', 'Unlink'] },
                        { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
                        { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
                        { name: 'colors', items: ['TextColor', 'BGColor'] },
                        { name: 'tools', items: ['Maximize'] }
                    ],
                    height: 260
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
    })

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: $(this).data('route'),        
        data: { arrId: arrId },
        // success: function(data) {
        //     if (data.status) {
        //         $.NotificationApp.send("Sucesso!", "Registro ordenado com sucesso!", "bottom-left", "#00000080", "success", '3000');
        //     } else {
        //         $.NotificationApp.send("Erro!", "Ocorreu um erro ao ordenar o registro.", "bottom-left", "#00000080", "error", '10000');
        //     }
        // },
        // error: function() {
        //     $.NotificationApp.send("Erro!", "Ocorreu um erro ao ordenar o registro.", "bottom-left", "#00000080", "error", '10000');
        // }
        success: function(data) {
            if (data.status) {
                console.log("Sucesso! Registro ordenado com sucesso!");
            } else {
                console.log("Erro! Ocorreu um erro ao ordenar o registro.");
            }
        },
        error: function() {
            console.log("Erro! Ocorreu um erro ao ordenar o registro.");
        }
    })
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
        title: "Tem certeza?",
        text: "Os itens serão deletados permanentemente. Esta ação não poderá ser revertida.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sim, exclua!",
        cancelButtonText: "Não, cancele!",
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
                            Swal.fire({ title: "Deletado!", text: response.message, icon: "success", showConfirmButton: false });
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
//Alterar configurações de thema do painel, pela barra lateral
$("#settingTheme input[type=checkbox]").on("click", function () {
    setTimeout(() => {
        var formData = new FormData(),
            route = $(this).parents("form").attr("action");
        formData.append(
            "data_bs_theme",
            $(this)
                .parents("form")
                .find("[name=data-bs-theme]:checked")
                .val()
        );
        formData.append(
            "data_layout_width",
            $(this)
                .parents("form")
                .find("[name=data-layout-width]:checked")
                .val()
        );
        formData.append(
            "data_layout_mode",
            $(this)
                .parents("form")
                .find("[name=data-layout-mode]:checked")
                .val()
        );
        formData.append(
            "data_topbar_color",
            $(this)
                .parents("form")
                .find("[name=data-topbar-color]:checked")
                .val()
        );
        formData.append(
            "data_menu_color",
            $(this)
                .parents("form")
                .find("[name=data-menu-color]:checked")
                .val()
        );
        formData.append(
            "data_two_column_color",
            $(this)
                .parents("form")
                .find("[name=data-two-column-color]:checked")
                .val()
        );
        formData.append(
            "data_menu_icon",
            $(this)
                .parents("form")
                .find("[name=data-menu-icon]:checked")
                .val()
        );
        formData.append(
            "data_sidenav_size",
            $(this)
                .parents("form")
                .find("[name=data-sidenav-size]:checked")
                .val()
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

    // Verifique se o novo valor é realmente definido
    console.log("Novo tema definido:", newTheme);

    var formData = new FormData(form[0]);
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
                console.log("Tema atualizado com sucesso!");
            } else {
                console.log("Erro ao atualizar o tema.");
            }
        },
        error: function(xhr, status, error) {
            console.error("Erro ao atualizar o tema:", error);
        }
    });
});


