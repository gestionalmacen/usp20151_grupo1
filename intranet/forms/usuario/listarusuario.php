<?php
	/* Usado en [forms/resultado/buscar_usuario.php] */
	require_once("../../capadatos/UsuarioDAL.php");
	$usuarioDAL = new UsuarioDAL();
	$n = $_GET['n'];
	$s = $_GET['s'];
	$rs = $usuarioDAL->search($n, $s);
?>
<table class="table">	
	<tr height="30">
		<th>Nro</th>
		<th>Usuario</th>	
		<th>Grupo</th>	
		<th>Fecha de Registo</th>
		<th></th>
	</tr>
	<?php $nro = 0;
		while($row = mysqli_fetch_array($rs)){ $nro++;?>		
	<tr>
		<td><?php echo $nro;?></td>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[2];?></td>
		<td><?php echo $row[3];?></td>
	

		<td><?php $date = new DateTime($row[3]); echo date_format($date, 'd M Y'); ?></td>
		<td><a data-toggle="modal" data-target="#myModal" 
			   onclick="load_div('modal_body', 'forms/usuarioUpd.php?idusuario=<?php echo $row[0]; ?>');" 
			   style="cursor:pointer">Editar			
			</a>
		</td>
	</tr>
	<?php } ?>
</table>