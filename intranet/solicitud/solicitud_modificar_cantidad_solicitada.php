<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
        $id="select max(idsolicitud) from solicitud";
        $ids=mysql_query($id,$cnn);
        $rowid=  mysql_fetch_array($ids);
        $idsolicitud=$rowid[0];
        $idproducto = $_GET['idproducto'];
	$query = "SELECT ds.cantidad_solicitada FROM detalle_solicitud ds
        inner join solicitud s on ds.idsolicitud=s.idsolicitud where ds.idsolicitud=$idsolicitud and ds.idproducto=$idproducto";
	$rs = mysql_query($query,$cnn);
        $row=mysql_fetch_array($rs);
?>
<form id="frm_solicitud_cantidad_solicitada" name="frm_solicitud_cantidad_solicitada" class="form-vertical">
 <table width="373">   
        <tr>
		<td colspan="2">
			<center><p class="form-title">Modificar Cantidad Solicitada</p><br/></center>
		</td>
	</tr>
    	<tr height="45">
		<td width="100px"><label>Cantidad Solicitada:</label></td>
                <td><input type="text" id="txtcantidad" onkeypress="ValidaSoloNumeros()" value="<?php echo $row[0]; ?>"  class="form-control input-sm"  placeholder="nombre del producto"></td>
	</tr>
        <tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="modificar_cantidad('<?php echo $row[0]; ?>');" class="btn btn-primary">Modificar</button>
		</td>
	</tr>
 </table>      
</form>
<script>
    
    function ValidaSoloNumeros() 
    {
        if ((event.keyCode < 48) || (event.keyCode > 57)) 
        event.returnValue = false;
    }
    function modificar_cantidad(idproducto)
    {
        var cantidad = document.frm_solicitud_cantidad_solicitada.txtcantidad;
        $.post('solicitud/solicitud_mod_cantidad_solicitada_ope.php', 
		{	cantidad   : cantidad.value,
                        idproducto  :idproducto
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>    

