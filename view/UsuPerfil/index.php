<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
        require_once("../../view/html/mainhead.php");
    ?>
    <title>Inicio</title>
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
          <a class="breadcrumb-item" href="index.html">Perfil</a>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Mi Perfil</h4>
        <p class="mg-b-0">Pantalla principal del (Perfil)</p>
      </div>

      <div class="br-pagebody">

        <!-- start you own content here -->

      </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <?php
        require_once("../../view/html/mainfooter.php");
    ?>
  </body>
</html>
