<?php

	# Llamamos a la cadena de conexión
	require_once 'config/conexion.php';

	if (isset($_POST['enviar']) and $_POST['enviar'] == 'si') {
		require_once 'models/Usuario.php';
		
		#Iniciamos la clase usuario 
		$usuario = new Usuario();
		$usuario->login();
	}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Sección56|SNTE :: Certificados</title>

    <!-- vendor css -->
    <link href="public/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="public/lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="public/css/bracket.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

	<form action="" method="post">
		<div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">

			<?php
				
				#Capturando los mensajes de error
				if (isset($_GET['errorlogin'])) {
					switch ($_GET['errorlogin']) {
						case '1':
			?>	
								'<div class="alert alert-danger" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
									<div class="d-flex align-items-center justify-content-start">
										<i class="icon ion-ios-close alert-icon tx-24"></i>
										<span><strong>Erro!</strong> Los datos son incorrectos.</span>
									</div><!-- d-flex -->
								</div>'
			
			<?php	
							break;
						
							case '2':
			?>	
								<div class="alert alert-danger" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
									<div class="d-flex align-items-center justify-content-start">
										<i class="icon ion-ios-close alert-icon tx-24"></i>
										<span><strong>Erro!</strong> Hay campos vacios.</span>
									</div><!-- d-flex -->
								</div>
			<?php	
							break;
					}
				}
			?>


			<div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> SNTE <span class="tx-normal">|</span> Sección 56 <span class="tx-normal">]</span></div>
			<div class="tx-center mg-b-20">Certificados y Diplomas</div>

			<div class="form-group">
				<input type="text" class="form-control" name="txt_email"  id="txt_email" placeholder="Ingresa tu email">
			</div><!-- form-group -->
			<div class="form-group">
				<input type="password" class="form-control" name="txt_password"  id="txt_password" placeholder="Ingresa tu contraseña">
			</div><!-- form-group -->

			<input type="hidden" name="enviar" id="enviar" value="si">
			<button type="submit" class="btn btn-info btn-block">Inicia sesión</button>
		</div><!-- login-wrapper -->
	</form>






    </div><!-- d-flex -->

    <script src="public/lib/jquery/jquery.js"></script>
    <script src="public/lib/popper.js/popper.js"></script>
    <script src="public/lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
