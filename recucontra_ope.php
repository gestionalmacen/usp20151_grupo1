<?php

        session_start();
	require_once("conexion.php");
	$cnn = conectar();
        $usuario = $_POST['usuario'];
	$pregunta = $_POST['pregunta'];
        $query = "select respuesta from usuario where nombre='$usuario' and pregunta_secreta='".$pregunta."';";
        $rs = mysql_query ($query,$cnn);
        if( mysql_query($query,$cnn)){
		$row = mysql_fetch_array($rs);
                $_SESSION['respuesta']=$row[0];
                echo $_SESSION['respuesta'];
	}else{
		echo "Fallo";
	}
