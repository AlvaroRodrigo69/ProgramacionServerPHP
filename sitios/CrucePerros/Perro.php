<?php
    class Perro{
        /*enum Sexo: string{
            case Macho='Macho';
            case Hembra='Hembra';
        }  */
        public string $raza;
        public string $color;
        public float $peso;
        public int $edad;
        public string $sexo;

        public function __construct($raza, $color, $peso, $edad, $sexo){
            $this->raza=$raza;
            $this->color=$color;
            $this->peso=$peso;
            $this->edad=$edad;
            $this->sexo=$sexo;
        }

        public function getRaza(){
            return $this->raza;
        }

        public function setRaza(string $raza){
            $this->raza=$raza;
            return $this;
        }

        public function getColor(){
            return $this->color;
        }

        public function setColor(string $color){
            $this->color=$color;
            return $this;
        }

        public function getPeso(){
            return $this->peso;
        }

        public function setPeso(float $peso){
            $this->peso=$peso;
            return $this;
        }

        public function getEdad(){
            return $this->edad;
        }

        public function setEdad(int $edad){
            $this->edad=$edad;
            return $this;
        }

        public function getSexo(){
            return $this->sexo;
        }

        public function setSexo(string $sexo){
            $this->sexo=$sexo;
            return $this;
        }

        public function cruzar(Perro $perro2){
            $cachorro=null;
            if($this->sexo!=$perro2->sexo){
                $cachorro=new Perro('','',0,0,'');
                $cachorro->setPeso(1)->setEdad(0)->setSexo('hembra');
                if($this->sexo=='hembra'){
                    $cachorro->setRaza($this->raza)->setColor($this->color);
                }else{
                    $cachorro->setRaza($perro2->raza)->setColor($this->color);
                }
            }
            return $cachorro;
        }

        public static function cruzarPerros(Perro $perro1, Perro $perro2){
            $cachorro=null;
            if($perro1->sexo!=$perro2->sexo){
                $cachorro=new Perro('','',1,0,'hembra');
                if($perro1->sexo=='hembra'){
                    $cachorro->setRaza($perro1->raza)->setColor($perro1->color);
                }else{
                    $cachorro->setRaza($perro2->raza)->setColor($perro2->color);
                }
            }
            return $cachorro;
        }
    }
?>