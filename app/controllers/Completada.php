<?php
//CONTROLADOR PARA COMPLETAR UNA TAREA
include_once MOD . 'tareas.php';
$tareas = VistaDetallada($_GET['idTarea']); //Devuelve todos los datos de la tarea pasada por GET

if (!$_POST) {
    if (!ExisteTarea($_GET['idTarea'])) { //Si la tarea no existe, mostrar error
        include_once VIEW . 'Error404.php';
    } else
        include VIEW . 'FormCompletada.php'; //Si existe mostrar el Formulario para completar la tarea
}
else {
    //Se han envíado los datos y se actualizan en la base de datos
    ActualizarRegistro($_POST, $_GET['idTarea']);
    include_once 'redireccionar.php'; //redirecciona a la página principal
}
?>
