<?php
    require_once("Conexion.php");
    class Equipo{
        private int $id;
        public string $nombre;
        public int $puntos;
        public int $goles_favor;
        public int $goles_contra;
        private static $tabla = 'equipos';

        public function __construct(int $id, string $nombre, int $puntos, int $goles_favor, int $goles_contra){
            $this->id=$id;
            $this->nombre=$nombre;
            $this->puntos=$puntos;
            $this->goles_favor=$goles_favor;
            $this->goles_contra=$goles_contra;
        }

        public function estado(){
            return "nombre: {$this->nombre}, puntos: {$this->puntos}, goles a favor: {$this->goles_favor}, goles en contra: {$this->goles_contra}";
        }
        
        public function insertarEnBd(){
            $pdo=new Conexion();
            $t=self::$tabla;//no me deja meter el self dentro de la querya
            try{
                $db=$pdo->connect();
                //preparo el insert
                $sql_insert="INSERT INTO {$t} (nombre, puntos, goles_favor, goles_contra) VALUES (:nombre, :puntos, :gf, :gc)";
                $stmt=$db->prepare($sql_insert);
                //ejecuto el insert
                $stmt->execute([
                    ':nombre'=>$this->nombre,
                    ':puntos'=>$this->puntos,
                    ':gf'=>$this->goles_favor,
                    ':gc'=>$this->goles_contra
                ]);
                //informamos en caso de insercion exitosa
                if ($stmt->rowCount()) {
                    echo "¡Inserción exitosa! El equipo '{$this->nombre}' ha sido añadido a la base de datos.";
                }
            }catch (PDOException $e){
                //en caso de error informamos y matamos el proceso
                die("ha sucedido un error en la base de datos".$e->getMessage());
            }

        }

        public function eliminarDeBd(){
            $pdo=new Conexion();
            $t=self::$tabla;
            try{
                $db=$pdo->connect();
                //preparo el delete
                $sql_delete="DELETE FROM {$t} WHERE id=:id";
                $stmt=$db->prepare($sql_delete);
                //ejecuto el delete
                $stmt->execute([
                    ':id'=>$this->id
                ]);
                //informamos en caso de delete exitoso
                if ($stmt->rowCount()>0) {
                    echo "se elemino {$this->nombre} de la base de datos";
                }
            }catch (PDOException $e){
                //en caso de error informamos y matamos el proceso
                die("ha sucedido un error en la base de datos".$e->getMessage());
            }
        }

        public function modificarEnBd(){
            $pdo=new Conexion();
            $t=self::$tabla;
            try{
                $db=$pdo->connect();
                //preparo el update
                $sql_update="UPDATE {$t} SET puntos = :puntos, goles_favor = :gf, goles_contra = :gc WHERE id = :id";
                $stmt=$db->prepare($sql_update);
                //ejecuto el update
                $stmt->execute([
                    ':id'=>$this->id,
                    ':puntos'=>$this->puntos,
                    ':gf'=>$this->goles_favor,
                    ':gc'=>$this->goles_contra
                ]);
                //informamos en caso de update exitoso
                if ($stmt->rowCount()>0) {
                    echo "se actualizo {$this->nombre} de la base de datos";
                }else{
                    echo "no se ha modificado ningun regstro, el equipo podria no existir actualmente en la base de datos";
                }
            }catch (PDOException $e){
                //en caso de error informamos y matamos el proceso
                die("ha sucedido un error en la base de datos".$e->getMessage());
            }
        }

        public static function getEquipos(){
            $equipos=[];
            $pdo=new Conexion();
            $t=self::$tabla;
            try{
                $db=$pdo->connect();
                //preparo el select y lo ejecuto
                $sql_query="SELECT * FROM {$t}";
                $resultado=$db->query($sql_query);
                //recorro el resultset que devuelvey lleno mi array con objetos de tipo Equipo
                while($equipo=$resultado->fetch(PDO::FETCH_NUM)){
                    $e=new Equipo($equipo[0],$equipo[1],$equipo[2],$equipo[3],$equipo[4]);
                    array_push($equipos, $e);
                }
            }catch (PDOException $e){
                //en caso de error informamos y matamos el proceso
                die("ha sucedido un error en la base de datos".$e->getMessage());
            }
            return $equipos;
        }

        public static function getEquipo($id){
            $e=null;
            $pdo=new Conexion();
            //llamo a la tabla estatica
            $t=self::$tabla;
            if(is_numeric($id)){
                try{
                    $db=$pdo->connect();
                    //preparo el select y lo ejecuto
                    $sql_query="SELECT * FROM {$t} WHERE id=$id";
                    $resultado=$db->query($sql_query);
                    //creo el equipo que me devuelve el select
                    $equipo=$resultado->fetch(PDO::FETCH_NUM);
                    $e=new Equipo($equipo[0],$equipo[1],$equipo[2],$equipo[3],$equipo[4]);
                }catch (PDOException $e){
                    //en caso de error informamos y matamos el proceso
                    die("ha sucedido un error en la base de datos".$e->getMessage());
                }
            }
            return $e;
        }

        public static function getEquipoPorNombre($nombre){
            $e=null;
            $pdo=new Conexion();
            //llamo a la tabla estatica
            $t=self::$tabla;
            try{
                $db=$pdo->connect();
                //preparo el select y lo ejecuto
                //me esta dando error este select
                $sql_query="SELECT * FROM {$t} WHERE nombre LIKE($nombre)";
                $resultado=$db->query($sql_query);
                //creo el equipo que me devuelve el select
                $equipo=$resultado->fetch(PDO::FETCH_NUM);
                $e=new Equipo($equipo[0],$equipo[1],$equipo[2],$equipo[3],$equipo[4]);
            }catch (PDOException $e){
                //en caso de error informamos y matamos el proceso
                die("ha sucedido un error en la base de datos".$e->getMessage());
            }
            return $e;
        }
    }
?>