<?php
	session_start();
	require_once("../../conexion.php");
		$cnn = conectar();
                $cantidad = $_POST['cantidad'];
                $idunidad_medida = $_POST['idunidad_medida'];
		$idproducto = $_POST['idproducto'];	
                $query="select max(idnota_salida) from nota_salida";
                
		if (mysql_query($query, $cnn))	{
		
			$rs = mysql_query($query,$cnn);
			
			if ($row=mysql_fetch_array($rs))
			{
				$idnota_salida = $row[0];				
				$query2= "insert into detalle_notasalida(idnota_salida,idproducto,cantidad_entregada,idunidad_medida) values 
				($idnota_salida,$idproducto,$cantidad,$idunidad_medida)";
				
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

