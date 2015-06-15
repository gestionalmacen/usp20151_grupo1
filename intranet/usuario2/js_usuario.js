function registrar() {
	var apellidos  = document.frmreg_medico.txtApellidos;
	var nombres    = document.frmreg_medico.txtNombres;
	var sexo       = document.frmreg_medico.querySelector('input[name="rbSexo"]:checked');
	var codMed     = document.frmreg_medico.txtCodMed;
	var tipoCodMed = document.frmreg_medico.querySelector('input[name="rbTipoCodMed"]:checked');
	var email      = document.frmreg_medico.txtCorreo;

	if (apellidos.value.length > 0 
	    && nombres.value.length > 0	
		&& sexo.value.length > 0
		&& codMed.value.length > 0 
		&& tipoCodMed.value.length > 0 ) {
		
	if (email.value.length == 0  || validarEmail(email.value)) {
		
		$.post('capanegocio/reg_medico.php', 
			{	
				apellidos   : apellidos.value,
				nombres     : nombres.value,
				sexo        : sexo.value,
				codMed      : codMed.value,
				tipoCodMed  : tipoCodMed.value,
				email       : email.value
			},
			function (data) {
				if (data == 1) {
					alert("Registro correcto");				
				}else {
					alert(data);
				}
			}
		);
	} else{ alert("Correo no valido"); }
	} else{ alert("Hay campos obligatorios que llenar."); }
}

function actualizar(idusuario) {
	var nombres    = document.frmreg_usuario.txtNombres;
	var sexo       = document.frmreg_usuario.querySelector('input[name="rbSexo"]:checked');
	var codMed     = document.frmreg_usuario.txtCodMed;
	var tipoCodMed = document.frmreg_usuario.querySelector('input[name="rbTipoCodMed"]:checked');
	var email      = document.frmreg_usuario.txtCorreo;
	
	if (apellidos.value.length > 0 
	    && nombres.value.length > 0	
		&& sexo.value.length > 0
		&& codMed.value.length > 0 
		&& tipoCodMed.value.length > 0 ) {
		
	if (email.value.length == 0  || validarEmail(email.value)) {

		$.post('capanegocio/modif_usuario.php', 
			{	
				idusuario	: idusuario,
				nombres     : nombres.value,
				sexo        : sexo.value,
				codMed      : codMed.value,
				tipoCodMed  : tipoCodMed.value,
				email       : email.value
			},
			function (data) {
				if (data == 1) {
					alert("Actualizacion correcta");				
				}else {
					alert(data);
				}
			}
		);
	} else{ alert("Correo no valido"); }
	} else{ alert("Hay campos obligatorios que llenar."); }
}