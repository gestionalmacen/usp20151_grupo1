<?php
	session_start();
	if(!isset($_SESSION['usuarioID'])){
		header('Location:../index.html');
	}
?>
<!doctype html>
<html>
<!----------------------- Cabecera del documento --------------------->
<head>
	<meta charset="utf-8">	
	<!-- JQuery -->
	<script src="../js/jquery_2.1.0.min.js"></script>	
	<!-- Boostrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">	
	<script src="../js/bootstrap.min.js"></script>	
	<!-- Personalizado -->
	<link href="../css/mystyles.css" rel="stylesheet">	
	<script src="../js/ajax_ui.js"></script>
	<script src="ui/js/valida.js"></script>
	<script src="ui/js/valida_operaciones.js"></script>
	<!-- Menu vertical -->
	<link href="ui/css/mystyles_acordeon.css" rel="stylesheet">	
	<!-- Titulo -->
	<title>Pagina web</title>
</head>

<!-------------------------- Cuerpo del documento -------------------->
<body>

<!-- tabla Banner -->
<table align="center" width="890px">
<tr><td height="110px" bgcolor="#FFFFFF">
		<img src="../imagenes/banner.png" border="0" width="890px"/>
	</td>
</tr>
</table>

<!-- tabla Menu -->
<table id="tabla_menu" align="center">
<tr>
<td>
	<div class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
	<!-- menu header -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span> 
			<span class="icon-bar"></span> 
		</button>
		<a class="navbar-brand" href="../index.html">Inicio</a>
	</div>	
	<!-- menu contenido -->
	<div class="navbar-collapse collapse">	
		<ul class="nav navbar-nav">		
			<li><a href="capanegocio/usuario_exit.php" style="cursor:pointer">Salir</a></li>
		</ul>		
	</div>
	<!-- fin menu -->
	</div>
	</div>
</td>
</tr>
</table>

<!-- tabla menu vertical, contenido, y modal -->
<table align="center" width="890px">
<tr>
<td width="201px" rowspan="2" valign="top" bgcolor="#F3F4F4" >
<div id="v_menu_wrap">
	<ul id ="v_menu" class="v_menu">
		<?php if ($_SESSION['rolID'] == 2 || $_SESSION['rolID'] == 1) { // Jefe de Almacen o admin ?>
		<li id="menu1"><a href="#">Mantenimiento</a>
			<ul>
				<?php if ($_SESSION['rolID'] == 2) { // Jefe de Almacen ?>
				<li class="subitem1">
					<a href="#" onclick="load_div('contenido', 'forms/man_empleado.php');" style="cursor:pointer">
						Empleado
					</a>
				</li>				
				<li class="subitem1">
					<a href="#" onclick="load_div('contenido', 'forms/man_proveedor.php');" style="cursor:pointer">
						Proveedor
					</a>
				</li>
				<?php } if ($_SESSION['rolID'] == 1) { // Administrador ?>
				<li class="subitem1">
				</li>
				<?php } ?>
			</ul>
		</li>
	
		<?php } if ($_SESSION['rolID'] == 1) { // Administrador ?>
		<li id="menu5"><a href="#">Reportes </a>
			<ul>	
				<li class="subitem1">
					<a href="reports/empleados_rep.php" target="_blank">Reporte Empleados</a>					
				</li>								
				<li class="subitem1">
					<a href="reports/proveedores_rep.php" target="_blank">Reporte Proveedores</a>					
				</li>	
				<li class="subitem1">
					<a href="#" onclick="load_div('contenido', 'forms/rep_graficos.php');" style="cursor:pointer">
						Graficos
					</a>
				</li>
			</ul>
		</li>
		<?php } ?>
	</ul> 
</div>
</td>
<td align="center" valign="middle" bgcolor="#F8F8F8">	
	<!-- Contenido -->
	<div id="contenido">		
		
	</div>
</td>
</tr>
<tr>
<td>	
	<!-- Modal dialog "#myModal" -->		
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Sistema Gestion de Almacen</h4>
			</div>		
			<center>
				<div id="modal_body" class="modal-body"></div>
			</center>	
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
			</div>		  
		</div>		
	</div>
	</div>
</td>
</tr>                         
</table>

<!-- table contenido2 y footer -->
<table width="890px" align="center">
<tr>
<td>
    <!-- Contenido2 -->
	<div id="contenido2">
	<table width="890px" height="10px">
		<tr>
			<td>			
			<div id="div_control_contenido"></div>
			</td>		
		</tr>        
	</table>
	</div>
</td>
</tr>

<tr>
<td>
	<!-- Footer -->
	<footer>
	<table height="60px" width="890px" class="panel-footer">
		<tr><td>
			<center>&copy;&nbsp;USP</center>			
		</td>
		</tr>
	</table>
    </footer>
</td>
</tr>
</table>
</body>

<script type="text/javascript">
/* mostrar el formulario de bienvenido, al pasar el login */
load_div('contenido', 'forms/bienvenido.php');

/* funcion para el acordeon */
$(function() {
    var menu  = $('.v_menu > li > a'),
		items = $('.v_menu > li > ul');	
		
	items.hide();
	$('.v_menu > li:nth-child(1) > ul').show();
	$('.v_menu > li:nth-child(1) > a').addClass('active');
				
    menu.click(function(e) {	
		e.preventDefault();	
		if (!$(this).hasClass('active')) {
			items.slideUp();
			$(this).next().slideToggle();
			menu.removeClass('active');
			$(this).addClass('active');
		}
    });
});
</script>
</html>

