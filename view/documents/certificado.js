
const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');

var img = new Image();
img.src = "../../public/certificado.jpg";


$(document).ready(function () {
    
    
    var Idcurso = getUrlParameter("Idcurso");
    
    
    // Imprimir 
    $.post("../../controller/UsuarioController.php?opcion=mostrar_curso_detalle", { Idcurso: Idcurso }, function (data) {
        data = JSON.parse(data);
        $('#DESCRIPCION_DEL_CURSO').html(data.DESCRIPCION_DEL_CURSO);
        
        
        canvas.height = "1480";
        canvas.width = "1920";
        
        // img.onload = function () {
            ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
            ctx.font = "bold 75px sans-serif, Time New Roman";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";
            var x = canvas.width / 2;
            ctx.fillStyle = "#9e1d20";
            ctx.lineWidth = "3";
            ctx.strokeStyle = "#369";
            ctx.fillText(data.NOMBRE_USUARIO + ' ' + data.AP_USUARIO + ' ' + data.AM_USUARIO , x, 657);
            
            ctx.font = "bold 45px arial";
            ctx.fillStyle = "#ef7c2f";
            ctx.fillText(data.NOMBRE_DEL_CURSO, 1110, 818);

            ctx.font = "bold 30px arial";
            ctx.fillStyle = "#FFF";
            ctx.fillText(data.FOLIO_USUARIO, 1120, 1420);

        // }





    });


    
});

$(document).on("click", "#btnJPG", function(){
    let labeljpg = document.createElement('a');
    labeljpg.download = "certificado.jpg";
    labeljpg.href = canvas.toDataURL();
    labeljpg.click();
});

// Download button
$(document).on('click', "#btnPDF", function () {
    let width = canvas.width;
    let height = canvas.height;

    //set the orientation
    if (width > height) {
        pdf = new jsPDF('l', 'px', [width, height]);
    }
    else {
        pdf = new jsPDF('p', 'px', [height, width]);
    }
    //then we get the dimensions from the 'pdf' file itself
    width = pdf.internal.pageSize.getWidth();
    height = pdf.internal.pageSize.getHeight();
    pdf.addImage(canvas, 'PNG', 0, 0, width, height);
    pdf.save("constancia.pdf");
});

var getUrlParameter = function getUrlParameter(Idcurso) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === Idcurso) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};


