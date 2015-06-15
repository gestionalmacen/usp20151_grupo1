<?php
	/* Usado en [forms/buscar_medico.php] */
	require_once("../../usuario2/UsuarioDAL.php");
	$medico = new UsuarioDAL();
	$n = $_GET['n'];
	$s = $_GET['s'];
	$rs = $medico->buscar($n, $s);
?>
<table class="table">	
	<tr height="30">			
		<th>Nro</th>
		<th>Usuario</th>
		<th>Estado</th>		
		<th>Pregunta</th>	
		<th>Respuesta</th>
		<th>&nbsp;</th>
	</tr>
	<?php $nro = 0;
		while($row = mysqli_fetch_array($rs)){ $nro++;?>		
	<tr>
		<td><?php echo $nro;?></td>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[2];?></td>
		<td><?php echo $row[3];?></td>
		<td><?php echo $row[4];?></td>
		<td><a data-toggle="modal" data-target="#myModal" 
			   onclick="load_div('modal_body', 'usuario2/reg_usuario.php?idusuario=<?php echo $row[0]; ?>');" 
			   style="cursor:pointer">Editar			
			</a>
		</td>		
	</tr>	
	<?php } ?>
	<tr><td colspan="6"></td></tr>
</table>