<?php
    class Categoria extends Conectar{
        
        # Inertar curso
        public function insert_categoria($categoria_nombre){
          
            $cn = parent::conexion();
            parent::set_names();
            
            # Consulta para insertar un nuevo registro a la tabla categoria 
            $sql = "INSERT INTO `tbl_categoria` (`categoria_id`, `categoria_nombre`, `categoria_fecha`, `categoria_status`) VALUES (NULL, ?, now(), '1');";

            $stmt = $cn->prepare($sql);
            $stmt -> bindValue (1, $categoria_nombre);

            $stmt->execute();
            return $resultado = $stmt->fetchAll();
        }

        # Actualiza la información de la categoria 
        public function update_categoria($categoria_id,$categoria_nombre) {
        
            $cn = parent::conexion();
            parent::set_names();
            
            # Consulta para actualizar los datos del registro de la tabla categoria
            $sql = "UPDATE `tbl_categoria` SET categoria_nombre = ? WHERE categoria_id = ?;
";

            $stmt = $cn->prepare($sql);
            $stmt -> bindValue (1, $categoria_nombre);
            $stmt -> bindValue (2, $categoria_id);
            $stmt->execute();

            return $resultado = $stmt->fetchAll();           
        }

        #Elimina una categoría
        public function delete_categoria($categoria_id){

            $cn = parent::conexion();
            parent::set_names();

            # Consulta para mostrar toda la información de la categoria
            $sql = "UPDATE `tbl_categoria` SET tbl_categoria.categoria_status = 0 WHERE tbl_categoria.categoria_id = ?";
            $stmt = $cn->prepare($sql);
            $stmt -> bindValue ( 1, $categoria_id);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();
        }

        #Muestra la lista de todas las categorías en la página Index Mantenimiento Categiría
        public function get_categorias(){
            $cn = parent::conexion();
            parent::set_names();

            # Consulta para obtener toda la información de la tabla categoría 
            $sql = "SELECT * FROM `tbl_categoria` WHERE tbl_categoria.categoria_status = 1;";

            $stmt = $cn->prepare($sql);
            $stmt->execute();
            return $resultado = $stmt->fetchAll();
        }

        # Muestra las categorías dependiendo del ID principal
        public function get_categoria_id ($categoria_id){
            $cn = parent::conexion();
            parent::set_names();

            # Consulta para mostrar las categorias solo por ID principal
            $sql = "SELECT * FROM `tbl_categoria` WHERE tbl_categoria.categoria_id = ?";

            $stmt = $cn->prepare($sql);
            $stmt -> bindValue ( 1, $categoria_id);
            $stmt -> execute();
            return $resultado = $stmt->fetch();
        }

    }

?>