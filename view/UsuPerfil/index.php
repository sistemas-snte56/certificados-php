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
                                        <input class="form-control" type="text" name="usuario_name" id="usuario_name" >
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Apellido Paterno: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_ap" id="usuario_ap">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Apellido Materno: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_am" id="usuario_am">
                                    </div>
                                </div><!-- col-4 -->

                                <div class="col-lg-3">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Genero: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" data-placeholder="Selecciona..."  name="usuario_genero" id="usuario_genero">
                                            <option label="Selecciona..."></option>
                                            <option value="Mujer">Mujer</option>
                                            <option value="Hombre">Hombre</option>
                                        </select>
                                    </div>
                                </div><!-- col-3 -->
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">CURP: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_curp" id="usuario_curp" >
                                    </div>
                                </div><!-- col-3 -->
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">RFC: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_rfc" id="usuario_rfc">
                                    </div>
                                </div><!-- col-3 -->
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Teléfono: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_telefono" id="usuario_telefono">
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
                                        <input class="form-control" type="text" name="usuario_email" id="usuario_email">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Número de personal: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario_npersonal" id="usuario_npersonal">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Nivel educativo: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" data-placeholder="Selecciona..."  name="usuario_nivel" id="usuario_nivel">
                                            <option label="Selecciona..."></option>
                                            <option value="Preescolar">Preescolar</option>
                                            <option value="Primaria">Primaria</option>
                                            <option value="Educación Especial">Educación Especial</option>
                                            <option value="Secundaria">Secundaria</option>
                                            <option value="Educación Física">Educación Física</option>
                                            <option value="Niveles Especiales">Niveles Especiales</option>
                                            <option value="Telesecundarias">Telesecundarias</option>
                                            <option value="PAAE">PAAE</option>
                                            <option value="Bachillerato">Bachillerato</option>
                                            <option value="Telebachillerato">Telebachillerato</option>
                                            <option value="Normales">Normales</option>
                                            <option value="UPV">UPV</option>
                                            <option value="Pensionados y Jubilados">Pensionados y Jubilados</option>
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