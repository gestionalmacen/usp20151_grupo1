<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
        $idproveedor = $_POST['idproveedor'];
	$query = "select p.nombre as 'proveedor',c.nombre as 'categoria',p.idproveedor from detalle_categoria_proveedor d 
        inner join proveedor p on d.idproveedor = p.idproveedor 
        inner join categoria c on d.idcategoria = c.idcategoria where p.idproveedor=$idproveedor" ;
	$rs = mysql_query($query,$cnn);
        $num_registros = is_resource($rs) ? mysql_num_rows($rs) : 0;
	if($num_registros>0){
?>	
<p class="form-title"> Lista de Detalle entre Proveedor y Categoria </p>
	<table class="table">
		<tr bgcolor="lightblue">
			<td> Nombre de Proveedor </td>
			<td> Categoria </td>
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
				<td> <?php echo $row[0];?> </td>
				<td> <?php echo $row[1];?> </td>
			</tr>
		
		<?php }?>
	</table>

<?php 
}						
 ?>

