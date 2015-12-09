<?php

//CONTROLADOR PARA MOSTRAR TODOS LOS DATOS DE UNA TAREA
include_once MOD . 'tareas.php';
$tareas = VistaDetallada($_GET['idTarea']); //Devuelve todos los datos la tarea pasada por GET

if (!$_POST) {
    if (!ExisteTarea($_GET['idTarea'])) { //Si no existe la tarea mostrar error
        include_once VIEW . 'Error404.php';
    } else //Si existe mostrar todos los datos
        include VIEW . 'FormDetallada.php';
}