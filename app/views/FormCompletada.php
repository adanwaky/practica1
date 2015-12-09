<!-- FORMULARIO PARA COMPLETAR UNA TAREA, EDITABLE EL ESTADO Y LAS ANOTACIONES POSTERIORES -->
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
<div class="panel panel-primary">
	  <div class="panel-heading">
		<div class="panel-title">COMPLETAR TAREA</div>
	  </div>
	<div class="panel-body">
<form role="form" method="post" action="">
<input type="hidden" name="idTarea" value="<?= $tareas['idTarea']?>">
<div class="form-group">
<div class="row">
  <div class="col-xs-5">
<label>
Descripción de la tarea:</label> 
<textarea class="form-control" readonly  ROWS="4" name="Descripcion" style="resize:none;">
<?=$tareas['Descripcion']?></textarea>
</div>
<div class="col-xs-3">
<label> Nombre:</label> <input class="form-control" readonly type="text" name="Nombre" value="<?=$tareas['Nombre']?>" >
</div>
<div class="col-xs-4">
<label>Apellidos:</label> <input class="form-control" readonly type="text" name="Apellidos" value="<?=$tareas['Apellidos']?>">
</div>
</div>
<div class="row">
  <div class="col-xs-4">
<label>DNI: </label> <input class="form-control" readonly type="text" name="DNI" value="<?=$tareas['DNI']?>">
</div>
<div class="col-xs-4">
<label> Teléfono:</label>  <input class="form-control" readonly type="text" name="Telefono" value="<?=$tareas['Telefono']?>">
</div>	
		 	
<div class="col-xs-4">
<label> Correo electrónico: </label> <input readonly class="form-control" type="text" name="e-mail" value="<?=$tareas['e-mail']?>">
</div>	
</div>	
 <div class="row">
  <div class="col-xs-3">
<label> Dirección Jardín:</label>  <input readonly class="form-control" type="text" name="Direccion" value="<?=$tareas['Direccion']?>"></div>
<div class="col-xs-3">
<label> Población: </label> <input readonly class="form-control" type="text" name="Poblacion" value="<?=$tareas['Poblacion']?>"></div>
<div class="col-xs-3">
<label> Código postal: </label> <input class="form-control" readonly type="text" name="CP" value="<?=$tareas['CP']?>">
</div>	
<div class="col-xs-3">		 	
<label> Provincia:</label><br><input readonly class="form-control" type="text" value="<?=DevuelveProvincia($tareas['tbl_provincias_cod'])?>"></div>
</div>
<div class="row">
  <div class="col-xs-3">
<label> Estado: </label> <br>
	<input  type="radio" value="Pendiente" name="Estado" >Pendiente
	<input  type="radio" name="Estado" value="Realizada"  checked>Realizada
	<input type="radio" name="Estado" value="Cancelada">Cancelada
</div>
<div class="col-xs-3">
<label>Fecha creación</label>  <input class="form-control" readonly name="Fecha_creacion" type="date" value="<?= $tareas['Fecha_creacion'] ?>"></div>
<div class="col-xs-3">
<label> Operario:</label>  <input readonly class="form-control" type="text" name="idOperario" value="<?=$tareas['idOperario']?>"></div>
<div class="col-xs-3">		 		
<label> Fecha realización:</label>  <input class="form-control" type="text" name="Fecha_realizacion" readonly value="<?php $fecha2=date("d/m/Y",strtotime($tareas['Fecha_realizacion'])); echo $fecha2;?>" >	
</div>	
</div>
<div class="row">
  <div class="col-xs-6">		 		
<label>Anotaciones anteriores: </label> <textarea readonly class="form-control" COLS="40" ROWS="4" style="resize:none;" name="Anotaciones_anteriores" ><?=$tareas['Anotaciones_anteriores']?></textarea></div>
<div class="col-xs-6">
<label>Anotaciones posteriores:</label>  <textarea class="form-control" COLS="40" ROWS="4" style="resize:none;" name="Anotaciones_posteriores" ><?=$tareas['Anotaciones_posteriores']?></textarea></div>																	
</div></div>
<center><input class="btn btn-success" type="submit" value="GUARDAR CAMBIOS"></center>
</form></div></div>
</div></div>
</body>
</html>