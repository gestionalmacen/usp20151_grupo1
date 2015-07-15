<?php
	require_once("../../datos/ConsultaAdquisicion.php");
	$examen = new ConsultaArea();
	$n = $_GET['n'];
	$s = $_GET['s'];
	$rs = $examen->buscar1($n, $s);
?>
<table class="table">	
	<tr height="30">			
		<th>Nro</th>
		<th>Proveedor</th>
		<th>Fecha</th>
		<th>Producto</th>	
	</tr>
	<?php $nro = 0;
		while($row = mysqli_fetch_array($rs)){ $nro++;?>		
	<tr>
		<td><?php echo $nro;?></td>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[2];?></td>							
	</tr>
	<?php } ?>
</table>