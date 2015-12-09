<?php include_once CTRL.'Funciones.php'; 
$users =DatosUser($_SESSION['id'])?>
<html>
<body>
<div class="col-xs-3"></div>
<div class="col-xs-5">
	<div class="panel panel-primary" align="center">
	  <div class="panel-heading">
		<div class="panel-title" align="center">Modificar usuario</div>
	  </div>
	  <div class="panel-body">
		<form role="form" method="post" action="" class="form-horizontal">
		<div class="form-group" style="padding-left:8px">
			<div class="row">
			<input type="hidden" name="idusers" value="<?=$usuario['idusers']?>">
				<label class="col-xs-4 control-label">Nombre usuario: </label>
				<input class="col-xs-6" class="form-control" type="text" name="nombre"
				 value="<?=$usuario['nombre']?>" style="<?php  if (isset($errores['usnom']))
			 										echo "background-color: #F78181;"?>" > 	
			 								<?php  if (isset($errores['usnom']))
								 								echo '<br><br>'.$errores['usnom']?>	
			</div>
			<div class="row">
				<label class="col-xs-4 control-label">Contraseña: </label>
				<input class="col-xs-6" class="form-control" type="password" name="pass" value="" style="<?php  if (isset($errores['pass']))
			 										echo "background-color: #F78181;"?>" >	
			</div>
			<div class="row">
				<label class="col-xs-4 control-label">Nueva contraseña: </label>
				<input class="col-xs-6" class="form-control" type="password" name="password" value="" style="<?php  if (isset($errores['pass2']))
			 										echo "background-color: #F78181;"?>">			 										
			 										<?php  if (isset($errores['pass2']))
								 								echo '<br><br>'.$errores['pass2']?>	
			</div>
			<?php if (isset($_SESSION['user']) && $_SESSION['tipo']=='Administrador'){
                            //Si es administrador permitir cambiar el tipo?>
			<div class="row">
			<?php $tipo=$usuario['tipo']?>
				<label class="col-xs-4 control-label">Tipo: </label>
				<input  type="radio" value="Operario" name="tipo" <?php if ($tipo=="Operario") echo "checked" ?> >Operario
				<input type="radio" name="tipo" value="Administrador" <?php if ($tipo=="Administrador") echo "checked" ?>>Administrador	
			</div>                    
			<?php }else {
                           //Si no el tipo es operario?>
			<input type="hidden" name="tipo" value="Operario">
				<?php }?>
		</div>
		</div >
		<div class="row" style="padding-bottom:8px"> 
		<input  class="btn btn-success" type="submit" value="GUARDAR"></div>
		</form>
	  </div>
</div>

</body>
</html>