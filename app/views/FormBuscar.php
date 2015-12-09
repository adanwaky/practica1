<?php 
//FORMULARIO PARA BUSCAR UNA TAREA
include_once MOD.'provincias.php'; 
include_once CTRL.'Funciones.php';
$provincias=Provincias();//Array de provincias españolas?>
<html>
<head>
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
<div class="col-xs-12">
<div class="row">
<div class="col-xs-12">
	<div class="panel panel-info">
	  <div class="panel-heading">
		<div class="panel-title">Buscar</div>
	  </div>
	  <div class="panel-body">
		<form role="form" method="post" action="" class="form-horizontal">
		<div class="form-group">
			<div class="row">
					<label class="col-xs-2 control-label">Fecha de realización: </label>
					<div class="col-xs-1">
					<select class="form-control" name="operacion">
						<option value=">=">>=</option>
						<option value="<="><=</option>
						<option value="=">=</option>
					</select>
					</div>
					<div class="col-xs-2">
						<input class="form-control" type="text" name="fecha" value="" id="fecha" readonly>	
					</div>
			
				<label class="col-xs-1 control-label">Estado: </label>
					<div class="col-xs-2">
					<select class="form-control" name="estado">
						<option value=""> </option>
						<option value="Pendiente">Pendiente</option>
						<option value="Realizada">Realizada</option>
						<option value="Cancelada">Cancelada</option>
					</select>
				</div>	
				
				<label class="col-xs-2 control-label">Nombre empieza por: </label>
				<div class="col-xs-1">
				<input class="form-control" type="text" name="letra" value="">	
				</div>
				<button type="submit"  class="btn btn-default">
				<span class="glyphicon glyphicon-search"></span>
			</button>
			</div>
		</div>
		</form>
	  </div>
	</div>
</div>
</div>
</div>
</body>
</html>