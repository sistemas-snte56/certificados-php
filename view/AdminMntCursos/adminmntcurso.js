var usuario_id = $('#usuario_id').val();

function init() {
    $("#cursos_form").on("submit", function (e) {
        guardar_editar(e);
    });
}

function guardar_editar(e) {
    e.preventDefault();
    var formData = new FormData($("#cursos_form")[0]);
    $.ajax({
        url: '../../controller/CursoController.php?opcion=guardar_curso',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {

            $('#modal_ncurso').modal('hide');

            Swal.fire({
                title: 'Actualizado',
                text: 'El registro se realizó con exito.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(function () {
                // location.reload();
                $('#tbl_cursos').DataTable().ajax.reload();
            })
        }
    });

}

$(document).ready(function () {

    // Llamamos a la función combo_box
    combo_categoria();

    // Llamamos a la funcion combo_box
    combo_instructor();

    $('#curso_instructor_id').select2({
        dropdownParent: $('#modal_ncurso')
    });


    $('#curso_categoria_id').select2({
        dropdownParent: $('#modal_ncurso')
    });


    $('#tbl_cursos').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax": {
            url: "../../controller/CursoController.php?opcion=listar_curso",
            type: "post"
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 20,
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

function editar_curso(curso_id) {

    // Mandamos a llamar el listado de Categorias para insertarlo en el combobox
    $.post("../../controller/CursoController.php?opcion=mostrar_curso", { curso_id: curso_id }, function (data) {
        data = JSON.parse(data);

        console.log(data);

        $('#curso_id').val(data.curso_id);
        $('#curso_categoria_id').val(data.curso_categoria_id).trigger('change');
        $('#curso_name').val(data.curso_name);
        $('#curso_descripcion').val(data.curso_descripcion);
        $('#curso_fecha_inicial').val(data.curso_fecha_inicial);
        $('#curso_fecha_final').val(data.curso_fecha_final);
        $('#curso_status').val(data.curso_status);
        $('#curso_instructor_id').val(data.curso_instructor_id).trigger('change');

    });

    $('#lbl_titulo').html('ACTUALIZAR REGISTRO');
    $('#modal_ncurso').modal('show');
}


function nuevo_curso() {
    $('#lbl_titulo').html('NUEVO REGISTRO');
    $('#cursos_form')[0].reset();
    combo_categoria();
    combo_instructor();
    $('#modal_ncurso').modal('show');
}


function eliminar_curso(curso_id) {
    console.log(curso_id);
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



            $.post("../../controller/CursoController.php?opcion=eliminar_curso", { curso_id: curso_id }, function (data) {
                $('#tbl_cursos').DataTable().ajax.reload();


                Swal.fire(
                    'Curso eliminado',
                    'La información del curso ha sido eliminada.',
                    'success'
                )


            });

        }
    })
}

function combo_categoria() {

    // Mandamos a llamar el listado de Categorias para insertarlo en el combobox
    $.post("../../controller/CategoriaController.php?opcion=combobox_categorias", function (data) {
        $('#curso_categoria_id').html(data);
    });

}

function combo_instructor() {

    // Mandamos a llamar el listado de Instructores para insertarlo en el combobox
    $.post("../../controller/InstrucorController.php?opcion=combobox_instructores", function (data) {
        $('#curso_instructor_id').html(data);
    });

}
init();