    <!-- ########## START: LEFT PANEL ########## -->    
    <div class="br-logo">
        <a href="">
            <img src="../../public/img/logo.png" alt="snte">
        </a>
    </div>
    <div class="br-sideleft overflow-y-auto">
		<label class="sidebar-label pd-x-15 mg-t-20">MENÚ PRINCIPAL</label>
		<div class="br-sideleft-menu">


					<a href="../UsuHome/" class="br-menu-link">
						<div class="br-menu-item">
							<i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
							<span class="menu-item-label">Inicio</span>
						</div><!-- menu-item -->
					</a><!-- br-menu-link -->


			<?php
				if ($_SESSION['usuario_rol'] == 1) {
			?>
					<a href="../UsuCurso/" class="br-menu-link">
						<div class="br-menu-item">
							<i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
							<span class="menu-item-label">Mis cursos</span>
						</div><!-- menu-item -->
					</a><!-- br-menu-link -->
					
			<?php
				} else {
			?>

			        <a href="#" class="br-menu-link">
						<div class="br-menu-item">
							<i class="menu-item-icon icon ion-ios-briefcase-outline tx-24"></i>
							<span class="menu-item-label">Mantenimiento</span>
							<i class="menu-item-arrow fa fa-angle-down"></i>
						</div><!-- menu-item -->
					</a><!-- br-menu-link -->
					<ul class="br-menu-sub nav flex-column" style="display: none;">
						<li class="nav-item"><a href="../AdminMntCategorias/" class="nav-link">Categorías</a></li>
						<li class="nav-item"><a href="../AdminMntCursos/" class="nav-link">Cursos</a></li>
						<li class="nav-item"><a href="../AdminMntInstructores/" class="nav-link">Instructores</a></li>
						<li class="nav-item"><a href="../AdminMntUsuarios/" class="nav-link">Usuarios</a></li>
						<li class="nav-item"><a href="../AdminMntDetalleCertificados/" class="nav-link">Certificados</a></li>
					</ul>
			<?php
				}
				
			?>

					<a href="../UsuPerfil/" class="br-menu-link">
					<div class="br-menu-item">
						<i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
						<span class="menu-item-label">Perfil</span>
					</div><!-- menu-item -->
					</a><!-- br-menu-link -->
					<a href="../html/logout.php" class="br-menu-link">
					<div class="br-menu-item">
						<i class="menu-item-icon icon ion-power tx-18"></i>
						<span class="menu-item-label">Cerrar sesion</span>
					</div><!-- menu-item -->
					</a><!-- br-menu-link -->
		</div><!-- br-sideleft-menu -->
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->