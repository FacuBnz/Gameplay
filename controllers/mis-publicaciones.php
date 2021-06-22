<?php

require '../fw/fw.php';
require '../models/Categorias.php';
require '../models/Publicaciones.php';
require '../views/MisPublicaciones.php';

if(!isset($_SESSION['usuario'])){
    header('Location: index');
}

$cate = new Categorias();
$categorias = $cate->getTodos();

$v = new MisPublicaciones();
$publicaciones = new Publicaciones();

$v->publicaciones = $publicaciones->getPublicacionesForUser($_SESSION['usuario']);
$v->categorias = $categorias;
$v->user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$v->completo = isset($_SESSION['completo_modificacion_post']) ? $_SESSION['completo_modificacion_post'] : null;
$v->errores = isset($_SESSION['errores_modificacion_post']) ? $_SESSION['errores_modificacion_post'] : null;

$v->render();
unset($_SESSION['completo_modificacion_post']);
unset($_SESSION['errores_modificacion_post']);