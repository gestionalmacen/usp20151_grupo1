<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$id  = $_POST['id'];
	$cantidad = $_POST['cantidad'];
        $idsolicitud  = $_POST['idsolicitud'];
	$query = "update detalle_solicitud set cantidad_entregada=$cantidad where idsolicitud=$idsolicitud and idproducto=$id;" ;
	if(mysql_query($query,$cnn))
        {
                $query2="update detalle_solicitud set saldo=cantidad_solicitada-$cantidad where idsolicitud=$idsolicitud and idproducto=$id;";
                if(mysql_query($query2,$cnn))
                {
                        echo "Cantidad Entregada modificada";
                }else{
                    echo "Fallo";
                }
	}else{
		echo "Fallo";
            }

