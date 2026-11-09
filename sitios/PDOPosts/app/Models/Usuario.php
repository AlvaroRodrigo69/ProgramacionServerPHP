<?php
    class Usuario{
        public $id;
        public $nombre;

        public function __construct($id, $nombre){
            $this->id=$id;
            $this->nombre=$nombre;
        }

        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public static function getLogged($nombre, $clave){
            $usu=false;
            $db=DB::getInstance();
            $stmt=$db->prepare('SELECT * FROM usuarios WHERE nombre=:nombre');
            $stmt->bindParam(':nombre',$nombre);
            $stmt->execute();
            while($registro=$stmt->fetch(PDO::FETCH_ASSOC)){
                if(password_verify($clave, $registro['clave'])){
                    $usu=new Usuario($registro['id'], $nombre);
                }
            }
            if($usu){
                $_SESSION['id']=$usu->getId();
                $_SESSION['nombre']=$usu->getNombre();
                header('Location: /www/PDOPosts/index.php/home');
            }else{
                echo "usuario no encontrado<br>";
                echo '<a href="/www/PDOPosts/index.php/registrar">Haga click para registrarse</a>';
            }
        }

        public static function Insertar($nombre, $clave){
            //Conviene hashsear aqui la password
            $claveCifrada=password_hash($clave, PASSWORD_DEFAULT);
            $db=DB::getInstance();
            $stmt=$db->prepare('INSERT INTO usuarios(nombre, clave) VALUES(:nombre, :clave)');
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':clave', $claveCifrada);
            $stmt->execute();
            self::getLogged($nombre, $clave);
        }
    }
?>