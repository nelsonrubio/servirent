$(function() {



    $('#registroPedido').validate({
        rules: {
            usuario: {
                required: true,
            },
            rut: {
                required: true,
            },
            cantidad: {
                required: true,
            }

        },
        messages: {
            usuario: "Por favor debe ingresar un nombre",
            rut: "Por favor debe ingresar un rut",
            cantidad: "Debe seleccionar una cantidad",


        },
        errorElement: 'span',
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "procesarPedido.php",
                data: "usuario=" + escape($('.usuario').val()) + "&rut=" + escape($('.rut').val()) + "&cantidad=" + escape($('.cantidad').val()) + "&cilindro=" + escape($('.cilindro').val()) + "&bodega=" + escape($('.bodega').val()) + "&chofer=" + escape($('.chofer').val()) + "&redcompra=" + document.querySelector('#redcompra').checked + "&efectivo=" + document.querySelector('#efectivo').checked + "&transferencia=" + document.querySelector('#transferencia').checked + "&otros=" + document.querySelector('#otros').checked + "&observaciones=" + escape($('.observaciones').val()) + "&direccion=" + escape($('.direccion').val()),
                success: function(response) {
                    console.log(response);
                    Swal.fire(
                        'Registro completado',
                        'Por favor presione OK para continuar.',
                        'success'
                    )

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