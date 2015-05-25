function login(){
var usuario = document.frm_login.txtusuario;
var clave = document.frm_login.txtclave;
$.post('login_ope.php', 
		{	usuario		: usuario.value,		
			clave 		: clave.value			
		},
		function (data){
			if(data=="Bienvenido"){
				$(location).attr('href','intranet/admin.php');
			}else{
				alert(data);
			}
		}
	);
}


function cliente_modif(){	
	var nombre		= document.frm_cliente_modif.txtNombre;	
	var dni 		= document.frm_cliente_modif.txtDNI; 
	var dni1 		= document.frm_cliente_modif.txtDNI1; 

	$.post('cliente_ope2.php', 
		{	nombre		: nombre.value,		
			dni 		: dni.value,		
			dni1 		: dni1.value		
		},
		function (data){}
	);
}


function producto_modif(){
	
	var codigo		= document.frm_producto_modif.txtCodigo;	
	var nombre		= document.frm_producto_modif.txtNombre;	
	var precio 		= document.frm_producto_modif.txtPrecio; 

	$.post('producto_ope2.php', 
		{	codigo		: codigo.value,	
			nombre		: nombre.value,		
			precio 		: precio.value			
		},
		function (data){}
	);
}

function venta_reg(){
	
	var idcliente	= document.frm_venta_reg.cboCliente;	
	var idproducto 	= document.frm_venta_reg.cboProducto; 
	var cantidad 	= document.frm_venta_reg.txtCantidad; 
	
	console.log(idcliente.value, idproducto.value, cantidad.value)
	
	$.post('venta_ope.php', 
		{	idcliente	: idcliente.value,		
			idproducto 	: idproducto.value,
			cantidad	: cantidad.value
		},
		function (data){
			console.log(data);
		}
		
	);
}
