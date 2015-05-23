function login() {
	var usuario 	= document.frmusuario_login.txtusuario;
	var contrasena 	= document.frmusuario_login.txtcontrasena;
	
	$.post('intranet/capanegocio/usuario_login.php', 
		{	usuario		: usuario.value,		
			contrasena 	: contrasena.value			
		},
		function (data) {
			if (data == 1) {
				$(location).attr('href', 'intranet');
			}else if(data == 2){
				alert("Su cuenta está deshabilitada");				
			}else{
				alert("Usuario no válido");				
			}
		}
	);
}