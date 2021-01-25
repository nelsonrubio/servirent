// A $( document ).ready() block.
$(document).ready(function() {
    console.log("ready!");
    $(function() {
        $('#example2').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

});

function eliminar(id) {
    console.log(id)
    $.ajax({
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
            setInterval(function() { alert("Hello"); }, 3000);
        }
    });
    location.reload();
}

function eliminarCupon(id) {
    alert(id);
    console.log(id)
    $.ajax({
        type: "POST",
        url: "eliminarCupon.php",
        data: "id=" + escape(id),
        success: function(response) {
            console.log(response)
            Swal.fire(
                'Cupon eliminado correctamete',
                'Por favor presione OK para continuar.!',
                'success'
            );
        }
    });

}