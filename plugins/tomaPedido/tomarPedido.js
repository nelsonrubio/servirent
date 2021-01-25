$(function() {
    $('#registroPedido').validate({
        submitHandler: function(form) {
            if ($("#cantidad").val() > $("#devolucion").val()) {
                Swal.fire(
                    'Fallo actualizacion',
                    'Porque la cantidad es mayor a los cilindro devueltos. Por favor presione OK para continuar.',
                    'error'
                )
            } else {
                $.ajax({
                    type: "POST",
                    url: "actualizarPedido.php",
                    data: "observacion=" + escape($('#observacion').val()) + "&estatus=" + escape($('#estatus').val()) + "&devolucion=" + escape($('#devolucion').val()) + "&idPedido=" + escape($('#idPedido').val()),
                    success: function(response) {
                        console.log(response);
                        Swal.fire(
                            'Registro completado',
                            'Por favor presione OK para continuar.',
                            'success'
                        )

                    }
                });
            }
        },
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

});