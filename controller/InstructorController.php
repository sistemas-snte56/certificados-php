<?php

    # Llamando a la conexión a la base de datos
    require_once("../config/conexion.php");
    
    # Llamando a la clase Instructor
    require_once("../models/Instructor.php");
    
    # Inicializamos la clase Instructor
    $instructor = new Instructor();

    # Opciones de solicitud por le programador
    switch ($_GET["opcion"]) {

        # Opción para Guardar y Editar
        case "guardar_instructor" : 

            /**
             *  Guardar y Editar
             *  Validamos no exista ID de curso y se guarde como dato nuevo
             *  Si existe un ID de curso solamente se tiene que actualizar 
             */

            # Preguntamos principalmente si instructor_id esta vacio
            if (empty($_POST["instructor_id"])) {

                # Si viene vacio principalmente registramos la información
                $instructor -> insert_instructor (
                    $_POST["instructor_name"],
                    $_POST["instructor_ap"],
                    $_POST["instructor_am"],
                    $_POST["instructor_email"],
                    $_POST["instructor_genero"],
                    $_POST["instructor_telefono"]
                );

            } else {
                
                # Si ya hay registro de el actualizaremos la información agregando un parametro mas que es instructor_id
                $instructor -> update_instructor(
                    $_POST["instructor_id"],
                    $_POST["instructor_name"],
                    $_POST["instructor_ap"],
                    $_POST["instructor_am"],
                    $_POST["instructor_email"],
                    $_POST["instructor_genero"],
                    $_POST["instructor_telefono"]
                );
            }
            
            
            break;
        
        # Opción para mostrar toda la información segun el ID que se este enviando
        case "mostrar_instructor" :

            # Almacenamos todo en una variable datos 
            $datos = $instructor -> get_instructor_id ( $_POST["instructor_id"] );

            # Verificamos que lo que venga en $datos es un array y que sea mayor a 0
            if (is_array($datos) == true and count($datos) <> 0) {
                
                #recorremos los datos y los guardamos en filas
                foreach ($datos as $row) {
              
                    // $_output["instructor_name"] = $row["instructor_name"];
                    // $_output["instructor_ap"] = $row["instructor_ap"];
                    // $_output["instructor_am"] = $row["instructor_am"];
                    // $_output["instructor_email"] = $row["instructor_email"];
                    // $_output["instructor_genero"] = $row["instructor_genero"];
                    // $_output["instructor_telefono"] = $row["instructor_telefono"];

                }

                echo json_encode($datos);
            }

            break;

        # Opción para eliminar instructor
        case "eliminar_instructor" :

            $instructor -> delete_instructor ( $_POST["instructor_id"] );

            break;

        # Opción para mostrar y listar todos los cursos por consulta ID
        case "listar_instructor" : 

            $datos = $instructor -> get_instructores ();
            $data = Array();


            foreach($datos as $row) {
                $sub_array = array();

                $sub_array[] = $row["instructor_name"] . " " . $row["instructor_ap"] . " " . $row["instructor_am"] ;
                $sub_array[] = $row["instructor_email"];
                $sub_array[] = $row["instructor_genero"];
                $sub_array[] = $row["instructor_telefono"];

                $sub_array[] = ' <button type="button" onClick="editar_instructor('.$row["instructor_id"].');" id="'.$row["instructor_id"].'" class="btn btn-outline-warning btn-icon"><div> <i class="fa fa-edit"></i> </div></button> '
                      . " " .  ' <button type="button" onClick="eliminar_instructor('.$row["instructor_id"].');" id="'.$row["instructor_id"].'" class="btn btn-outline-danger btn-icon"><div> <i class="fa fa-trash"></i> </div></button> ';
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

        # Opción para mostrar la lista de instructores en un combobox
        case "combobox_instructores" : 

            $datos = $instructor -> get_instructores();
            $data = Array();

            if (is_array($datos) == true AND count($datos)>0) {

                $html = "<option label='¿Selecciona Instructor?'></option>";

                foreach($datos as $row) {
                    $html.= "<option value='". 
                                $row['instructor_id'] ."'> " . 
                                $row['instructor_name'] . " " . 
                                $row['instructor_ap'] . " " . 
                                $row['instructor_am'] .  " 
                            </option>";
                }

                echo $html;
            }

            break;            

    }

?>