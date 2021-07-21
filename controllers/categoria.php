<?php
require '../fw/fw.php';
require '../models/Categorias.php';
require '../models/Publicaciones.php';
require '../views/Categoria.php';

if(!isset($_GET['id']) || !ctype_digit($_GET['id'])) die("Error de validacion del parametro id");;

$cate = new Categorias();
$cateTodos = $cate->getTodos();

try {
    $nombreCategoria = $cate->getNameCategory($_GET['id']);
} catch (ValidationCategory $err) {
    $nombreCategoria = "";
}

$publi = new Publicaciones();
$publiTodos = $publi->getPublicaciones();


$v = new Categoria();
$v->categorias = $cateTodos;
$v->nombreCategoria = $nombreCategoria;
$v->publicaciones = $publiTodos;
$v->user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$v->render();