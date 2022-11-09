<?php

    # Llamando a la conexión a la base de datos
    require_once("../config/conexion.php");
    
    # Llamando a la clase Usuario
    require_once("../models/Usuario.php");
    
    # Inicializamos la clase Usuario
    $usuario = new Usuario();

    # Opcion de solicitud de controller
    switch ($_GET["opcion"]) {

        # Microservicio para poder mostrar el listado de cursos de un usuario certificado
        case 'listar_cursos':
            $datos = $usuario -> get_cursos_x_usuario($_POST["usuario_id"]);
            $data = Array();


            foreach($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["NOMBRE_CURSO"];
                $sub_array[] = $row["FECHA_INICIAL"];
                $sub_array[] = $row["FECHA_FINAL"];
                //$sub_array[] = " ID: ".  $row["ID_USUARIO"] . " " . $row["NOMBRE_USUARIO"] ;
                $sub_array[] = $row["NOMBRE_INSTRUCTOR"] . " " . $row["AP_INSTRUCTOR"];
                $sub_array[] = ' <button type="button" onClick="certificado('.$row["ID_DEL_CURSO"].');" id="'.$row["ID_DEL_CURSO"].'" class="btn btn-outline-primary btn-icon"><div> <i class="fa fa-id-card-o"></i> </div></button> ';
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

        # Microservicio para poder mostrar informacion del certificado con el curso_id
        case 'mostrar_curso_detalle' :

            // $datos = $usuario -> get_curso_x_idcurso($_POST["curso_id"]);
            $datos = $usuario -> get_curso_x_idcurso($_POST["Idcurso"]);

            # Preguntamos si el array datos viene vacio
            if ( is_array($datos) == true and count($datos)<>0 ) {
                foreach($datos as $row) {
                    $output["ID_CURSO_USUARIO"] = $row["ID_CURSO_USUARIO"];
                    $output["ID_DEL_CURSO"] = $row["ID_DEL_CURSO"];
                    $output["NOMBRE_DEL_CURSO"] = $row["NOMBRE_DEL_CURSO"];
                    $output["DESCRIPCION_DEL_CURSO"] = $row["DESCRIPCION_DEL_CURSO"];
                    $output["FECHA_INICIAL"] = $row["FECHA_INICIAL"];
                    $output["FECHA_FINAL"] = $row["FECHA_FINAL"];
                    $output["ID_USUARIO"] = $row["ID_USUARIO"];
                    $output["NOMBRE_USUARIO"] = $row["NOMBRE_USUARIO"];
                    $output["AP_USUARIO"] = $row["AP_USUARIO"];
                    $output["AM_USUARIO"] = $row["AM_USUARIO"];
                    $output["FOLIO_USUARIO"] = $row["FOLIO_USUARIO"];
                    $output["NOMBRE_INSTRUCTOR"] = $row["NOMBRE_INSTRUCTOR"];
                    $output["AP_INSTRUCTO"] = $row["AP_INSTRUCTOR"];
                    $output["AM_INSTRUCTO"] = $row["AM_INSTRUCTOR"];
                }

                # Para mostrar el curso ID
                echo json_encode($output);
            }

            break;
        
        # Contar el total de los cursos por usuario
        case 'total_cursos_x_usuario' :
            $datos = $usuario -> get_total_cursos_x_usuario($_POST["usuario_id"]);
            if ( is_array($datos) == true and count($datos)<>0 ) {
                foreach($datos as $row) {
                    $output['TOTAL_CURSOS'] = $row['TOTAL_CURSOS'];
                }
                echo json_encode($output);
            }
            break;

        # Mostrar el total de cursos por usuario en dashboard 
        case 'listar_cursos_top10':
            $datos = $usuario -> get_cursos_x_usuario_top10($_POST["usuario_id"]);
            $data = Array();

            foreach($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["NOMBRE_CURSO"];
                $sub_array[] = $row["FECHA_INICIAL"];
                $sub_array[] = $row["FECHA_FINAL"];
                $sub_array[] = $row["NOMBRE_INSTRUCTOR"] . " " . $row["AP_INSTRUCTOR"];
                $sub_array[] = $row["ESTATUS_CURSO"] ;
                // $sub_array[] = ' <button type="button" onClick="certificado('.$row["ID_DEL_CURSO"].');" id="'.$row["ID_DEL_CURSO"].'" class="btn btn-outline-primary btn-icon"><div> <i class="fa fa-id-card-o"></i> </div></button> ';
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

        # Mostrar información del usuario en la vista perfil
        case 'mostrar_usuario_x_id' :

            $datos = $usuario -> get_usuario_x_id($_POST["usuario_id"]);

            # Preguntamos si el array datos viene vacio
            if ( is_array($datos) == true and count($datos)<>0 ) {
                foreach($datos as $row) {
                    $output["usuario_id"] = $row["usuario_id"];
                    $output["usuario_name"] = $row["usuario_name"];
                    $output["usuario_ap"] = $row["usuario_ap"];
                    $output["usuario_am"] = $row["usuario_am"];
                    $output["usuario_genero"] = $row["usuario_genero"];
                    $output["usuario_curp"] = $row["usuario_curp"];
                    $output["usuario_rfc"] = $row["usuario_rfc"];
                    $output["usuario_telefono"] = $row["usuario_telefono"];
                    $output["usuario_email"] = $row["usuario_email"];
                    $output["usuario_npersonal"] = $row["usuario_npersonal"];
                    $output["usuario_nivel"] = $row["usuario_nivel"];


                    // $output["usuario_id"] = $row["usuario_id"];
                    // $output["usuario_name"] = $row["usuario_name"];
                    // $output["usuario_ap"] = $row["usuario_ap"];
                    // $output["usuario_am"] = $row["usuario_am"];
                    // $output["usuario_genero"] = $row["usuario_genero"];
                    // $output["usuario_curp"] = $row["usuario_curp"];
                    // $output["usuario_rfc"] = $row["usuario_rfc"];
                    // $output["usuario_telefono"] = $row["usuario_telefono"];
                    // $output["usuario_email"] = $row["usuario_email"];
                    // $output["usuario_npersonal"] = $row["usuario_npersonal"];
                    // $output["usuario_pwd"] = $row["usuario_pwd"];
                    // $output["usuario_nivel"] = $row["usuario_nivel"];
                    // $output["usuario_region"] = $row["usuario_region"];
                    // $output["usuario_delegacion"] = $row["usuario_delegacion"];
                    // $output["usuario_folio"] = $row["usuario_folio"];
                    // $output["usuario_fecha"] = $row["usuario_fecha"];
                    // $output["usuario_tituloConstancia"] = $row["usuario_tituloConstancia"];
                    // $output["usuario_observacion"] = $row["usuario_observacion"];
                    // $output["usuario_fechaCracion"] = $row["usuario_fechaCracion"];
                    // $output["usuario_status"] = $row["usuario_status"];


                }

                # Para mostrar loa datos
                echo json_encode($output);
            }

            break;

        # Actualizar datos de perfil
        case 'update_perfil' :

            $usuario -> update_usuario_perfil ( 
                    $_POST["usuario_id"],
                    $_POST["usuario_name"],
                    $_POST["usuario_ap"],
                    $_POST["usuario_am"],
                    $_POST["usuario_curp"],
                    $_POST["usuario_rfc"],
                    $_POST["usuario_genero"],
                    $_POST["usuario_telefono"],
                    $_POST["usuario_email"],
                    $_POST["usuario_npersonal"],
                    $_POST["usuario_nivel"]
            );

            break;

        /**
         * CRUD USUARIO
         */
            
        # Opción para Guardar y Editar
        case "guardar_usuario" : 

            /**
             *  Guardar y Editar
             *  Validamos no exista ID de usuario y se guarde como dato nuevo
             *  Si existe un ID de usuario solamente se tiene que actualizar 
             */

            # Preguntamos principalmente si usuario_id esta vacio
            if (empty($_POST["usuario_id"])) {

                # Si viene vacio registramos la información
                $usuario -> insert_usuario (
                    $_POST["usuario_name"],
                    $_POST["usuario_ap"],
                    $_POST["usuario_am"],
                    //$_POST["usuario_curp"],
                    //$_POST["usuario_rfc"],
                    $_POST["usuario_genero"],
                    $_POST["usuario_type"],
                    $_POST["usuario_telefono"],
                    $_POST["usuario_email"],
                    $_POST["usuario_npersonal"],
                    $_POST["usuario_pwd"],
                    $_POST["usuario_nivel"],
                    $_POST["usuario_region"],
                    $_POST["usuario_delegacion"],
                    //$_POST["usuario_folio"],
                    //$_POST["usuario_fecha"],
                    //$_POST["usuario_tituloConstancia"],
                    //$_POST["usuario_observacion"],
                    //$_POST["usuario_fechaCracion"],
                    //$_POST["usuario_status"]
                );

            } else {
                
                # Si ya hay registro de el actualizaremos la información agregando un parametro mas que es usuario_id
                $usuario -> update_usuario(
                    $_POST["usuario_id"],
                    $_POST["usuario_name"],
                    $_POST["usuario_ap"],
                    $_POST["usuario_am"],
                    //$_POST["usuario_curp"],
                    //$_POST["usuario_rfc"],
                    $_POST["usuario_genero"],
                    $_POST["usuario_type"],
                    $_POST["usuario_telefono"],
                    $_POST["usuario_email"],
                    $_POST["usuario_npersonal"],
                    $_POST["usuario_pwd"],
                    $_POST["usuario_nivel"],
                    //$_POST["usuario_region"],
                    //$_POST["usuario_delegacion"],
                    //$_POST["usuario_folio"],
                    //$_POST["usuario_fecha"],
                    //$_POST["usuario_tituloConstancia"],
                    //$_POST["usuario_observacion"],
                    //$_POST["usuario_fechaCracion"],
                    //$_POST["usuario_status"]
                );
            }
            
            break;

        # Opción para eliminar usuario
        case "eliminar_usuario" :

            $usuario -> delete_usuario ( $_POST["usuario_id"] );

            break;

        # Opción para mostrar y listar todos los cursos por consulta ID
        case "listar_usuario" : 

            $datos = $usuario -> get_usuarios ();
            $data = Array();


            foreach($datos as $row) {
                $sub_array = array();

                $sub_array[] = $row["usuario_name"] . " " . $row["usuario_ap"] . " " . $row["usuario_am"] ;
                $sub_array[] = $row["usuario_email"];
                $sub_array[] = $row["usuario_genero"];
                $sub_array[] = $row["usuario_telefono"];
                
                if ($row["usuario_rol"] == 1) {
                    $sub_array[] = "USUARIO";
                } else {
                    $sub_array[] = "ADMINISTRADOR";
                }
                
                $sub_array[] = ' <button type="button" onClick="editar_usuario('.$row["usuario_id"].');" id="'.$row["usuario_id"].'" class="btn btn-outline-warning btn-icon"><div> <i class="fa fa-edit"></i> </div></button> '
                      . " " .  ' <button type="button" onClick="eliminar_usuario('.$row["usuario_id"].');" id="'.$row["usuario_id"].'" class="btn btn-outline-danger btn-icon"><div> <i class="fa fa-trash"></i> </div></button> ';
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
    
        # Opción para mostrar toda la información segun el ID que se este enviando
        case "mostrar_usuario" :

            # Almacenamos todo en una variable datos 
            $datos = $usuario -> get_usuario_id ( $_POST["usuario_id"] );

            # Verificamos que lo que venga en $datos es un array y que sea mayor a 0
            if ( is_array($datos) == true and count($datos)<>0 ) {
                
                #recorremos los datos y los guardamos en filas
                foreach ($datos as $row) {
              
                    $output["usuario_id"] = $row["usuario_id"];
                    $output["usuario_name"] = $row["usuario_name"];
                    $output["usuario_ap"] = $row["usuario_ap"];
                    $output["usuario_am"] = $row["usuario_am"];
                    $output["usuario_genero"] = $row["usuario_genero"];
                    $output["usuario_rol"] = $row["usuario_rol"];
                    $output["usuario_telefono"] = $row["usuario_telefono"];
                    $output["usuario_email"] = $row["usuario_email"];
                    $output["usuario_npersonal"] = $row["usuario_npersonal"];
                    $output["usuario_pwd"] = $row["usuario_pwd"];
                    $output["usuario_nivel"] = $row["usuario_nivel"];    

                }

                echo json_encode($output);
            }

            break;       
        #Opción para colocar las delegaciones en combobox
        case "get_delegaciones" :
            # Almacenamos todo en una variable datos 
            $datos = $usuario -> get_delegaciones_x_region( $_POST["usuario_region"] );
            $data = Array();

            # Verificamos que lo que venga en $datos es un array y que sea mayor a 0
            if (is_array($datos) == true and count($datos) <> 0) {
                
                #recorremos los datos y los guardamos en filas
                $html = "<option value='none' selected disabled hidden>-- SELECCIONA --</option>";
                foreach ($datos as $row) {
                    $html.= "<option value='".$row['delegacion'] ."'> " . $row['delegacion'] . " </option>";
                }
                echo json_encode($datos);
                echo $html;
            }

            break;    
    
    
    }


?>