<?php 
	
	require('conexion.php');
	
	$idusuario=$_POST['idusuario'];
	$nombre=$_POST['nombre'];
	$clave=$_POST['clave'];
	$estado=$_POST['estado'];
	
	$query="UPDATE usuario SET nombre = '$nombre', clave='$clave', estado='$estado' WHERE idusuario='$idusuario'";

	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Modificar usuario</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Usuario Modificado</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Usuario</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<a href="index.php">Regresar</a>
			
		</center>
	</body>
</html>
				
				