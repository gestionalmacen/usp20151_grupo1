<?php
        session_start();
	require_once("../../conexion.php");
	$cnn = conectar();
	$almacen = $_POST['almacen'];
        $query= "insert into almacen(nombre,estado) values('$almacen','A')";
	//$rs = mysql_query ($query,$cnn);
        if( mysql_query($query,$cnn)){
		//$row = mysql_fetch_array($rs);
                //$_SESSION['respuesta']=$row[0];
                echo "Almacen registrado";
	}else{
		echo "Almacen ya existe";
	}

