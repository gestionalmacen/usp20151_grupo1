<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
	$idsubcategoria	= $_POST['idsubcategoria'];
	$idunidad_medida = $_POST['idunidad_medida'];
	$query = "insert into producto (nombre,descripcion,precio_compra,idsubcategoria,idunidad_medida,fecha_registro,estado) values ('$nombre','$descripcion',$precio,$idsubcategoria,$idunidad_medida,CURRENT_TIMESTAMP,'A')" ;
	if( mysql_query($query,$cnn)){
            $query2="select max(idproducto) from producto";
        
            $rs = mysql_query($query2,$cnn);
			
			if ($row=mysql_fetch_array($rs))
			{
				$idproducto = $row[0];				
				$query3= "INSERT INTO kardex(idproducto,idinventario ,fecha_registro, fecha_emision, stock_inicial, stock_final, stock_actual, estado) 
                                        VALUES ($idproducto,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,1,0,1,'A')";
				
				if(mysql_query($query3,$cnn))
                                {
                                    echo "Producto Registrado";
                                }else
                                {
                                    echo "Fallo";
                                }
					
			}else{
		echo "Fallo";
	}
        }
	
?>