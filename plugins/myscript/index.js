$( document ).ready(function() {
    $('#registro').validate({
        rules: {
            usuario: {
                required: true
            },
            email: {
                required: true,
                email: true,
            },
            tipo: {
                required: true
            },
            password: {
                required: true,
                minlength: 5
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
                required: "Debe seleccionar un tipo de usuario"
            }
        },
        errorElement: '',
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "procesarRegistro.php",
                data: "usuario=" + escape($('.usuario').val()) + "&email=" + escape($('.email').val()) + "&password=" + escape($('.password').val()) + "&tipo=" + escape($('.tipo').val()),
                success: function(response) {
                    console.log(response)
                    Swal.fire(
                        'Registro completado',
                        'Por favor presione OK para continuar.!',
                        'success'
                      )
                      $("#usuario").val('');
                      $("#password").val('');
                      $("#email").val('');
                      $("#tipo").val('');
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