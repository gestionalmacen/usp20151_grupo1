<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "select * from proveedor where nombre like '%$q%' order by nombre asc" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista de Proveedores </p>
	<table class="table">
		<tr bgcolor="lightblue">
                        <td><b> Nombre </b> </td>
                        <td><b> RUC </b></td>
			<td><b> Telefono </b></td>			
			<td><b> Direccion </b></td>
			<td><b> Fecha Registro </b></td>
			<td><b> Estado </b></td>
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
				<td> <a data-toggle="modal"  data-target="#myModal"  onclick="load_div('modal_body', 'proveedor/proveedor_categoria_reg.php?idproveedor=<?php echo $row[0];?>');" style="cursor:pointer">
				<?php echo $row[1];?></a> </td>
				<td> <?php echo $row[2];?> </td>
				<td> <?php echo $row[3];?> </td>
				<td> <?php echo $row[4];?> </td>
				<td> <?php echo $row[5];?> </td>
                                <td> <?php if  ($row[6]=='A') {echo 'Apto';} else {echo 'No apto' ;};?> </td>
                                
				
			</tr>
		
		<?php }?>
	</table>
</center>

