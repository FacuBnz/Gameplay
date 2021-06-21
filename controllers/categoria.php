<?php
//controllers/index.php

require '../fw/fw.php';
require '../models/Categorias.php';
require '../models/Publicaciones.php';
require '../views/Categoria.php';

if(!isset($_GET['id']) || !ctype_digit($_GET['id'])) header('Location: index.php');

$cate = new Categorias();
$cateTodos = $cate->getTodos();
$nombreCategoria = $cate->getNameCategory($_GET['id']);

$publi = new Publicaciones();
$publiTodos = $publi->getPublicaciones();

//var_dump($publiTodos);

$v = new Categoria();
$v->categorias = $cateTodos;
$v->nombreCategoria = $nombreCategoria["nombre"];
$v->publicaciones = $publiTodos;
$v->user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$v->render();