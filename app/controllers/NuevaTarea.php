<?php

//CONTROLADOR PARA CREAR UNA TAREA
include_once "Funciones.php";
$errores = []; //Array donde almacenamos los errores si hubiese
$HayError = false;
include_once MOD . 'provincias.php';
$provincias = Provincias(); //Devuelve todas las provincias españolas
include_once MOD . 'tareas.php';

if (!$_POST) {
    include_once VIEW . "FormNuevaTarea.php"; //Muestra el formulario de nueva tarea
} else {
    comprobarErrores($errores, $HayError);

    if ($HayError) {//Si hay errores se muestra de nuevo el formulario
        include VIEW . 'FormNuevaTarea.php';
    } else { //Si no hay errores se inserta el registro en la base de datos
        InsertarRegistro($_POST);
        include_once 'redireccionar.php'; //Redirecciona a la página principal
    }
}
