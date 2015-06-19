<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$query="SELECT idusuario, nombre,case estado when 'A' then 'Activo' when 'B' then 'Inactivo' end as estado,pregunta_secreta, respuesta FROM usuario"; 
	$rs = mysql_query($query,$cnn);
?>
<table class="table">
	<tr height="37">		
		<td  width="155" align="center" colspan="2" bgcolor="#ECEEF1" class="form-subtitle">&nbsp;&nbsp;Usuarios registrados</td>									
	</tr>	
	<tr height="30">
		<th>Nro</th>
		<td><b>Usuario</b></td>
		<td><b>Estado</b></td>
		<td><b>Pregunta</b></td>
		<td><b>Respuesta</b></td>
		<th></th>
	</tr>
	<?php $nro = 0;
		while($row = mysql_fetch_array($rs)){ $nro++ ?>
	<tr>
		<td><?php echo $nro;?></td>
		<td><?php echo $row['nombre'];?></td>
		<td><?php echo $row['estado'];?></td>
		<td><?php echo $row['pregunta_secreta'];?></td>
		<td><?php echo $row['respuesta'];?></td>						
	</tr>
	<?php } ?>
</table>	
	
