<?php
class MySql {

	// Credenciales de ingreso
	private $host = 'localhost';
	private $user = 'root';
	private $pwd  = '';
	private $bd   = 'almacen';
	
	// Para la consulta
	public $cnn;
	private $query;
	private $result;
	
	function conectar(){
		$this->cnn = mysqli_connect($this->host, $this->user, $this->pwd, $this->bd);
		// Verificar conexion
		if(!$this->cnn){
			echo "Error al conectar a la base de datos. ".mysqli_connect_error();
			exit();
		}
	}
	
	function desconectar(){	
		if ($this->cnn) {
			return mysqli_close($this->cnn);
		}
	}
	
    /**
    * @param  string $query 
    * @return object
    */
	function ejecutar($query){
		$this->query = $query;		
		$this->conectar();		
		if ($this->cnn){
			mysqli_query($this->cnn,"SET NAMES 'utf8'");
			$this->result = mysqli_query($this->cnn, $this->query);			
			if($this->result){
				return $this->result;
				$this->desconectar();
			} else {
				exit("Error al ejecutar la consulta. ".mysqli_error($this->cnn));
				$this->desconectar();	
			}
		}
	}
}
?>		
