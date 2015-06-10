<?php 
	
	require('conexion.php');
	
	$nombre=$_POST['nombre'];
	$clave=$_POST['clave'];
	$estado=$_POST['estado'];
	
	$query="INSERT INTO usuario (nombre,clave, estado) VALUES ('$nombre','$clave','$estado')";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Guardar usuario</title>
	</head>
	<body>
		<center>	
			
			<?php if($resultado>0){ ?>
				<h1>Usuario Guardado</h1>
				<?php }else{ ?>
				<h1>Error al Guardar Usuario</h1>		
			<?php	} ?>		
			
			<p></p>	
			
			<a href="index.php">Regresar</a>
			
		</center>
	</body>
	</html>	