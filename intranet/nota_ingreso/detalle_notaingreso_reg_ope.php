<?php
	session_start();
	require_once("../../conexion.php");
		$cnn = conectar();
                $cantidad = $_POST['cantidad'];
                $idunidad_medida = $_POST['idunidad_medida'];
		$idproducto = $_POST['idproducto'];	
                $query="select max(idnota_ingreso) from nota_ingreso";
                
		if (mysql_query($query, $cnn))	{
		
			$rs = mysql_query($query,$cnn);
			
			if ($row=mysql_fetch_array($rs))
			{
				$idnota_ingreso = $row[0];				
				$query2= "insert into detalle_notaingreso(idnota_ingreso,idproducto,cantidad,idunidad_medida) values 
				($idnota_ingreso,$idproducto,$cantidad,$idunidad_medida)";
				
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

