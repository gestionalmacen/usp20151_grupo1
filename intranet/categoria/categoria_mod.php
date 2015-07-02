<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$idcategoria= $_GET['idcategoria'];
	$query = "select * from categoria where idcategoria=$idcategoria" ;
	$rs = mysql_query($query,$cnn);
	$row = mysql_fetch_array($rs);
	
?>
<form id="frm_categoria_mod" name="frm_categoria_mod" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Modificar Categoria</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre de Categoria:</label></td>
                <td><input type="text" id="txtcategoria"  onkeypress="txLetras()" value="<?php echo $row[1]; ?>" class="form-control input-sm" placeholder="Ingresar Almacen"></td>
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
      function baja(idcategoria){
        var categoria = document.frm_categoria_mod.txtcategoria;
        $.post('categoria/categoria_baja_ope.php', 
		{	categoria : categoria.value,
                        idcategoria : idcategoria
		},
		function (data){
                    alert(data);
		}
	);
    }
    
   function alta(idcategoria){
        var categoria = document.frm_categoria_mod.txtcategoria;
        $.post('categoria/categoria_alta_ope.php', 
		{	categoria : categoria.value,
                        idcategoria :idcategoria
		},
		function (data){
                    alert(data);
		}
	);
    }
    function mod_nombre(idcategoria)
    {
        var categoria = document.frm_categoria_mod.txtcategoria;
        $.post('categoria/categoria_mod_ope.php', 
		{	categoria : categoria.value,
                        idcategoria :idcategoria
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>

