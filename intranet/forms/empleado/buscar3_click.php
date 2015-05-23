<?php
	/* Usado en [forms/resultado/buscar_paciente.php] */
	require_once("../../capadatos/PacienteDAL.php");
	$paciente = new PacienteDAL();
	$n = $_GET['n'];
	$s = $_GET['s'];
	$rs = $paciente->buscar2($n, $s);
?>
<table class="table">	
	<tr height="30">			
		<th>Nro</th>
		<th>Nombres</th>
		<th>Apellidos</th>			
		<th>Sexo</th>	
		<th>Ord.</th>
		<th>Ultima fecha</th>
	</tr>
	<?php $nro = 0;
		while($row = mysqli_fetch_array($rs)){ $nro++;?>		
	<tr>
		<td><?php echo $nro;?></td>
		<td><a href="#" onclick="load_div('contenido', 'forms/gen_resultado.php?pacienteID=<?php echo $row[0];?>'); $('#myModal').modal('toggle');" 
			   style="cursor:pointer"><?php echo $row[2];?></a>
		</td>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[3];?></td>
		<td><?php echo $row[4];?></td>		
		<td><?php $date = new DateTime($row[5]); echo date_format($date, 'd M Y'); ?></td>
	</tr>
	<?php } ?>
</table>