<?php
    class Conexion{
        private $host;
        private $user;
        private $password;
        private $dbname;
        
        public function __construct(){
            $this->host='localhost';
            $this->user='root';
            $this->password='';
            $this->dbname='liga';

        }

        public function connect(){
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
            // 1. Establecer la conexión PDO
            $pdo = new PDO($dsn, $this->user, $this->password);
            // Configuración para lanzar excepciones
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }

        /*public static function probarConexion(PDO $conectado){
            $verificacion=false;
            if($conectado){
                $verificacion=true;
            }
            return $verificacion;
        }*/

        /*public function cerrarConexion(PDO $pdo){
            
        }*/
    }
?>