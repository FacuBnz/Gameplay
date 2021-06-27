<?php
require '../fw/fw.php';
require '../models/Categorias.php';
require '../models/Usuarios.php';
require '../views/ModificarDatos.php';

if(!isset($_SESSION['usuario'])){
    header('Location: index');
}

$cate = new Categorias();
$u = new Usuarios();
$v = new ModificarDatos();

if(count($_POST) > 0){

    if(!isset($_POST['nombre'])) die("Error de validacion nombre");
    if(!isset($_POST['apellido'])) die("Error de validacion apellido");
    if(!isset($_POST['email'])) die("Error de validacion email");
    
    try {
        $u->update($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_SESSION['usuario']);
        $_SESSION['completo_datos_user'] = "Los datos se han guardado con exito";
        $_SESSION['usuario']['nombre'] = $_POST['nombre'];
        $_SESSION['usuario']['apellido'] = $_POST['apellido'];
        $_SESSION['usuario']['email'] = $_POST['email'];

    } catch (ValidationUser $e) {
        $_SESSION['errores_modificacion_user'] = $e;
    }
}

$cateTodos = $cate->getTodos();
$v->categorias = $cateTodos;
$v->completo = isset($_SESSION['completo_datos_user']) ? $_SESSION['completo_datos_user'] : null;
$v->errores = isset($_SESSION['errores_modificacion_user']) ? $_SESSION['errores_modificacion_user'] : null;
$v->user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$v->render();

unset($_SESSION['errores_modificacion_user']);
unset($_SESSION['completo_datos_user']);