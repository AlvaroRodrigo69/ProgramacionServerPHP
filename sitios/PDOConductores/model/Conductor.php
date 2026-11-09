<?php
    require_once("Conexion.php");
    class Conductor{
        public $id;
        public $nombre;
        public $puntos;
        public $ciudad;
        public $multas;
        public $estado;
        public static $tabla="conductores";

        public function __construct($id, $nombre, $puntos, $ciudad, $multas, $estado){
            $this->id=$id;
            $this->nombre=$nombre;
            $this->puntos=$puntos;
            $this->ciudad=$ciudad;
            $this->multas=$multas;
            $this->estado=$estado;
        }

        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getPuntos(){
            return $this->puntos;
        }

        public function getCiudad(){
            return $this->ciudad;
        }

        public function getMultas(){
            return $this->multas;
        }

        public function getEstado(){
            return $this->estado;
        }

        public static function getAll(){
            $conductores=[];
            $pdo=new Conexion();
            $t=self::$tabla;
            try{
                $db=$pdo->connect();
                //preparo el select y lo ejecuto
                $sql_query="SELECT * FROM {$t}";
                $resultado=$db->query($sql_query);
                //recorro el resultset que devuelve y lleno mi array con objetos de tipo coche
                while($conductor=$resultado->fetch(PDO::FETCH_NUM)){
                    $c=new Conductor($conductor[0],$conductor[1],$conductor[2],$conductor[3],$conductor[4],$conductor[5]);
                    array_push($conductores, $c);
                }
            }catch (PDOException $e){
                //en caso de error informamos y matamos el proceso
                die("ha sucedido un error en la base de datos".$e->getMessage());
            }
            return $conductores;
        }

        public static function getConductor($id){
            $conductor=null;
            $pdo=new Conexion();
            $t=self::$tabla;
            try{
                $db=$pdo->connect();
                $sql_query="SELECT * FROM {$t} WHERE id=$id";
                $resultado=$db->query($sql_query);
                while($c=$resultado->fetch(PDO::FETCH_NUM)){
                    $conductor=new Conductor($c[0],$c[1],$c[2],$c[3],$c[4],$c[5]);
                }
            }catch(PDOException $e){
                die("ha sucedido un error en la base de datos".$e->getMessage());
            }
            return $conductor;
        }

        public static function eliminarEnBD($id){
            $pdo=new Conexion();
            $t=self::$tabla;
            try{
                $db=$pdo->connect();
                $sql_delete="DELETE FROM {$t} WHERE id=:id";
                $stmt=$db->prepare($sql_delete);
                $stmt->execute([
                    ':id'=>$id
                ]);
                if($stmt->rowCount()>0){
                    echo "Eliminacion exitosa";
                }
            }catch(PDOException $e){
                die("ha sucedido un error en la base de datos".$e->getMessage());
            }
        }

        //incrementar puntos en la base de datos
        public static function incrementarPuntos($cantidad){
            $pdo=new conexion();
            $t=self::$tabla;
            try{
                $db=$pdo->connect();
                $sql_update="UPDATE {$t} SET puntos= puntos +:cantidad";
                $stmt=$db->prepare($sql_update);
                $stmt->execute([
                    ':cantidad'=>$cantidad
                ]);
                if($stmt->rowcount()>0){
                    echo "Incremento de puntos exitoso";
                }
            }catch(PDOException $e){
                die("ha sucedido un error en la base de datos".$e->getMessage());
            }
        }
    }
?>