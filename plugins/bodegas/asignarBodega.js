$(function() {
    console.log("En la vista asignar bodega!");
    $('#asignacionBodega').validate({
        rules: {
            bodega: {
                required: true
            }
        },
        messages: {
            bodega: {
                required: "Por favor debe ingresar un nombre para la bodega.",
            }
        },
        errorElement: 'span',
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "procesarAsignacion.php",
                data: "bodega=" + escape($("#bodega").val()) + "&chofer=" + escape($('#chofer').val()),
                success: function(response) {
                    console.log(response);
                    /* Swal.fire(
                         'Registro completado',
                         'Por favor presione OK para continuar.',
                         'success'
                     )
                     document.getElementById("bodega").reset();*/

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