var usuario_id = $('#usuario_id').val();

function init() {
    $("#usuario_form").on("submit", function (e) {
        guardar_editar(e);
    });
}

function guardar_editar(e) {
    
    e.preventDefault();
    var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url: '../../controller/InstructorController.php?opcion=guardar_instructor',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {

            $('#modal_nusuario').modal('hide');

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

    // Limpiar el Modal
    $('#modal_nusuario').on('hidden.bs.modal', function (event) {
        const $formulario = $('#modal_nusuario').find('form');
        $formulario[0].reset();
        $("#usuario_genero").val([]).trigger("change");
        $("#usuario_nivel").val([]).trigger("change");
        $("#usuario_region").val([]).trigger("change");
        $("#usuario_delegacion").val([]).trigger("change");
    });
  
    $('#usuario_genero').select2({
        dropdownParent: $('#modal_nusuario')
    });

    $('#usuario_nivel').select2({
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


let delegacion_r01 = ["D-I-18",
    "D-I-39",
    "D-I-44",
    "D-I-51",
    "D-I-52",
    "D-I-71",
    "D-I-72",
    "D-I-87",
    "D-I-90",
    "D-I-91",
    "D-II-1",
    "D-II-18",
    "D-II-35",
    "D-II-37",
    "D-II-50",
    "D-II-59",
    "D-III-17",
    "D-IV-11",
    "D-IV-13",
    "D-IV-22",
    "D-IV-23",
    "D-IV-35",
    "D-IV-37",
    "C.T.7",
];

let delegacion_r02 = ["D-I-9",
    "D-I-19",
    "D-I-35",
    "D-I-38",
    "D-I-57",
    "D-I-80",
    "D-I-94",
    "D-II-20",
    "D-II-22",
    "D-II-53",
    "D-III-13",
    "D-IV-9",
    "D-IV-12",
    "D-IV-36",
    "C.T.8",
]

let delegacion_r03 = ["D-I-4",
    "D-I-21",
    "D-I-24",
    "D-I-26",
    "D-I-40",
    "D-I-46",
    "D-I-67",
    "D-I-69",
    "D-I-83",
    "D-I-85",
    "D-II-7",
    "D-II-19",
    "D-II-25",
    "D-II-33",
    "D-II-41",
    "D-II-47",
    "D-II-49",
    "D-II-54",
    "D-II-57",
    "D-III-12",
    "D-IV-10",
    "D-IV-14",
    "D-IV-15",
    "D-IV-24",
    "D-IV-31",
]

let delegacion_r04 = ["D-I-30",
    "D-I-33",
    "D-I-74",
    "D-I-77",
    "D-I-88",
    "D-I-93",
    "D-II-32",
    "D-II-34",
    "D-II-42",
    "D-II-48",
    "D-III-15",
    "D-IV-8",
    "D-IV-28",
    "C.T.5",
    "C.T.9",
    "C.T.29",
]

let delegacion_r05 = ["D-I-5",
    "D-I-11",
    "D-I-20",
    "D-I-34",
    "D-I-47",
    "D-I-53",
    "D-I-60",
    "D-I-61",
    "D-I-62",
    "D-I-75",
    "D-I-81",
    "D-I-84",
    "D-I-92",
    "D-II-2",
    "D-II-3",
    "D-II-4",
    "D-II-13",
    "D-II-15",
    "D-II-21",
    "D-II-24",
    "D-II-38",
    "D-II-46",
    "D-II-56",
    "D-II-58",
    "D-III-1",
    "D-III-3",
    "D-III-4",
    "D-III-8",
    "D-III-9",
    "D-III-14",
    "D-III-16",
    "D-III-23",
    "D-III-24",
    "D-IV-2",
    "D-IV-17",
    "D-IV-18",
    "C.T.3",
    "C.T.20",
    "C.T.21",
    "C.T.23",
    "C.T.24",
    "C.T.27",
    "C.T.33",
    "C.T.35",
]

let delegacion_r06 = ["D-I-7",
    "D-I-8",
    "D-I-43",
    "D-I-50",
    "D-I-58",
    "D-I-73",
    "D-II-5",
    "D-II-6",
    "D-II-40",
    "D-II-55",
    "D-III-6",
    "D-III-18",
    "D-IV-1",
    "D-IV-5",
    "D-IV-27",
    "D-IV-30",
    "D-IV-33",
    "C.T.6",
    "C.T.10",
    "C.T.11",
    "C.T.15",
    "C.T.17",
    "C.T.22",
    "C.T.31",
    "C.T.32",
    "C.T.37",
    "C.T.38",
]

let delegacion_r07 = ["D-I-14",
    "D-I-16",
    "D-I-22",
    "D-I-23",
    "D-I-36",
    "D-I-42",
    "D-I-64",
    "D-I-66",
    "D-I-76",
    "D-II-9",
    "D-II-31",
    "D-III-11",
    "D-III-21",
    "D-IV-16",
    "C.T.2",
]

let delegacion_r08 = ["D-I-3",
    "D-I-10",
    "D-I-27",
    "D-I-37",
    "D-I-54",
    "D-I-55",
    "D-I-65",
    "D-I-78",
    "D-II-17",
    "D-II-26",
    "D-III-5",
    "D-III-10",
    "D-IV-4",
    "D-IV-7",
    "D-IV-32",
    "C.T.13",
    "C.T.14",
    "C.T.39",
    "C.T.40",
]

let delegacion_r09 = ["D-I-6",
    "D-I-15",
    "D-I-56",
    "D-I-63",
    "D-I-70",
    "D-I-79",
    "D-II-8",
    "D-II-10",
    "D-II-12",
    "D-II-14",
    "D-II-27",
    "D-II-29",
    "D-II-30",
    "D-II-43",
    "D-III-2",
    "D-III-7",
    "D-III-20",
    "D-IV-6",
    "D-IV-21",
    "D-IV-29",
    "D-IV-34",
]

let delegacion_r10 = ["D-I-25",
    "D-I-29",
    "D-I-41",
    "D-I-45",
    "D-I-48",
    "D-I-68",
    "D-I-89",
    "D-II-16",
    "D-II-28",
    "D-II-51",
    "D-III-19",
    "D-IV-3",
    "D-IV-26",
    "C.T.36",
]

let delegacion_r11 = ["D-I-1",
    "D-I-2",
    "D-I-12",
    "D-I-13",
    "D-I-17",
    "D-I-28",
    "D-I-31",
    "D-I-32",
    "D-I-49",
    "D-I-59",
    "D-I-82",
    "D-I-86",
    "D-II-11",
    "D-II-23",
    "D-II-39",
    "D-II-44",
    "D-II-45",
    "D-II-52",
    "D-III-22",
    "D-IV-19",
    "D-IV-20",
    "D-IV-25",
    "C.T.25",
    "C.T.26",
    "C.T.30",
]

let Delegaciones = [
    [],
    delegacion_r01,
    delegacion_r02,
    delegacion_r03,
    delegacion_r04,
    delegacion_r05,
    delegacion_r06,
    delegacion_r07,
    delegacion_r08,
    delegacion_r09,
    delegacion_r10,
    delegacion_r11,
];

function regiones(){

    // Mandamos a llamar el listado de regiones para insertarlo en el combobox
    $.post("../../controller/UsuarioController.php?opcion=cmb_regiones", function (data) {
        $('#usuario_region').html(data);
    });

}


// function cambia_delegacion() {

//     var region
//     region = document.usuario_form.usuario_region[document.usuario_form.usuario_region.selectedIndex].value

    
//     if (region != 0) {
//         //si estaba definido, entonces coloco las opciones de la provincia correspondiente. 
//         //selecciono el array de provincia adecuado 
//         delegaciones = Delegaciones[region]
//         console.log(delegaciones);

//         //calculo el numero de las delegaciones 
//         num_delegaciones = delegaciones.length
//         console.log(num_delegaciones);

//         //marco el número de provincias en el select 
//         document.usuario_form.usuario_delegacion.length = num_delegaciones


//         //para cada provincia del array, la introduzco en el select 
//         for (i = 0; i < num_delegaciones; i++) {
//             document.usuario_form.usuario_delegacion.options[i].value = delegaciones[i]
//             document.usuario_form.usuario_delegacion.options[i].text = delegaciones[i]
//         }

//     } else {
//         //si no había provincia seleccionada, elimino las provincias del select 
//         document.usuario_form.usuario_delegacion.length = 1
//         //coloco un guión en la única opción que he dejado 
//         document.usuario_form.usuario_delegacion.options[0].value = "-"
//         document.usuario_form.usuario_delegacion.options[0].text = "-"
//     }
//     //marco como seleccionada la opción primera de provincia 
//     document.usuario_form.usuario_delegacion.options[0].selected = true
// }






function nuevo_usuario() {
    $("#usuario_id").val('');
    $('#lbl_titulo').html('NUEVO REGISTRO');

    const $formulario = $('#modal_nusuario').find('form');
    $formulario[0].reset();
    
    $("#usuario_genero").val([]).trigger("change");
    $("#usuario_nivel").val([]).trigger("change");
    // $("#usuario_region").val([]).trigger("change");
    // $("#usuario_delegacion").val([]).trigger("change");    
    
    $('#modal_nusuario').modal('show');

}

function editar_instructor(instructor_id) {

    console.log(instructor_id);

    // Mandamos a llamar el listado de Categorias para insertarlo en el combobox
    $.post("../../controller/InstructorController.php?opcion=mostrar_instructor", { instructor_id: instructor_id }, function (data) {
        data = JSON.parse(data);

        // $('#instructor_id').val(data.instructor_id);
        $('#instructor_name').val(data.instructor_name);
        $('#instructor_ap').val(data.instructor_ap);
        $('#instructor_am').val(data.instructor_am);
        $('#instructor_email').val(data.instructor_email);
        $('#usuario_nivel').val(data.usuario_nivel).trigger('change');
        $('#instructor_telefono').val(data.instructor_telefono);

    });

    $('#lbl_titulo').html('ACTUALIZAR REGISTRO');
    $('#modal_nusuario').modal('show');
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