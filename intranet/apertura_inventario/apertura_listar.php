<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "SELECT k.idkardex,p.nombre,i.tipo_inventario,a.nombre,k.fecha_registro,k.stock_inicial,k.stock_final,k.stock_actual,k.estado FROM kardex k 
        inner join producto p on k.idproducto=p.idproducto
        inner join inventario i on k.idinventario=i.idinventario
        inner join almacen a on i.idalmacen=a.idalmacen where p.nombre like '%$q%' " ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista de Kardex por Producto </p>
	<table class="table">
		<tr bgcolor="lightblue">
			<td><b> Producto </b></td>
                        <td><b> Tipo de Inventario </b></td>
                        <td><b> Almacen </b></td>
			<td><b> Fecha de Registro </b></td>
                        <td><b> Stock Inicial </b></td>
                        <td><b> Salida </b></td>
                        <td><b> Stock Actual </b></td>
                        <td><b> Estado </b></td>
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
                                <td> <a data-toggle="modal"   onclick="load_div('contenido', 'apertura_inventario/apertura_reg.php?idproducto=<?php echo $row[0];?>');" style="cursor:pointer">
				<?php echo $row[1];?></a> </td>
				<td> <?php echo $row[2];?> </td>
                                <td> <?php echo $row[3];?> </td>
				<td> <?php echo $row[4];?> </td>
                                <td> <?php echo $row[5];?> </td>
                                <td> <?php echo $row[6];?> </td>
                                <td> <?php echo $row[7];?> </td>
                                <td> <?php if($row[8]=='A') {echo 'Activo';} else {echo 'Inactivo';} ;?> </td>
				
			</tr>
		
		<?php }?>
	</table>
</center>