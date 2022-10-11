<!DOCTYPE html>
<html lang="es" class="pos-relative">
  <head>
    <?php require_once '../html/mainhead.php'; ?>
    <title>Certificado</title>
  </head>

  <body class="pos-relative">

    <div class="ht-100v d-flex align-items-center justify-content-center">
      <div class="wd-lg-70p wd-xl-50p tx-center pd-x-100">
        <h1 class="tx-100 tx-xs-140 tx-normal tx-inverse tx-roboto mg-b-0">

			<canvas id="myCanvas"  class="img-fluid" alt="imagen"></canvas>
        </h1>
		<br>
        <p class="tx-16 mg-b-30 text-justify" id="DESCRIPCION_DEL_CURSO"></p>
		<div class="form-layout-footer">
			<button class="btn btn-outline-info" id="btnJPG" > <i class="fa fa-send mg-r-10"></i> JPG</button>
            <button class="btn btn-outline-info" id="btnPDF" > <i class="fa fa-send mg-r-10"></i> PDF</button>
		</div>


      </div>

    </div><!-- ht-100v -->

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>

	<?php
		require_once("../../view/html/mainfooter.php");
	?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.2/jspdf.min.js"></script>
    <script type="text/javascript" src="certificado.js"></script>

  </body>
</html>
