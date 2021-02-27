$(document).ready(function() {
    console.log("Editando articulo");
    $("#fechaCompra").datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#registro').validate({
        rules: {
            nombre: {
                required: true
            },
            marca: {
                required: true,
            },
            modelo: {
                required: true
            },
            serie: {
                required: true,
            },
            precioDia: {
                required: true,
            },
            precioHora: {
                required: true,
            },
            precioSemana: {
                required: true,
            },
            precioMes: {
                required: true,
            },
            fechaCompra: {
                required: true,
            },
            nroFactura: {
                required: true,
            },
            proveedor: {
                required: true,
            },
            codigoEquipo: {
                required: true,
            },
            nota: {
                required: true,
            },

        },
        messages: {
            nombre: {
                required: "Campo requerido."
            },
            marca: {
                required: "Campo requerido."
            },
            modelo: "Por favor debe ingresar un usuario",
            serie: {
                required: "Campo requerido."
            },
            serie: {
                required: "Campo requerido."
            },
            precioDia: {
                required: "Campo requerido."
            },
            precioHora: {
                required: "Campo requerido."
            },
            precioSemana: {
                required: "Campo requerido."
            },
            precioMes: {
                required: "Campo requerido."
            },
            fechaCompra: {
                required: "Campo requerido."
            },
            nroFactura: {
                required: "Campo requerido."
            },
            proveedor: {
                required: "Campo requerido."
            },
            codigoEquipo: {
                required: "Campo requerido."
            },
            nota: {
                required: "Campo requerido."
            },
        },
        errorElement: 'span',
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "procesarEdicionArticulo.php",
                data: "nombre=" + escape($('.nombre').val()) + "&marca=" + escape($('.marca').val()) + "&id=" + escape($('.id').val()) + "&modelo=" + escape($('.modelo').val()) + "&serie=" + escape($('.serie').val()) + "&precioDia=" + escape($('.precioDia').val()) + "&precioHora=" + escape($('.precioHora').val()) + "&precioSemana=" + escape($('.precioSemana').val()) + "&precioMes=" + escape($('.precioMes').val()) + "&fechaCompra=" + escape($('.fechaCompra').val()) + "&nroFactura=" + escape($('.nroFactura').val()) + "&proveedor=" + escape($('.proveedor').val()) + "&codigoEquipo=" + escape($('.codigoEquipo').val()) + "&nota=" + escape($('.nota').val()),
                success: function(response) {
                    console.log(response);
                    Swal.fire(
                        'Registro completado',
                        'Por favor presione OK para continuar.',
                        'success'
                    )
                    $('#usuario').val('');
                    $('#password').val('');
                    $('#email').val('');
                    $('#tipo').val('');
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