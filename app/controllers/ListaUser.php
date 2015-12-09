<?php
//CONTROLADOR PARA MOSTRAR LA LISTA DE LOS USUARIOS
include_once MOD . 'users.php';
$resultado = Usuarios();//Array donde guardan todos los usuarios

if (!$_POST) {
    include_once VIEW . 'ListaUsuario.php';
}

