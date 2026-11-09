<?php
require 'app/Models/Post.php';

    class PostsController{
        /**
         * Función que envía todos los Post a la vista Home
         */
        public function index(){
            $posts = Post::getAll();
            require VIEWS_PATH . '/home.php';
        }

        /**
         * Función que envía el post seleccionado a la vista Show
         */
        public function show($id){
            $post = Post::getById($id);
            require VIEWS_PATH . '/show.php';
        }

        public function ins(){
            require VIEWS_PATH . '/finsertar.php';
        }

        public function realizarInsercion($titulo, $cuerpo){
            Post::insertar($titulo, $cuerpo);
            $this->index();
        }

        public function edit($id){
            $post=Post::getToEdit($id);
            require VIEWS_PATH . '/feditar.php';
        }

        public function realizarActualizacion($id, $titulo,$cuerpo){
            Post::actualizar($id, $titulo, $cuerpo);
            $this->index();
        }
    }
?>