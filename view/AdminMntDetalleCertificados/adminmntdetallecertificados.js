var usuario_id = $('#usuario_id').val();

function init() {

}

$(document).ready(function () {
    $('#curso_id').select2();
    combo_cursos();
    $('#curso_id').on('change', function(){
        $('#curso_id option:selected').each(function(){
            curso_id = $(this).val();
            $('#tbl_cursos_usuario').DataTable({
                "aProcessing": true,
                "aServerSide": true,
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                ],
                "ajax": {
                    url: "../../controller/UsuarioController.php?opcion=listar_cursos_usuario",
                    type: "post",
                    data:{curso_id : curso_id}
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
    });
});

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

function combo_cursos() {

    // Mandamos a llamar el listado de Categorias para insertarlo en el combobox
    $.post("../../controller/CursoController.php?opcion=combobox_cursos", function (data) {
        $('#curso_id').html(data);
    });

}


function certificado(curso_id) {
    console.log(curso_id);
    window.open('../documents/index.php?Idcurso='+curso_id +'','_blank');
}



function delete_curso_usuario(curso_id) {
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



            $.post("../../controller/CursoController.php?opcion=delete_curso_usuario", { curso_id: curso_id }, function (data) {
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






init();