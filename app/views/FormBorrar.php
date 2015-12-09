<!-- FORMULARIO DE CONFIRMACIÓN DE BORRADO -->
<html>
<body>
<div>
<div class="col-xs-12">
<h3>¿Desea borrar esta tarea? </h3>
<table border="1" class="table table-condensed">
<tr class="success" align="center">
	<td> <b>Tarea</b></td>
	<td><b>Nombre Contacto</b> </td>
	<td><b>Teléfono</b></td>
	<td><b>Dirección</b></td>
	<td><b>Población</b></td>
	<td><b>Estado</b></td>
	<td><b>Fecha Creación</b></td>
	<td><b>Fecha Realización</b></td>
	<td><b>Operario</b></td>
</tr>
<?php 
foreach ($resultado as $tarea) {//$resultado DECLARADO EN EL CONTROLADOR
?>
<tr> <td> <?=$tarea['idTarea']?></td>
<td> <?=$tarea['Nombre']?></td>
<td> <?=$tarea['Telefono']?></td>
<td> <?=$tarea['Direccion']?></td>
<td> <?=$tarea['Poblacion']?></td>
<td> <?=$tarea['Estado']?></td>
<td> <?php $fecha2=date("d/m/Y",strtotime($tarea['Fecha_creacion'])); echo $fecha2;?></td>
<td> <?php $fecha2=date("d/m/Y",strtotime($tarea['Fecha_realizacion'])); echo $fecha2;?></td>
<td> <?=$tarea['Operario']?></td>
</tr>
 <?php 
}
?>
</table></div></div>
<center>
<form method="post" action="" name="form2">
<p>
<input type="submit" class="btn btn-success" name="si" value="SI">
<input type="submit" class="btn btn-danger" name="no" value="NO">
<p>
</form>
</center>
</body></html>

</body>
</html>