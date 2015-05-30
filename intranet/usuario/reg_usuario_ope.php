<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
        $idempleado = $_POST['idempleado'];
	$idgrupo_usuario = $_POST['idgrupo_usuario'];
	$pregunta	= $_POST['pregunta'];
	$respuesta	= $_POST['respuesta'];
	$query = "INSERT INTO usuario(nombre, clave, idempleado, fecha_registro, pregunta_secreta, respuesta, idgrupo_usuario, estado) VALUES 
    ('$usuario',md5('$clave'),$idempleado,CURRENT_TIMESTAMP,'$pregunta','$respuesta',$idgrupo_usuario,'A');" ;
	if( mysql_query($query,$cnn)){
		echo "OK";
	}else{
		echo "Fallo";
	}
	
?>

