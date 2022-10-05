<?php

    # Inicializamos la sesion del usuario
    session_start();

    // Se inicia la clase conectar
    class Conectar{
        
        protected $db;

        # Función protegida de la cadena de conexión
        protected function Conexion() {
            try {
                #Connexión
                $cn = $this->db = new PDO("mysql:local=localhost;dbname=certificados-php","root","");
                return $cn;
            } catch (Exception $e) {
                #Error en la cadena de conexión
                print "¡Error DataBase!: ". $e->getMessage() . "<br/>";
                die();
            }
        }

        #Impide que haya problemas con tildes y ñ
        public function set_names() {
            return $this->db->query("SET NAMES 'utf8'");
        }

        #Ruta principal del proyecto
        public static function ruta() {
            return "http://certificados-php.test/";
        }
    }

?>