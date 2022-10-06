<?php

    # Llamando a la conexión a la base de datos
    require_once("../config/conexion.php");
    
    # Llamando a la clase Usuario
    require_once("../models/Usuario.php");
    
    # Inicializamos la clase Usuario
    $usuario = new Usuario();

    # Opcion de solicitud de controller
    switch ($_GET["opcion"]) {

        # Microservicio para poder mostrar el listado de un curso de un usuario certificado
        case 'listar_cursos':
            $datos = $usuario -> get_cursos_x_usuario($_POST["usuario_id"]);
            $data = Array();

            foreach($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["curso_name"];
                $sub_array[] = $row["curso_fecha_inicial"];
                $sub_array[] = $row["curso_fecha_final"];
                $sub_array[] = $row["instructor_name"] . " " . $row["instructor_ap"];
                $sub_array[] = ' <button type="button" onClick="certificado('.$row["curso_id"].');" id="'.$row["curso_id"].'" class="btn btn-outline-warning btn-icon"><div> <i class="fa fa-edit"></i> </div></button> ';
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