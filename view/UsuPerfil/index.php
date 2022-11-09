<?php

    # Aqui llamamos al archivo de conexión
    require_once("../../config/conexion.php");

    #Si existe variable de sesion muestra el contenido
    if (isset($_SESSION["usuario_id"])) {?>



        <!DOCTYPE html>
        <html lang="es">
        <head>
            <?php
                require_once("../../view/html/mainhead.php");
            ?>
            <title>Sección56|SNTE :: Perfil</title>
        </head>

        <body>

            <?php
                require_once("../../view/html/left-panel.php");
                require_once("../../view/html/head-panel.php");
            ?>


            <!-- ########## START: MAIN PANEL ########## -->
            <div class="br-mainpanel">
                <div class="br-pageheader pd-y-15 pd-l-20">


                    <nav class="breadcrumb pd-0 mg-0 tx-12">
                        <a class="breadcrumb-item" href="http://certificados-php.test/view/UsuHome/">Inicio</a>
                        <span class="breadcrumb-item active">Perfil</span>
                    </nav>                    


                </div><!-- br-pageheader -->
                <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
                    <h4 class="tx-gray-800 mg-b-5">Mi Perfil</h4>
                    <p class="mg-b-0">Actualización de Perfil</p>
                </div>

                <div class="br-pagebody">

                    <div class="br-section-wrapper">
                        <!-- start you own content here -->
                        <div class="form-layout form-layout-1">
                            <div class="row mg-b-25">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_name" id="usuario_name" required >
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Apellido Paterno: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_ap" id="usuario_ap" required >
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Apellido Materno: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_am" id="usuario_am" required >
                                    </div>
                                </div><!-- col-4 -->

                                <div class="col-lg-3">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Genero: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" data-placeholder="Selecciona..."  name="usuario_genero" id="usuario_genero" required >
                                            <option label="Selecciona..."></option>
                                            <option value="MUJER">MUJER</option>
                                            <option value="HOMBRE">HOMBRE</option>
                                        </select>
                                    </div>
                                </div><!-- col-3 -->
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">CURP: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_curp" id="usuario_curp" required  >
                                    </div>
                                </div><!-- col-3 -->
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">RFC: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_rfc" id="usuario_rfc" required >
                                    </div>
                                </div><!-- col-3 -->
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Teléfono: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_telefono" id="usuario_telefono" required >
                                    </div>
                                </div><!-- col-12 -->

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <hr class="my-4">
                                    </div>
                                </div><!-- col-12 -->

                                
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Correo electrónico: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_email" id="usuario_email" required >
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Número de personal: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_npersonal" id="usuario_npersonal" required >
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Nivel educativo: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" data-placeholder="Selecciona..."  name="usuario_nivel" id="usuario_nivel" required >
                                            <option value="none" selected disabled hidden>SELECCIONA...</option>
                                            <option value="PREESCOLAR">PREESCOLAR</option> 
                                            <option value="PRIMARIA">PRIMARIA</option> 
                                            <option value="EDUCACIÓN ESPECIAL">EDUCACIÓN ESPECIAL</option>  
                                            <option value="SECUNDARIA">SECUNDARIA</option> 
                                            <option value="EDUCACIÓN FÍSICA">EDUCACIÓN FÍSICA</option>
                                            <option value="NIVELES ESPECIALES">NIVELES ESPECIALES</option>
                                            <option value="TELESECUNDARIAS">TELESECUNDARIAS</option> 
                                            <option value="PAAE">PAAE</option> 
                                            <option value="BACHILLERATO">BACHILLERATO</option> 
                                            <option value="TELEBACHILLERATO">TELEBACHILLERATO</option> 
                                            <option value="NORMALES">NORMALES</option> 
                                            <option value="UPV">UPV</option> 
                                            <option value="PENSIONADOS Y JUBILADOS">PENSIONADOS Y JUBILADOS</option> 
                                        </select>
                                    </div>
                                </div><!-- col-4 -->
                            </div><!-- row -->

                            <div class="form-layout-footer">
                                <button class="btn btn-info" id="btnActualizar">Actualizar</button>
                            </div><!-- form-layout-footer -->
                        </div><!-- form-layout -->
                    </div>

                </div><!-- br-pagebody -->

            </div><!-- br-mainpanel -->
            <!-- ########## END: MAIN PANEL ########## -->

            <?php
                require_once("../../view/html/mainfooter.php");
            ?>
            <script type="text/javascript" src="usuperfil.js"></script>
        </body>
        </html>
<?php
    } else {
        header('Location:' . Conectar::ruta() . '../view/404/');
    }
?>