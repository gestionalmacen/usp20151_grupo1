<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "SELECT p.idproducto,p.nombre,p.descripcion,p.precio_compra,s.nombre as 'subcategoria',u.descripcion as 'Unidad Medida',p.fecha_registro,p.estado FROM producto p
        inner join subcategoria  s on p.idsubcategoria=s.idsubcategoria
        inner join unidad_medida u on p.idunidad_medida=u.idunidad_medida 
        where p.nombre like '%$q%' and p.estado='A' order by p.nombre" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista de Productos Aptos </p>
        
	<table class="table">
		<tr>
                        
			<td> Nombres </td>
			<td> Descripcion </td>
                        <td> Subcategoria </td>
                        <td> Unidad de Medida </td>
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
                              
				<td> <a data-dismiss="modal" data-target="#myModal" onclick="load_div('contenido', 'nota_ingreso/notaingreso_reg.php?idproducto=<?php echo $row[0];?>');" style="cursor:pointer">
						<?php echo $row[1];?></a> </td>
                                <td> <?php echo $row[2]?> </td>
                                <td> <?php echo $row[4]?> </td>
                                <td> <?php echo $row[5]?> </td>
			
			</tr>
		
		<?php }?>
	</table>
</center>

