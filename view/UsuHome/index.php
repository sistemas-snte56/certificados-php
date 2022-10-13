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

                    <div class="pd-30">
                        <h4 class="tx-gray-800 mg-b-5">Página principal</h4>
                        <p class="mg-b-0"></p>
                    </div><!-- d-flex -->                

                    <div class="br-pagebody mg-t-5 pd-x-30">


                        <div class="row row-sm">
                            <div class="col-sm-6 col-xl-3">
                                <div class="bg-teal rounded overflow-hidden">
                                    <div class="pd-25 d-flex align-items-center">
                                        <i class="fa fa-address-card-o tx-60 lh-0 tx-white op-7"></i>
                                        <div class="mg-l-20">
                                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total de Cursos</p>
                                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1" id="total_cursos"></p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-3 -->
                        </div><!-- row -->


                        <div class="card bd-0 shadow-base pd-30 mg-t-20">
                            <div class="d-flex align-items-center justify-content-between mg-b-30">
                                <div>
                                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Resumen total de cursos</h6>
                                <p class="mg-b-0"><i class="fa fa-address-book mg-r-5"></i> Aquí podra visualizar los cursos</p>
                                </div>
                                <a href="" class="btn btn-outline-info btn-oblong tx-11 tx-uppercase tx-mont tx-medium tx-spacing-1 pd-x-30 bd-2">See more</a>
                            </div><!-- d-flex -->

                            <div class="table-wrapper">
                                <table id="tbl_cursos" class="display responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Cursos</th>
                                            <th>Fecha de Inicio</th>
                                            <th>Fecha Final</th>
                                            <th>Instructor</th>
                                            <th>Ver</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cursos</th>
                                            <th>Fecha de Inicio</th>
                                            <th>Fecha Final</th>
                                            <th>Instructor</th>
                                            <th>Ver</th>
                                            
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- table-wrapper -->
                        </div><!-- card -->

                    </div>

                    <!-- Contenido del proyecto  -->

                    <div class="br-pagebody">
                        <!-- start you own content here -->
                    </div><!-- br-pagebody -->

                    <?php require_once '../../view/html/footer-panel.php'; ?>
                </div><!-- br-mainpanel -->
                <!-- ########## END: MAIN PANEL ########## -->
                <?php require_once '../../view/html/mainfooter.php'; ?>
                <script type="text/javascript" src="usuhome.js"></script>
            </body>
        </html>
<?php
    } else {
        header('Location:' . Conectar::ruta() . '../view/404/');
    }
?>


