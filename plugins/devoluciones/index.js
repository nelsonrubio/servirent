$(function() {
    console.log("En la vista devolucion!");
    $('#registroCupones').validate({
        rules: {
            descripcion: {
                required: true
            },
            fecha: {
                required: true,
                number: true
            },
            chofer: {
                required: true
            }

        },
        messages: {
            descripcion: {
                required: "Por favor debe ingresar una descripcion",
            },
            precio: {
                required: "Por favor debe ingresar un valor.",
                number: "Solo puede ingresar numero"

            },
            fecha: {
                required: "Debe ingresar una cantidad",
                number: "Solo puede ingresar numero"

            }
        },
        errorElement: 'span',
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "procesarDevolucion.php",
                data: "descripcion=" + escape($(".descripcion").val()) + "&fecha=" + escape($('.fecha').val()) + "&chofer=" + escape($('.chofer').val()) + "&idBodega=" + escape($('#idBodega').val()),
                success: function(response) {
                    console.log(response);
                    Swal.fire(
                        'Registro completado',
                        'Por favor presione OK para continuar.',
                        'success'
                    )
                    document.getElementById("registroCupones").reset();

                }
            });
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