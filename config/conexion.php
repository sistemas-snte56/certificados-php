<?php
    /* Inicializando la sesion del usuario */
    session_start();

    /* Iniciamos Clase Conectar */
    class Conectar{
        protected $dbh;

        /* Funcion Protegida de la cadena de Conexion */
        protected function Conexion(){
            try {
                /* Cadena de Conexion Local */
				$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=certificados-php","root","");

                /* Cadena de Conexion Hosting */
				// $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=certificados-php","certificados","hgM=HkkK[zfk");


				return $conectar;
			} catch (Exception $e) {
                /* En Caso hubiera un error en la cadena de conexion */
				print "¡Error BD!: " . $e->getMessage() . "<br/>";
				die();
			}
        }

        /* Para impedir que tengamos problemas con las ñ o tildes */
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        /* Ruta principal del proyecto */
        public static function ruta(){
            // Ruta de prueba
            return "http://certificados-php.test/";

            // Ruta de produccion 
            // return "https://seccion56.org/certificados-2023/";
        }
    }
?>