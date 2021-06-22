<?php
require '../fw/fw.php';
require '../models/Categorias.php';
require '../models/Publicaciones.php';
require '../views/VerTodos.php';

$cate = new Categorias();
$cateTodos = $cate->getTodos();

$publi = new Publicaciones();
$publiTodos = $publi->getPublicaciones();

//var_dump($publiTodos);

$v = new VerTodos();
$v->categorias = $cateTodos;
$v->publicaciones = $publiTodos;
$v->user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$v->render();
