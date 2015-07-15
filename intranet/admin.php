<?php
	session_start();
	if(isset($_SESSION['usuario'])){

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
	<link href="../css/my_styles.css" rel="stylesheet">	
	<script src="../js/ajax_funciones.js"></script>
	<script src="../js/ajax_data.js"></script>		
	<!-- Slider -->
	<link href="../css/my_slider_styles.css" rel="stylesheet">
	<script src="../js/my_slider.js"></script>
	<!-- Titulo -->
	<title>Pagina web</title>
	
	<!-- Valida -->
		<script src="../js/ajax_ui.js"></script>
	<script src="ui/js/valida.js"></script>
	<script src="ui/js/valida_operaciones.js"></script>
	<!-- Acordeon-->
	<link href="ui/css/mystyles_acordeon.css" rel="stylesheet">	

</head>

<!-------------------------- Cuerpo del documento -------------------->
<body>
<table align="center" width="890px">
<tr><td height="110px" bgcolor="#FFFFFF">
		<img src="../imagenes/banner.png" border="0" />
	</td>
</tr>
</table>

<!-- Menu -->
<table id="tabla-menu" align="center">
<tr><td>
<div class="navbar navbar-default" role="navigation">
<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span> 
			<span class="icon-bar"></span> 
		</button>
		<a class="navbar-brand" href="">Inicio</a>
	</div>
	
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Web Service <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if($_SESSION['idgrupo_usuario']==3){ ?>
                                <li class="dropdown-header">Web Service </li>
                                    <li><a href="#" onclick="load_div('contenido', 'web_service/obtener_estado_almacen.php');" style="cursor:pointer">
                                                Obtener estado de Almacen</a> </li>
                                    <li><a href="#" onclick="load_div('contenido', 'web_service/obtener_estado_proveedor.php');" style="cursor:pointer">
                                                Obtener estado de Proveedor</a> </li>
                                    <li><a href="#" onclick="load_div('contenido', 'web_service/obtener_estado_empleado.php');" style="cursor:pointer">
                                                Obtener estado de Empleado</a> </li>
                                    <li><a href="#" onclick="load_div('contenido', 'web_service/obtener_estado_usuario.php');" style="cursor:pointer">
                                                Obtener estado de Usuario</a> </li>
                                                 
                            <?php } ?>
                        </ul>
                    </li>
                                      
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Mantenedores <b class="caret"></b></a>
				<ul class="dropdown-menu">
                                             
				<!--Responsable de Almacen-->
				<?php if($_SESSION['idgrupo_usuario']==3){ ?>
					<li class="dropdown-header">Productos</li>
					<li><a href="#" onclick="load_div('contenido', 'almacen/almacen_pre_listar.php');" style="cursor:pointer">
                                                Almacen</a> </li>              
					<li><a href="#" onclick="load_div('contenido', 'apertura_inventario/inventario_reg.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Apertura y Cierre por Inventario</a></li>	
					<li><a href="#" onclick="load_div('contenido', 'kardex/kardex_pre_listar.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Kardex de Producto</a></li>	
					<li><a href="#" onclick="load_div('contenido', 'categoria/categoria_pre_listar.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Categoria</a></li>	
					<li><a href="#" onclick="load_div('contenido', 'subcategoria/subcategoria_pre_listar.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Subcategoria</a></li>
					<li><a href="#" onclick="load_div('contenido', 'producto/producto_pre_listar.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Catalogo de Productos</a></li>	
					<li><a href="#" onclick="load_div('contenido', 'proveedor/proveedor_pre_listar.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Proveedores</a></li>
					<li><a href="#" onclick="load_div('contenido', 'nota_salida/notasalida_pre_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Nota de Salida</a></li>	
					<li><a href="#" onclick="load_div('contenido', 'nota_ingreso/notaingreso_reg.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Nota de Ingreso</a></li>
                                        <li><a href="#" onclick="load_div('contenido', 'solicitud/reportesolicitud_pre_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Reporte de Solicitudes</a></li>        
				<?php } ?>
				<!--Fin-->
                
				<!--Administrador-->
                <?php if($_SESSION['idgrupo_usuario']==1){ ?>
					<li class="dropdown-header">Grupo de Usuario</li>
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'grupo_usuario/grupo_u_reg.php');" style="cursor:pointer">
						Registrar Nuevo Grupo</a></li>
                                        <li><a href="#" onclick="load_div('contenido', 'grupo_usuario/grupo_pre_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Listar grupos</a></li>
				</li>
				<?php } ?>
				<!--Jefe de Almacen-->
				<?php if($_SESSION['idgrupo_usuario']==2){ ?>
					<li class="dropdown-header">Registro de Solicitud</li>
					<li><a href="#" onclick="load_div('contenido', 'solicitud/solicitud_reg.php');" style="cursor:pointer">
						Producto por oficina</a></li>              
				<?php } ?>	
				<!--Fin-->				
				</ul>
			</li>	
			<?php if($_SESSION['idgrupo_usuario']==3){ ?>			
			<?php } ?>	
		</ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><b>Usuario: <?php echo $_SESSION['usuario'];?></b></a></li>
		<ul class="nav navbar-nav navbar-right">
		<li><a href="../salir.php"> Salir</a></li>	
		</ul>
	</div>
