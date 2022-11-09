var usuario_id = $('#usuario_id').val();

function init() {
    $("#usuarios_form").on("submit", function (e) {
        guardar_editar(e);
    });
}

function guardar_editar(e) {
    e.preventDefault();
    var formData = new FormData($("#usuarios_form")[0]);
    $.ajax({
        url: '../../controller/UsuarioController.php?opcion=guardar_usuario',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {

            $('#tbl_usuarios').DataTable().ajax.reload();
            $('#modal_nusuario').modal('hide');

            Swal.fire({
                title: 'Correcto...!',
                text: 'El registro se realizó con exito.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            })
        }
    });

}

$(document).ready(function () {


    $('#usuario_genero').select2({
        dropdownParent: $('#modal_nusuario')
    });

    $('#usuario_nivel').select2({
        dropdownParent: $('#modal_nusuario')
    });

    $('#usuario_type').select2({
        dropdownParent: $('#modal_nusuario')
    });

    $('#usuario_region').select2({
        dropdownParent: $('#modal_nusuario')
    });

    $('#usuario_delegacion').select2({
        dropdownParent: $('#modal_nusuario')
    });

    $('#tbl_usuarios').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax": {
            url: "../../controller/UsuarioController.php?opcion=listar_usuario",
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



function editar_usuario(usuario_id) {

    // Mandamos a llamar el listado de usuarios para insertarlo en el combobox
    $.post("../../controller/UsuarioController.php?opcion=mostrar_usuario", { usuario_id: usuario_id }, function (data) {
        console.log(data);
        data = JSON.parse(data);

        $('#usuario_id').val(data.usuario_id);
        $('#usuario_name').val(data.usuario_name);
        $('#usuario_ap').val(data.usuario_ap);
        $('#usuario_am').val(data.usuario_am);
        $('#usuario_genero').val(data.usuario_genero).trigger('change');
        $('#usuario_type').val(data.usuario_rol).trigger('change');
        $('#usuario_telefono').val(data.usuario_telefono);
        $('#usuario_email').val(data.usuario_email);
        $('#usuario_npersonal').val(data.usuario_npersonal);
        $('#usuario_pwd').val(data.usuario_pwd);
        $('#usuario_nivel').val(data.usuario_nivel).trigger('change');

    });

    $('#lbl_titulo').html('ACTUALIZAR REGISTRO');
    $('#modal_nusuario').modal('show');
}


function eliminar_usuario(usuario_id) {    
    Swal.fire({
        title: '¿Eliminar usuario?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, deseo borrarlo'
    }).then((result) => {
        if (result.isConfirmed) {

            $.post("../../controller/UsuarioController.php?opcion=eliminar_usuario", { usuario_id: usuario_id }, function (data) {
                $('#tbl_usuarios').DataTable().ajax.reload();

                Swal.fire(
                    'usuario eliminado',
                    'La información del usuario ha sido eliminada.',
                    'success'
                )

            });

        }
    })
}


function selectRegion(usuario_region) {

    $.post("../../controller/UsuarioController.php?opcion=get_delegaciones", { usuario_region: usuario_region }, function (data) {

        $('#usuario_delegacion').html(data);

    });    
}


function nuevo_usuario() {
    $("#usuario_id").val('');

    $('#usuario_genero').val('').trigger('change');
    $('#usuario_nivel').val('').trigger('change');
    $('#usuario_type').val('').trigger('change');
    $('#usuario_region').val('').trigger('change');
    $('#usuario_delegacion').val('').trigger('change');

    $('#lbl_titulo').html('NUEVO REGISTRO');
    $('#usuarios_form')[0].reset();
    $('#modal_nusuario').modal('show');
}



init();