<?php
//Controlador de inicio de sesión
include_once MOD . 'users.php';
if (!$_POST) {
    include_once VIEW . 'FormLogin.php';//Muestra el formulario
} else {
    //Valida que los datos enviados concuerden con los de la base de datos
    //La contraseña es VARCHAR(16) y hay que recortarla para compararlo 
    if (ValidaUser($_POST['user'], $_POST['tipo'], substr(sha1($_POST['pass']), 0, 16))) {
        //Se guarda en la sesión los datos que nos van a servir
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];
        $_SESSION['tipo'] = $_POST['tipo'];
        $_SESSION['hora'] = date("H:i:s");
        include_once 'redireccionar.php';
    } else {
        include_once 'redireccionar.php';
    }
}