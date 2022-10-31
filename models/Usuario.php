<?php

    class Usuario extends Conectar {

        # Función para login de acceso a usuario
        public function login(){

            $cn = parent::conexion();
            parent::set_names();

            #Validar si el $_POST enviar viene vacio
            if (isset($_POST["enviar"])) {

                $email = $_POST["txt_email"];
                $pwd =  $_POST["txt_password"];

                if (empty ($email and $pwd)) {

                    #Error en caso de estar vacio correo y contraseña, devolver al index con mensaje = 2
                    header('Location: '. Conectar::ruta() . 'index.php?errorlogin=2');
                    exit;

                } else {

                    #Se prepara consulta SQL
                    $sql = "SELECT * FROM tbl_usuario WHERE usuario_email=? and usuario_pwd=? and usuario_status=1";
                    $stmt = $cn->prepare($sql);
                    $stmt->bindValue(1, $email);
                    $stmt->bindValue(2, $pwd);
                    $stmt->execute();
                    $resultado = $stmt->fetch();

                    #Si el resultado es array y es > 0
                    if (is_array($resultado) and count($resultado)>0){

                        # Creamos unas variables de session
                        $_SESSION["usuario_id"] =$resultado["usuario_id"];
                        $_SESSION["usuario_name"]=$resultado["usuario_name"];
                        $_SESSION["usuario_ap"]=$resultado["usuario_ap"];
                        $_SESSION["usuario_am"]=$resultado["usuario_am"];
                        $_SESSION["usuario_rol"]=$resultado["usuario_rol"];

                        header('Location:'. Conectar::ruta() .'view/Usuhome');
                        exit();

                    } else {
                        #En caso de que no coincidan el usuario o la contraseña
                        header('Location:'. Conectar::ruta() .'index.php?errorlogin=1');
                        exit();
                    }

                }

                return ;

            }

        }

        # Mostrar todos los cursos por usuario
        public function get_cursos_x_usuario($usuario_id){
            $cn = parent::conexion();
            parent::set_names();

            # Preparando la consulta SQL para mostrar los cursos que corresponden a un usuario
            $sql = "SELECT
                tbl_curso_usuario.curso_id AS CURSO_USUARIO,
                tbl_curso.curso_id AS ID_DEL_CURSO,
                tbl_curso.curso_name AS NOMBRE_CURSO,
                tbl_curso.curso_descripcion AS DESCRIPCION,
                tbl_curso.curso_fecha_inicial AS FECHA_INICIAL,
                tbl_curso.curso_fecha_final AS FECHA_FINAL,
                tbl_usuario.usuario_id AS ID_USUARIO,
                tbl_usuario.usuario_name AS NOMBRE_USUARIO,
                tbl_instructor.instructor_name AS NOMBRE_INSTRUCTOR,
                tbl_instructor.instructor_ap AS AP_INSTRUCTOR
                FROM `tbl_curso_usuario`
                INNER JOIN tbl_curso ON tbl_curso_usuario.curso_id = tbl_curso.curso_id
                INNER JOIN tbl_usuario ON tbl_curso_usuario.usuario_id = tbl_usuario.usuario_id
                INNER JOIN tbl_instructor ON tbl_curso.curso_id = tbl_instructor.instructor_id
                WHERE tbl_curso_usuario.usuario_id = $usuario_id;
            ";

            // $sql = $cn->prepare($sql);
            // $sql->bindValue(1, $usuario_id);
            // $sql->execute();
            // return $resultado = $sql->fetchAll();


            $stmt = $cn->prepare($sql);
            $stmt->bindValue(1, $usuario_id);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();

        }

        # Mostrar todos los datos de un curso por su detalle
        public function get_curso_x_idcurso($curso_id){
            $cn = parent::conexion();
            parent::set_names();

            # Preparando la consulta SQL para mostrar los cursos que corresponden a un usuario
                /*    $sql = "SELECT
                        tbl_curso_usuario.curso_usuario_id AS ID_CURSO_USUARIO,
                        tbl_curso_usuario.curso_id AS CURSO_USUARIO,
                        tbl_curso.curso_id AS ID_DEL_CURSO,
                        tbl_curso.curso_name AS NOMBRE_CURSO,
                        tbl_curso.curso_descripcion AS DESCRIPCION,
                        tbl_curso.curso_fecha_inicial AS FECHA_INICIAL,
                        tbl_curso.curso_fecha_final AS FECHA_FINAL,
                        tbl_usuario.usuario_id AS ID_USUARIO,
                        tbl_usuario.usuario_name AS NOMBRE_USUARIO,
                        tbl_instructor.instructor_name AS NOMBRE_INSTRUCTOR,
                        tbl_instructor.instructor_ap AS AP_INSTRUCTOR
                        FROM `tbl_curso_usuario`
                        INNER JOIN tbl_curso ON tbl_curso_usuario.curso_id = tbl_curso.curso_id
                        INNER JOIN tbl_usuario ON tbl_curso_usuario.usuario_id = tbl_usuario.usuario_id
                        INNER JOIN tbl_instructor ON tbl_curso.curso_id = tbl_instructor.instructor_id
                        WHERE tbl_curso_usuario.curso_id = ?;
                    ";
                */

            $sql = "SELECT
                tbl_curso_usuario.curso_usuario_id AS ID_CURSO_USUARIO,
                tbl_curso.curso_id AS ID_DEL_CURSO,
                tbl_curso.curso_name AS NOMBRE_DEL_CURSO,
                tbl_curso.curso_descripcion AS DESCRIPCION_DEL_CURSO,
                tbl_curso.curso_fecha_inicial AS FECHA_INICIAL,
                tbl_curso.curso_fecha_final AS FECHA_FINAL,
                tbl_usuario.usuario_id AS ID_USUARIO,
                tbl_usuario.usuario_name AS NOMBRE_USUARIO,
                tbl_usuario.usuario_ap AS AP_USUARIO,
                tbl_usuario.usuario_ap AS AM_USUARIO,
                tbl_usuario.usuario_folio AS FOLIO_USUARIO,
                tbl_instructor.instructor_name AS NOMBRE_INSTRUCTOR,
                tbl_instructor.instructor_ap AS AP_INSTRUCTOR,
                tbl_instructor.instructor_am AS AM_INSTRUCTOR
                FROM `tbl_curso_usuario`
                INNER JOIN tbl_curso ON tbl_curso_usuario.curso_id = tbl_curso.curso_id
                INNER JOIN tbl_usuario ON tbl_curso_usuario.usuario_id = tbl_usuario.usuario_id
                INNER JOIN tbl_instructor ON tbl_curso.curso_id = tbl_instructor.instructor_id
                WHERE tbl_curso_usuario.curso_usuario_id = ?;
            ";

            $stmt = $cn->prepare($sql);
            $stmt->bindValue(1, $curso_id);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();

        }

        # Contar la cantidad de cursos por usuario
        public function get_total_cursos_x_usuario($usuario_id){
            $cn = parent::conexion();
            parent::set_names();
            $sql = "SELECT COUNT(*) AS TOTAL_CURSOS FROM `tbl_curso_usuario` WHERE usuario_id = ?;";

            $stmt = $cn->prepare($sql);
            $stmt->bindValue(1, $usuario_id);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();

        }

        # Mostrar todos los cursos por usuario
        public function get_cursos_x_usuario_top10($usuario_id){
            $cn = parent::conexion();
            parent::set_names();

            # Preparando la consulta SQL para mostrar todos los cursos que corresponden a un usuario
            $sql = "SELECT
                tbl_curso_usuario.curso_id AS CURSO_USUARIO,
                tbl_curso.curso_id AS ID_DEL_CURSO,
                tbl_curso.curso_name AS NOMBRE_CURSO,
                tbl_curso.curso_descripcion AS DESCRIPCION,
                tbl_curso.curso_fecha_inicial AS FECHA_INICIAL,
                tbl_curso.curso_fecha_final AS FECHA_FINAL,
                tbl_usuario.usuario_id AS ID_USUARIO,
                tbl_usuario.usuario_name AS NOMBRE_USUARIO,
                tbl_instructor.instructor_name AS NOMBRE_INSTRUCTOR,
                tbl_instructor.instructor_ap AS AP_INSTRUCTOR,
                tbl_curso_usuario.curso_usuario_status AS ESTATUS_CURSO
                FROM `tbl_curso_usuario`
                INNER JOIN tbl_curso ON tbl_curso_usuario.curso_id = tbl_curso.curso_id
                INNER JOIN tbl_usuario ON tbl_curso_usuario.usuario_id = tbl_usuario.usuario_id
                INNER JOIN tbl_instructor ON tbl_curso.curso_id = tbl_instructor.instructor_id
                WHERE tbl_curso_usuario.usuario_id = ?
                LIMIT 10;
            ";

            $stmt = $cn->prepare($sql);
            $stmt->bindValue(1, $usuario_id);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();

        }

        # Mostrar toda la información del usuario por su ID
        public function get_usuario_x_id($usuario_id){
            $cn = parent::conexion();
            parent::set_names();

            # Consulta para mostrar toda la información del usuario
            $sql = "SELECT * FROM `tbl_usuario` WHERE usuario_status = 1 AND usuario_id = ?;";

            $stmt = $cn->prepare($sql);
            $stmt->bindValue(1, $usuario_id);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();

        }
  
        # Actualizar información de mi perfil
        public function update_usuario_perfil($usuario_id,
            $usuario_name,
            $usuario_ap,
            $usuario_am,
            $usuario_curp,
            $usuario_rfc,
            $usuario_genero,
            $usuario_telefono,
            $usuario_email,
            $usuario_npersonal,
            $usuario_nivel){

            $cn = parent::conexion();
            parent::set_names();

            # Preparando la consulta SQL para actualizar toda la información del usuario
            $sql = "UPDATE `tbl_usuario` 
                    SET 
                        `usuario_name` = ?, 
                        `usuario_ap` = ?, 
                        `usuario_am` = ?, 
                        `usuario_curp` = ?, 
                        `usuario_rfc` = ?, 
                        `usuario_genero` = ?, 
                        `usuario_telefono` = ?, 
                        `usuario_email` = ?, 
                        `usuario_npersonal` = ?, 
                        `usuario_nivel` = ? 
                    WHERE `tbl_usuario`.`usuario_id` = ?;";

            
            $stmt = $cn->prepare($sql);
            $stmt->bindValue(1, $usuario_name);
            $stmt->bindValue(2, $usuario_ap);
            $stmt->bindValue(3, $usuario_am);
            $stmt->bindValue(4, $usuario_curp);
            $stmt->bindValue(5, $usuario_rfc);
            $stmt->bindValue(6, $usuario_genero);
            $stmt->bindValue(7, $usuario_telefono);
            $stmt->bindValue(8, $usuario_email);
            $stmt->bindValue(9, $usuario_npersonal);
            $stmt->bindValue(10, $usuario_nivel);
            $stmt->bindValue(11, $usuario_id);

            $stmt->execute();
            return $resultado = $stmt->fetchAll();

        }


        # Obtener Regiones de Combobox
        public function get_regiones($region_id){
            $cn = parent::conexion();
            parent::set_names();

            # Preparando la consulta SQL para mostrar los cursos que corresponden a un usuario
            $sql = "SELECT
                    tbl_delegacion.`delegacion_id`AS 'ID',
                    tbl_delegacion.delegacion_name AS 'DELEGACION'
                    # tbl_region.region_name AS 'REGION'
                    FROM `tbl_region_delegacion` 
                    INNER JOIN tbl_delegacion ON tbl_delegacion.delegacion_id = tbl_region_delegacion.region_delegacion_delegacion_id
                    INNER JOIN tbl_region ON tbl_region.region_id = tbl_region_delegacion.region_delegacion_region_id
                    WHERE `region_delegacion_region_id` = ?;
            ";

            // $sql = $cn->prepare($sql);
            // $sql->bindValue(1, $region_id);
            // $sql->execute();
            // return $resultado = $sql->fetchAll();


            $stmt = $cn->prepare($sql);
            $stmt->bindValue(1, $region_id);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();

        }









        /**
         *  CRUD PARA USUARIO
         */

        
        # Inertar nuevo usuario
        public function insert_usuario(
            $usuario_name,
            $usuario_ap,
            $usuario_am,
            $usuario_curp,
            $usuario_rfc,
            $usuario_genero,
            $usuario_rol,
            $usuario_telefono,
            $usuario_email,
            $usuario_npersonal,
            $usuario_pwd,
            $usuario_region,
            $usuario_delegacion,
            $usuario_folio,
            $usuario_tituloConstancia,
            $usuario_observacion){
          
            $cn = parent::conexion();
            parent::set_names();
            
            # Insertar un nuevo Usuario
            $sql = "INSERT 
                    INTO `tbl_usuario` (
                        `usuario_id`,
                        `usuario_name`,
                        `usuario_ap`,
                        `usuario_am`,
                        `usuario_curp`,
                        `usuario_rfc`,
                        `usuario_genero`,
                        `usuario_rol`,
                        `usuario_telefono`,
                        `usuario_email`,
                        `usuario_npersonal`,
                        `usuario_pwd`,
                        `usuario_nivel`,
                        `usuario_region`,
                        `usuario_delegacion`,
                        `usuario_folio`,
                        `usuario_fecha`,
                        `usuario_tituloConstancia`,
                        `usuario_observacion`,
                        `usuario_fechaCracion`,
                        `usuario_status`) 
                    VALUES (NULL, ?, ?, ?, ?, ?, ?,'1',?,?,?,?,?,?,?,?,now(),?,?,now(),'1');";

            $stmt = $cn->prepare($sql);

            $stmt -> bindValue (1, $usuario_name);
            $stmt -> bindValue (2, $usuario_ap);
            $stmt -> bindValue (3, $usuario_am);
            $stmt -> bindValue (4, $usuario_curp);
            $stmt -> bindValue (5, $usuario_rfc);
            $stmt -> bindValue (6, $usuario_genero);
            $stmt -> bindValue (7, $usuario_telefono);
            $stmt -> bindValue (8, $usuario_email);
            $stmt -> bindValue (9, $usuario_npersonal);
            $stmt -> bindValue (10, $usuario_pwd);
            $stmt -> bindValue (11, $usuario_nivel);
            $stmt -> bindValue (12, $usuario_region);
            $stmt -> bindValue (13, $usuario_delegacion);
            $stmt -> bindValue (14, $usuario_folio);
            $stmt -> bindValue (15, $usuario_tituloConstancia);
            $stmt -> bindValue (16, $usuario_observacion);

            $stmt->execute();

            return $resultado = $stmt->fetchAll();

        }

        # Actualiza la información del usuario
        public function update_usuario(
            $usuario_id,
            $usuario_name,
            $usuario_ap,
            $usuario_am,
            $usuario_curp,
            $usuario_rfc,
            $usuario_genero,
            $usuario_rol,
            $usuario_telefono,
            $usuario_email,
            $usuario_npersonal,
            $usuario_pwd,
            $usuario_region,
            $usuario_delegacion,
            $usuario_folio,
            $usuario_tituloConstancia,
            $usuario_observacion){
        
            $cn = parent::conexion();
            parent::set_names();
            
            # Consulta para actualizar toda la información del usuario
            $sql = "UPDATE `tbl_usuario`
                    SET 

                        usuario_name = ?,
                        usuario_ap = ?,
                        usuario_am = ?,
                        usuario_curp = ?,
                        usuario_rfc = ?,
                        usuario_genero = ?,
                        usuario_rol = ?,
                        usuario_telefono = ?,
                        usuario_email = ?,
                        usuario_npersonal = ?,
                        usuario_pwd = ?,
                        usuario_region = ?,
                        usuario_delegacion = ?,
                        usuario_folio = ?,
                        usuario_tituloConstancia = ?,
                        usuario_observacion = ?

                    WHERE 
                        usuario_id = ? 
                    ";

            $stmt -> bindValue (1, $usuario_name);
            $stmt -> bindValue (2, $usuario_ap);
            $stmt -> bindValue (3, $usuario_am);
            $stmt -> bindValue (4, $usuario_curp);
            $stmt -> bindValue (5, $usuario_rfc);
            $stmt -> bindValue (6, $usuario_genero);
            $stmt -> bindValue (7, $usuario_rol);
            $stmt -> bindValue (8, $usuario_telefono);
            $stmt -> bindValue (9, $usuario_email);
            $stmt -> bindValue (10, $usuario_npersonal);
            $stmt -> bindValue (11, $usuario_pwd);
            $stmt -> bindValue (12, $usuario_region);
            $stmt -> bindValue (13, $usuario_delegacion);
            $stmt -> bindValue (14, $usuario_folio);
            $stmt -> bindValue (15, $usuario_tituloConstancia);
            $stmt -> bindValue (16, $usuario_observacion);            
            $stmt -> bindValue (17, $usuario_id);


            $stmt->execute();
            return $resultado = $stmt->fetchAll();           

        }

        #Elimina un Usuario
        public function delete_usuario($usuario_id){

            $cn = parent::conexion();
            parent::set_names();

            # Consulta para mostrar toda la información del usuario
            $sql = "UPDATE `tbl_usuario` SET tbl_usuario.usuario_status = 0 WHERE tbl_usuario.usuario_id = ?";
            $stmt = $cn->prepare($sql);
            $stmt -> bindValue ( 1, $usuario_id);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();
        }

        # Funcion para mostrar la lista de todos los usuarios en la página de mantenimientos de usuarios
        public function get_usuarios(){
            $cn = parent::conexion();
            parent::set_names();

            # Consulta para mostrar toda la información del usuarios
            $sql = "SELECT * FROM `tbl_usuario` WHERE tbl_usuario.usuario_status = 1;";

            $stmt = $cn->prepare($sql);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();
        }         





















    }

?>