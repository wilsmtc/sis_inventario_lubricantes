$(document).ready(function () {
    $(".tabla").on('submit', '.form-eliminar', function () {   //. es clase  #id
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro de eliminar el registro?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form);
            }
        });
    });
    function ajaxRequest(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    form.parents('tr').remove();
                    SIS.notificaciones('El registro fue eliminado correctamente', 'Sistema de Inventario', 'success');
                } else {
                    SIS.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Sistema de Inventario', 'error');
                }
            },
            error: function () {
            }
        });
    }
});