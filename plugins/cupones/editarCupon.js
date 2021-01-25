$(function() {
    console.log("editando cupones");
    $('#registroCupones').validate({
        rules: {
            usuario: {
                required: true,
            },
            rut: {
                required: true,
            }

        },
        messages: {
            usuario: "Por favor debe ingresar una descripcion",
            rut: "Por favor un porcentaje",

        },
        errorElement: 'span',
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "procesarEdicionCupon.php",
                data: "descripcion=" + escape($('.usuario').val()) + "&porcentaje=" + escape($('.rut').val()) + "&id=" + escape($('#id').val()),
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