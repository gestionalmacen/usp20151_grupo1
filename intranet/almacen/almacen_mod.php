<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$idalmacen= $_GET['idalmacen'];
	$query = "select * from almacen where idalmacen=$idalmacen" ;
	$rs = mysql_query($query,$cnn);
	$row = mysql_fetch_array($rs);
	
?>
<form id="frm_almacen_mod" name="frm_almacen_mod" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Modificar Nombre de Almacen</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre de Almacen:</label></td>
                <td><input type="text" id="txtalmacen" onkeypress="txLetras()" value="<?php echo $row[1]; ?>" class="form-control input-sm" placeholder="Ingresar Almacen"></td>
        </tr>
	<tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->  
			<button type="button" onclick="baja('<?php echo $row[0]; ?>');" class="btn btn-primary">Dar de baja</button>
                        <button type="button" onclick="alta('<?php echo $row[0]; ?>');" class="btn btn-primary">Dar de alta</button>
                        <button type="button" onclick="mod_nombre('<?php echo $row[0]; ?>');" class="btn btn-primary">Modificar Nombre</button>
		</td>
	</tr>
</table>
</form>

<script>
    function txLetras() {
     if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
      event.returnValue = false;
    }
      function baja(idalmacen){
        var almacen = document.frm_almacen_mod.txtalmacen;
        $.post('almacen/almacen_baja_ope.php', 
		{	almacen : almacen.value,
                        idalmacen : idalmacen
		},
		function (data){
                    alert(data);
		}
	);
    }
    
   function alta(idalmacen){
        var almacen = document.frm_almacen_mod.txtalmacen;
        $.post('almacen/almacen_alta_ope.php', 
		{	almacen : almacen.value,
                        idalmacen :idalmacen
		},
		function (data){
                    alert(data);
		}
	);
    }
    function mod_nombre(idalmacen)
    {
        var almacen = document.frm_almacen_mod.txtalmacen;
        $.post('almacen/almacen_mod_ope.php', 
		{	almacen : almacen.value,
                        idalmacen :idalmacen
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>
