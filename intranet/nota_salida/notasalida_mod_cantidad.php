<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
        $id="select max(idnota_salida) from nota_salida";
        $ids=mysql_query($id,$cnn);
        $rowid=  mysql_fetch_array($ids);
        $idnota_salida=$rowid[0];
        $idproducto = $_GET['idproducto'];
	$query = "SELECT dns.idproducto,dns.cantidad_entregada FROM detalle_notasalida dns
        inner join nota_salida ns on dns.idnota_salida=ns.idnota_salida where dns.idnota_salida=$idnota_salida and dns.idproducto=$idproducto";
	$rs = mysql_query($query,$cnn);
        $row=mysql_fetch_array($rs);
?>
<form id="frm_notasalida_cantidad_entregada" name="frm_notasalida_cantidad_entregada" class="form-vertical">
 <table width="373">   
        <tr>
		<td colspan="2">
			<center><p class="form-title">Modificar Cantidad Entregada</p><br/></center>
		</td>
	</tr>
    	<tr height="45">
		<td width="100px"><label>Cantidad Entregada:</label></td>
                <td><input type="text" id="txtcantidad" onkeypress="ValidaSoloNumeros()" value="<?php echo $row[1]; ?>"  class="form-control input-sm"  placeholder="Cantidad"></td>
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
        var cantidad = document.frm_notasalida_cantidad_entregada.txtcantidad;
        $.post('nota_salida/notasalida_mod_cantidad_ope.php', 
		{	cantidad   : cantidad.value,
                        idproducto  :idproducto
		},
		function (data){
                    alert(data);
		}
	);
    }
</script> 

