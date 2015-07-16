<?php
	require_once ("../../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "SELECT 
				prov.nombre,
				nt.fecha_emision,
				prod.nombre
				From proveedor prov
			INNER JOIN nota_ingreso nt
				ON prov.idproveedor = nt.idproveedor
				INNER JOIN detalle_notaingreso dnt
				ON nt.idnota_ingreso = dnt.idnota_ingreso
				INNER JOIN producto prod
				ON prod.idproducto = dnt.idproducto
			WHERE nt.fecha_emision between '$q' and CURRENT_TIMESTAMP
				ORDER BY prov.nombre ASC" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista de Adquisicion </p>
        
	<table class="table">
		<tr bgcolor="lightblue">
                    <td><b> Proveedor </b></td>
                    <td><b> Fecha Emision </b></td>
                    <td><b> Producto </b></td>
                       
                       
                      
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
                            <td> <?php echo $row[0];?>) </td>>
                                <td><?php echo $row[1];?> </td>
                                <td> <?php echo $row[2];?> </td>
                                
                            			
			</tr>
		
		<?php }?>
	</table>
</center>

