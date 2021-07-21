<?php

require '../fw/fw.php';
require '../models/Categorias.php';
require '../models/Publicaciones.php';
require '../views/Publicacion.php';

if(!isset($_GET['titulo'])) die("Error de validacion del parametro titulo");

$cate = new Categorias();
$cateTodos = $cate->getTodos();

$publi = new Publicaciones();

try {
    $publi = $publi->getPublicacion($_GET['titulo']);
} catch (ValidationPost $err) {
    $publi = null;
}

//var_dump($publi);

$v = new Publicacion();
$v->categorias = $cateTodos;
$v->publicacion = $publi;
$v->user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$v->render();