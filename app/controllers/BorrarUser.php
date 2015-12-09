<?php

//CONTROLADOR PARA BORRAR UN USUARIO

include_once MOD . 'users.php'; //Funciones para la tabla usuarios
$usuario = DatosUser($_GET['idusers']); //Busca la tarea de la posición que llega por GET

if (!$_POST) {
    if (!ExisteUser($_GET['idusers'])) { //Si no se ha enviado nada y el usuario no existe
        include_once VIEW . 'Error404.php';
    } else //Si el usuario existe muestra el formulario de confirmación de borrado
        include VIEW . "BorraUser.php";
}
else {
    if (isset($_POST['no'])) {//Si no se quiere borrar el usuario recarga el index
        header("Location: index.php?page=ListaUser");
    }

    if (isset($_POST['si'])) {
        //Si se quiere borrar el usuario, se borra de la base de datos
        // y recarga la lista
        BorraUser($_GET['idusers']);
        header("Location: index.php?page=ListaUser");
    }
}
?>
