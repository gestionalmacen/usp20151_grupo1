<?php
        session_start();
	require_once("../../conexion.php");
	$cnn = conectar();
	$grupo = $_POST['grupo'];
	$query = "call pa_igrupo('$grupo')";
	$rs = mysql_query ($query,$cnn);
        if( mysql_query($query,$cnn)){
		//$row = mysql_fetch_array($rs);
                //$_SESSION['respuesta']=$row[0];
                echo "Grupo registrado";
	}else{
		echo "Grupo ya existe";
	}


