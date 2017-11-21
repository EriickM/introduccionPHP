<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

#Registro de Uduarios
#=============================================

	public function registroUsuario(){

		if(isset($_POST["usuarioregistro"])){
			$datos = array("usuario"=>$_POST["usuarioregistro"],"passw"=>$_POST["passwordregistro"],"email"=>$_POST["emailregistro"]);
			$respuesta = datos::registroUsuario($datos,"usuarios");
			#            clase::metodo         (datosRegistro, NombreTabla)
			if ($respuesta == "success") {
				header("location:index.php?action=ok");
			}
		}
	}
#datos es la clase , registro usuario metodo 
#========================================================
#INGRESO DE USUARIOS
	public function ingresoUsuario(){
		if (isset($_POST["usuarioingreso"])){
			$datosIngreso = array("usuario" => $_POST["usuarioingreso"],"contrase"=> $_POST["passwordingreso"] );
			$respuesta = datos::ingresoUsuario($datosIngreso,"usuarios");

			if ($respuesta[0] == $datosIngreso["usuario"] && $respuesta[1] == $datosIngreso["contrase"] ){

				//Si los datos osn verdaderos entonces iniciara una session 
				
				session_start();
				$_SESSION["validar"] = true;


				header("location:index.php?action=usuarios");
			}else{
				header("location:index.php?action=fallo");
			}
		}
	}
	#===============================
	#Vista de Usuarios

	public function vistaControla(){
		$respuesta = datos::vistaUsuarios("usuarios");
		foreach ($respuesta as $fila => $valor) {
			echo '<tr>
				<td>'.$valor["usuario"].'</td>
				<td>'.$valor["password"].'</td>
				<td>'.$valor["correo"].'</td>
				<td><a href="index.php?action=editar&id='.$valor["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrado='.$valor["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}
	}


	#===============================
	#Editar Usuario

	public function editarUsuario(){
		$datos = $_GET["id"];
		$respuesta = datos::editarUsuarios($datos,"usuarios");
		echo '
			<input type="hidden" value="'.$respuesta["id"].'" name="ideditar" required>

			<input type="text" value="'.$respuesta["usuario"].'" name="usuarioeditar" required>

			<input type="text" value="'.$respuesta["password"].'" name="passwordeditar" required>

			<input type="email" value="'.$respuesta["correo"].'" name="emaileditar" required>

			<input type="submit" value="Actualizar">';
	}

	#===========================================================
	#Actualizar Usuario

	public function actualizarUsuario(){
		if (isset($_POST["usuarioeditar"])) {
			$datosEditar = array('id' => $_POST["ideditar"],'usuario' => $_POST["usuarioeditar"] , 'password' => $_POST["passwordeditar"] ,'correo' => $_POST["emaileditar"] );
			$respuesta = datos::actualizarUsuario($datosEditar,"usuarios");

			if ($respuesta == "success") {
				header("location:index.php?action=cambio");
			}else{
				echo "Error en la Actualizacion";
			}

		}
	}

	#===========================================================
	#Actualizar Usuario
	public function	borradoUsuarios(){
		if(isset($_GET["idBorrado"])){
			$datoBorrado = $_GET["idBorrado"];
			$respuesta = datos::borradoUsuario($datoBorrado,"usuarios"); //Conexion

			if ($respuesta == "success") {
				header("location:index.php?action=usuarios");
			}
		}
	}
}

?>