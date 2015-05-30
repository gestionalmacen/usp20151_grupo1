<?php
	require('conexion.php');
	
	$query="SELECT idusuario, nombre, estado,pregunta_secreta, respuesta FROM usuario"; 
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Usuarios</title>
	</head>
	<body>
	</div>
	<div id="subcontenido" >
	</div>
		
		<center><h1>Usuarios</h1></center>
		
		<table border=1 width="80%">
			<thead>
				<tr>
					<td><b>Usuario</b></td>
					<td><b>Estado</b></td>
					<td><b>Pregunta</b></td>
					<td><b>Respuesta</b></td>
					<td></td>
				</tr>
				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['nombre'];?>
							</td>
							<td>
								<?php echo $row['estado'];?>
							</td>
							<td>
								<?php echo $row['pregunta_secreta'];?>
							</td>
							<td>
								<?php echo $row['respuesta'];?>
							</td>						
							<td>
<a href="#" onclick="load_div('contenido', 'usuario2/modificar.php?idusuario=<?php echo $row['idusuario'];?>');" style="cursor:pointer">
Actualizar Usuario </a>

					</a>
							</td>

						</tr>
					<?php } ?>
				</tbody>
			</table>
		</body>
	</html>	
	
