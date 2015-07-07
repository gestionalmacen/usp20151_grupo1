<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$idsolicitud = $_GET['idsolicitud'];
	$query = "select * from solicitud where idsolicitud=$idsolicitud" ;
	$rs = mysql_query($query,$cnn);
	$row = mysql_fetch_array($rs);
        	
        $queryp = "select p.idproducto,p.nombre,ds.cantidad_solicitada,ds.cantidad_entregada,ds.saldo from detalle_solicitud ds 
        inner join solicitud s on ds.idsolicitud = s.idsolicitud 
        inner join producto p on ds.idproducto = p.idproducto where s.idsolicitud=$idsolicitud" ;
	$rsp = mysql_query($queryp,$cnn);
        $num_registros = is_resource($rsp) ? mysql_num_rows($rsp) : 0;
	if($num_registros>0){
?>
<form id="frm_solicitud_cantidad" name="frm_solicitud_cantidad" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registrar Cantidad a Entregar</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>ID de Producto:</label></td>
		<td><input type="text" id="txtid" class="form-control input-sm"  placeholder="Ingresar ID de Producto"></td>
	</tr>
        <tr height="45">
		<td width="100px"><label>Cantidad Entregada:</label></td>
		<td><input type="text" id="txtcantidad" class="form-control input-sm"  placeholder="Ingrese Cantidad a Entregar"></td>
	</tr>

	<tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="modificar_cantidad('<?php echo $row[0]; ?>');" class="btn btn-primary">Registrar Cantidad</button>
		</td>
	</tr>
</table>
<table id="tabla" class="table">
		<tr bgcolor="lightblue">
                        <td> ID de Producto </td>
			<td> Producto </td>
			<td> Cantidad Solicitada </td>
                        <td> Cantidad Entregada </td>
                        <td> Saldo </td>
		</tr>
		<?php while($rowp = mysql_fetch_array($rsp)){ ?>
			<tr>
				<td> <?php echo $rowp[0];?> </td>
				<td> <?php echo $rowp[1];?> </td>
                                <td> <?php echo $rowp[2];?> </td>
                                <td> <?php echo $rowp[3];?> </td>
                                <td> <?php echo $rowp[4];?> </td>
			</tr>
		
		<?php }?>
</table>
</form>
<script>
    function ValidaSoloNumeros() {
    if ((event.keyCode < 48) || (event.keyCode > 57)) 
    event.returnValue = false;
    }
    function modificar_cantidad(idsolicitud)
    {
        var id          =document.frm_solicitud_cantidad.txtid;
        var cantidad    =document.frm_solicitud_cantidad.txtcantidad;
        
        if (id.value=='')
	{
		alert('Ingrese ID de Producto');
		return;
	}
        if (cantidad.value=='')
	{
		alert('Ingrese una Cantidad');
		return;
	}
        	$.post('solicitud/solicitud_modificar_cantidad_entregada.php', 
		{			
                        id              : id.value,
                        cantidad	: cantidad.value,
                        idsolicitud     : idsolicitud
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>
<?php 
}						
 ?>