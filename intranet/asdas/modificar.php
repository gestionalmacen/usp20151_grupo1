<?php
	
	require('conexion.php');
	
	$idusuario=$_GET['idusuario'];
	
	$query="SELECT nombre, clave, estado FROM usuario WHERE idusuario='$idusuario'";
	
	$resultado=$mysqli->query($query);
	
	$row=$resultado->fetch_assoc();
	
?>

<html>
	<head>
		<title>Usuarios</title>
	</head>
	<body>
		
		<center><h1>Modificar Usuario</h1></center>
		
		<form name="modificar_usuario" method="POST" action="mod_usuario.php">
			
			<table width="50%">
				<tr>
					<input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
					<td width="20"><b>Usuario</b></td>
					<td width="30"><input type="text" name="nombre" size="25" value="<?php echo $row['nombre']; ?>" /></td>
				</tr>	
				<tr>
					<td><b>clave</b></td>
					<td><input type="password" name="clave" size="25" value="<?php echo $row['clave']; ?>" /></td>
				</tr>
				<tr>
					<td><b>estado</b></td>
					<td><input type="text" name="estado" size="25" value="<?php echo $row['estado']; ?>" /></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="Guardar" value="Guardar" /></center></td>
				</tr>
			</table>
		</form>

	</body>
</html>	


