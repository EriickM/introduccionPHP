<?php 
session_start();

if(!$_SESSION["validar"]){
	header ("location:index.php?action=ingresar");
	exit(); //Salirse del script 
}

 ?>



<h1>USUARIOS</h1>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Email</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php 
		$ingreso = new MvcController();
		$ingreso -> vistaControla();
		$ingreso -> borradoUsuarios();


	 ?>

		</tbody>



	</table>

	<?php 
		if (isset($_GET["action"])) {
			if ($_GET["action"]=="cambio"){
				echo "Cambio Realizado Exitosamente";
			}
		}

	 ?>