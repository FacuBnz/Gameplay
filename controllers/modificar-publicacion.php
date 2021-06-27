<?php
require '../fw/fw.php';
require '../models/Categorias.php';
require '../models/Publicaciones.php';
require '../views/ModificarPublicacion.php';

if(!isset($_SESSION['usuario'])){
    header('Location: index');
}

$cate = new Categorias();
$publicacion = new Publicaciones();
$v = new ModificarPublicacion();

if(count($_POST) > 0){
    if(!isset($_POST['titulo'])) die("Error de validacion titulo");
    if(!isset($_POST['titulo_anti'])) die("Error de validacion titulo");
    if(!isset($_POST['categoria'])) die("Error de validacion categoria");
    if(!isset($_POST['descripcion'])) die("Error de validacion descripcion");

    try {
        $publicacion->update($_POST['titulo'], $_POST['titulo_anti'], $_POST['categoria'], $_POST['descripcion'], $_SESSION['usuario']);
        $_SESSION['completo_modificacion_post'] = "La publicacion se a guardado con exito";
        header('Location: mis-publicaciones');
    } catch (ValidationPost $e) {
        $_SESSION['errores_modificacion_post'] = $e;
        $v->publicacion = $publicacion->getPublicacionForUser($_SESSION['usuario'], $_POST['titulo_anti']);
    }
}

$cateTodos = $cate->getTodos();
$v->categorias = $cateTodos;

if(count($_GET) > 0){
    try {
        if(!isset($_GET['titulo'])) die("Error de validacion del parametro titulo");
        $v->publicacion = $publicacion->getPublicacionForUser($_SESSION['usuario'], $_GET['titulo']);
    } catch (ValidationPost $e) {
        $_SESSION['errores_modificacion_post'] = $e;
    }
}

$v->errores = isset($_SESSION['errores_modificacion_post']) ? $_SESSION['errores_modificacion_post'] : null;
$v->user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$v->render();

unset($_SESSION['errores_modificacion_post']);



