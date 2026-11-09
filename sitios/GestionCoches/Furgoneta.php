<?php
    require_once("Vehiculo.php");
    class Furgoneta extends Vehiculo{
        
        public $altura;

        public function __construct($marca, $modelo, $color, $matricula, $altura) {
            parent::__construct($marca, $modelo, $color, $matricula);
            $this->altura=$altura;
        }

        public function getAltura(){
            return $this->altura;
        }

        public function setAltura($altura){
            $this->altura=$altura;
        }

        public function getPlanta(){
            return $this->planta;
        }

        public function setPlanta($planta){
            switch($planta){
                case "superficie" or "subterraneo1":
                    $this->planta=$this->plantas[$planta];
                    $this->aparcado=true;
                    break;
                case "subterraneo2":
                    echo "este vehiculo no puede aparcar en el subterraneo2";
                    break;
                default:
                    echo "esa planta no existe";
                    break;
            }
        }

        #[Override]
        public function puedeAparcar($planta){
            $puede=false;
            if($planta=="superficie" or $planta=="subterraneo1"){
                $puede=true;
            }
            return $puede;
        }
    }
?>