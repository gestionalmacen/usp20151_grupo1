<?php
	session_start();
	require_once("../../conexion.php");
		$cnn = conectar();
                $cantidad = $_POST['cantidad'];
		$idproducto = $_POST['idproducto'];	
                $query="select max(idnota_ingreso) from detalle_notaingreso";
                
		if (mysql_query($query, $cnn))	{
		
			$rs = mysql_query($query,$cnn);
			
			if ($row=mysql_fetch_array($rs))
			{
				$idnota_ingreso = $row[0];				
				$query2= "update detalle_notaingreso set cantidad=$cantidad where idproducto=$idproducto and idnota_ingreso=$idnota_ingreso" ;
				
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

