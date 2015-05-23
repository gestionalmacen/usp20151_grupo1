<?php
	/* Usado en [forms/buscar_empleado.php] */
	require_once("../../capadatos/EmpleadoDAL.php");
	$empleado = new EmpleadoDAL();
	$n = $_GET['n'];
	$s = $_GET['s'];
	$rs = $empleado->buscar1($n, $s);
?>
<table class="table">	
	<tr height="30">			
		<th>Nro</th>
		<th>Nombres</th>	
		<th>Apellidos</th>			
		<th>Edad</th>
		<th>Sexo</th>
		<th>DNI</th>
	</tr>
	<?php $nro = 0;
		while($row = mysqli_fetch_array($rs)){ $nro++;?>		
	<tr>
		<td><?php echo $nro;?></td>
		<td><a href="#" onclick="load_div('contenido', 'forms/reg_orden.php?pacienteID=<?php echo $row[0];?>'); $('#myModal').modal('toggle');" 
			   style="cursor:pointer"><?php echo $row[2];?></a>
		</td>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[3];?></td>
		<td><?php echo $row[4];?></td>
		<td><?php echo $row[5];?></td>				
	</tr>
	<?php } ?>
</table>