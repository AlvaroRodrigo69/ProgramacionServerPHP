<?php
    require_once("Vehiculo.php");
    class Autobus extends Vehiculo{
        
        public $empresa;

        public function __construct($marca, $modelo, $color, $matricula, $empresa) {
            parent::__construct($marca, $modelo, $color, $matricula);
            $this->empresa=$empresa;
        }

        public function getEmpresa(){
            return $this->empresa;
        }

        public function getPlanta(){
            return $this->planta;
        }

        public function setPlanta($planta){
            switch($planta){
                case "superficie":
                    $this->planta=$this->plantas[$planta];
                    $this->aparcado=true;
                    break;
                case "subterraneo2" or "subterraneo2":
                    echo "este vehiculo no puede aparcar en los";
                    break;
                default:
                    echo "esa planta no existe";
                    break;
            }
        }

        #[Override]
        public function puedeAparcar($planta){
            $puede=false;
            if($planta=="superficie"){
                $puede=true;
            }
            return $puede;
        }
    }
?>