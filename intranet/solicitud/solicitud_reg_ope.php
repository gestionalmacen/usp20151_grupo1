<?php	
        session_start();
	require_once ("../../conexion.php");        
	if(isset($_SESSION['idusuario'])){
		$cnn=conectar();
                $idarea = $_POST['idarea'];
		$idusuario = $_SESSION['idusuario'];
		$query = "insert into solicitud (idusuario,idarea,fecha,estado) values ($idusuario,$idarea,CURRENT_TIMESTAMP,'P')" ;
		if(mysql_query($query,$cnn)){
			echo "Solicitud Registrada";
		}else{
			echo "Fallo";
		}}else {
			echo"<script language=javascript>
				location.href='../index.html';
				</script>";
		}
	
?>

