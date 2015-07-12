<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
        $id="select max(idsolicitud) from solicitud";
        $ids=mysql_query($id,$cnn);
        $rowid=  mysql_fetch_array($ids);
        $idsolicitud=$rowid[0];
	$query = "SELECT ds.idproducto,p.nombre,ds.cantidad_solicitada,ds.cantidad_entregada,ds.saldo 
        FROM detalle_solicitud ds
        inner join producto p on ds.idproducto=p.idproducto where ds.idsolicitud=$idsolicitud" ;
	$rs = mysql_query($query,$cnn);
        $num_registros = is_resource($rs) ? mysql_num_rows($rs) : 0;
	if($num_registros>0){
?>
<center>
	<p class="form-title"> Detalle de Solicitud </p>
        
	<table class="table" >
		<tr bgcolor="lightblue">
                        
			<td> Nombre de Producto </td>
			<td> Cantidad Solicitada </td>
                        <td> Cantidad Entregada </td>
                        <td> Saldo </td>
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
                              
				<td> <a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'solicitud/solicitud_modificar_cantidad_solicitada.php?idproducto=<?php echo $row[0];?>');" style="cursor:pointer">
						<?php echo $row[1];?></a> </td>
                                <td> <?php echo $row[2]?> </td>
                                <td> <?php echo $row[3]?> </td>
                                <td> <?php echo $row[4]?> </td>
                                
			
			</tr>
		
                <?php }?>
                        
	</table>
         <?php
                }
                ?>
</center>


