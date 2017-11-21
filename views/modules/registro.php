<h1>REGISTRO DE USUARIO</h1>

<form method="post" >
	
	<input type="text" placeholder="Usuario" name="usuarioregistro" required>

	<input type="password" placeholder="Contraseña" name="passwordregistro" required>

	<input type="email" placeholder="Email" name="emailregistro" required>

	<input type="submit" value="Enviar">

</form>

<?php 

$registro = new MvcController();
$registro -> registroUsuario();

if(isset($_GET["action"])){
	if($_GET["action"] == "ok"){
		echo " Registro Exitoso";
	}
}
 ?>
