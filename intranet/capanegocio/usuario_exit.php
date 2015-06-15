<?php
	session_start();
	session_destroy();
	unset($_SESSION['usuarioID']);	
	unset($_SESSION['contratoID']); 
	unset($_SESSION['empleadoID']); 
	unset($_SESSION['apellidos']);	
	unset($_SESSION['nombres']);
	unset($_SESSION['rolID']);
	unset($_SESSION['estado']);
	echo "<script language=javascript>
			location.href='../../index.html';
		  </script>"
?>