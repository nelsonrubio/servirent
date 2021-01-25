$(function() {
    console.log("En la vista transferencia inventario");
    $("#inicio").change(function() {
        $.ajax({
            type: "POST",
            url: "obtenerInventarioBodega.php",
            data: "bodega=" + escape($("#inicio").val()),
            success: function(response) {
                document.getElementById("cantidadDisponible").innerHTML = "Cantidad disponible: " + response;
            }
        });
    });
    $('#transferenciaInventario').validate({
        rules: {
            InvetarioInicio: {
                required: true,
                number: true
            },
            inventarioFinal: {
                required: true,
                number: true
            }
        },
        messages: {
            InvetarioInicio: {
                required: "Por favor debe ingresar una cantidad.",
                number: "Solo puede ingresar numero"
            },
            inventarioFinal: {
                required: "Por favor debe ingresar una cantidad.",
                number: "Solo puede ingresar numero"

            }
        },
        errorElement: 'span',
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "procesarTransferencia.php",
                data: "inicio=" + escape($("#inicio").val()) + "&destino=" + escape($('#destino').val()) + "&inventarioInicio=" + escape($('#cantidad').val()) + "&cilindro=" + escape($('#cilindro').val()) + "&empresa=" + escape($('#empresa').val()) + "&tipo=" + escape($('#tipo').val()),
                success: function(response) {
                    console.log(response);
                    if (response == 2) {
                        Swal.fire(
                            'La cantidad que está transfiriendo es superior al stock de cilindros',
                            'Por favor presione OK para continuar.',
                            'error'
                        )
                    } else if (response == 3) {
                        Swal.fire(
                            'Transferencia no completada no se puede realizar movimientos de inventario entre las misma bodegas.',
                            'Por favor presione OK para continuar.',
                            'error'
                        )
                    } else {
                        Swal.fire(
                            'Transferencia  completada.',
                            'Por favor presione OK para continuar.',
                            'success'
                        )
                    }
                    document.getElementById("transferenciaInventario").reset();
                    document.getElementById("cantidadDisponible").innerHTML = "Cantidad disponible: 0";


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