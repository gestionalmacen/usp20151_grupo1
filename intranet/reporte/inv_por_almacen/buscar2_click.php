<?php
	require_once("../../datos/ConsultaAlmacen.php");
	$examen = new ConsultaAlmacen();
	$n = $_GET['n'];
	$s = $_GET['s'];
	$rs = $examen->buscar1($n, $s);
?>
<table class="table">	
	<tr height="30">			
		<th>Nro</th>
		<th>Fecha</th>
		<th>Almacen</th>
		<th>Tipo de Inventario</th>
		<th>Estado</th>		
		<th></th>
	</tr>
	<?php $nro = 0;
		while($row = mysqli_fetch_array($rs)){ $nro++;?>		
	<tr>
		<td><?php echo $nro;?></td>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[2];?></td>					
		<td><?php echo $row[3];?></td>
	</tr>
	<?php } ?>
</table>