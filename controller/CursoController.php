<?php

    # Llamando a la conexión a la base de datos
    require_once("../config/conexion.php");
    
    # Llamando a la clase Curso
    require_once("../models/Curso.php");
    
    # Inicializamos la clase Curso
    $curso = new Curso();

    # Opciones de solicitud por le programador
    switch ($_GET["opcion"]) {

        # Opción para Guardar y Editar
        case "guardar_curso" : 

            /**
             *  Guardar y Editar
             *  Validamos no exista ID de curso y se guarde como dato nuevo
             *  Si existe un ID de curso solamente se tiene que actualizar 
             */

            # Preguntamos principalmente si curso_id esta vacio
            if (empty($_POST["curso_id"])) {

                # Si viene vacio principalmente registramos la información
                $curso -> insert_curso (
                    $_POST["curso_categoria_id"], 
                    $_POST["curso_name"], 
                    $_POST["curso_descripcion"], 
                    $_POST["curso_fecha_inicial"], 
                    $_POST["curso_fecha_final"], 
                    $_POST["curso_instructor_id"]
                );

            } else {
                
                # Si ya hay registro de el actualizaremos la información agregando un parametro mas que es curos_id
                $curso -> update_curso(
                    $_POST["curso_id"],
                    $_POST["curso_categoria_id"], 
                    $_POST["curso_name"], 
                    $_POST["curso_descripcion"], 
                    $_POST["curso_fecha_inicial"], 
                    $_POST["curso_fecha_final"], 
                    $_POST["curso_instructor_id"]
                );
            }
            
            
            break;
        
        # Opción para mostrar toda la información segun el ID que se este enviando
        case "mostrar_curso" :

            # Almacenamos todo en una variable datos 
            $datos = $curso -> get_curso_id( $_POST["curso_id"] );

            # Verificamos que lo que venga en $datos es un array y que sea mayor a 0
            if (is_array($datos) == true and count($datos) <> 0) {
                
                #recorremos los datos y los guardamos en filas
                foreach ($datos as $row) {
                    
                    // $_output["curso_id"] = $row["curso_id"];
                    // $_output["categoria_nombre"] = $row["categoria_nombre"];
                    // $_output["curso_name"] = $row["curso_name"];
                    // $_output["curso_descripcion"] = $row["curso_descripcion"];
                    // $_output["curso_fecha_inicial"] = $row["curso_fecha_inicial"];
                    // $_output["curso_fecha_final"] = $row["curso_fecha_final"];
                    // $_output["instructor_name"] = $row["instructor_name"]       ;

                }

                echo json_encode($datos);
            }

            break;

        # Opción para eliminar curso
        case "eliminar_curso" :

            $curso -> delete_curso ( $_POST["curso_id"] );

            break;

        # Opción para mostrar y listar todos los cursos por consulta ID
        case "listar_curso" : 

            $datos = $curso -> get_curso ();
            $data = Array();


            foreach($datos as $row) {
                $sub_array = array();

                $sub_array[] = $row["categoria_nombre"];
                $sub_array[] = strtoupper($row["curso_name"]);
                // $sub_array[] = $row["curso_descripcion"];
                $sub_array[] = $row["curso_fecha_inicial"];
                $sub_array[] = $row["curso_fecha_final"];
                $sub_array[] = $row["instructor_name"] . " " . $row["instructor_ap"] . " " . $row["instructor_am"];
                $sub_array[] = ' <button type="button" onClick="editar_curso('.$row["curso_id"].');" id="'.$row["curso_id"].'" class="btn btn-outline-warning btn-icon"><div> <i class="fa fa-edit"></i> </div></button> '
                      . " " .  ' <button type="button" onClick="eliminar_curso('.$row["curso_id"].');" id="'.$row["curso_id"].'" class="btn btn-outline-danger btn-icon"><div> <i class="fa fa-trash"></i> </div></button> ';
                // $sub_array[] = ' <button type="button" onClick="eliminar('.$row["curso_id"].');" id="'.$row["curso_id"].'" class="btn btn-outline-danger btn-icon"><div> <i class="fa fa-id-card-o"></i> </div></button> ';
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

    }

?>