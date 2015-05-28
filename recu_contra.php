<form id="frm_recu_contra" name="frm_recu_contra" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Recuperar Contraseña</p><br/></center>
		</td>
	</tr>
        <tr height="45">
		<td width="100px"><label>Usuario:</label></td>
		<td><input type="text" id="txtusuario" class="form-control input-sm" placeholder="Ingrese su usuario"></td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Pregunta Secreta:</label></td>
		<td><input type="text" id="txtpregunta" class="form-control input-sm" placeholder="Ingrese su pregunta secreta"></td>
	</tr>
        <tr height="45">
            <td></td>
            <td><button type="button" onclick="recuperar();" class="btn btn-primary">Respuesta</button> </td>
        </tr>
        
        <tr height="45">
		<td width="100px"><label>Reestablecer contraseña:</label></td>
                <td><input type="password" id="txtclave" placeholder="Ingrese nueva clave" class="form-control input-sm"></td>
	</tr>
        <tr height="45">
		<td width="100px"><label>Respuesta:</label></td>
                <td><input type="text" id="txtrespuesta" placeholder="Ingrese respuesta " class="form-control input-sm"></td>
	</tr>
	<tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			
                        <button type="button" onclick="activar();" class="btn btn-primary">Activar</button>
		</td>
	</tr>
</table>
</form>

<script>
    function recuperar(){
        var usuario = document.frm_recu_contra.txtusuario;
        var pregunta = document.frm_recu_contra.txtpregunta;
        
        $.post('recucontra_ope.php', 
		{	usuario		: usuario.value,
                        pregunta        : pregunta.value
		},
		function (data){
                    alert(data);
		}
	);
    }
    
    function activar(){
        var usuario = document.frm_recu_contra.txtusuario;
        var pregunta = document.frm_recu_contra.txtpregunta;
        var clave = document.frm_recu_contra.txtclave;
        var respuesta = document.frm_recu_contra.txtrespuesta;
        
        $.post('activar_ope.php',
            {
                usuario		: usuario.value,
                pregunta        : pregunta.value,
                clave           : clave.value,
                respuesta       : respuesta.value
            },
            function (data)
            {
                alert(data);
            }
        );
    }
    
</script>
