<?php

//CONTROLADOR PARA LA OPERACIÓN DE BUSCAR
if (!$_POST)
    include_once VIEW . 'FormBuscar.php'; //Muestra el formulario de búsqueda
else
    include_once 'buscar.php'; //Controlador que busca los datos y los lista
?>
