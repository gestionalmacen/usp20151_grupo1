<?php
	session_start();
	require_once("../../conexion.php");
		$cnn = conectar();
                $cantidad = $_POST['cantidad'];
		$idproducto = $_POST['idproducto'];	
                $query="select max(idsolicitud) from solicitud";
                
		if (mysql_query($query, $cnn))	{
		
			$rs = mysql_query($query,$cnn);
			
			if ($row=mysql_fetch_array($rs))
			{
				$idsolicitud = $row[0];				
				$query2= "insert into detalle_solicitud(idsolicitud, idproducto, cantidad_solicitada, cantidad_entregada,saldo) values 
				($idsolicitud,$idproducto,$cantidad,0,$cantidad)";
				
				if(mysql_query($query2,$cnn))
                                {
                                    echo "Producto Agregado";
                                }else
                                {
                                    echo "Producto fue agregado";
                                }
					
			}
			else{echo "fallo";}
		}else{
                    echo "fallo";
                
                }	
		
?>

