<?php
	session_start();
	session_destroy();
	unset($_SESSION['usuario']);
	unset($_SESSION['tipousuario']);
		echo"<script language=javascript>
			location.href='index.html';
			</script>"
?>