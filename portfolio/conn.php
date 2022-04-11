<?php 

	class connection {

		private $user = 'root';
		private $password = '';
		private $conexion;

		public function __construct() {
			
			try {
				$dsn = 'mysql:host=localhost;dbname=album';
				$this->conexion = new PDO($dsn, $this->user, $this->password);
				$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			} catch (PDOException $e) {
				
				echo $e->getMessage();
			
			}
		}

		public function ejecutar($sql) { // insertar/borrar/actualizar
			$this->conexion->exec($sql);
			return $this->conexion->lastInsertId();
		}

		public function consultar($sql) {
			$sentencia = $this->conexion->prepare($sql);
			$sentencia->execute();
			return $sentencia->fetchAll();
		}
	}

 ?>