$(document).ready(function() {
    console.log("prueba");
    $('#login').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 5
            },
            terms: {
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
            terms: "Please accept our terms"
        },
        errorElement: 'span',
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "procesarLogin.php",
                data: "email=" + escape($('.email').val()) + "&password=" + escape($('.password').val()),
                success: function(msg) {
                    console.log(msg,"esto es lo que devuelvo");
                    if (msg) {
                        location.href = "dashboard.php";
                    } else {
                        $("#alert").html("Usuario no registrado");
                    }


                }
            });
        },
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});