<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "SELECT k.idkardex,p.nombre,i.tipo_inventario,k.fecha_registro,k.stock_inicial,k.stock_final,k.stock_actual,k.estado FROM kardex k 
        inner join producto p on k.idproducto=p.idproducto
        inner join inventario i on k.idinventario=i.idinventario where p.nombre like '%$q%' " ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista de Kardex por Producto </p>
	<table class="table">
		<tr bgcolor="lightblue">
                        <td><b> ID Kardex </b></td>
			<td><b> Producto </b></td>
                        <td><b> Tipo de Inventario </b></td>
			<td><b> Fecha de Registro </b></td>
                        <td><b> Stock Inicial </b></td>
                        <td><b> Salida </b></td>
                        <td><b> Stock Actual </b></td>
                        <td><b> Estado </b></td>
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
                                <td><?php echo $row[0];?> </td>
				<td><?php echo $row[1];?> </td>
				<td> <?php echo $row[2];?> </td>
				<td> <?php echo $row[3];?> </td>
                                <td> <?php echo $row[4];?> </td>
                                <td> <?php echo $row[5];?> </td>
                                <td> <?php echo $row[6];?> </td>
                                <td> <?php if($row[7]=='A') {echo 'Activo';} else {echo 'Inactivo';} ;?> </td>
				
			</tr>
		
		<?php }?>
	</table>
</center>