<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$idgrupo_usuario= $_GET['idgrupo_usuario'];
	$query = "select * from grupo_usuario where idgrupo_usuario=$idgrupo_usuario " ;
	$rs = mysql_query($query,$cnn);
	$row = mysql_fetch_array($rs);
	
?>
<form id="frm_grupo_baja" name="frm_grupo_baja" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Dar de baja o alta</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre de Grupo:</label></td>
		<td><input type="text" id="txtgrupo" value="<?php echo $row[1]; ?>" class="form-control input-sm" placeholder="Ingresar nombre de grupo"></td>
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
  function baja(idgrupo_usuario){
        var grupo = document.frm_grupo_baja.txtgrupo;
        $.post('grupo_usuario/grupo_baja_ope.php', 
		{	grupo : grupo.value,
                        idgrupo_usuario : idgrupo_usuario
		},
		function (data){
                    alert(data);
		}
	);
    }
    
   function alta(idgrupo_usuario){
        var grupo = document.frm_grupo_baja.txtgrupo;
        $.post('grupo_usuario/grupo_alta_ope.php', 
		{	grupo : grupo.value,
                        idgrupo_usuario :idgrupo_usuario
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>
