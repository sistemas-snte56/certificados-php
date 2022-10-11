// console.log("Ok");
$(document).ready(function(){
    $('#tbl_cursos').DataTable({
        "aProcessing" : true,
        "aServerSide" : true,
        dom : 'Bfrtip',
        buttons : [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax" : {
            url: "../../controller/UsuarioController.php?opcion=listar_cursos",
            type : "post",
            data : {
                usuario_id : 2
            },
        },
        "bDestroy" : true,
        "responsive" : true,
        "bInfo" : true,
        "iDisplayLength" : 10,
        "order" : [[0, "desc"]],
        "language" : {
            "sProcessing" :     "Procesando...",
            "sLengthMenu" :     "Mostrar _MENU_ registros",
            "sZeroRecords":     "No se encontraron resultados",
            "sEmptyTable" :     "Ningun dato disponible en esta tabla",
            "sInfo"       :     "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty"  :     "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":    "(Filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":     "",
            "sSearch"     :     "Buscar:",
            "sUrl"        :     "",
            "sInfoThousands" :  ",",
            "sLoadingRecords":  "Cargando...",
            "oPaginate" : {
                "sFirst" :  "Primero",
                "sLast"  :  "Último",
                "sNext"  :  "Siguiente",
                "sPrevoius":"Anerior"
            },
            "oAria" : {
                "sSortAscending"    :   ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending"    :   ": Activar para ordenar la columna de manera descendemte"
            }
        },
    });
});

function certificado(ID_DEL_CURSO) {
    window.open('../documents/index.php?Idcurso=' + ID_DEL_CURSO + '', '_blank');
}