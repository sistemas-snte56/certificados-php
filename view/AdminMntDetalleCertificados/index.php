<?php
# Aqui llamamos al archivo de conexión
require_once("../../config/conexion.php");
#Si existe variable de sesion muestra el contenido
if (isset($_SESSION["usuario_id"])) {?>
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
                        <a class="breadcrumb-item" href="http://certificados-php.test/view/UsuHome/">Inicio</a>
                        <a class="breadcrumb-item" href="http://certificados-php.test/view/AdminMntDetalleCertificados/">Mantenimiento</a>
                        <span class="breadcrumb-item active">Detalle Certificados</span>
                    </nav>
                </div>
                <div class="pd-30">
                    <h4 class="tx-gray-800 mg-b-5">Mantenimiento de Detalle Certificados</h4>
                    <p class="mg-b-0">Página para mostrar toda la información de los Detalle Certificados.</p>
                </div><!-- d-flex -->                

                <div class="pd-30">

                    <div class="form-layout">
                        <div class="row ">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-control-label"> <strong> CURSO: </strong></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon ion-bookmark tx-16 lh-0 op-6"></i></span>
                                        <select class="form-control select2"  style="color:#868e96; width:100%"  data-placeholder="Selecciona..." name="curso_id" id="curso_id" required tabindex="-1" aria-hidden="true">
                                        </select>
                                    </div>
                                </div>
                            </div><!-- col-5 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">&nbsp</label>
                                    <div class="input-group">
                                        <button class="btn btn-warning" id="nuevo_instructor" onclick="nuevo_instructor()"  data-toggle="modal" ><i class="fa fa-plus"></i> Nuevo Instructor</button>
                                    </div>
                                </div>
                            </div><!-- col-5 -->
                        </div><!-- row -->
                    </div><!-- form-layout -->


                </div><!-- d-flex -->                

                <!-- Contenido del proyecto  -->
                
                <div class="br-pagebody">
                    
                    
                    <div class="card bd-0 shadow-base pd-30 mg-t-20">



                        <div class="table-wrapper">
                            <table id="tbl_cursos_usuario" class="display responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NOMBRE</th>
                                        <th>PRIMER APELLIDO</th>
                                        <th>SEGUNDO APELLIDO</th>
                                        <th>FECHA INICIAL</th>
                                        <th>FECHA FECHA FINAL</th>
                                        <th>EDICIÓN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NOMBRE</th>
                                        <th>PRIMER APELLIDO</th>
                                        <th>SEGUNDO APELLIDO</th>
                                        <th>FECHA INICIAL</th>
                                        <th>FECHA FECHA FINAL</th>
                                        <th>EDICIÓN</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div><!-- br-pagebody -->
                <?php require_once '../../view/html/footer-panel.php'; ?>
            </div><!-- br-mainpanel -->
            <!-- ########## END: MAIN PANEL ########## -->
            <?php require_once 'modalmntdetallecertificados.php'; ?>
            <?php require_once '../../view/html/mainfooter.php'; ?>
            <script type="text/javascript" src="adminmntdetallecertificados.js"></script>
        </body>
    </html>
<?php
} else {
    header('Location:' . Conectar::ruta() . '../view/404/');
}?>
