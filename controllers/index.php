<?php
//controllers/index.php

require '../fw/fw.php';
require '../models/Categorias.php';
require '../models/Publicaciones.php';
require '../models/Usuarios.php';
require '../views/Index.php';


if(isset($_POST['registro'])){

    if(!isset($_POST['nombre'])) die("Error de validacion nombre"); 
    if(!isset($_POST['apellido'])) die("Error de validacion apellido"); 
    if(!isset($_POST['emailr'])) die("Error de validacion email"); 
    if(!isset($_POST['passwordr'])) die("Error de validacion password");
    
    try{
        $user = new Usuarios();
        $user->create($_POST['nombre'], $_POST['apellido'], $_POST['emailr'], $_POST['passwordr']);
        $_SESSION['completo'] = "El registro se ha completado con exito";

    }catch(ValidationUser $e){
        $_SESSION['errores'] = $e;
    }
}

if(isset($_POST['entrar'])){
    
    if(!isset($_POST['emaili'])) die("Error de validacion email"); 
    if(!isset($_POST['passwordi'])) die("Error de validacion password"); 
    
    try {
        $user = new Usuarios();
        $_SESSION['usuario'] = $user->getUser($_POST['emaili'], $_POST['passwordi']);
    } catch (ValidationUser $e) {
        $_SESSION['errores'] = $e;
    }
}


$cate = new Categorias();
$cateTodos = $cate->getTodos();

$publi = new Publicaciones();
$publiTodos = $publi->getPublicaciones(4);

//var_dump($publiTodos);

$v = new Index();
$v->categorias = $cateTodos;
$v->publicaciones = $publiTodos;
$v->errores = isset($_SESSION['errores']) ? $_SESSION['errores'] : null;
$v->completo = isset($_SESSION['completo']) ? $_SESSION['completo'] : null;
$v->user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$v->render();

unset($_SESSION['completo']);
unset($_SESSION['errores']);