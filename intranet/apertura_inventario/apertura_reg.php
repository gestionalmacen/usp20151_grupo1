<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$idproducto = $_GET['idproducto'];

	$query = "select k.idkardex,p.nombre,k.stock_inicial from kardex k inner join producto p on k.idproducto=p.idproducto where k.idproducto= $idproducto" ;
	$rs = mysql_query($query,$cnn);
	$row=mysql_fetch_array($rs);
        
?>
<form id="frm_inventario_stock_ini" name="frm_inventario_stock_ini" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registrar Stock Inicial</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre:</label></td>
                <td><input type="text" id="txtnombre" disabled="true" value="<?php echo $row[1]; ?>" onkeypress="txLetras()" class="form-control input-sm"  placeholder="nombre del producto"></td>
	</tr>
        <tr height="45">
		<td width="100px"><label>Stock Inicial:</label></td>
		<td><input type="text" id="txtstock_inicial" value="<?php echo $row[2]; ?>" class="form-control input-sm"  placeholder="nombre del producto"></td>
	</tr>
        <tr height="45">
            <td>              
            </td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="ini_reg('<?php echo $row[0]; ?>');" class="btn btn-primary">Modificar</button>
		</td>
	</tr>
</table>
</form>
<script>
    function ini_reg(idproducto)
    {
        var stock_inicial = document.frm_inventario_stock_ini.txtstock_inicial;
        
        if (stock_inicial.value =="")
	{
		alert('Ingrese Stock Inicial');
		stock_inicial.focus();
		return;
	}
          $.post('apertura_inventario/apertura_reg_ope.php', 
		{	stock_inicial	: stock_inicial.value,	
                        idproducto      : idproducto
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>

