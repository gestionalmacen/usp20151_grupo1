<?php

        session_start();
	require_once("conexion.php");
	$cnn = conectar();
	$usuario = $_POST['usuario'];
        $pregunta = $_POST['pregunta'];
	$clave = $_POST['clave'];
        $respuesta = $_POST['respuesta'];
	$query = "update usuario set clave=md5('".$clave."'), estado='A' where nombre = '".$usuario."' and pregunta_secreta = '".$pregunta."' and respuesta='".$respuesta."';";
	$rs = mysql_query ($query,$cnn);
        if( mysql_query($query,$cnn)){
		//$row = mysql_fetch_array($rs);
                //$_SESSION['respuesta']=$row[0];
                echo "Cuenta activada";
	}else{
		echo "Fallo";
	}

