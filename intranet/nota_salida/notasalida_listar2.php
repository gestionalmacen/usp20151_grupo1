<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
        $id="select max(idnota_salida) from nota_salida";
        $ids=mysql_query($id,$cnn);
        $rowid=  mysql_fetch_array($ids);
        $idnota_salida=$rowid[0];
	$query = "SELECT ns.idproducto,p.nombre,ns.cantidad_entregada,um.descripcion 
        FROM detalle_notasalida ns
        inner join unidad_medida um on ns.idunidad_medida=um.idunidad_medida
        inner join producto p on ns.idproducto=p.idproducto where ns.idnota_salida=$idnota_salida" ;
	$rs = mysql_query($query,$cnn);
        $num_registros = is_resource($rs) ? mysql_num_rows($rs) : 0;
	if($num_registros>0){
?>
<center>
	<p class="form-title"> Detalle de Nota de Salida </p>
        
	<table class="table" >
		<tr bgcolor="lightblue">
                        
			<td> Nombre de Producto </td>
			<td> Cantidad  </td>
                        <td> Unidad de Medida </td>
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
                              
				<td> <a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'nota_salida/notasalida_mod_cantidad.php?idproducto=<?php echo $row[0];?>');" style="cursor:pointer">
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

