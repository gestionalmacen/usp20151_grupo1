<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$idnota_salida = $_GET['idnota_salida'];
        $queryp = "select p.nombre,dns.cantidad_entregada,um.descripcion from nota_salida ns 
                   inner join detalle_notasalida dns on ns.idnota_salida=dns.idnota_salida
                   inner join producto p on dns.idproducto = p.idproducto 
                   inner join unidad_medida um on dns.idunidad_medida=um.idunidad_medida where ns.idnota_salida=$idnota_salida" ;
	$rsp = mysql_query($queryp,$cnn);
        $num_registros = is_resource($rsp) ? mysql_num_rows($rsp) : 0;
	if($num_registros>0){
?>
<form id="frm_detalle_notasalida" name="frm_detalle_notasalida" class="form-vertical">
    <div id="cat_pro">
	<p class="form-title"> Detalle de Nota de Salida </p>
        <table id="tabla" class="table">
		<tr bgcolor="lightblue">
			<td> Producto </td>
			<td> Cantidad Entregada </td>
                        <td> Unidad Medida </td>
		</tr>
		<?php while($rowp = mysql_fetch_array($rsp)){ ?>
			<tr>
				<td> <?php echo $rowp[0];?> </td>
				<td> <?php echo $rowp[1];?> </td>
                                <td> <?php echo $rowp[2];?> </td>
			</tr>
		
		<?php }?>
	</table>
    </div>
</form>
<script>
    function mostrar_categoria(){
    load_div("cat_pro","proveedor/categoria_list_mod.php");
	
}
</script>

<?php 
}						
 ?>

