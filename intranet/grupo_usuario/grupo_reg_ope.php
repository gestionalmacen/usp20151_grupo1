<?php
        session_start();
	require_once("../../conexion.php");
	$cnn = conectar();
	$grupo = $_POST['grupo'];
	$query = "INSERT INTO grupo_usuario(nombre_grupo, estado) VALUES ('$grupo','A');";
	//$rs = mysql_query ($query,$cnn);
        if( mysql_query($query,$cnn)){
                echo "Grupo registrado";
	}else{
		echo "Grupo ya existe";
	}


