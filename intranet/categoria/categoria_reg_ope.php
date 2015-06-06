<?php
        session_start();
	require_once("../../conexion.php");
	$cnn = conectar();
	$categoria = $_POST['categoria'];
	$query = "insert into categoria (nombre,estado) values ('$categoria','A')";
	//$rs = mysql_query ($query,$cnn);
        if( mysql_query($query,$cnn)){
		//$row = mysql_fetch_array($rs);
                //$_SESSION['respuesta']=$row[0];
                echo "Categoria registrada";
	}else{
		echo "Nombre de la Categoria ya existe";
	}


