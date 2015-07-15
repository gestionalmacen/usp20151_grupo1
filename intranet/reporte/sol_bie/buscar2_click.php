<?php
	require_once("../../datos/ConsultaArreaSolicitada.php");
	$examen = new ConsultaArea();
	$n = $_GET['n'];
	$s = $_GET['s'];
	$rs = $examen->buscar1($n, $s);
?>
<table class="table">	
	<tr height="30">			
		<th>N</th>
		<th>Fecha</th>
		<th>Area</th>
		<th>Producto</th>
		<th>Solicita</th>	
		<th>Entrego</th>
		<th>Saldo</th>
		<th>Estado</th>
	</tr>
	<?php $nro = 0;
		while($row = mysqli_fetch_array($rs)){ $nro++;?>		
	<tr>
		<td><?php echo $nro;?></td>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[2];?></td>					
		<td><?php echo $row[3];?></td>
		<td><?php echo $row[4];?></td>
		<td><?php echo $row[5];?></td>
				<td><?php echo $row[6];?></td>
	</tr>
	<?php } ?>
</table>