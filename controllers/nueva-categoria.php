<?php

require '../fw/fw.php';
require '../models/Categorias.php';
require '../views/NuevaCategoria.php';

if(!isset($_SESSION['usuario'])){
    header('Location: index.php');
}

$cate = new Categorias();
$categorias = $cate->getTodos();

if(isset($_POST['nueva_categoria'])){
    if(!isset($_POST['nombre'])) die("Error de validacion nombre de categoria");

    try{
        $cate->create($_POST['nombre']);
        $_SESSION['categoria_guardado'] = "La categoria se ha guardado con éxito";
    }catch(ValidationCategory $e){
        $_SESSION['errores_new_categoria'] = $e;
    }
}



$v = new NuevaCategoria();
$v->categorias = $categorias;
$v->completo = isset($_SESSION['categoria_guardado']) ? $_SESSION['categoria_guardado'] : null;
$v->errores = isset($_SESSION['errores_new_categoria']) ? $_SESSION['errores_new_categoria'] : null;
$v->user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

$v->render();

unset($_SESSION['categoria_guardado']);
unset($_SESSION['errores_new_categoria']);