</div>
</div>
</td>
</tr>
</table>

<table width="890px" align="center">
<!-- tabla menu vertical, contenido, y modal -->
<table align="center" width="890px">
<td width="201px" rowspan="2" valign="top" bgcolor="#F3F4F4" >
<div id="v_menu_wrap">
<!-- -->
	<ul id ="v_menu" class="v_menu">
		<?php if($_SESSION['idgrupo_usuario']==1){ ?>
		<li id="menu1"><a href="#">Grupos Usuarios</a>
			<ul>
				<!--Administrador-->
            <?php if($_SESSION['idgrupo_usuario']==1){ ?>	
				<li class="subitem1">
					<a href="#" onclick="load_div('contenido', 'grupo_usuario/grupo_pre_list.php');" style="cursor:pointer">
						Listar grupos
					</a>
				</li>
			</ul>
			<?php } ?>
		</li>                
        <?php if($_SESSION['idgrupo_usuario']==1){ ?>
		<li id="menu2"><a href="#">Usuarios</a>
			<ul>
				<!--Administrador-->
                <li class="subitem1">
					<a href="#" onclick="load_div('contenido', 'usuario/reg_usuario.php');" style="cursor:pointer">
						Registrar Usuario 
					</a>
				</li>
				<li class="subitem1">			
					<a href="#" onclick="load_div('contenido', 'usuario/usuario_pre_listar.php');" style="cursor:pointer">
						Listar Usuario 
					</a>
                </li>
				<li class="subitem1">
					<a href="#" onclick="load_div('contenido', 'usuario2/man_usuarios.php');" style="cursor:pointer">
						Usuarios Activo y Inactivos
					</a>			
				</li>	
			</ul>
			<?php } ?>

		<?php } ?>	
		<?php if($_SESSION['idgrupo_usuario']==3){ ?>	
	    <li id="menu4"><a href="#">Reportes</a>
			<ul>						
			<?php if($_SESSION['idgrupo_usuario']==3){ ?>	
				<li class="subitem1">
					<a href="#" onclick="load_div('contenido', 'reporte/inv_por_almacen.php');" style="cursor:pointer">
						Inventario por Almacen
					</a>
				</li>
				<li class="subitem1">
					<a href="reporte/rep_inv_alm.php" target="_blank">Almacen por Inventario PDF</a>					
				</li>
				<li class="subitem1">
					<a href="#" onclick="load_div('contenido', 'reporte/mov_por_oficina.php');" style="cursor:pointer">
						Movimiento por Oficina
					</a>
				</li>
				<li class="subitem1">
					<a href="reporte/rep_mov_ofi.php" target="_blank">Movimiento por Oficina PDF</a>					
				</li>
				<li class="subitem1">
					<a href="#" onclick="load_div('contenido', 'reporte/adq_pro.php');" style="cursor:pointer">
						Adquisición de Productos
					</a>
				</li>
				<li class="subitem1">
					<a href="#" onclick="load_div('contenido', 'reporte/sol_bie.php');" style="cursor:pointer">
						Solicitud de Bienes
					</a>
				</li>
				<li class="subitem1">
					<a href="reporte/rep_cat_alm.php" target="_blank">Catalago por Almacen</a>					
				</li>	
				<li class="subitem1">
					<a href="reporte/proveedores_rep.php" target="_blank">Proveedores</a>					
				</li>				
			<?php } ?>	
			</ul>	
		</li>
		<?php } ?>	
	</ul> 
<!-- -->
</div>
</td>

<td align="center" valign="middle" bgcolor="#F8F8F8">	
	<!-- Contenido -->
	<div id="contenido">		
		
	</div>
</td>
</tr>




<!-- Slider -->
<tr height="360px">
<td align="center" valign="middle" bgcolor="#F8F8F8">
	<!-- Contenido: aqui se mostraran los formularios -->
	<div id="contenido"></td>
</td>
</tr>
<!-- Modal dialog -->
<tr>
	<td>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">		
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Gestion de Almacen</h4>
					</div>
					<!-- Modal body: aqui se mostraran las ventanas emergentes -->
					<center><div id="modal_body" class="modal-body"></div></center>	
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
					</div>		  
				</div>		
			</div>
		</div>
	</td>
</tr>                         
</table>

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
load_div('contenido', 'bienvenido/bienvenido.php');
/* Acordeon */
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
<?php
}
else {
		echo"<script language=javascript>
			location.href='../index.html';
			</script>";
	}
?>