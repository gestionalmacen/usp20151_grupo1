<form id="frm_reportesolicitud" name="frm_reportesolicitud">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar por Fecha(año/mes/dia)</span>
                <input class="span3"  id="txtbuscarfechaini" placeholder="Ingrese Fecha Inicial" type="text">
	</div>
	<div id="subcontenido">
	</div>
</form>
<script>
	$("#txtbuscarfechaini").keyup(
	function(event ){
		//alert($("#txtbuscarproducto").val());
		load_div("subcontenido","solicitud/reportesolicitud_listar.php?q="+$("#txtbuscarfechaini").val());
	}
	);
</script>

