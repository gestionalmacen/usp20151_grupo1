function fechaValida(fecha){
	  var rgx = /(\d{4})-(\d{2})-(\d{2})/;
	  if (fecha.match(rgx)) {	
		  var fechaf = fecha.split("-");
		  var year= fechaf[0];
		  var month = fechaf[1];
		  var day = fechaf[2];
		  var date = new Date(year,month,'0');
		  
		  if((day-0)>(date.getDate()-0)){
				return false;
		  }
		  return true;
	  }
	  else { return false; }
}

function validarEmail( email ) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (expr.test(email)) 
		return true;
	else
		return false;
}