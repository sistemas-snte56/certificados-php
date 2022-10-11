<?php

    # Aqui llamamos al archivo de conexión
    require_once("../../config/conexion.php");

    #Si existe variable de sesion muestra el contenido
    if (isset($_SESSION["usuario_id"])) {
?>

        <!DOCTYPE html>
        <html lang="es">
                <head>
                    <?php require_once '../../view/html/mainhead.php'; ?>
                    <title>Sección56|SNTE :: Inicio</title>
                </head>
            <body>
                <?php
                    require_once '../../view/html/left-panel.php';
                    require_once '../../view/html/head-panel.php';
                ?>
                
                <!-- ########## START: MAIN PANEL ########## -->
                <div class="br-mainpanel">
                    <div class="br-pageheader pd-y-15 pd-l-20">
                        <nav class="breadcrumb pd-0 mg-0 tx-12">
                            <a class="breadcrumb-item" href="index.html">Inicio</a>
                        </nav>
                    </div><!-- br-pageheader -->
                    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
                        <h4 class="tx-gray-800 mg-b-5">Inicio</h4>
                        <p class="mg-b-0">Pantalla principal del (home)</p>                        
                    </div>

                    <!-- Contenido del proyecto  -->

                    <div class="br-pagebody">
                    <!-- start you own content here -->
                    </div><!-- br-pagebody -->
                    <?php require_once '../../view/html/footer-panel.php'; ?>
                </div><!-- br-mainpanel -->
                <!-- ########## END: MAIN PANEL ########## -->
                <?php require_once '../../view/html/mainfooter.php'; ?>
            </body>
        </html>
<?php
    } else {
        header('Location:' . Conectar::ruta() . '../view/404/');
    }
?>


