<?php

    # Llamando a la conexión a la base de datos
    require_once("../config/conexion.php");
    
    # Llamando a la clase Categoria
    require_once("../models/Categoria.php");
    
    # Inicializamos la clase Categoria
    $categorias = new Categoria();

    # Opciones de solicitud por le programador
    switch ($_GET["opcion"]) {

        # Opción para Guardar y Editar las categorías
        case "guardar_categoria" : 

            /**
             *  Guardar y Editar
             *  Validamos no exista ID de categoria y se guarde como dato nuevo
             *  Si existe un ID de categoria solamente se tiene que actualizar 
             */

            # Preguntamos principalmente si categoria_id esta vacio
            if (empty($_POST["categoria_id"])) {

                # Si viene vacio registramos la información
                $categorias->insert_categoria(
                    $_POST["categoria_nombre"], 
                );

            } else {
                
                # Si ya hay registro actualizaremos la información agregando un parametro mas que es categoria_id
                $categorias -> update_categoria(
                    $_POST["categoria_id"],
                    $_POST["categoria_nombre"], 
                );
            }
            
            
            break;
        
        # Opción la información de la categoria seleccionada para actualizarla
        case "mostrar_categoria" :

            # Almacenamos todo en una variable datos 
            $datos = $categorias -> get_categoria_id ( $_POST["categoria_id"] );

            # Verificamos que lo que venga en $datos es un array y que sea mayor a 0
            if (is_array($datos) == true and count($datos) <> 0) {
                
                #recorremos los datos y los guardamos en filas
                foreach ($datos as $row) {
                    
                    // $_output["categoria_id"] = $row["categoria_id"];
                    // $_output["categoria_nombre"] = $row["categoria_nombre"];

                }

                echo json_encode($datos);
            }

            break;

        # Opción para eliminar curso
        case "eliminar_categoria" :

            $categorias -> delete_categoria ( $_POST["categoria_id"] );

            break;

        # Opción para mostrar y listar todas las categorias en la pagina principal de mantenimiento categorías
        case "listar_categorias" : 

            $datos = $categorias -> get_categorias ();
            $data = Array();

            foreach($datos as $row) {
                $sub_array = array();

                $sub_array[] = $row["categoria_nombre"];
                $sub_array[] = ' <button type="button" onClick="editar_categoria('.$row["categoria_id"].');" id="'.$row["categoria_id"].'" class="btn btn-outline-warning btn-icon"><div> <i class="fa fa-edit"></i> </div></button> ';
                $sub_array[] = ' <button type="button" onClick="eliminar_categoria('.$row["categoria_id"].');" id="'.$row["categoria_id"].'" class="btn btn-outline-danger btn-icon"><div> <i class="fa fa-trash"></i> </div></button> ';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho" => 1,
                "TotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );

            echo json_encode($results);

            break;

        # Opción para mostrar y listar todos las categorías en un combobox para la página Cursos
        case "combobox_categorias" : 

            $datos = $categorias -> get_categorias();
            $data = Array();

            if (is_array($datos) == true AND count($datos)>0) {

                $html = "<option label='¿Selecciona Instructor?'></option>";

                foreach($datos as $row) {
                    $html.= "<option value='". $row['categoria_id'] ."'> " . $row['categoria_nombre'] . " </option>";
                }

                echo $html;
            }
            
            break;
    }

?>