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



    }

?>