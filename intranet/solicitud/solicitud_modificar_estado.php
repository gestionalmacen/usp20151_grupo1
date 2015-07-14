<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
        $idsolicitud  = $_POST['idsolicitud'];
	$query = "update solicitud set estado='E' where idsolicitud=$idsolicitud;" ;
	if(mysql_query($query,$cnn))
        {
            echo "Estado Cambio a Entregado";
        }else{
            echo "Fallo";
        }
