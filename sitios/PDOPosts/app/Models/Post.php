<?php
    class Post{
        public static function getAll(){
            $db = DB::getInstance();
            // Sentencia preparada para prevenir inyección SQL
            $stmt = $db->prepare('SELECT * FROM posts');
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public static function getById($id){
            $db = DB::getInstance();

            // Sentencia preparada para prevenir inyección SQL
            $stmt = $db->prepare('SELECT * FROM posts WHERE id = :id');

            // Sanitizamos la entrada
            $id = filter_var($id, FILTER_VALIDATE_INT);

            // Vinculamos el parámetro :id 
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            // Obtenemos el post
            $post = $stmt->fetch();

            // Retornamos instancia de Post o null si no existe
            if ($post) {
                return $post;
            } else {
                return null;
            }
        }

        public static function getToEdit($id){
            $db = DB::getInstance();

            // Sentencia preparada para prevenir inyección SQL
            $stmt = $db->prepare('SELECT * FROM posts WHERE id = :id && usuario_id=:idusu');

            // Sanitizamos la entrada
            $id = filter_var($id, FILTER_VALIDATE_INT);

            // Vinculamos el parámetro :id 
            $stmt->bindParam(':id', $id);
            $stmt->bindParam('idusu',$_SESSION['id']);
            $stmt->execute();
            // Obtenemos el post
            $post = $stmt->fetch();

            // Retornamos instancia de Post o null si no existe
            if ($post) {
                return $post;
            } else {
                return null;
            }
        }

        public static function insertar($titulo, $cuerpo){
            $db=DB::getInstance();
            $stmt=$db->prepare('INSERT INTO posts(title, body, usuario_id) VALUES(:titulo, :cuerpo, :idusu)');
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':cuerpo', $cuerpo);
            $stmt->bindParam('idusu',$_SESSION['id']);
            $stmt->execute();
        }

        public static function actualizar($id, $titulo, $cuerpo){
            $db=DB::getInstance();
            $stmt=$db->prepare('UPDATE posts SET title=:titulo, body=:cuerpo WHERE id=:id');
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':cuerpo', $cuerpo);
            $stmt->execute();
        }
    }
?>