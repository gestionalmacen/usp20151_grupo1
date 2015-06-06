<?php
	session_start();
	require_once ("../../conexion.php");
	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
		$cnn=conectar();		
                $query = "select * from categoria order by nombre" ;
		$rsc = mysql_query($query,$cnn);
	
?>
<form id="frm_subcategoria" name="frm_subcategoria" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registro de Subcategoria</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre de Subcategoria:</label></td>
                <td><input type="text" id="txtsubcategoria" onkeypress="txNombres()" class="form-control input-sm" placeholder="Ingrese nombre de Subcategoria"></td>
	</tr>
        <tr height="45">
		<td><label>Categoria:</label></td>
		<td>
		<select name="idcategoria" id="idcategoria" size="1">
		<option value="0" > Seleccione Categoria </option>
		<?php while($row = mysql_fetch_array($rsc)){ ?>
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
			<button type="button" onclick="registrar();" class="btn btn-primary">Registrar</button>
                        
		</td>
	</tr>
</table>
</form>
<script>
    function txNombres() {
        if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
        event.returnValue = false;
        }
        
      function registrar()
      {
          var subcategoria = document.frm_subcategoria.txtsubcategoria;
          
          if (subcategoria.value =="")
	{
		alert('ingrese subcategoria');
		subcategoria.focus();
		return;
	}
        	if (idcategoria.value==0)
	{
		alert('seleccione una categoria');
		return;
	}
        $.post('subcategoria/subcategoria_reg_ope.php', 
		{	subcategoria	: subcategoria.value,
			idcategoria : idcategoria.value
		},
		function (data){
			alert('Subcategoria ingresado correctamente');
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