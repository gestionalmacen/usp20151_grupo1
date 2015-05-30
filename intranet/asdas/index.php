<?php
	require('conexion.php');
	
	$query="SELECT idusuario, nombre, estado FROM usuario"; 
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Usuarios</title>
	</head>
	<body>
		
		<center><h1>Usuarios</h1></center>
		
		<a href="nuevo.php">Nuevo usuario</a>
		<p></p>
		
		<table border=1 width="80%">
			<thead>
				<tr>
					<td><b>Usuario</b></td>
					<td><b>Estado</b></td>
					<td></td>
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
		<a href="#" onclick="load_div('contenido', 'usuario2/modificar.php?idusuario=<?php echo $row['idusuario'];?>');" style="cursor:pointer">
		Modificar</a>
<!--<a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'usuario/reg_usuario.php');" style="cursor:pointer">-->
						Registrar Usuario</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</body>
	</html>	
	
