<?php

/**
 * Devuelve el valor de un campo enviado por POST. Si no existe devuelve el valor por defecto
 * @param string $nombreCampo Nombre del campo del formulario
 * @param string $valorPorDefecto Valor vacío por defecto
 * @return string
 */
function ValorPost($nombreCampo, $valorPorDefecto = '') {
    if (isset($_POST[$nombreCampo]))
        return $_POST[$nombreCampo];
    else
        return $valorPorDefecto;
}

/**
 * Comprueba que los datos introducidos en los formularios son correctos
 * @param array $errores Array donde se guarda los errores
 * @param boolean $HayError Variable para indicar que hay error
 */
function comprobarErrores(& $errores, & $HayError) {
    $exp_cp = '/0[1-9][0-9]{3}|[1-4][0-9]{4}|5[0-2][0-9]{3}/'; //CP ESPAÑA
    $exp_tlf = '/[0-9]{9}$/'; //TELEFONO	
    $exp_dni = '/^[0-9]{8}[A-Za-z]$/'; //DNI

    if ($_POST['Descripcion'] == "") {
        $errores['Descripcion'] = "Descripción vacío";
        $HayError = true;
    }

    if ($_POST['Nombre'] == "") {
        $errores['Nombre'] = "Nombre vacío";
        $HayError = true;
    }

    if ($_POST['Apellidos'] == "") {
        $errores['Apellidos'] = "Apellidos vacío";
        $HayError = true;
    }

    if ($_POST['e-mail'] == "" || !filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL)) {
        $errores['e-mail'] = "Error en el e-mail";
        $HayError = true;
    }

    if ($_POST['Fecha_realizacion'] <= date('Y-m-d')) {
        $errores['Fecha_realizacion'] = "Fecha de realización menor o igual que hoy";
        $HayError = true;
    }

    if (!preg_match($exp_cp, $_POST['CP'])) {
        $errores['CP'] = "Código postal incorrecto";
        $HayError = true;
    }

    if ($_POST['tbl_provincias_cod'] == "") {
        $errores['tbl_provincias_cod'] = "Provincia vacía";
        $HayError = true;
    }

    $telefono = $_POST['Telefono'];
    //Se quitan los espacios y guiones al telefono para validar la expresión regular
    $telefono = str_replace(" ", "", $telefono);
    $telefono = str_replace("-", "", $telefono);

    if ($_POST['Telefono'] == "" || !preg_match($exp_tlf, $telefono)) {
        $errores['Telefono'] = "Teléfono incorrecto";
        $HayError = true;
    }

    if (!preg_match($exp_dni, $_POST['DNI'])) {
        $errores['DNI'] = "DNI incorrecto";
        $HayError = true;
    }
}

/**
 *
 * @param string $name Nombre del campo
 * @param array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param string $valorDefecto Valor seleccionado
 * @return string
 */
function CreaSelect($name, $opciones, $valorDefecto = '') {
    $html = "\n" . '<select class="form-control" name="' . $name . '">';
    $html.='<option value=""></option>';
    foreach ($opciones as $value => $text) {
        if ($value == $valorDefecto)
            $select = 'selected="selected"';
        else
            $select = "";
        $html.= "\n\t<option value=\"$value\" $select>$text</option>";
    }
    $html.="\n</select>";

    return $html;
}

/**
 * Muestra un paginador para una lista de elementos
 *
 * @param int $pag_actual Página en la que nos encontramos
 * @param int $nPags Número de páginas para mostrar los registros
 * @param string $url URL de la página que muestra la lista
 */
function MuestraPaginador($pag_actual, $nPags, $url) {
    // Mostramos paginador
    echo '<div>';
    echo '<div class="col-xs-12">';
    echo EnlaceAPagina($url, 1, '<button type="button" class="btn btn-primary">Inicio</button>');
    echo EnlaceAPagina($url, $pag_actual - 1, '<button type="button" class="btn btn-info">Anterior</button>', $pag_actual > 1);

    echo '&nbsp';
    echo EnlaceAPagina($url, $pag_actual + 1, '<button type="button" class="btn btn-info">Siguiente</button>', $pag_actual < $nPags);

    echo EnlaceAPagina($url, $nPags, '<button type="button" class="btn btn-primary">Fin</button>');

    echo '<br>'; //Siguiente linea
    echo '<br>';
    for ($pag = 1; $pag <= $nPags; $pag++) {
        echo EnlaceAPagina($url, $pag, "<button type='button' class='btn btn-primary btn-sm'>$pag</button>", $pag_actual != $pag);
    }
    echo "<br><br></div>";
}

/**
 * Devuelve el texto de un enlace a la página $url si el enlace está activo,
 * en otro caso solo devuelve el texto
 *
 * @param string $url		URL de la página que muestra la lista
 * @param int $pag			Nº de página al cual enlazamos
 * @param string $texto		Texto del enlace
 * @param bool $activo		Se muestra enlace (true) o no (false)
 * @return string
 */
function EnlaceAPagina($url, $pag, $texto, $activo = true) {
    if ($activo)
        return '  <a href="' . $url . '&pag=' . $pag . '">' . $texto . '</a>  '; //& para pasar la variable pag
    else
        return $texto;
}

/**
 * Comprueba que los datos introducidos en el formulario de nuevo usuario sean correctos
 * @param array $errores Array donde se guardan los errores
 * @param boolean $HayError Variable para indicar que hay error
 */
function ErrorGuardarUser(& $errores, & $HayError) {
    if (!isset($_POST['tipo'])) {
        $errores['tipo'] = "¡Indique el tipo!";
        $HayError = true;
    } else {
        if (CoincideUser($_POST['nombre'], $_POST['tipo'])) {
            $errores['usnom'] = "¡Usuario existente!";
            $HayError = true;
        }

        if ($_POST['nombre'] == "") {
            $errores['usnom'] = "¡Campo vacío!";
            $HayError = true;
        }

        if ($_POST['password'] == "") {
            $errores['pass'] = "¡Escriba la misma contraseña!";
            $HayError = true;
        }
        if ($_POST['pass1'] != $_POST['password']) {
            $errores['pass'] = "¡Escriba la misma contraseña!";
            $HayError = true;
        }
    }
}

/**
 * Comprueba que los datos introducidos en el formulario de modificar usuario sean correctos
 * @param int $iduser id del usuario
 * @param array $erroresrray donde se guardan los errores
 * @param boolean $HayError Variable para indicar que hay error
 */
function ErrorModUser($iduser, & $errores, & $HayError) {
    if ($_POST['nombre'] == "") {
        $errores['usnom'] = "¡Campo vacío!";
        $HayError = true;
    }

    $contraseña = DevuelveContraseña($iduser);

    if (substr(sha1($_POST['pass']), 0, 16) != $contraseña) {
        $errores['pass'] = "¡Contraseña incorrecta!";
        $HayError = true;
    }

    if ($_POST['password'] == "") {
        $errores['pass2'] = "¡Contraseña vacía!";
        $HayError = true;
    }
}

/**
 * Comprueba que los datos introducidos en el formulario de configuración para la base de datos sean correctos
 * @param array $erroresrray donde se guardan los errores
 * @param boolean $HayError Variable para indicar que hay error
 */
function ErrorConf(& $errores, & $HayError) {
    if ($_POST['servidor'] == "") {
        $HayError = true;
        $errores['servidor'] = 'Campo vacío';
    }
    if ($_POST['usuario'] == "") {
        $HayError = true;
        $errores['usuario'] = 'Campo vacío';
    }
    if ($_POST['base_datos'] == "") {
        $HayError = true;
        $errores['base_datos'] = 'Campo vacío';
    }
}
