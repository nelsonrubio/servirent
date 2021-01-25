$(function() {
    console.log("creando cupones");
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
                url: "procesarCupones.php",
                data: "descripcion=" + escape($('.usuario').val()) + "&porcentaje=" + escape($('.rut').val()),
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

function eliminar(id) {
    console.log(id)
        /*$.ajax({
     type: "POST",
     url: "procesarPeticiones.php",
     data: "id=" + escape(id),
     success: function(response) {
         console.log(response)
         Swal.fire(
             'Usuario eliminado correctamete',
             'Por favor presione OK para continuar.!',
             'success'
           );
           setInterval(function(){ alert("Hello"); }, 3000);
     }
 });
 location.reload();*/
}