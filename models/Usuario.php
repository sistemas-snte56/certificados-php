<?php

    class Usuario extends Conectar {
        
        #Función para login de acceso a usuario
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

            // #Validar si el $_POST enviar viene vacio
            // if (isset($_POST["enviar"])) {
            //     $email = $_POST["txt_email"];
            //     $pwd =  $_POST["txt_password"];


            //     #Validamos si el correo y la contraseña están vacios
            //     if (empty($email and $pwd)) {
            //         #Error en caso de estar vacio correo y contraseña, devolver al index con mensaje = 2
            //         header("Location".Conectar::ruta()."/index.php?errorlogin=2");
            //         exit();
            //     } else {

            //         #Se prepara consulta SQL 
            //         $sql = "SELECT * FROM tbl_usuario WHERE usuario_email=? and usuario_pwd=? and usuario_status=1";
            //         $stmt = $cn->prepare($sql);
            //         $stmt->bindValue(1, $email);
            //         $stmt->bindValue(2, $pwd);
            //         $stmt->execute();
            //         $resultado = $stmt->fetch();

            //         #Si el resultado es array y es > 0
            //         if (is_array($resultado) and count($resultado)>0){

            //             $_SESSION["usuario_id "]=$resultado["usuario_id"];
            //             $_SESSION["usuario_name"]=$resultado["usuario_name"];
            //             $_SESSION["usuario_ap"]=$resultado["usuario_ap"];
            //             $_SESSION["usuario_am"]=$resultado["usuario_am"];

            //             header("Location".Conectar::ruta()."view/Usuhome");
            //             exit();



            //         } else {
            //             #En caso de que no coincidan el usuario o la contraseña
            //             header("Location".Conectar::ruta()."/index.php?errorlogin=1");
            //             exit();
            //         }
            //     }
            // }



        }
    }

?>