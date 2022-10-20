var usuario_id = $('#usuario_id').val();

function init() {
    $("#categorias_form").on("submit", function (e) {
        guardar_editar(e);
    });
}

function guardar_editar(e) {
    e.preventDefault();
    var formData = new FormData($("#categorias_form")[0]);
    $.ajax({
        url: '../../controller/CategoriaController.php?opcion=guardar_categoria',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {

            $('#modal_ncategorias').modal('hide');
            Swal.fire({
                title: 'Actualizado',
                text: 'El registro se realizó con exito.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(function () {
                // location.reload();
                $('#tbl_categorias').DataTable().ajax.reload();
            })
        }
    });

}

$(document).ready(function () {

    $('#tbl_categorias').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax": {
            url: "../../controller/CategoriaController.php?opcion=listar_categorias",
            type: "post"
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningun dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(Filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevoius": "Anerior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendemte"
            }
        },
    });

});


function nueva_categoria() {
    $('#lbl_titulo').html('NUEVO REGISTRO');
    $('#categorias_form')[0].reset();
    $('#modal_ncategorias').modal('show');
}

function editar_categoria(categoria_id) {

    console.log('Bonton editar - ID: ' + categoria_id);

    // Solicitamos al controlador mandar la información de la categoría seleccionada
    $.post("../../controller/CategoriaController.php?opcion=mostrar_categoria", { categoria_id: categoria_id }, function (data) {
        data = JSON.parse(data);

        $('#categoria_id').val(data.categoria_id);
        $('#categoria_nombre').val(data.categoria_nombre);

    });

    $('#lbl_titulo').html('ACTUALIZAR REGISTRO');
    $('#modal_ncategorias').modal('show');
}

function eliminar_categoria(categoria_id) {
    Swal.fire({
        title: '¿Eliminar curso?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, deseo borrarlo'
    }).then((result) => {
        if (result.isConfirmed) {

            $.post("../../controller/CategoriaController.php?opcion=eliminar_categoria", { categoria_id: categoria_id }, function (data) {
                $('#tbl_categorias').DataTable().ajax.reload();

                Swal.fire(
                    'categoria eliminado',
                    'La información del categoria ha sido eliminada.',
                    'success'
                )

            });

        }
    })
}

init();