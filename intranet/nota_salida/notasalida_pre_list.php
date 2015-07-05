<form id="frm_notasalida" name="frm_notasalida">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar por Fecha(año/mes/dia)</span>
                <input class="span3"  id="txtbuscarfechaini" placeholder="Ingrese Fecha Inicial" type="text">
                <input class="span3"  id="txtbuscarfechafin" placeholder="Ingrese Fecha Fin" type="text">
		<a  onclick="load_div('contenido', 'nota_salida/notasalida_reg.php');" style="cursor:pointer">
						Registrar Nota de Salida</a>
	</div>
	<div id="subcontenido">
	</div>
</form>
<script>
	$("#txtbuscarfechaini").keyup(
	function(event ){
		//alert($("#txtbuscarproducto").val());
		load_div("subcontenido","nota_salida/notasalida_listar.php?q="+$("#txtbuscarfechaini").val());
	}
	);
        $("#txtbuscarfechafin").keyup(
	function(event ){
		//alert($("#txtbuscarproducto").val());
		load_div("subcontenido","nota_salida/notasalida_listar.php?w="+$("#txtbuscarfechafin").val());
	}
	);
</script>

