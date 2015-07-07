<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
        $id="select max(idnota_ingreso) from nota_ingreso";
        $ids=mysql_query($id,$cnn);
        $rowid=  mysql_fetch_array($ids);
        $idnota_ingreso=$rowid[0];
	$query = "SELECT ni.idnota_ingreso,p.nombre,ni.cantidad,um.descripcion 
        FROM detalle_notaingreso ni
        inner join unidad_medida um on ni.idunidad_medida=um.idunidad_medida
        inner join producto p on ni.idproducto=p.idproducto where ni.idnota_ingreso=$idnota_ingreso" ;
	$rs = mysql_query($query,$cnn);
        $num_registros = is_resource($rs) ? mysql_num_rows($rs) : 0;
	if($num_registros>0){
?>
<center>
	<p class="form-title"> Detalle de Solicitud </p>
        
	<table class="table" >
		<tr bgcolor="lightblue">
                        
			<td> Nombre de Producto </td>
			<td> Cantidad  </td>
                        <td> Unidad de Medida </td>
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
                              
				<td> <a data-dismiss="modal" data-target="#myModal" onclick="load_div('contenido', 'solicitud/solicitud_reg.php?idproducto=<?php echo $row[0];?>');" style="cursor:pointer">
						<?php echo $row[1];?></a> </td>
                                <td> <?php echo $row[2]?> </td>
                                <td> <?php echo $row[3]?> </td>
                                
			
			</tr>
		
                <?php }?>
                        
	</table>
         <?php
                }
                ?>
</center>
