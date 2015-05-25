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
<div class="navbar navbar-inverse" role="navigation">
<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span> 
			<span class="icon-bar"></span> 
		</button>
		<a class="navbar-brand" href="index.html">Inicio</a>
	</div>
	
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Mantenedores <b class="caret"></b></a>
				<ul class="dropdown-menu">
				
				<?php if($_SESSION['tipo_usuario']=='almacen'){ ?>
					<li class="dropdown-header">Productos</li>
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'producto/producto_reg.php');" style="cursor:pointer">
						Registrar producto</a></li>              
					<li><a href="#" onclick="load_div('contenido', 'producto/producto_pre_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Listar producto</a></li>	
					<li class="divider"></li>
					<?php } ?>
					
					<?php if($_SESSION['tipousuario']=='administrador'){ ?>
					<li class="dropdown-header">Tipo Producto</li>
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'tipoproducto/tipoproducto_reg.php');" style="cursor:pointer">
						Registrar Tipo Producto</a></li>              	
					<li class="divider"></li>
					<?php } ?>
					
					
					<?php if($_SESSION['tipousuario']=='administrador'){ ?>
					<li class="dropdown-header">Pedido</li>
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'pedido/pedido_reg.php');" style="cursor:pointer">
						Registrar Pedido</a></li>              
					<li><a href="#" onclick="load_div('contenido', 'pedido/pedido_pre_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Listar Pedido</a></li>	
					<li class="divider"></li>
					<?php } ?>
					
					
					<?php if($_SESSION['tipousuario']=='administrador'){ ?>
					<li class="dropdown-header">Proveedores</li>
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'proveedor/proveedor_reg.php');" style="cursor:pointer">
						Registrar Proveedor</a></li>              
					<li><a href="#" onclick="load_div('contenido', 'proveedor/proveedor_pre_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Listar Proveedor</a></li>	
					<li class="divider"></li>
					<?php } ?>
					
				<?php if($_SESSION['tipousuario']=='administrador'){ ?>
					<li class="dropdown-header">Usuario</li>
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'usuario/usuario_reg.php');" style="cursor:pointer">
						Registrar Usuario</a></li>  
					<li class="divider"></li>						
					<?php } ?>
					
				<?php if($_SESSION['tipousuario']=='vendedor'){ ?>
					<li class="dropdown-header">Clientes</li>
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'cliente/cliente_reg.php');" style="cursor:pointer">
						Registrar cliente</a></li> 						
					<li><a href="#" onclick="load_div('contenido', 'cliente/cliente_pre_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Listar cliente</a></li>
					<li class="divider"></li>
				<?php } ?>
				
				<?php if($_SESSION['tipousuario']=='almacenero'){ ?>
					<li class="dropdown-header">Almacen</li>
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'almacen/almacen_reg.php');" style="cursor:pointer">
						Registrar Producto en almacen</a></li>
					<li><a href="#" onclick="load_div('contenido', 'almacen/almacen_pre_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Listar Productos en almacen</a></li> 						
					<li class="divider"></li>
				<?php } ?>
				
				<?php if($_SESSION['tipousuario']=='administrador'){ ?>
					<li class="dropdown-header">Trabajador</li>
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'trabajador/trabajador_reg.php');" style="cursor:pointer">
						Registrar trabajador</a></li>
					<li><a href="#" onclick="load_div('contenido', 'trabajador/trabajador_pre_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Listar trabajador</a></li>
				<?php } ?>
					
				<?php if($_SESSION['tipousuario']=='vendedor'){ ?>
					<li class="dropdown-header">Ventas</li>
					<li><a href="#" onclick="load_div('contenido', 'venta/venta_pre_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Realizar Venta </a></li>
				<?php } ?>
				
				</ul>
			</li>		
			<li class="dropdown"> 
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Reporte <b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="reporte/dlglistaventa.php" target="_blank"  onclick="reporte('reporte/dlglistaventa.php');" style="cursor:pointer">
						Listar venta</a></li>
					<li><a href="reporte/dlglistacliente.php" target="_blank"  style="cursor:pointer">
						Listar Cliente</a></li>
						<li><a href="reporte/dlglistaproducto.php" target="_blank"  style="cursor:pointer">
						Listar Producto</a></li>
						<li><a href="reporte/dlglistaproveedor.php" target="_blank"  style="cursor:pointer">
						Listar Proveedores</a></li>
						<li><a href="reporte/dlglistapedido.php" target="_blank"  style="cursor:pointer">
						Listar Pedidos</a></li>
						<li><a href="reporte/barrasm.php" target="_blank" style="cursor:pointer">
						Listar Venta Estadistica Barras Mes </a></li>
						<li><a href="reporte/barrasventacliente.php" target="_blank" style="cursor:pointer">
						Listar Barra Estadistica Ventas de  Cliente </a></li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		<li><a href="../salir.php"> Salir</a></li>	
		</ul>
	</div>
</div>
</div>
</td>
</tr>
</table>

<table align="center" width="890px">
<!-- Slider -->
<tr height="360px">
<TD> <IMG width="125" src="../imagenes/barra.JPG"> </IMG> </TD>
<td align="center" valign="middle" bgcolor="#F8F8F8">
	<!-- Contenido: aqui se mostraran los formularios -->
	<div id="contenido">	
						<DIV id="micarrusel" class="carousel slide">
							<DIV class="carousel-inner">
								<DIV class="item active"> 
									<IMG src="../imagenes/plantas1.jpg" width="300" height="300" alt="slide 1">
										<DIV class="carousel-caption">
											<DIV>
											</DIV>
										</DIV>
								</DIV>
								<DIV class="item"> 
										<IMG src="../imagenes/productos.jpg" width="300" height="300" alt="slide 2">
											<DIV class="carousel-caption">
												<DIV>
												</DIV>
											</DIV>
								</DIV>
							</DIV>
							<a class="left carousel-control" href="#micarrusel" data-slide="prev" ><</a>
							<a class="right carousel-control" href="#micarrusel" data-slide="next" >></a>
						</DIV>
					<br>
						<DIV class="panel panel-success">
							<DIV class="panel-heading">Bienvenido</DIV>
								<DIV class="panel-body">
									En esta web encontraras ...
								</DIV>
						</DIV>
	</div>
	<TD align="right"> <IMG width="125" src="../imagenes/barra.JPG"> </IMG> </TD>
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

<table width="890px" align="center">

<!-- Footer -->
<tr>
	<td>
		<footer>
			<table height="60px" width="890px" class="panel-footer">
				<tr>
					<td>
						<center></center>
					</td>
				</tr>
				<tr>
					<td>
						<center>Victor Orbegozo Percovich - Henry Sullon Pizarro</center>
					</td>
				</tr>
			</table>
		</footer>
	</td>
</tr>
</table>

</body>
</html>
<?php
}
else {
		echo"<script language=javascript>
			location.href='../index.html';
			</script>";
	}
?>