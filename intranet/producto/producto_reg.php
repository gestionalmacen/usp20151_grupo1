<?php
	session_start();
	require_once ("../../conexion.php");
	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
		$cnn=conectar();
		$query = "select * from producto order by nombre" ;
		$rs = mysql_query($query,$cnn);
		$query = "select * from tipoproducto order by nombre" ;
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
		<td width="100px"><label>Nombre:</label></td>
		<td><input type="text" id="txtNombre" class="form-control input-sm"  placeholder="nombre del producto"></td>
	</tr>
	<tr height="45">
		<td><label>Precio:</label></td>
		<td>
			<input type="text" id="txtPrecio" class="form-control input-sm" onkeypress="ValidaSoloNumeros()" placeholder="precio del producto">
		</td>		
	</tr>	
	<tr height="45">
		<td><label>Tipo de Producto:</label></td>
		<td>
		<select name="idtipoproducto" id="idtipoproducto" size="1">
		<option value="0" > Seleccione Tipo Producto </option>
		<?php while($row = mysql_fetch_array($rsp)){ ?>
		<option value="<?php echo $row[0]; ?>"> <?php echo $row[1]; ?> </option>
		<?php } ?>
		</select>
		</td>		
	</tr>
	<tr height="45">
		<td><label>Marca:</label></td>
		<td>
			<input type="text" id="txtMarca" class="form-control input-sm" placeholder="Ingrese Marca">
		</td>		
	</tr>
	<tr height="45">
		<td><label>Descripcion:</label></td>
		<td>
			<input type="text" id="txtDescripcion" class="form-control input-sm" placeholder="Ingresar Descripcion">
		</td>		
	</tr>
	
	
	
	<tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="producto_ope();" class="btn btn-primary">Guardar</button>
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
	function producto_ope(){
	
	var nombre		= document.frm_producto_reg.txtNombre;	
	var precio 		= document.frm_producto_reg.txtPrecio;
	var marca		= document.frm_producto_reg.txtMarca;
	var descripcion	= document.frm_producto_reg.txtDescripcion;
	if (nombre.value =="")
	{
		alert('ingrese nombre');
		nombe.focus();
		return;
	}
	if (nombre.value.length > 20)
	{
		alert('Tope de Caracteres Sobre pasado');
		dni.focus();
		return;
	}
	if (precio.value =="")
	{
		alert('ingrese precio');
		precio.focus();
		return;
	}
	if (marca.value =="")
	{
		alert('ingrese marca');
		marca.focus();
		return;
	}
	if (idtipoproducto.value==0)
	{
		alert('seleccione un tipo producto');
		return;
	}
	if (descripcion.value =="")
	{
		alert('ingrese descripcion');
		descripcion.focus();
		return;
	}
	$.post('producto/producto_ope.php', 
		{	nombre		: nombre.value,		
			precio 		: precio.value,
			idtipoproducto :idtipoproducto.value, 
			marca		: marca.value,
			descripcion	: descripcion.value
		},
		function (data){
			alert('Producto Ingresado correctamente');
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