<h1>INGRESAR</h1>

	<form method="post" action="">
		
		<input type="text" placeholder="Usuario" name="usuarioingreso" required>

		<input type="password" placeholder="Contraseña" name="passwordingreso" required>

		<input type="submit" value="Enviar">

	</form>

<?php 
	$ingreso = new MvcController();
	$ingreso->ingresoUsuario();
	if (isset($_GET["action"])){
		if ($_GET["action"]=="fallo"){
			echo "Error al Ingresar";
		}
	}

 ?>