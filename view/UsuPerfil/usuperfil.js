var usuario_id = $('#usuario_id').val();
$(document).ready(function () {
    $.post("../../controller/UsuarioController.php?opcion=mostrar_usuario_x_id", { usuario_id: usuario_id }, function (data) {
        data = JSON.parse(data);
        $('#usuario_name').val(data.usuario_name);
        $('#usuario_ap').val(data.usuario_ap);
        $('#usuario_am').val(data.usuario_am);
        $('#usuario_genero').val(data.usuario_genero).trigger('change');
        $('#usuario_curp').val(data.usuario_curp);
        $('#usuario_rfc').val(data.usuario_rfc);
        $('#usuario_telefono').val(data.usuario_telefono);
        $('#usuario_email').val(data.usuario_email);
        $('#usuario_npersonal').val(data.usuario_npersonal);
        $('#usuario_nivel').val(data.usuario_nivel).trigger('change');
    });
});

$(document).on("click","#btnActualizar", function(){
    $.post("../../controller/UsuarioController.php?opcion=update_perfil", { 
        usuario_id : usuario_id,
        usuario_name : $('#usuario_name').val(),
        usuario_ap : $('#usuario_ap').val(),
        usuario_am : $('#usuario_am').val(),
        usuario_curp : $('#usuario_curp').val(),
        usuario_rfc : $('#usuario_rfc').val(),
        usuario_genero : $('#usuario_genero').val(),
        usuario_telefono : $('#usuario_telefono').val(),
        usuario_email : $('#usuario_email').val(),
        usuario_npersonal : $('#usuario_npersonal').val(),
        usuario_nivel : $('#usuario_nivel').val(),
    }, function(data){

    });
    Swal.fire({
        title: 'Actualizado',
        text: 'La información se actualizo con exito.',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    })    
});