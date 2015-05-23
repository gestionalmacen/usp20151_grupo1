// Solo numeros y letras
// ---------------------------------------------
function soloLetrasPermitidas(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz1234567890";
    especiales = [8, 37];
    tecla_especial = false;
	
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true; break;
        }
    }
	
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpiaPermitidas(control) {
	var val = document.getElementById(control).value.toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz1234567890";
	
	for (i = 0; i < val.length; i++) {
		if(letras.indexOf(val[i]) == -1) {
			document.getElementById(control).value = '';
			break;
		}
    }
}

// Numeros y letras y caracteres especiales
//-------------------------------------------------------------

function soloLetrasPermitidas2(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz1234567890@_*";
    especiales = [8, 37];
    tecla_especial = false;
	
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true; break;
        }
    }
	
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpiaPermitidas2(control) {
	var val = document.getElementById(control).value.toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz1234567890@_*";
	
	for (i = 0; i < val.length; i++) {
		if(letras.indexOf(val[i]) == -1) {
			document.getElementById(control).value = '';
			break;
		}
    }
}

// Solo letras
// --------------------------------------------------------------

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37];
    tecla_especial = false;
	
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true; break;
        }
    }
	
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpiaLetras(control) {
	var val = document.getElementById(control).value.toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz";
	
	for (i = 0; i < val.length; i++) {
		if(letras.indexOf(val[i]) == -1) {
			document.getElementById(control).value = '';
			break;
		}
    }
}

// Solo letras y espacio en blanco
// --------------------------------------------------------------

function soloPalabras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "áéíóúabcdefghijklmnñopqrstuvwxyz ";
    especiales = [8, 37];
    tecla_especial = false;
	
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true; break;
        }
    }
	
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpiaPalabras(control) {
	var val = document.getElementById(control).value.toLowerCase();
    letras = "áéíóúabcdefghijklmnñopqrstuvwxyz ";
	
	for (i = 0; i < val.length; i++) {
		if(letras.indexOf(val[i]) == -1) {
			document.getElementById(control).value = '';
			break;
		}
    }
}

// Solo digitos y el punto
// --------------------------------------------------------------

function soloNumero(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "1234567890";
    especiales = [8, 37, 46];
    tecla_especial = false;
	
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true; break;
        }
    }
	
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpiaNumero(control) {
    var val = document.getElementById(control).value;
    if (!isNumber(val)) {
        document.getElementById(control).value = '';
	}
}

function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

// Solo digitos
// --------------------------------------------------------------

function soloDigitos(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = [8, 37];
    tecla_especial = false;
	
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true; break;
        }
    }
	
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpiaDigitos(control) {
	var val = document.getElementById(control).value.toLowerCase();
    letras = "0123456789";
	
	for (i = 0; i < val.length; i++) {
		if(letras.indexOf(val[i]) == -1) {
			document.getElementById(control).value = '';
			break;
		}
    }
}

// Solo digitos y el guion
// ---------------------------------------------------------

function soloDigitoGuion(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789-";
    especiales = [8, 37];
    tecla_especial = false;
	
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true; break;
        }
    }
	
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpiaDigitoGuion(control) {
	var val = document.getElementById(control).value.toLowerCase();
    letras = "0123456789-";
	
	for (i = 0; i < val.length; i++) {
		if(letras.indexOf(val[i]) == -1) {
			document.getElementById(control).value = '';
			break;
		}
    }
}

// Solo numeros, letras, arroba, guion bajo y punto
//----------------------------------------------------------------------
function soloCorreo(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz1234567890@_.";
    especiales = [8, 37];
    tecla_especial = false;
	
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true; break;
        }
    }
	
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpiaCorreo(control) {
	var val = document.getElementById(control).value.toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz1234567890@_.";
	
	for (i = 0; i < val.length; i++) {
		if(letras.indexOf(val[i]) == -1) {
			document.getElementById(control).value = '';
			break;
		}
    }
}