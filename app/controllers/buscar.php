<?php

//CONTROLADOR QUE BUSCA LOS DATOS Y LOS LISTA

include_once MOD . 'tareas.php'; //Funciones para la tabla tareas
include_once 'Funciones.php';

//Para guardar los criterios de búsqueda al paginar las tareas
if ($_POST) { //Cuando entra la primera vez
    $_SESSION['post'] = $_POST; //La sesión es igual al POST(criterios de búsqueda)
} else { //No es la primera vez
    $_POST = $_SESSION['post']; //Se le asigna al nuevo POST los criterios de búsqueda
}

// Ruta URL desde la que ejecutamos el script
$myURL = '?page=buscar';

$nElementosxPagina = 5; //Número de elementos que se muestran por página
// Calculamos el número de página que mostraremos
if (isset($_GET['pag'])) {
    // Leemos de GET el número de página
    $nPag = $_GET['pag'];
} else {
    // Mostramos la primera página
    $nPag = 1;
}

if ($_POST['fecha'] == "")//Si no se ha enviado criterio para la fecha realización
    $_POST['operacion'] = 'like';

//Guardamos el número de registros
$reg = ContarRegistrosRes($_POST['operacion'], $_POST['fecha'], $_POST['estado'], $_POST['letra']);
$totalRegistros = $reg['total'];

if ($totalRegistros == 0) {
    echo '<h2 align="center">No existen tareas con los criterios de búsqueda seleccionados</h2>';
} else {
//Las páginas será el nº de registros entre el nº de elementos que mostremos
    $totalPaginas = $totalRegistros / $nElementosxPagina;

    if (is_float($totalPaginas)) {
        $totalPaginas = intval($totalPaginas);
        $totalPaginas++;
    }
    if (isset($_GET['pag']) && $_GET['pag'] > $totalPaginas) {
        include_once VIEW . 'Error404.php';
    } else {

// Calculamos el registro por el que se empieza en la sentencia LIMIT
        $nReg = ($nPag - 1) * $nElementosxPagina;

// --SENTENCIAS PHP -- Mostramos los elementos de la consulta como deseemos
        $resultado = BuscarTareas($nReg, $nElementosxPagina, $_POST['operacion'], $_POST['fecha'], $_POST['estado'], $_POST['letra']);

        include_once VIEW . 'FormInicio.php'; //Muestra el HTML de paginación
        MuestraPaginador($nPag, $totalPaginas, $myURL); //Muestra el paginador
    }
}


