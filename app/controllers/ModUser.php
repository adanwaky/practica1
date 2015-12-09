<?php

//CONTROLADOR PARA MODIFICAR UNA TAREA
include_once "Funciones.php";
$errores = []; //Array para almacenar los errores si hubiese
$HayError = false;
include_once MOD . 'users.php';
$usuario = DatosUser($_GET['idusers']); //Devuelve todos los datos del usuario pasado por GET

if (!$_POST) {

    if (!ExisteUser($_GET['idusers']) || ($usuario['nombre'] != $_SESSION['user'] && $_SESSION['tipo'] == 'Operario')) {//Si el usuario no existe mostrar error
        include_once VIEW . 'Error404.php';
    } else //Si existe mostrar el formulario para modificar los datos
        include VIEW . 'ModificarUser.php';
}
else {
    ErrorModUser($_GET['idusers'], $errores, $HayError);
    if (!nombreDisponible($_POST['nombre'], $_GET['idusers'], $_POST['tipo'])) {
        $errores['usnom'] = "¡Usuario ya existe!";
        $HayError = true;
    }
    if ($HayError) {//Si hay errores, se muestran los datos de $_POST para corregirlos 
        $usuario = $_POST;
        include VIEW . 'ModificarUser.php';
    } else { //No hay errores
        $datos = Array('nombre' => $_POST['nombre'],
            'password' => sha1($_POST['password']),//Codifica la contraseña
            'tipo' => $_POST['tipo']);

        ActualizaUser($datos, $_POST['idusers']); //Actualiza el registro en la base de datos

        $_SESSION['user'] = $_POST['nombre'];//Cambiar el nombre de usuario en la sesión
        include_once 'redireccionar.php'; //Recarga el index si es operario y la lista si es Administrador
        if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'Administrador') {
            header("Location: index.php?page=ListaUser");
        }
    }
}
?>