<?php 

	require_once "conexion.php"; 
	/**
	* Extencion de Clases: 
	*/
	class datos extends conexion
	{
		#Registro de Usuarios
		#=============================================================================
		public function registroUsuario($dato,$tabla){
			$stmt = conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, correo) VALUES (:usuario,:password,:correo)");

			#binparam
			$stmt->bindParam(":usuario", $dato["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $dato["passw"], PDO::PARAM_STR);
			$stmt->bindParam(":correo", $dato["email"], PDO::PARAM_STR);

			if ($stmt->execute()){
				return "success";
			}else{
				return "error";
			}	
			$stmt->close();	
		}
		#==================================================================================
		#Ingreso de Usuario
		public function ingresoUsuario($datos, $tabla){
			$stmt = conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");
			$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch();
			$stmt->close();
		}

		#==================================================================================
		#Vista Usuraio.
		public function vistaUsuarios($tabla){
			$stmt = conexion::conectar()->prepare("SELECT id,usuario, password, correo FROM $tabla ");
			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->close();  //cerrando las conexiones
		}

		#==================================================================================
		#Editar Usuraio.

		public function editarUsuarios($datos ,$tabla){
			$stmt = conexion::conectar()->prepare("SELECT id,usuario, password, correo FROM $tabla WHERE id = :id");
			$stmt->bindParam(":id", $datos, PDO::PARAM_INT); //parametro de numero entero
			$stmt->execute();
			return $stmt->fetch();

			$stmt->close();

		}
		#==================================================================================
		#Actualizar Usuraio.

		public function actualizarUsuario($datos, $tabla){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password, correo =:correo WHERE id = :id");
			$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
			$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
			$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

			if ($stmt->execute()){
				return "success";
			}else{
				return "error";
			}	
			$stmt->close();

		}
		#==================================================================================
		#Borrado Usuraio.

		public function borradoUsuario($datoB, $tabla){
			$stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id =:id");
			$stmt->bindParam(":id", $datoB, PDO::PARAM_INT);

			if ($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

	}
 ?>