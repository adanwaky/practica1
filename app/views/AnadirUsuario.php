<?php include_once CTRL . 'Funciones.php';
//FORMULARIO PARA GUARDAR UN USUARIO?>
<html>
    <body>
        <div class="col-xs-3"></div>
        <div class="col-xs-5">
            <div class="panel panel-primary" align="center">
                <div class="panel-heading">
                    <div class="panel-title" align="center">Añadir usuario</div>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="" class="form-horizontal">
                        <div class="form-group" style="padding-left:8px">
                            <div class="row">
                                <label class="col-xs-4 control-label">Nombre usuario: </label>
                                <input class="col-xs-6" class="form-control" type="text" name="nombre"
                                       value="<?= ValorPost('nombre') ?>" style="<?php if (isset($errores['usnom']))
    echo "background-color: #F78181;"
    ?>" >	
                                       <?php if (isset($errores['usnom']))
                                           echo '<br><br>' . $errores['usnom']
                                           ?>
                            </div>
                            <div class="row">
                                <label class="col-xs-4 control-label">Contraseña: </label>
                                <input class="col-xs-6" class="form-control" type="password" name="pass1" value="" style="<?php if (isset($errores['pass']))
                                           echo "background-color: #F78181;"
                                           ?>" >	
                            </div>
                            <div class="row">
                                <label class="col-xs-4 control-label">Repita contraseña: </label>
                                <input class="col-xs-6" class="form-control" type="password" name="password" value="" style="<?php if (isset($errores['pass']))
                                           echo "background-color: #F78181;"
                                           ?>">

                                <?php if (isset($errores['pass']))
                                    echo '<br><br>' . $errores['pass']
                                    ?>	
                            </div>
                            <div class="row">
                                <?php $tipo = ValorPost('tipo') ?>
                                <label class="col-xs-4 control-label">Tipo: </label>
                                <input  type="radio" value="Operario" name="tipo" <?php if ($tipo == "Operario") echo "checked" ?> >Operario
                                <input type="radio" name="tipo" value="Administrador" <?php if ($tipo == "Administrador") echo "checked" ?>>Administrador	
<?php if (isset($errores['tipo']))
    echo '<br><br>' . $errores['tipo']
    ?>
                            </div>
                        </div>
                </div >
                <div class="row" style="padding-bottom:8px"> 
                    <input  class="btn btn-success" type="submit" value="GUARDAR"></div>
                </form>
            </div>
        </div>

    </body>
</html>