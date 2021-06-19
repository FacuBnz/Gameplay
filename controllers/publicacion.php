<?php

require '../fw/fw.php';
require '../models/Categorias.php';
require '../models/Publicaciones.php';
require '../views/Publicacion.php';

if(!isset($_GET['titulo'])) header('Location: index.php');

$cate = new Categorias();
$cateTodos = $cate->getTodos();

$publi = new Publicaciones();
$publi = $publi->getPublicacion($_GET['titulo']);

//var_dump($publi);

$v = new Publicacion();
$v->categorias = $cateTodos;
$v->publicacion = $publi;
$v->render();