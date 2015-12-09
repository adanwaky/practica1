<?php

/* Incluimos el fichero de la clase */
include_once INS . 'bd_model.php';

/**
 * Devuelve un array con los datos de las provincias
 * @return array
 */
function Provincias() {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();

    /* Creamos una query sencilla */
    $sql = 'SELECT cod, nombre as nom
			 FROM `tbl_provincias`';

    /* Ejecutamos la query */
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las provincias
    $Provincias = Array();

    /* Realizamos un bucle para ir obteniendo los resultados */
    while ($reg = $bd->LeeRegistro()) {
        $Provincias[$reg['cod']] = $reg['nom'];
    }
    return $Provincias;
}

/**
 * Devuelve el nombre de una provincia de la id pasada por parámetro
 * @param int $id id de la provincia
 * @return array
 */
function DevuelveProvincia($id) {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();

    /* Creamos una query sencilla */
    $sql = "SELECT nombre as nom FROM `tbl_provincias` where cod=$id";

    /* Ejecutamos la query */
    $bd->Consulta($sql);

    $reg = $bd->LeeRegistro();
    $Provincia = $reg['nom'];

    return $Provincia;
}
