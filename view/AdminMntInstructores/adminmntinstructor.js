var usuario_id = $('#usuario_id').val();

function init() {
    $("#instructores_form").on("submit", function (e) {
        guardar_editar(e);
    });
}

function guardar_editar(e) {
    e.preventDefault();
    var formData = new FormData($("#instructores_form")[0]);
    $.ajax({
        url: '../../controller/InstructorController.php?opcion=guardar_instructor',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {

            $('#modal_ninstructor').modal('hide');

            Swal.fire({
                title: 'Actualizado',
                text: 'El registro se realizó con exito.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(function () {
                // location.reload();
                $('#tbl_instructores').DataTable().ajax.reload();
            })
        }
    });

}

$(document).ready(function () {

    $('#instructor_genero').select2({
        dropdownParent: $('#modal_ninstructor')
    });


    $('#tbl_instructores').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax": {
            url: "../../controller/InstructorController.php?opcion=listar_instructor",
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



function nuevo_instructor() {
    $("#instructor_id").val('');
    $('#lbl_titulo').html('NUEVO REGISTRO');
    $('#instructores_form')[0].reset();
    $('#modal_ninstructor').modal('show');
    $('#instructor_genero').val('');
}



function editar_instructor(instructor_id) {

    console.log(instructor_id);

    // Mandamos a llamar el listado de Categorias para insertarlo en el combobox
    $.post("../../controller/InstructorController.php?opcion=mostrar_instructor", { instructor_id: instructor_id }, function (data) {
        data = JSON.parse(data);

        $('#instructor_id').val(data.instructor_id);
        $('#instructor_name').val(data.instructor_name);
        $('#instructor_ap').val(data.instructor_ap);
        $('#instructor_am').val(data.instructor_am);
        $('#instructor_email').val(data.instructor_email);
        $('#instructor_genero').val(data.instructor_genero).trigger('change');
        $('#instructor_telefono').val(data.instructor_telefono);

    });

    $('#lbl_titulo').html('ACTUALIZAR REGISTRO');
    $('#modal_ninstructor').modal('show');
}



function eliminar_instructor(instructor_id) {
    console.log(instructor_id);
    Swal.fire({
        title: '¿Eliminar instructor?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, deseo borrarlo'
    }).then((result) => {
        if (result.isConfirmed) {

            $.post("../../controller/InstructorController.php?opcion=eliminar_instructor", { instructor_id: instructor_id }, function (data) {
                $('#tbl_instructores').DataTable().ajax.reload();

                Swal.fire(
                    'instructor eliminado',
                    'La información del instructor ha sido eliminada.',
                    'success'
                )

            });

        }
    })
}

init();