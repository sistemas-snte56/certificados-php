<?php
    class Curso extends Conectar{

        
        # Inertar curso
        public function insert_curso(
            $curso_categoria_id, 
            $curso_name, 
            $curso_descripcion, 
            $curso_fecha_inicial, 
            $curso_fecha_final, 
            $curso_instructor_id)
        {
          
            $cn = parent::conexion();
            parent::set_names();
            
            # Consulta para mostrar toda la información del curso
            $sql = "INSERT 
                    INTO `tbl_curso` (
                        `curso_id`, 
                        `curso_categoria_id`, 
                        `curso_name`, 
                        `curso_descripcion`, 
                        `curso_fecha_inicial`, 
                        `curso_fecha_final`, 
                        `curso_instructor_id`, 
                        `curso_fecha_cracion`, 
                        `curso_status`) 
                    VALUES (NULL, ?, ?, ?, ?, ?, ?, now(), '1');";

            $stmt = $cn->prepare($sql);
            $stmt -> bindValue (1 , $curso_categoria_id);
            $stmt -> bindValue (2 , $curso_name);
            $stmt -> bindValue (3 , $curso_descripcion);
            $stmt -> bindValue (4 , $curso_fecha_inicial);
            $stmt -> bindValue (5 , $curso_fecha_final);
            $stmt -> bindValue (6 , $curso_instructor_id);
            // $stmt = $cn->prepare($sql);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();
        }

        # Actualiza la información del curso
        public function update_curso(
            $curso_id,
            $curso_categoria_id, 
            $curso_name, 
            $curso_descripcion, 
            $curso_fecha_inicial, 
            $curso_fecha_final, 
            $curso_instructor_id)
        {
        
            $cn = parent::conexion();
            parent::set_names();
            
            # Consulta para mostrar toda la información del curso
            $sql = "UPDATE `tbl_curso`
                    SET 
                        curso_categoria_id = ?, 
                        curso_name = ?, 
                        curso_descripcion = ?, 
                        curso_fecha_inicial = ?, 
                        curso_fecha_final = ?, 
                        curso_instructor_id = ?
                    WHERE 
                        curso_id = ?;
                   ";

            $stmt = $cn->prepare($sql);
            $stmt -> bindValue (1 , $curso_categoria_id);
            $stmt -> bindValue (2 , $curso_name);
            $stmt -> bindValue (3 , $curso_descripcion);
            $stmt -> bindValue (4 , $curso_fecha_inicial);
            $stmt -> bindValue (5 , $curso_fecha_final);
            $stmt -> bindValue (6 , $curso_instructor_id);
            $stmt -> bindValue (7 , $curso_id);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();           
        }

        #Elimina un curso por completo
        public function delete_curso($curso_id){

            $cn = parent::conexion();
            parent::set_names();

            # Consulta para mostrar toda la información del curso
            $sql = "UPDATE `tbl_curso` SET tbl_curso.curso_status = 0 WHERE tbl_curso.curso_id = ?";
            $stmt = $cn->prepare($sql);
            $stmt -> bindValue ( 1, $curso_id);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();
        }

        #Muestra la lista de todos los curso en la página Index Mantenimiento Curso
        public function get_curso(){
            $cn = parent::conexion();
            parent::set_names();

            # Consulta para mostrar toda la información del curso
            // $sql = "SELECT * FROM `tbl_curso` WHERE tbl_curso.curso_status = 1;";
            $sql = "SELECT * FROM `tbl_curso` 
                    INNER JOIN tbl_categoria ON tbl_curso.curso_categoria_id = tbl_categoria.categoria_id
                    INNER JOIN tbl_instructor on tbl_curso.curso_instructor_id = tbl_instructor.instructor_id
                    WHERE `curso_status` = 1";

            $stmt = $cn->prepare($sql);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();
        }

        # Muestra el curso dependiendo del ID principal
        public function get_curso_id ($curso_id){
            $cn = parent::conexion();
            parent::set_names();

            # Consulta para mostrar los cursos solo por ID principal
            $sql = "SELECT * FROM `tbl_curso` WHERE tbl_curso.curso_status = 1 AND tbl_curso.curso_id = ?";
            // $sql = "SELECT * FROM `tbl_curso` 
            //         INNER JOIN tbl_categoria ON tbl_curso.curso_categoria_id = tbl_categoria.categoria_id
            //         WHERE `curso_status` = 1;
            //         AND tbl_curso.curso_id = ?";

            // $sql = "SELECT * FROM `tbl_curso` 
            //         INNER JOIN tbl_categoria ON tbl_curso.curso_categoria_id = tbl_categoria.categoria_id
            //         INNER JOIN tbl_instructor on tbl_curso.curso_instructor_id = tbl_instructor.instructor_id
            //         WHERE `curso_status` = 1
            //         AND tbl_curso.curso_id = ?";

            $stmt = $cn->prepare($sql);
            $stmt -> bindValue ( 1, $curso_id);
            $stmt -> execute();
            return $resultado = $stmt->fetch();
        }

        # Poner en estatus borrado 0 el curso seleccionado
        public function delete_curso_usuario($curso_usuario_id) {
            $cn = parent::conexion();
            parent::set_names();

            # Consulta para mostrar toda la información del curso
            $sql = "UPDATE `tbl_curso_usuario` SET `curso_usuario_status` = '0' WHERE `tbl_curso_usuario`.`curso_usuario_id` = ?;";
            $stmt = $cn->prepare($sql);
            $stmt -> bindValue ( 1, $curso_usuario_id);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();            
        }

    }

?>