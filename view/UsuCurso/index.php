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
			<title>Sección56|SNTE :: Cursos</title>
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
                        <a class="breadcrumb-item" href="index.html">Cursos</a>
                    </nav>
				</div>
				<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
                    <h4 class="tx-gray-800 mg-b-5">Cursos</h4>
                    <!-- <p class="mg-b-0"> </p> -->
				</div>

                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <!-- <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Listados de mis cursos</h6>
                        <p class="mg-b-25 mg-lg-b-50">Desde aquí podras buscar sus cursos por certificados.</p> -->

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
                    </div><!-- br-section-wrapper -->




















                </div><!-- br-pagebody -->

                <?php require_once '../../view/html/footer-panel.php'; ?>

            </div><!-- br-mainpanel -->
			<!-- ########## END: MAIN PANEL ########## -->

                <?php
                    require_once("../../view/html/mainfooter.php");
                ?>

                <script type="text/javascript" src="usucurso.js"></script>

			</body>
		</html>
<?php
    } else {
        header('Location:' . Conectar::ruta() . '../view/404/');
    }
?>