$(function() {
    console.log("creando cilindros");
    $('#registroCupones').validate({
        rules: {
            usuario: {
                required: true,
            },
            rut: {
                required: true,
            },
            descripcion: {
                required: true,
            }

        },
        messages: {
            usuario: "Por favor debe ingresar un tipo de cilindro",
            rut: "Por favor un precio",
            descripcion: "Debe ingresar una descripcion"

        },
        errorElement: 'span',
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "procesarCilindro.php",
                data: "tipoCilindro=" + escape($('.usuario').val()) + "&precio=" + escape($('.rut').val()) + "&decripcion=" + escape($('.descripcion').val()),
                success: function(response) {
                    console.log(response);
                    document.getElementById("registroCupones").reset();
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