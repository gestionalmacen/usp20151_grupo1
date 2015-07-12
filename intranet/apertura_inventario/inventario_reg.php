<?php
	session_start();
	require_once ("../../conexion.php");
	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
		$cnn=conectar();
                
		$query = "select * from almacen order by nombre" ;
		$rsp = mysql_query($query,$cnn);
	
?>
<form id="frm_inventario_reg" name="frm_inventario_reg" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registro de Inventario</p><br/></center>
		</td>
	<tr height="45">
		<td width="100px"><label>Tipo de Inventario:</label></td>
                <td><input type="text" id="txttipo_inventario" onkeypress="txLetras()" class="form-control input-sm"  placeholder="Ingrese Tipo"></td>
	</tr>	
        <tr height="45">
		<td><label>Almacen:</label></td>
		<td>
		<select name="idalmacen" id="idalmacen" size="1">
		<option value="0" > Seleccione Almacen </option>
		<?php while($row = mysql_fetch_array($rsp)){ ?>
		<option value="<?php echo $row[0]; ?>"> <?php echo $row[1]; ?> </option>
		<?php } ?>
		</select>
		</td>		
	</tr>
	<tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="inventario_reg();" class="btn btn-primary">Guardar</button>
                        <a href="#" onclick="load_div('contenido', 'apertura_inventario/apertura_pre_listar.php');" style="cursor:pointer">
                                                Registrar Stock Inicial</a>
		</td>
	</tr>
	
	
</table>
</form>
<script>
    
    function txLetras() 
    {
        if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
        event.returnValue = false;
    }
    
    function inventario_reg()
    {
        var tipo_inventario = document.frm_inventario_reg.txttipo_inventario;
        
        if (tipo_inventario.value =="")
	{
		alert('Ingrese Tipo de Inventario');
		tipo_inventario.focus();
		return;
	}
        if (idalmacen.value==0)
	{
		alert('Seleccione Almacen');
		return;
	}
        $.post('apertura_inventario/inventario_ope.php', 
		{	tipo_inventario	: tipo_inventario.value,	
			idalmacen	: idalmacen.value
		},
		function (data){
			alert(data);
		}
	);
    }
</script>
<?php 
	}else{	
		echo "<script language=javascript>
            location.href='../index.html';
	   </script>";	
	}
?>

