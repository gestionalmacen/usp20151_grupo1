<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$idusuario= $_GET['idusuario'];
	$query = "select * from usuario where idusuario=$idusuario " ;
	$rs = mysql_query($query,$cnn);
	$row = mysql_fetch_array($rs);
	
?>
<form id="frm_usuario_baja" name="frm_usuario_baja" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Dar de baja o alta</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre de Grupo:</label></td>
		<td><input type="text" id="txtnombre" value="<?php echo $row[1]; ?>" class="form-control input-sm" placeholder="Ingresar nombre de grupo"></td>
        </tr>
	<tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="baja('<?php echo $row[0]; ?>');" class="btn btn-primary">Dar de baja</button>
                        <button type="button" onclick="alta('<?php echo $row[0]; ?>');" class="btn btn-primary">Dar de alta</button>
		</td>
	</tr>
</table>
</form>
<script>
  function baja(idusuario){
        var nombre = document.frm_usuario_baja.txtnombre;
        $.post('usuario/usuario_baja_ope.php', 
		{	nombre : nombre.value,
                        idusuario : idusuario
		},
		function (data){
                    alert(data);
		}
	);
    }
    
   function alta(idusuario){
        var nombre = document.frm_usuario_baja.txtnombre;
        $.post('usuario/usuario_alta_ope.php', 
		{	nombre : nombre.value,
                        idusuario :idusuario
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>

