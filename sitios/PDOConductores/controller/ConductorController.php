<?php
    require_once("./model/Conductor.php");
    class ConductorController{
        public $conductores;

        public function __construct(){
            $this->conductores=Conductor::getAll();
        }

        public function index(){
            $rowset=$this->conductores;
            require("./view/index.php");
        }
        public function eliminar($id){
            $victima=null;
            $victima=Conductor::getConductor($id);
            if($victima!=null){
                Conductor::eliminarEnBD($id);
                $this->conductores=Conductor::getAll();
                $this->index();
            }else{
                echo "Ese conductor no esta registrado en la base de datos";
            }
        }

        public function ver($id){
            $row=Conductor::getConductor($id);
            require("./view/ver.php");
        }

        public function verPorCiudad($ciudad){
            $rowset=[];
            foreach ($this->conductores as $conductor){
                if($conductor->ciudad==$ciudad){
                    array_push($rowset, $conductor);
                }
            }
            if(!empty($rowset)){
                require("view/index.php");
            }else{
                echo "no hay ningun conductor de esa ciudad";
            }
        }

        //metodo para añadir puntos
        public function aniadirPuntos($puntos){
            Conductor::incrementarPuntos($puntos);
            $this->conductores=Conductor::getAll();
            $this->index();
        }

        public function modificar($id){
            $conductor=null;
            $conductor=Conductor::getConductor($id);
            if($conductor!=null){
                require("./view/fEditar.php");
            }else{
                echo "No se a encontrado dicho conductor en la base de datos";
            }
        }

        public function actualizar(){

        }
    }
?>