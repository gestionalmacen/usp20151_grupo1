<?php
	session_start();
	require_once("../../conexion.php");
		$cnn = conectar();
		$idcategoria = $_POST['idcategoria'];	
                $query="select max(idproveedor) from proveedor";
                
		if (mysql_query($query, $cnn))	{
		
			$rs = mysql_query($query,$cnn);
			
			if ($row=mysql_fetch_array($rs))
			{
				$idproveedor = $row[0];				
				$query2= "insert into detalle_categoria_proveedor(idcategoria,idproveedor) values 
				($idcategoria,$idproveedor)";
				
				if(mysql_query($query2,$cnn))
                                {
                                    echo "Categoria agregada a Proveedor";
                                }else
                                {
                                    echo "Categoria ya existe en Proveedor";
                                }
					
			}
			else{echo "fallo";}
		}else{
                    echo "fallo";
                
                }	
		
?>

