<?php
	session_start();
	require_once ("../../conexion.php");
	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
                $idsubcategoria= $_GET['idsubcategoria'];
		$cnn=conectar();
                
		$query = "select * from producto order by nombre" ;
		$rs = mysql_query($query,$cnn);
                
                $query = "select * from subcategoria where idsubcategoria =$idsubcategoria" ;
		$rbe = mysql_query($query,$cnn);
                $rowe = mysql_fetch_array($rbe);
                
		$query = "select * from unidad_medida order by descripcion" ;
		$rsp = mysql_query($query,$cnn);
	
?>

<form id="frm_producto_reg" name="frm_producto_reg" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registro de productos</p><br/></center>
		</td>
	</tr>
        	<tr height="45">
		<td><label>Subcategoria:</label></td>
		<td>
                    
                    <input type="text" value="<?php echo $rowe[0]; ?>" id="txtsubcategoria" disabled="true" class="form-control input-sm">
                   
		</td>
                <td><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'producto/buscar_subcategoria.php');" style="cursor:pointer">
						Buscar Subcategoria</a></td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre:</label></td>
                <td><input type="text" id="txtnombre" onkeypress="txLetras()" class="form-control input-sm"  placeholder="nombre del producto"></td>
	</tr>
        <tr height="45">
		<td width="100px"><label>Descripcion:</label></td>
		<td><input type="text" id="txtdescripcion" class="form-control input-sm"  placeholder="nombre del producto"></td>
	</tr>
	<tr height="45">
		<td><label>Precio:</label></td>
		<td>
			<input type="text" id="txtprecio" class="form-control input-sm" onkeypress="ValidaSoloNumeros()" placeholder="precio del producto">
		</td>		
	</tr>	

        <tr height="45">
		<td><label>Unidad de Medida:</label></td>
		<td>
		<select name="idunidad_medida" id="idunidad_medida" size="1">
		<option value="0" > Seleccione unidad de medida </option>
		<?php while($row = mysql_fetch_array($rsp)){ ?>
		<option value="<?php echo $row[0]; ?>"> <?php echo $row[2]; ?> </option>
		<?php } ?>
		</select>
		</td>		
	</tr>
	<tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="producto_ope('<?php echo $rowe[0]; ?>');" class="btn btn-primary">Guardar</button>
		</td>
	</tr>
	
	
</table>
</form>

<script>
function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
}
function txLetras() {
 if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
  event.returnValue = false;
}
	function producto_ope(idsubcategoria){
	
	var nombre		= document.frm_producto_reg.txtnombre;	
	var descripcion 	= document.frm_producto_reg.txtdescripcion;
	var precio		= document.frm_producto_reg.txtprecio;
        
	if (nombre.value =="")
	{
		alert('ingrese nombre');
		nombre.focus();
		return;
	}
	if (descripcion.value=="")
	{
		alert('ingrese descripcion');
		descripcion.focus();
		return;
	}
	if (precio.value =="")
	{
		alert('ingrese precio');
		precio.focus();
		return;
	}
	$.post('producto/producto_ope.php', 
		{	nombre		: nombre.value,	
                        descripcion     : descripcion.value,
			precio 		: precio.value,
			idsubcategoria  : idsubcategoria, 
			idunidad_medida	: idunidad_medida.value
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