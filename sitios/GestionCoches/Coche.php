<?php
    require_once("Vehiculo.php");
    class Coche extends Vehiculo{
        
        public function __construct($marca, $modelo, $color, $matricula) {
            //llamamos al constructor del padre
            parent::__construct($marca, $modelo, $color, $matricula);
        }

        public function getPlanta(){
            return $this->planta;
        }

        public function setPlanta($planta){
            switch($planta){
                case "superficie":
                    echo "este vehiculo no puede aparcar en la superficie";
                    break;
                case "subterraneo1" or "subterraneo2":
                    $this->planta=$this->plantas[$planta];
                    $this->aparcado=true;
                    break;
                default:
                    echo "esa planta no existe";
                    break;
            }
        }

        #[Override]
        public function puedeAparcar($planta){
            
            $puede=false;
            if($planta=="subterraneo1" or $planta=="subterraneo2"){
                $puede=true;
            }
            return $puede;
        }
    }
?>