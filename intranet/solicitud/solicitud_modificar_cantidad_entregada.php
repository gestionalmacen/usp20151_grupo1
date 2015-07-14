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
                    $query3="update kardex set stock_final=stock_final+$cantidad,stock_actual=stock_inicial-stock_final where idproducto=$id;";
                    if(mysql_query($query3,$cnn))
                    {
                        echo "Cantidad Entregada modificada";
                    }else{
                        echo "Fallo";
                    }
                }else{
                    echo "Fallo";
                }
	}else{
		echo "Fallo";
            }

