<?php

require '../fw/fw.php';
require '../models/Categorias.php';
require '../models/Publicaciones.php';
require '../views/NuevaPublicacion.php';

if(!isset($_SESSION['usuario'])){
    header('Location: index');
}

if(count($_POST) > 0){
    if(!isset($_POST['titulo'])) die("Error de validacion titulo");
    if(!isset($_POST['categoria'])) die("Error de validacion categoria");
    if(!isset($_POST['descripcion'])) die("Error de validacion descripcion");

    try {
        $post = new Publicaciones();
        $post->create($_POST['titulo'], $_POST['categoria'], $_POST['descripcion'], $_SESSION['usuario']);
        $_SESSION['post_guarda'] = "La publicación se ha guardado con éxito";
    } catch (ValidationPost $e) {
        $_SESSION['errores_new_post'] = $e;
    }
} 


$cate = new Categorias();
$categorias = $cate->getTodos();

$v = new NuevaPublicacion();
$v->categorias = $categorias;
$v->completo = isset($_SESSION['post_guarda']) ? $_SESSION['post_guarda'] : null;
$v->errores = isset($_SESSION['errores_new_post']) ? $_SESSION['errores_new_post'] : null;
$v->user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

$v->render();

unset($_SESSION['post_guarda']);
unset($_SESSION['errores_new_post']);