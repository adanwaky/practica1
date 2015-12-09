<?php

/* Incluimos el fichero de la clase */
include_once INS . 'bd_model.php';
include_once MOD . 'users.php';

/**
 * Función para validar un usuario mirando si su nombre, contraseña y tipo están en la base de datos
 * @param string $us Nombre del usuario pasado por $_POST
 * @param string $tipo Tipo del usuario pasado por $_POST
 * @param string $pass Contraseña del usuario pasado por $_POST
 * @return boolean
 */
function ValidaUser($us, $tipo, $pass) {
    $bd = Db::getInstance();
    $sql = "SELECT idusers as id FROM `users` where `nombre`='$us' and tipo='$tipo' and password='$pass'";
    $bd->Consulta($sql);
    $id = $bd->LeeRegistro();

    if ($id != "") {
        $_SESSION['id'] = $id['id'];
        return true;
    } else {
        return false;
    }
}

/**
 * Devuelve un array con todos los usuarios de la base de datos
 * @return array
 */
function Usuarios() {

    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();

    /* Creamos una query sencilla */
    $sql = "SELECT idusers as id, nombre as nom, tipo as tipo FROM users";

    /* Ejecutamos la query */
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las tareas
    $usuarios = Array();

    /* Realizamos un bucle para ir obteniendo los resultados */
    while ($reg = $bd->LeeRegistro()) {
        $usuarios[$reg['id']] = Array(
            'idusers' => $reg['id'],
            'nombre' => $reg['nom'],
            'tipo' => $reg['tipo']);
    }
    return $usuarios;
}

/**
 * Función para añadir un usuario a la base de datos
 * @param array $registros Datos del usuario
 */
function UserAdd($registros) {
    $bd = Db::getInstance();

    $bd->Insertar('users', $registros);
}

/**
 * Función para comprobar si un usuario existe en la base de datos mediante su id
 * @param int $id id del usuario
 * @return boolean
 */
function ExisteUser($id) {
    $bd = Db::getInstance();
    $sql = "SELECT count(*) as total FROM `users` WHERE `idusers` = $id";
    $bd->Consulta($sql);
    $cont = $bd->LeeRegistro();

    if ($cont['total'] != 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * Devuelve todos los datos de un usuario indicando su id por parámetro
 * @param int $iduser id del usuario
 * @return array
 */
function DatosUser($iduser) {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();

    /* Creamos una query sencilla */
    $sql = "SELECT * FROM `users` WHERE idusers=$iduser";

    /* Ejecutamos la query */
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las tareas
    $Users = Array();

    /* Realizamos un bucle para ir obteniendo los resultados */
    while ($reg = $bd->LeeRegistro()) {
        $Users = $reg;
    }
    return $Users;
}

/**
 * Actualiza los datos de un usuario
 * @param array $registro Datos del usuario
 * @param int $id id del usuario
 */
function ActualizaUser($registro, $id) {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();
    $bd->Actualizar('users', $registro, 'idusers', $id);
}

/**
 * Devuelve la contraseña de un usuario indicando su id por parámetro
 * @param int $iduser id del usuario
 * @return array
 */
function DevuelveContraseña($iduser) {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();

    /* Creamos una query sencilla */
    $sql = "SELECT password as pass FROM `users` where idusers=$iduser";

    /* Ejecutamos la query */
    $bd->Consulta($sql);
    $reg = $bd->LeeRegistro();

    $contraseña = $reg['pass'];

    return $contraseña;
}

/**
 * Función para borrar un usuario
 * @param int $iduser id del usuario
 */
function BorraUser($iduser) {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();
    $bd->Borrar('users', 'idusers', $iduser);
}

/**
 * Devuelve true si existe en la base de datos un usuario cuando coincide el nombre y el tipo para 
 * que no puedan repetirse los datos
 * @param string $nombre Nombre del usuario 
 * @param string $tipo Tipo del usuario
 * @return boolean
 */
function CoincideUser($nombre, $tipo) {
    $bd = Db::getInstance();
    $sql = "SELECT count(*) as total FROM `users` WHERE `nombre`='$nombre' and tipo='$tipo'";
    $bd->Consulta($sql);
    $cont = $bd->LeeRegistro();

    if ($cont['total'] != 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * Devuelve todos los nombres de la base de datos diferentes al del usuario que se pase por parámetro
 * @param int $id id del usuario
 * @return array
 */
function nombresUsados($id, $tipo) {
    $bd = Db::getInstance();
    $sql = "SELECT nombre as nom FROM `users` WHERE idusers!='$id' and tipo='$tipo'";
    $bd->Consulta($sql);
    // Creamos el array donde se guardarán las tareas
    $Users = Array();

    /* Realizamos un bucle para ir obteniendo los resultados */
    while ($reg = $bd->LeeRegistro()) {
        $Users[] = $reg['nom'];
    }
    return $Users;
}

/**
 * Devuelve true si el nommbre y el tipo pasado por parámetro no se repite en la base de datos
 * @param string $nombre Nombre del usuario
 * @param int $id id del usuario
 * @param string $tipo Tipo del usuario
 * @return boolean
 */
function nombreDisponible($nombre, $id, $tipo) {
    $disponible = true;
    $Users = Array();
    $Users = nombresUsados($id, $tipo);

    foreach ($Users as $user) {
        if ($user == $nombre) {
            $disponible = false;
        }
    }

    return $disponible;
}
