<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "select * from producto where nombre like '%$q%' order by nombre" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista Producto </p>
	<table class="table">
		<tr bgcolor="green">
			<td> Nombre </td>
			<td> Precio </td>
			<td> Tipo </td>
			<td> Marca </td>
			<td> Descripcion </td>
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
				<td> <a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'producto/producto_pre_modificar.php?idproducto=<?php echo $row[0];?>');" style="cursor:pointer">
				<?php echo $row[1];?></a> </td>
				<td> <?php echo $row[2];?> </td>
				<td> <?php echo $row[3];?> </td>
				<td> <?php echo $row[4];?> </td>
				<td> <?php echo $row[5];?> </td>
				
			</tr>
		
		<?php }?>
	</table>
</center>