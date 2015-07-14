<?php
	session_start();
	require_once("../../conexion.php");
		$cnn = conectar();
                $cantidad = $_POST['cantidad'];
		$idproducto = $_POST['idproducto'];	
                $query="select max(idnota_salida) from detalle_notasalida";
                
		if (mysql_query($query, $cnn))	{
		
			$rs = mysql_query($query,$cnn);
			
			if ($row=mysql_fetch_array($rs))
			{
				$idnota_salida = $row[0];				
				$query2= "update detalle_notasalida set cantidad_entregada=$cantidad where idproducto=$idproducto and idnota_salida=$idnota_salida" ;
				
				if(mysql_query($query2,$cnn))
                                {
                                    echo "Cantidad Modificada";
                                }else
                                {
                                    echo "Fallo";
                                }
					
			}
			else{echo "fallo";}
		}else{
                    echo "fallo";
                
                }	
		
?>

