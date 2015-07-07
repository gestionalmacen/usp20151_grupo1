<?php	
        session_start();
	require_once ("../../conexion.php");        
	if(isset($_SESSION['idusuario'])){
		$cnn=conectar();
                $idtipo_ingreso = $_POST['idtipo_ingreso'];
                $idproveedor = $_POST['idproveedor'];
		$query = "insert into nota_ingreso(idproveedor,fecha_registro,fecha_emision,idtipo_ingreso,estado) values ($idproveedor,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,$idtipo_ingreso,'E')" ;
		if(mysql_query($query,$cnn)){
			echo "Nota de Ingreso Generada";
		}else{
			echo "Fallo";
		}}else {
			echo"<script language=javascript>
				location.href='../index.html';
				</script>";
		}
	
?>

