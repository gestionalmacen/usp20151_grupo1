<?php
	session_start();
	if(!isset($_SESSION['usuarioID'])){
		header('Location:../../index.html');
	}
?>
<form id="frmbienvenido" name="frmbienvenido">
<table>
<tr>
<td>
	<div class="input-prepend input-append">			
		<table>
			<tr>
				<td rowspan="2" width="75px"><image src="ui/imagenes/user.png"></td>				
				<td colspan="2"><p class="form-title">Bienvenido</p></td>
			</tr>
			<tr height="30">		
				<td><p>Usuario:&nbsp;</p></td>
				<td width="250px">
					<p><?php echo $_SESSION['nombres']. ' '.$_SESSION['apellidos']; ?></p>
				</td>			
			</tr>
		</table>
		<br/>		
	</div>
</td>
</tr>
</table>
</form>