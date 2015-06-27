<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$idproveedor = $_GET['idproveedor'];
	$query = "select * from proveedor where idproveedor=$idproveedor" ;
	$rs = mysql_query($query,$cnn);
	$row = mysql_fetch_array($rs);
        
        $query = "select * from categoria order by nombre" ;
	$rsc = mysql_query($query,$cnn);
	
        $queryp = "select p.nombre as 'proveedor',c.nombre as 'categoria',p.idproveedor from detalle_categoria_proveedor d 
        inner join proveedor p on d.idproveedor = p.idproveedor 
        inner join categoria c on d.idcategoria = c.idcategoria where p.idproveedor=$idproveedor" ;
	$rsp = mysql_query($queryp,$cnn);
        $num_registros = is_resource($rsp) ? mysql_num_rows($rsp) : 0;
	if($num_registros>0){
?>
<form id="frm_proveedor_categoria_reg" name="frm_proveedor_categoria_reg" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registro de Categoria a Proveedor</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre de Proveedor:</label></td>
		<td><input type="text" id="txtnombre" value="<?php echo $row[1]; ?>" readonly class="form-control input-sm"  placeholder="nombre del producto"></td>
	</tr>
        <tr height="45">
		<td><label>Categoria:</label></td>
		<td>
		<select name="idcategoria" id="idcategoria" size="1">
		<option value="0" > Seleccione Categoria </option>
		<?php while($rowc = mysql_fetch_array($rsc)){ ?>
		<option value="<?php echo $rowc[0]; ?>"> <?php echo $rowc[1]; ?> </option>
		<?php } ?>
		</select>
		</td>		
	</tr>
	<tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="agregar_categoria('<?php echo $row[0]; ?>');" class="btn btn-primary">Agregar Categoria</button>
		</td>
	</tr>
</table>
    <div id="cat_pro">
	<p class="form-title"> Lista de Detalle entre Proveedor y Categoria </p>
        <table id="tabla" class="table">
		<tr bgcolor="lightblue">
			<td> Nombre de Proveedor </td>
			<td> Categoria </td>
		</tr>
		<?php while($rowp = mysql_fetch_array($rsp)){ ?>
			<tr>
				<td> <?php echo $rowp[0];?> </td>
				<td> <?php echo $rowp[1];?> </td>
			</tr>
		
		<?php }?>
	</table>
    </div>
</form>
<script>
    function agregar_categoria(idproveedor)
    {
        
        if (idcategoria.value==0)
	{
		alert('seleccione una categoria');
		return;
	}
        	$.post('proveedor/proveedor_categoria_reg_ope.php', 
		{			
                        idcategoria     : idcategoria.value,
                        idproveedor	: idproveedor
		},
		function (data){
                    alert(data);
		}
	);
    }
    function mostrar_categoria(){
    load_div("cat_pro","proveedor/categoria_list_mod.php");
	
}
</script>

<?php 
}						
 ?>
