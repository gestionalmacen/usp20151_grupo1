<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "SELECT p.idproducto,p.nombre,p.descripcion,p.precio_compra,s.nombre as 'subcategoria',u.descripcion as 'Unidad Medida',p.fecha_registro,p.estado FROM producto p
inner join subcategoria  s on p.idsubcategoria=s.idsubcategoria
inner join unidad_medida u on p.idunidad_medida=u.idunidad_medida where p.nombre like '%$q%' order by p.nombre" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista Producto </p>
	<table class="table">
		<tr bgcolor="green">
			<td> Nombre </td>
                        <td> Descripcion </td>
			<td> Precio </td>			
			<td> Subcategoria </td>
			<td> Unidad Medida </td>
			<td> Fecha Registro </td>
                        <td> Estado </td>
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
				<td> <a data-toggle="modal" data-target="#myModal"  onclick="load_div('modal_body', 'producto/producto_pre_modificar.php?idproducto=<?php echo $row[0];?>');" style="cursor:pointer">
				<?php echo $row[1];?></a> </td>
				<td> <?php echo $row[2];?> </td>
				<td> <?php echo $row[3];?> </td>
				<td> <?php echo $row[4];?> </td>
				<td> <?php echo $row[5];?> </td>
                                <td> <?php echo $row[6];?> </td>
                                <td> <?php if($row[7]=='A') {echo 'Apto';} else {echo 'No Apto';} ;?> </td>
				
			</tr>
		
		<?php }?>
	</table>
</center>