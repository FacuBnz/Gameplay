<?php

require '../fw/fw.php';
require '../models/Publicaciones.php';

if(!isset($_SESSION['usuario'])){
    header('Location: index');
}


if(!isset($_GET['titulo'])) die("Error de validacion del parametro titulo");
$publi = new Publicaciones();

try {
    $publi->delete($_GET['titulo'], $_SESSION['usuario']);
    $_SESSION['completo_modificacion_post'] = "Publicación eliminada correctamente";
} catch (ValidationPost $e) {
    if($e->getMessage() === "Usuario invalido") die($e->getMessage());
    $_SESSION['errores_modificacion_post'] = $e;
}


header('Location: mis-publicaciones');