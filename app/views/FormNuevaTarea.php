<!-- FORMULARIO PARA CREAR UNA NUEVA TAREA -->
<html>
<head> 
<?php include_once CTRL.'Funciones.php'; 
include_once MOD.'provincias.php';  ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $.datepicker.regional['es'] = {
		  closeText: 'Cerrar',
		  prevText: '<Ant',
		  nextText: 'Sig>',
		  currentText: 'Hoy',
		  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		  monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		  dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		  weekHeader: 'Sm',
		  dateFormat: 'yy-mm-dd',
		  firstDay: 1,
		  isRTL: false,
		  showMonthAfterYear: false,
		  yearSuffix: ''
		  };
		  $.datepicker.setDefaults($.datepicker.regional['es']);
		 $(function () {
		 $("#fecha").datepicker();
		 });
  </script>
 </head>
<body>
<div>
<div class="col-xs-12">
<div class="panel panel-success">
	  <div class="panel-heading">
		<div class="panel-title">NUEVA TAREA</div>
	  </div>
	<div class="panel-body">
<form role="form" method="post" action="">
<div class="form-group">
<div class="row">
  <div class="col-xs-5">
<label>
Descripción de la tarea:</label> 
<textarea class="form-control"  ROWS="4" name="Descripcion" style="resize:none; 
<?php  if (isset($errores['Descripcion']))
			 	echo "background-color: #F78181;"?>">
<?=ValorPost('Descripcion')?></textarea><?php  if (isset($errores['Descripcion']))
			 								echo $errores['Descripcion']?>
</div>
<div class="col-xs-3">
<label> Nombre:</label> <input class="form-control" type="text" name="Nombre" value="<?=ValorPost('Nombre')?>" 
	style="<?php  if (isset($errores['Nombre']))
			 	echo "background-color: #F78181;"?>">
			 						<?php  if (isset($errores['Nombre']))
			 								echo $errores['Nombre']?>  
</div>
<div class="col-xs-4">
<label>Apellidos:</label> <input class="form-control" type="text" name="Apellidos" value="<?=ValorPost('Apellidos')?>"
	style="<?php  if (isset($errores['Apellidos']))
			 	echo "background-color: #F78181;"?>">
			 		<?php  if (isset($errores['Apellidos']))
			 					echo $errores['Apellidos']?>
</div>
</div>
<div class="row">
  <div class="col-xs-4">
<label>DNI: </label> <input maxlength="9" class="form-control" type="text" name="DNI" value="<?=ValorPost('DNI')?>"
	style="<?php  if (isset($errores['DNI']))
			 	echo "background-color: #F78181;"?>">
			 		<?php  if (isset($errores['DNI']))
			 				echo $errores['DNI']?>
</div>
<div class="col-xs-4">
<label> Teléfono:</label>  <input maxlength="9" class="form-control" type="text" name="Telefono" value="<?=ValorPost('Telefono')?>"
	style="<?php  if (isset($errores['Telefono']))
			 	echo "background-color: #F78181;"?>">
			 		<?php  if (isset($errores['Telefono']))
			 						echo $errores['Telefono']?>
</div>	
		 	
<div class="col-xs-4">
<label> Correo electrónico: </label> <input class="form-control" type="text" name="e-mail" value="<?=ValorPost('e-mail')?>"
	style="<?php  if (isset($errores['e-mail']))
			 	echo "background-color: #F78181;"?>">
			 	<?php  if (isset($errores['e-mail']))
			 					echo $errores['e-mail']?>
</div>	
</div>	
 <div class="row">
  <div class="col-xs-3">
<label> Dirección Jardín:</label>  <input class="form-control" type="text" name="Direccion" value="<?=ValorPost('Direccion')?>"></div>
<div class="col-xs-3">
<label> Población: </label> <input class="form-control" type="text" name="Poblacion" value="<?=ValorPost('Poblacion')?>"></div>
<div class="col-xs-3">
<label> Código postal: </label> <input maxlength="5" class="form-control" type="text" name="CP" value="<?=ValorPost('CP')?>"
						style="<?php  if (isset($errores['CP']))
			 					echo "background-color: #F78181;"?>">
			 					<?php  if (isset($errores['CP']))
			 						echo $errores['CP']?>
</div>	
<div class="col-xs-3">		 	
<label> Provincia:</label> <?=CreaSelect("tbl_provincias_cod", $provincias,ValorPost('tbl_provincias_cod'))?></div>
<?php  if (isset($errores['tbl_provincias_cod'])) echo '<b>'.$errores['tbl_provincias_cod'].'</b>';?>
</div>
<div class="row">
<input type="hidden" name="Estado" value="Pendiente">
<input type="hidden" name="idOperario" value="">
<div class="col-xs-4">		 		
<label> Fecha realización:</label>  <input class="form-control" type="text" name="Fecha_realizacion" value="<?=ValorPost('Fecha_realizacion')?>" 
	style="<?php  if (isset($errores['Fecha_realizacion']))
			 	echo "background-color: #F78181;"?>" id="fecha" readonly>
			 		<?php  if (isset($errores['Fecha_realizacion']))
			 						echo $errores['Fecha_realizacion']?>	
</div>	
  <div class="col-xs-4">		 		
<label>Anotaciones anteriores: </label> <textarea class="form-control" COLS="40" ROWS="4" style="resize:none;" name="Anotaciones_anteriores" ><?=ValorPost('Anotaciones_anteriores')?></textarea></div>
<div class="col-xs-4">
<label>Anotaciones posteriores:</label>  <textarea class="form-control" COLS="40" ROWS="4" style="resize:none;" name="Anotaciones_posteriores" ><?=ValorPost('Anotaciones_posteriores')?></textarea></div>																	
</div></div>
<center><input class="btn btn-success" type="submit" value="CREAR TAREA"></center>
</form></div></div>
</div></div>
</body>
</html>