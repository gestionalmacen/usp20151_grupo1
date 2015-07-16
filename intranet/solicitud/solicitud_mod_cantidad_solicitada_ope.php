<?php
	session_start();
	require_once("../../conexion.php");
		$cnn = conectar();
                $cantidad = $_POST['cantidad'];
		$idproducto = $_POST['idproducto'];	
                $query="select max(idsolicitud) from detalle_solicitud";
                
		if (mysql_query($query, $cnn))	{
		
			$rs = mysql_query($query,$cnn);
			
			if ($row=mysql_fetch_array($rs))
			{
				$idsolicitud = $row[0];
                                $id="select stock_actual from kardex where idproducto=$idproducto";
                                $s=mysql_query($id,$cnn);
                                $select=mysql_fetch_array($s);
                                $stock_inicial=$select[0];
                                if($cantidad<=$stock_inicial){
				$query2= "update detalle_solicitud set cantidad_solicitada=$cantidad,saldo=$cantidad where idproducto=$idproducto and idsolicitud=$idsolicitud" ;
				
                                    if(mysql_query($query2,$cnn))
                                    {
                                        echo "Cantidad Modificada";
                                    }else
                                    {
                                        echo "Producto fue agregado";
                                    }
					
                        }else
                            {
                            echo "Sobre paso el limite actual de $stock_inicial";
                            
                            }
                        }else
                            {
                            echo "fallo";
                            
                            }
		}else{
                    echo "fallo";
                
                }	
		
?>

