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
</table>
    
    <table align="center" class="table">
        <tr>
            <td>
                <div class="input-prepend input-append">
		<span class="add-on"> Buscar Proveedor</span>
		<input class="span3" id="txtbuscarproveedor" placeholder="Ingrese proveedor" type="text">
		<!--<a  onclick="load_div('contenido', 'proveedor/proveedor_reg.php');" style="cursor:pointer">
						Registrar Proveedor</a>-->
	</div>
	<div id="subcontenido">
	</div>
            </td>
        </tr> 
    </table>
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
    $("#txtbuscarproveedor").keyup(
	function(event ){
		//alert($("#txtbuscarproducto").val());
		load_div("subcontenido","proveedor/proveedor_list_normal.php?q="+$("#txtbuscarproveedor").val());
	}
	);
</script>

