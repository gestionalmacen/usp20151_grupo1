<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$idkardex = $_GET['idkardex'];

	$query = "select k.idkardex,p.nombre,k.stock_inicial from kardex k inner join producto p on k.idproducto=p.idproducto where k.idkardex= $idkardex" ;
	$rs = mysql_query($query,$cnn);
	$row=mysql_fetch_array($rs);
        
        $inventario = "select i.idinventario,a.nombre,i.estado from inventario i inner join almacen a on i.idalmacen=a.idalmacen where i.estado='A' " ;
        $rsi = mysql_query($inventario,$cnn);
        
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
        <tr height="45">
		<td><label>Inventario:</label></td>
		<td>
		<select name="idinventario" id="idinventario" size="1">
		<option value="0" > Seleccione Inventario por Almacen </option>
		<?php while($rowi = mysql_fetch_array($rsi)){ ?>
		<option value="<?php echo $rowi[0]; ?>"> <?php echo $rowi[1]; ?> </option>
		<?php } ?>
		</select>
		</td>		
	</tr>
                <tr height="45">
            <td>              
            </td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="inventario_reg('<?php echo $row[0]; ?>');" class="btn btn-primary">Modificar</button>
		</td>
	</tr>
</table>
</form>
<script>
    function ini_reg(idkardex)
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
                        idkardex        : idkardex
		},
		function (data){
                    alert(data);
		}
	);
    }
    function inventario_reg(idkardex)
    {
        if (idinventario.value ==0)
	{
		alert('Seleccione un Inventario');
		return;
	}
        $.post('apertura_inventario/apertura_inventario_mod.php', 
		{	idinventario	: idinventario.value,	
                        idkardex     : idkardex
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>

