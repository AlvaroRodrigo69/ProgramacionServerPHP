<?php
    require 'app/Models/Usuario.php';
    class UsersController{

        public function registrar(){
            require VIEWS_PATH. '/Registrar.php';
        }

        public function realizarRegistro($nombre, $clave){
            Usuario::Insertar($nombre, $clave);
        }
        public function flogin(){
            require VIEWS_PATH.'/Login.php';
        }
        public function loggear($nombre, $clave){
            Usuario::getLogged($nombre, $clave);
        }
    }
?>