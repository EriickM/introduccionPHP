<?php 
session_start();

if(!$_SESSION["validar"]){
	header ("location:index.php?action=ingresar");
	exit(); //Salirse del script 
}

 ?>



<h1>EDITAR USUARIO</h1>

<form method="post">
	<?php 
$editarUsuario = new MvcController();
$editarUsuario-> editarUsuario();
$editarUsuario-> actualizarUsuario();


 ?>
	

</form>


