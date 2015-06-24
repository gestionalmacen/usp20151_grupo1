<?php
	session_start();
	require_once ("../../conexion.php");
	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
		$cnn=conectar();     
                
		$query = "select * from categoria order by nombre" ;
		$rsp = mysql_query($query,$cnn);
                

	
?>
<form id="frm_proveedor_reg" name="frm_proveedor_reg" class="form-vertical">
<table width="400">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registro de Proveedor</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre:</label></td>
                <td><input type="text" onkeypress="txNombres()" id="txtnombre" class="form-control input-sm" placeholder="Ingrese Nombre"></td>
	</tr>
	<tr height="45">
		<td><label>RUC:</label></td>
		<td>
                    <input type="text" id="txtruc" maxlength="11" onkeypress="ValidaSoloNumeros()" class="form-control input-sm" placeholder="Ingrese RUC">
		</td>		
	</tr>
        
        <tr height="45">
		<td><label>Telefono:</label></td>
		<td>
                    <input type="text" id="txttelefono" maxlength="9" onkeypress="ValidaSoloNumeros()" class="form-control input-sm" placeholder="Ingrese Telefono">
		</td>		
	</tr>
        <tr height="45">
		<td><label>Direccion:</label></td>
		<td>
			<input type="text" id="txtdireccion" class="form-control input-sm" placeholder="Ingrese Direccion">
		</td>		
	</tr>
        	
                <td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="proveedor_ope();" class="btn btn-primary">Guardar</button>
		</td>
                
        <tr height="45">
		<td><label>Categoria:</label></td>
		<td>
		<select name="idcategoria" id="idcategoria" size="1">
		<option value="0" > Seleccione Categoria </option>
		<?php while($rowc = mysql_fetch_array($rsp)){ ?>
		<option value="<?php echo $rowc[0]; ?>"> <?php echo $rowc[1]; ?> </option>
		<?php } ?>
		</select>
		</td>		
	</tr>
                <td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="deta_cate_prove('<?php echo $rowc[0];?>');" class="btn btn-primary">Guardar</button>
		</td>
</table>
    
	<div id="categoria_proveedor">
	</div>
            
</form>
<script>
    
    function txNombres() {
        if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
        event.returnValue = false;
    }
    function ValidaSoloNumeros() {
        if ((event.keyCode < 48) || (event.keyCode > 57)) 
        event.returnValue = false;
    }
    
    function proveedor_ope()
    {
        var nombre      =document.frm_proveedor_reg.txtnombre;
        var ruc         =document.frm_proveedor_reg.txtruc;
        var telefono    =document.frm_proveedor_reg.txttelefono;
        var direccion   =document.frm_proveedor_reg.txtdireccion;
        
        if (nombre.value =="")
	{
		alert('Ingrese Nombre');
		nombre.focus();
		return;
	}
        if (ruc.value =="")
	{
		alert('Ingrese RUC');
		ruc.focus();
		return;
	}
        if (telefono.value =="")
	{
		alert('Ingrese Telefono');
		telefono.focus();
		return;
	}
        if (direccion.value =="")
	{
		alert('Ingrese Direccion');
		direccion.focus();
		return;
	}
        $.post('proveedor/proveedor_reg_ope.php', 
		{	nombre		: nombre.value,	
                        ruc             : ruc.value,
			telefono 	: telefono.value,
			direccion       : direccion.value
		},
		function (data){
			alert(data);
		}
	);      
    }
    function deta_cate_prove()
    {
        if (idcategoria.value==0)
	{
		alert('seleccione una categoria');
		return;
	}
        $.post('proveedor/detalle_proveedor_categoria.php', 
		{			
                        idcategoria     : idcategoria.value
		},
		function (data){
                    alert(data);
                    categoria_proveedor();
		}
	);
    }

	function categoria_proveedor()
            {
		load_div("categoria_proveedor","proveedor/categoria_list.php");
            }
</script>

<?php
        }
?>