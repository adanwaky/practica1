<?php

//CONTROLADOR PARA MODIFICAR UNA TAREA
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'Administrador') {
    include_once "Funciones.php";
    $errores = []; //Array para almacenar los errores si hubiese
    $HayError = false;
    include_once MOD . 'provincias.php';
    $provincias = Provincias(); //Devuelve un array con todas las provincias españolas
    include_once MOD . 'tareas.php';
    $tareas = VistaDetallada($_GET['idTarea']); //Devuelve todos los datos de la tarea pasada por GET

    if (!$_POST) {
        if (!ExisteTarea($_GET['idTarea'])) {//Si la tarea no existe mostrar error
            echo 'no existe tarea';
            include_once VIEW . 'Error404.php';
        } else //Si existe mostrar el formulario para modificar los datos
            include VIEW . 'FormModificar.php';
    }
    else {
        comprobarErrores($errores, $HayError);

        if ($HayError) {//Si hay errores, se muestran los datos de $_POST para corregirlos 
            $tareas = $_POST;
            include VIEW . 'FormModificar.php';
        } else { //No hay errores
            ActualizarRegistro($_POST, $_POST['idTarea']); //Actualiza el registro en la base de datos
            include_once 'redireccionar.php'; //Redirecciona a la página principal
        }
    }
} else
    include_once VIEW . 'Error404.php';
?>
