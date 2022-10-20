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
                        <a class="breadcrumb-item" href="http://certificados-php.test/view/AdminMntCategorias/">Mantenimiento</a>
                        <span class="breadcrumb-item active">Categorias</span>
                    </nav>
                </div>
                <div class="pd-30">
                    <h4 class="tx-gray-800 mg-b-5">Mantenimiento de Categorias</h4>
                    <p class="mg-b-0">Página para mostrar toda la información de las categorias.</p>
                </div><!-- d-flex -->                
                
                <!-- Contenido del proyecto  -->
                
                <div class="br-pagebody">
                    
                    
                    <div class="card bd-0 shadow-base pd-30 mg-t-20">
                        <div class="d-flex align-items-center justify-content-between mg-b-30">
                            <div class="form-layout-footer">
                                <button class="btn btn-warning" id="nueva_categoria" onclick="nueva_categoria()"  data-toggle="modal" ><i class="fa fa-plus"></i> Nueva Categoría</button>
                            </div>
                        </div><!-- d-flex -->
                        <div class="table-wrapper">
                            <table id="tbl_categorias" class="display responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NOMBRE DE CATEGORÍA</th>
                                        <th>EDICION</th>
                                        <th>BORRAR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NOMBRE DE CATEGORÍA</th>
                                        <th>EDICION</th>
                                        <th>BORRAR</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div><!-- br-pagebody -->
                <?php require_once '../../view/html/footer-panel.php'; ?>
            </div><!-- br-mainpanel -->
            <!-- ########## END: MAIN PANEL ########## -->
            <?php require_once 'modalmntcategorias.php'; ?>
            <?php require_once '../../view/html/mainfooter.php'; ?>
            <script type="text/javascript" src="adminmntcategorias.js"></script>
        </body>
    </html>
<?php
} else {
    header('Location:' . Conectar::ruta() . '../view/404/');
}?>
