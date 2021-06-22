<?php

require '../fw/fw.php';
require '../models/Publicaciones.php';

if(!isset($_SESSION['usuario'])){
    header('Location: index');
}

if(count($_GET) > 0){
    try {
        $publi = new Publicaciones();
        $publi->delete($_GET['titulo'], $_SESSION['usuario']);
        $_SESSION['completo_modificacion_post'] = "Publicación eliminada correctamente";
    } catch (ValidationPost $e) {
        $_SESSION['errores_modificacion_post'] = $e;
    }
}

header('Location: mis-publicaciones.php');