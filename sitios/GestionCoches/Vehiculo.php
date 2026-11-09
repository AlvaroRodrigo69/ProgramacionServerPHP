<?php
    class Vehiculo{
        public $marca;
        public $modelo;
        public $color;
        public $matricula;
        protected $plantas=array(
            "superficie"=>"superficie", 
            "subterraneo1"=>"subterraneo1", 
            "subterraneo2"=>"subterraneo2",
            "subterraneo3"=>"subterraneo3");
        protected $planta;
        protected $aparcado;

        public function __construct($marca, $modelo, $color, $matricula) {
            $this->marca= $marca;
            $this->modelo=$modelo;
            $this->color=$color;
            $this->matricula=$matricula;
        }

        public function getPlanta(){
            return $this->planta;
        }

        public function setPlanta($planta){
            $this->planta=$this->plantas[$planta];
            $this->aparcado=true;
        }

        public function isAparcado(){
            if($this->aparcado==true){
                echo "este coche ya esta aparcado";
            }else{
                echo "este coche no esta aparcado en ninguna planta";
            }
        }

        public function puedeAparcar($planta){
            return true;
        }
    }
?>