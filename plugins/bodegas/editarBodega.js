$(function() {
    console.log("En la vista editar bodega!");
    $('#bodega').validate({
        rules: {
            bodega: {
                required: true
            },
            inventario: {
                required: true,
                number: true
            }
        },
        messages: {
            bodega: {
                required: "Por favor debe ingresar un nombre para la bodega.",
            },
            inventario: {
                required: "Por favor debe ingresar un valor.",
                number: "Solo puede ingresar numero"

            }
        },
        errorElement: 'span',
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "procesarEdicionBodega.php",
                data: "bodega=" + escape($("#nombreBodega").val()) + "&inventario=" + escape($('#inventario').val()) + "&idBodega=" + escape($('#idBodega').val()),
                success: function(response) {
                    console.log(response);
                    Swal.fire(
                            'Edicion completada',
                            'Por favor presione OK para continuar.',
                            'success'
                        )
                        //document.getElementById("bodega").reset();*/

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