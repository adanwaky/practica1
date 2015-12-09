<!--Formulario de configuración de la bd-->
<html>
<head>
<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../assets/bootstrap/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../assets/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body >
<div class="col-md-3"></div>
<div class="col-md-5" >
	<div class="panel panel-primary" align="center">
	  <div class="panel-heading">
		<div class="panel-title" align="center">CONFIGURACIÓN</div>
	  </div>
	  <div class="panel-body">
		<form role="form" method="post" action="" class="form-horizontal">
		<div class="form-group" style="padding-left:8px">
			<div class="row">
				<label class="col-xs-3 control-label">Servidor: </label>
				<input class="col-xs-8" class="form-control" type="text" name="servidor" value="<?=ValorPost('servidor')?>" 
	style="<?php  if (isset($errores['servidor']))
			 	echo "background-color: #F78181;"?>"> 
			</div>
			<div class="row">
				<label class="col-xs-3 control-label">Usuario: </label>
				<input class="col-xs-8" class="form-control" type="text" name="usuario" value="<?=ValorPost('usuario')?>" 
	style="<?php  if (isset($errores['usuario']))
			 	echo "background-color: #F78181;"?>">	
			</div>
			<div class="row">
				<label class="col-xs-3 control-label">Contraseña: </label>
				<input class="col-xs-8" class="form-control" type="password" name="password" value="" >	
			</div>
			<div class="row">
                            <label class="col-xs-3 control-label">Base&nbsp;de&nbsp;datos: </label>
				<input class="col-xs-8" class="form-control" type="text" name="base_datos" value="<?=ValorPost('base_datos')?>" 
	style="<?php  if (isset($errores['base_datos']))
			 	echo "background-color: #F78181;"?>"><br><br>
			 						<?php  if (isset($errores['base_datos']))
			 								echo $errores['base_datos']?>  	
			</div>			
		</div>
		</div >
		<div class="row" style="padding-bottom:8px"> 
		<input  class="btn btn-success" type="submit" value="GUARDAR"></div>
		</form>
	  </div>
</div>