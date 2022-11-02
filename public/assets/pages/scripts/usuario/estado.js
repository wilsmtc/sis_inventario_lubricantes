$(document).ready(function () {
    $(".tabla").on('submit', '.form-estado', function (event) {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea realizar esta acción ?',
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form.serialize(), form.attr('action'), 'EstadoUsuario', form);//cuando aceptamos eliminar, la funcion se llamara eliminarPersonal
            }
        });
    });
    function ajaxRequest(data, url, funcion, form = false) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (funcion == 'EstadoUsuario') {
                    if (respuesta.mensaje == "ok") {
                        form.parents('tr').remove();
                        SIS.notificaciones('El registro fue modificado correctamente', 'Sistema de Inventario', 'success');
                    } else {
                        SIS.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Sistema de Inventario', 'error');
                    }
                } else if (funcion == 'verUsuario') {
                    $('#modal-ver-usuario .modal-body').html(respuesta)
                    $('#modal-ver-usuario').modal('show');
                }
            },
            error: function () {
            }
        });
    }
});