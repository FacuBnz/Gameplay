<?php
//controllers/index.php

require '../fw/fw.php';
require '../models/Categorias.php';
require '../models/Publicaciones.php';
require '../views/Index.php';

$cate = new Categorias();
$cateTodos = $cate->getTodos();

$publi = new Publicaciones();
$publiTodos = $publi->getPublicaciones(4);

//var_dump($publiTodos);

$v = new Index();
$v->categorias = $cateTodos;
$v->publicaciones = $publiTodos;
$v->render();