<?php

//CONTROLADOR QUE MUESTRA UNOS DATOS DE LAS TAREAS DE LA BASE DE DATOS DE 1O EN 10
include_once MOD . 'tareas.php';
include_once 'Funciones.php';

// Ruta URL desde la que ejecutamos el script
$myURL = '?page=inicio_pag';

$nElementosxPagina = 5;

$reg = ContarRegistros(); //guardamos en el array

$totalRegistros = $reg['total'];
//Las páginas será el nº de registros entre el nº de elementos que mostremos
$totalPaginas = $totalRegistros / $nElementosxPagina;

// Calculamos el número de página que mostraremos
if (isset($_GET['pag'])) {
    $nPag = $_GET['pag'];
} else {
    // Mostramos la primera página
    $nPag = 1;
}
//Si el total de páginas es un decimal se le suma uno
if (is_float($totalPaginas)) {
    $totalPaginas = intval($totalPaginas);
    $totalPaginas++;
}
//Si introducen un número de página mayor al total de páginas mostrar error
if (isset($_GET['pag']) && $_GET['pag'] > $totalPaginas) {
    include_once VIEW . 'Error404.php';
} else {

// Calculamos el registro por el que se empieza en la sentencia LIMIT
    $nReg = ($nPag - 1) * $nElementosxPagina;

// --SENTENCIAS PHP -- Mostramos los elementos de la consulta como deseemos
    $resultado = DatosPaginacion($nReg, $nElementosxPagina); //Devuelve unos datos limitados de las tareas

    include_once VIEW . 'FormInicio.php'; //Donde se muestran los datos
    MuestraPaginador($nPag, $totalPaginas, $myURL);
}



