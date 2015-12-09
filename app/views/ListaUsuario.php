<?php
//MUESTRA LOS DATOS DE UN USUARIO
?>
<html>
<head> 
</head>
<body>
<div class="col-xs-3"></div>
<div class="col-xs-5">
	<div class="panel panel-primary" align="center">
	  <div class="panel-heading">
		<div class="panel-title" align="center">Lista de usuarios</div>
	  </div>
	  <div class="panel-body">
<div class="col-xs-12">
<table border="1" class="table table-condensed">
<tr class="success" align="center">
	<td> <b>Nombre</b></td>
	<td><b>Tipo</b> </td>
	<td><b>Opciones</b></td>
</tr>
<?php 
foreach ($resultado as $user) { //$resultado DECLARADO EN EL CONTROLADOR
?>
<tr> <td> <?=$user['nombre']?></td>
<td> <?=$user['tipo']?></td>
<td align="center"> 
	 <a href="?page=ModUser&idusers=<?=$user['idusers']?>"> <img src="../assets/modificar.ico"></a>
	 <a href="?page=BorrarUser&idusers=<?=$user['idusers']?>"> <img src="../assets/borrar.ico"></a>
</tr>
 <?php 
}
?>
</table></div></div></div></div></body></html>
