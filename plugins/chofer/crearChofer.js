$(document).ready(function() {
    $('#registroChofer').validate({
        rules: {
            nombre: {
                required: true
            },
            rut: {
                required: true
            },
            email: {
                required: true,
                email: true,
            },
            usuario: {
                required: true
            },
            password: {
                required: true,
                minlength: 5
            },
            tipo: {
                required: true
            },


        },
        messages: {
            email: {
                required: "Por favor debe ingresar un email.",
                email: "Email ingresado es incorrecto, por favor validar email."
            },
            password: {
                required: "Por favor debe ingresar una contraseña.",
                minlength: "La logintud es muy corta, el minimo es 5 caracteres."
            },
            usuario: "Por favor debe ingresar un usuario",
            tipo: {
                required: "Debe seleccionar una bodega"
            },
            nombre: {
                required: "Debe ingresar un nombre de chofer"
            },
            rut: {
                required: "Debe ingresar un rut"
            }
        },
        errorElement: 'span',
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "procesarRegistroChofer.php",
                data: "nombreChofer=" + escape($('.nombre').val()) + "&rut=" + escape($('.rut').val()) + "&usuario=" + escape($('.usuario').val()) + "&password=" + escape($('.password').val()) + "&email=" + escape($('.email').val()) + "&tipo=" + escape($('.tipo').val()),
                success: function(response) {
                    console.log(response);
                    /*Swal.fire(
                        'Registro completado',
                        'Por favor presione OK para continuar.',
                        'success'
                    )*/

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