function registrar() {
	var apellidos 	= document.frmreg_empleado.txtApellidos;
	var nombres 	= document.frmreg_empleado.txtNombres;
	var fechaNac 	= document.frmreg_empleado.txtFechaNac;
	var sexo        = document.frmreg_empleado.querySelector('input[name="rbSexo"]:checked');
	var dni 		= document.frmreg_empleado.txtDNI;
	var email 		= document.frmreg_empleado.txtCorreo;
	var telefono 	= document.frmreg_empleado.txtTelefono;

	if (apellidos.value.length > 0 
	    && nombres.value.length > 0
		&& fechaNac.value.length > 0
		&& sexo.value.length > 0
		&& dni.value.length > 0 ) {
		
		if (fechaValida(fechaNac.value)){
		if (email.value.length == 0 || validarEmail(email.value)) {
			
			$.post('capanegocio/reg_empleado.php', 
				{	apellidos	: 	apellidos.value,	
					nombres  	: 	nombres.value,
					fechaNac    :   fechaNac.value,
					sexo 	    :   sexo.value,
					dni 	    :   dni.value,
					email 	    :   email.value,
					telefono    :   telefono.value			
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
		} else{ alert("Fecha no valida"); }
	}
	else{ alert("Hay campos obligatorios que llenar."); }
}
function actualizar(pacienteID) {
	var apellidos 	= document.frmreg_empleado.txtApellidos;
	var nombres 	= document.frmreg_empleado.txtNombres;
	var fechaNac 	= document.frmreg_empleado.txtFechaNac;
	var sexo        = document.frmreg_empleado.querySelector('input[name="rbSexo"]:checked');
	var dni 		= document.frmreg_empleado.txtDNI;
	var email 		= document.frmreg_empleado.txtCorreo;
	var telefono 	= document.frmreg_empleado.txtTelefono;
	
	if (apellidos.value.length > 0 
	    && nombres.value.length > 0
		&& fechaNac.value.length > 0
		&& sexo.value.length > 0
		&& dni.value.length > 0 ) {
	
		if (fechaValida(fechaNac.value)) {
		if (email.value.length == 0 || validarEmail(email.value)) {
		
			$.post('capanegocio/modif_empleado.php', 
				{	pacienteID	:   pacienteID,
					apellidos	: 	apellidos.value,	
					nombres  	: 	nombres.value,
					fechaNac    :   fechaNac.value,
					sexo 	    :   sexo.value,
					dni 	    :   dni.value,
					email 	    :   email.value,
					telefono    :   telefono.value			
				},
				function (data) {
					if (data == 1) {
						alert("Actualizacion correcta");				
					}else {
						alert(data);				
					}
				}
			);
		} else { alert("Correo no valido"); }
		} else { alert("Fecha no valida"); }
	}
	else{ alert("Hay campos obligatorios que llenar."); }
}