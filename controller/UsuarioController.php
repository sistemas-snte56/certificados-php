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

    }


?>