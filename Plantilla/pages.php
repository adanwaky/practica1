<?php

if (!file_exists('config.php')) { //Si no existe el fichero config
    include_once CTRL . 'setup.php'; //Mostrar instalador de la bd
} else {
    if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {//Si no ha iniciado sesión un usuario
        include_once CTRL . 'login.php';//Mostrar login
    } else {
        //LLAMA A LA PÁGINA DE LA CARPETA CONTROLLERS QUE PIDAMOS USANDO GET index.php?
        if (!isset($_GET['page'])) {
            include(CTRL . "inicio_pag.php");
        } else {
            $file = CTRL . $_GET['page'] . '.php';

            if (file_exists($file)) {
                include(CTRL . $_GET['page'] . ".php");
            } else
                include_once 'Error404.php';
        }
    }
}
