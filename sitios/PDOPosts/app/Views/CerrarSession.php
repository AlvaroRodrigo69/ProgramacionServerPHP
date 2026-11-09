<?php
    if(session_status()==PHP_SESSION_ACTIVE){
        session_destroy();
        echo"sesion cerrada con exito<br>";
    }else{
        session_start();
        session_destroy();
        echo"sesion cerrada con exito<br>";
    }
    
    echo '<a href="/www/PDOPosts/">Haga click para iniciar sesion</a>';
?>