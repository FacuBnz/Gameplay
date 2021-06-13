<?php
//controllers/index.php

require '../fw/fw.php';
require '../models/Categorias.php';
require '../models/Publicaciones.php';
require '../views/Categoria.php';

$cate = new Categorias();
$cateTodos = $cate->getTodos();
$nombreCategoria = $cate->getNameCategory($_GET['id']);

$publi = new Publicaciones();
$publiTodos = $publi->getPublicaciones(3);

//var_dump($publiTodos);

$v = new Categoria();
$v->categorias = $cateTodos;
$v->nombreCategoria = $nombreCategoria["nombre"];
$v->publicaciones = $publiTodos;
$v->render();