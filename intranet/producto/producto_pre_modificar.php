<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
        error_reporting(0);
	$idproducto = $_GET['idproducto'];
        $idsubcategoria= $_GET['idsubcategoria'];
	$query = "select * from producto where idproducto= $idproducto" ;
	$rs = mysql_query($query,$cnn);
	$row=mysql_fetch_array($rs);
        
        $query = "select * from subcategoria where idsubcategoria =$idsubcategoria" ;
	$rbe = mysql_query($query,$cnn);
        $rowe = mysql_fetch_array($rbe);
                
	$query3 = "select * from unidad_medida order by descripcion" ;
	$rsp = mysql_query($query3,$cnn);
?>
<form id="frm_producto_mod" name="frm_producto_mod" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Modificar Producto</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre:</label></td>
                <td><input type="text" id="txtnombre" value="<?php echo $row[1]; ?>" onkeypress="txLetras()" class="form-control input-sm"  placeholder="nombre del producto"></td>
	</tr>
        <tr height="45">
		<td width="100px"><label>Descripcion:</label></td>
		<td><input type="text" id="txtdescripcion" value="<?php echo $row[2]; ?>" class="form-control input-sm"  placeholder="nombre del producto"></td>
	</tr>
	<tr height="45">
		<td><label>Precio:</label></td>
		<td>
                    <input type="text" id="txtprecio" value="<?php echo $row[3]; ?>" class="form-control input-sm" onkeypress="ValidaSoloNumeros()" placeholder="precio del producto">
		</td>		
	</tr>
        <tr height="45">
            <td>              
            </td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="producto_ope_mod('<?php echo $row[0]; ?>');" class="btn btn-primary">Modificar</button>
                        <button type="button" onclick="producto_ope_mod_estado('<?php echo $row[0]; ?>');" class="btn btn-primary">Dar de Baja</button>
                        <button type="button" onclick="producto_ope_mod_estado_alta('<?php echo $row[0]; ?>');" class="btn btn-primary">Dar de Alta</button>
		</td>
	</tr>
</table>
</form>
<script>
    function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
}
function producto_ope_mod_estado(idproducto)
{
    $.post('producto/producto_mod_ope_estado.php', 
		{
                        idproducto      : idproducto
		},
		function (data){
                    alert(data);
		}
	);
}
function producto_ope_mod_estado_alta(idproducto)
{
    $.post('producto/producto_mod_ope_estado_alta.php', 
		{
                        idproducto      : idproducto
		},
		function (data){
                    alert(data);
		}
	);
}
function txLetras() {
 if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
  event.returnValue = false;
}
    function producto_ope_mod(idproducto)
    {
        var nombre		= document.frm_producto_mod.txtnombre;	
	var descripcion 	= document.frm_producto_mod.txtdescripcion;
	var precio		= document.frm_producto_mod.txtprecio;
         $.post('producto/producto_mod_ope.php', 
		{	nombre		: nombre.value,	
                        descripcion     : descripcion.value,
			precio 		: precio.value,
                        idproducto      : idproducto
		},
		function (data){
                    alert(data);
		}
	);
    }

</script>
