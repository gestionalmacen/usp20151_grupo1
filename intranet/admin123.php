<!doctype html>
<html>

<!----------------------- Cabecera del documento --------------------->
<head>
	<meta charset="utf-8">	
	<!-- JQuery -->
	<script src="../jquery_2.1.0.min.js"></script>	
	<!-- Boostrap -->
	<link href="../bootstrap.min.css" rel="stylesheet">	
	<script src="../bootstrap.min.js"></script>	
	<!-- Personalizado -->
	<link href="../my_styles.css" rel="stylesheet">	
	<script src="../ajax_funciones.js"></script>
	<script src="../ajax_data.js"></script>		
	<!-- Slider -->
	<link href="../my_slider_styles.css" rel="stylesheet">
	<script src="../my_slider.js"></script>
	<!-- Titulo -->
	<title>Pagina web</title>
</head>

<!-------------------------- Cuerpo del documento -------------------->
<body>
<table align="center" width="890px">
<tr><td height="110px" bgcolor="#FFFFFF">
		<img src="../images/banner.png" border="0" />
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
		<a class="navbar-brand" href="index.html">Inicio</a>
	</div>
	
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Mantenedores <b class="caret"></b></a>
				<ul class="dropdown-menu">
				
					<li class="dropdown-header">Productos</li>
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'producto_reg.php');" style="cursor:pointer">
						Registrar producto</a></li>              
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'producto_modif.php');" style="cursor:pointer">
						Modificar producto</a></li> 
					<li><a href="#" onclick="load_div('contenido', 'producto_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Listar producto</a></li>	
					<li class="divider"></li>
					
					<li class="dropdown-header">Clientes</li>
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'cliente_reg.php');" style="cursor:pointer">
						Registrar cliente</a></li> 
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'cliente_modif.php');" style="cursor:pointer">
						Modificar cliente</a></li> 						
					<li><a href="#" onclick="load_div('contenido', 'cliente_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Listar cliente</a></li>
				</ul>
			</li>
			<li class="dropdown"> 
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Facturacion <b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'venta_reg.php');" style="cursor:pointer">
						Registrar venta</a></li>
				</ul>
			</li>			
			<li class="dropdown"> 
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Reporte <b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="#" onclick="load_div('contenido', 'venta_list.php');load_div('contenidoweb', 'empty.php');" style="cursor:pointer">
						Listar ventas</a></li>
				</ul>
			</li>	
			<li><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'login.php');" style="cursor:pointer">
						Salir</a></li>		
		</ul>		
	</div>
</div>
</div>
</td>
</tr>
</table>

<table align="center" width="890px">
<!-- Slider -->
<tr height="360px"><td align="center" valign="middle" bgcolor="#F8F8F8">
	
	<!-- Contenido: aqui se mostraran los formularios -->
	<div id="contenido">	
	<center>
	<div id="sli-page">		
	<div id="slider">		
		<div id="sli-nextLinkbtn">&gt;</div>
		<div id="sli-previousLinkbtn">&lt;</div>
		<div id="slider-items">
			<img src="images/imagen1.png" class="image-shown"  width="890px" />
			<img src="images/imagen2.png" class="image-hidden" width="890px" />
			<img src="images/imagen3.png" class="image-hidden" width="890px" />		
		</div>	                                               
	</div>                                                 
	</div>                            
	</center>               
	</div>
</td>
</tr>
<!-- Modal dialog -->
<tr><td>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">		
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Digital Master</h4>
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
<!-- Descripcion -->
<tr><td>
	<!-- Contenido: aqui se mostraran los formularios (2) -->
	<div id="contenidoweb">
	<table height="240">
		<tr bgcolor="#F8F8F8">
			<td><p class="cont">Empresa de venta de computadoras.</p></td>
			<td><p class="tit">Servicios:</p>
				<p class="cont">Venta de laptops, computadoras, articulos de computadoras y servicio técnico.</p></td>
		</tr>        
	</table>
	</div>
</td>
</tr>

<!-- Footer -->
<tr><td>
	<footer>
	<table height="60px" width="890px" class="panel-footer">
		<tr><td>
			<center>Dirección: Av. Pardo 576 2do. Piso - Chimbote</center>
		</td>
		</tr>
		<tr><td>
			<center>(c) By: Kenedy Gutierrez Mendoza</center>
		</td>
		</tr>
	</table>
    </footer>
</td>
</tr>
</table>

</body>
</html>