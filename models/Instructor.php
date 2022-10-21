<?php
    class Instructor extends Conectar{

        
        # Inertar instructor
        public function insert_instructor(
            $instructor_name,
            $instructor_ap,
            $instructor_am,
            $instructor_email,
            $instructor_genero,
            $instructor_telefono){
          
            $cn = parent::conexion();
            parent::set_names();
            
            # Consulta para mostrar toda la información del instructor
            $sql = "INSERT 
                    INTO `tbl_instructor` (
                        `instructor_id`,
                        `instructor_name`,
                        `instructor_ap`,
                        `instructor_am`,
                        `instructor_email`,
                        `instructor_genero`,
                        `instructor_telefono`,
                        `instructor_creacion`,
                        `instructor_status`) 
                    VALUES (NULL, ?, ?, ?, ?, ?, ?, now(), '1');";

            $stmt = $cn->prepare($sql);

            $stmt -> bindValue (1, $instructor_name);
            $stmt -> bindValue (2, $instructor_ap);
            $stmt -> bindValue (3, $instructor_am);
            $stmt -> bindValue (4, $instructor_email);
            $stmt -> bindValue (5, $instructor_genero);
            $stmt -> bindValue (6, $instructor_telefono);
            // $stmt -> bindValue (7, $instructor_creacion);
            // $stmt -> bindValue (8, $instructor_status);
            $stmt->execute();

            return $resultado = $stmt->fetchAll();

        }

        # Actualiza la información del instructor
        public function update_instructor(
            $instructor_id,
            $instructor_name,
            $instructor_ap,
            $instructor_am,
            $instructor_email,
            $instructor_genero,
            $instructor_telefono){
        
            $cn = parent::conexion();
            parent::set_names();
            
            # Consulta para actualizar toda la información del instructor
            $sql = "UPDATE `tbl_instructor`
                    SET 

                        instructor_name = ?,
                        instructor_ap = ?,
                        instructor_am = ?,
                        instructor_email = ?,
                        instructor_genero = ?,
                        instructor_telefono = ?

                    WHERE 
                        instructor_id = ? 
                    ";

            $stmt = $cn->prepare($sql);
            $stmt -> bindValue (1, $instructor_name);
            $stmt -> bindValue (2, $instructor_ap);
            $stmt -> bindValue (3, $instructor_am);
            $stmt -> bindValue (4, $instructor_email);
            $stmt -> bindValue (5, $instructor_genero);
            $stmt -> bindValue (6, $instructor_telefono);
            $stmt -> bindValue (7, $instructor_id);

            $stmt->execute();
            return $resultado = $stmt->fetchAll();           

        }

        #Elimina un instructor por completo
        public function delete_instructor($instructor_id){

            $cn = parent::conexion();
            parent::set_names();

            # Consulta para mostrar toda la información del instructor
            $sql = "UPDATE `tbl_instructor` SET tbl_instructor.instructor_status = 0 WHERE tbl_instructor.instructor_id = ?";
            $stmt = $cn->prepare($sql);
            $stmt -> bindValue ( 1, $instructor_id);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();
        }

        #Muestra la lista de todos los instructor en la página Index Mantenimiento instructor
        public function get_instructores(){
            $cn = parent::conexion();
            parent::set_names();

            # Consulta para mostrar toda la información del instructor
            $sql = "SELECT * FROM `tbl_instructor` WHERE tbl_instructor.instructor_status = 1;";

            $stmt = $cn->prepare($sql);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();
        }

        # Muestra el instructor dependiendo del ID principal
        public function get_instructor_id ($instructor_id){
            $cn = parent::conexion();
            parent::set_names();

            # Consulta para mostrar los instructors solo por ID principal
            $sql = "SELECT * FROM `tbl_instructor` WHERE tbl_instructor.instructor_status = 1 AND tbl_instructor.instructor_id = ?";

            $stmt = $cn->prepare($sql);
            $stmt -> bindValue ( 1, $instructor_id);
            $stmt -> execute();
            return $resultado = $stmt->fetch();
        }

    }

?>