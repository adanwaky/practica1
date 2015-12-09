<?php

//CONTROLADOR PARA BORRAR UNA TAREA
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'Administrador') {
    include_once MOD . 'tareas.php'; //Funciones para la tabla tareas
    $resultado = BuscarTarea($_GET['idTarea']); //Busca la tarea de la posición que llega por GET

    if (!$_POST) {
        if (!ExisteTarea($_GET['idTarea'])) { //Si no se ha enviado nada y la tarea no existe
            include_once VIEW . 'Error404.php';
        } else //Si la tarea existe muestra el formulario de confirmación de borrado
            include VIEW . "FormBorrar.php";
    }
    else {
        if (isset($_POST['no'])) {//Si no se quiere borrar la tarea recarga el index
            include_once 'redireccionar.php';
        }

        if (isset($_POST['si'])) {
        //Si se quiere borrar la tarea, se borra de la base de datos
        // y recarga el index
            BorrarRegistro($_GET['idTarea']);
            include_once 'redireccionar.php';
        }
    }
} else
    include_once VIEW . 'Error404.php';
?>
