<?php
	/* Usado en [forms/resultado/buscar_empleado.php] */
	require_once("../../capadatos/EmpleadoDAL.php");
	$empleadoDAL = new EmpleadoDAL();
	$n = $_GET['n'];
	$s = $_GET['s'];
	$rs = $empleadoDAL->buscar1($n, $s);
?>
<table class="table">	
	<tr height="30">
		<th>Nro</th>
		<th>Nombres</th>	
		<th>Apellidos</th>			
		<th>Edad</th>
		<th>Sexo</th>
		<th>DNI</th>
		<th>Registrado</th>
		<th></th>
	</tr>
	<?php $nro = 0;
		while($row = mysqli_fetch_array($rs)){ $nro++;?>		
	<tr>
		<td><?php echo $nro;?></td>
		<td><?php echo $row[2];?></td>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[3];?></td>
		<td><?php echo $row[4];?></td>		
		<td><?php echo $row[5];?></td>	
		<td><?php $date = new DateTime($row[6]); echo date_format($date, 'd M Y'); ?></td>
		<td><a data-toggle="modal" data-target="#myModal" 
			   onclick="load_div('modal_body', 'forms/reg_empleado.php?empleadoID=<?php echo $row[0]; ?>');" 
			   style="cursor:pointer">Editar			
			</a>
		</td>
	</tr>
	<?php } ?>
</table>