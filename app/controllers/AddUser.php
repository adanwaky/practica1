<?php
//CONTROLADOR PARA AÑADIR UN USUARIO EN LA BASE DE DATOS
include_once "Funciones.php";
include_once MOD . 'users.php';
$errores = []; //Array donde almacenamos los errores si hubiese
$HayError = false;

if (!$_POST) {
    include_once VIEW . 'AnadirUsuario.php';
} else {
    ErrorGuardarUser($errores, $HayError);

    if ($HayError)//Datos introducidos incorrectos
        include_once VIEW . 'AnadirUsuario.php';
    else {
        $datos = Array('nombre' => $_POST['nombre'],
            'password' => sha1($_POST['password']),//Se codifica la contraseña
            'tipo' => $_POST['tipo']);

        UserAdd($datos);//Añade el usuario
        header("Location: index.php?page=ListaUser");//Muestra la lista
    }
}