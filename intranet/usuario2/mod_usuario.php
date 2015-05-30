<?php 
	
	require('conexion.php');
	
	$idusuario=$_POST['idusuario'];
	$nombre=$_POST['nombre'];
	$clave=$_POST['clave'];
	$estado=$_POST['estado'];
	$pregunta_secreta=$_POST['pregunta_secreta'];
	$respuesta=$_POST['respuesta'];	
	$query="UPDATE usuario SET nombre = '$nombre', clave=md5('$clave'), estado='$estado',pregunta_secreta='$pregunta_secreta', respuesta='$respuesta' WHERE idusuario='$idusuario'";

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
			
			<a href="http://localhost:8080/usp20151_grupo1/intranet/admin.php#">Regresar</a>		
		</center>
	</body>
</html>
				
				