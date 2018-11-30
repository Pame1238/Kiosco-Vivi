<?php
session_start();

if(isset($_SESSION['usuario'])){ ///username
 	$sesion=ucfirst($_SESSION['usuario']); //guardo el nombre de usuario en la variable con la primera letra en mayuscula
    echo "<div align='right'>Sesión: $sesion</div>";

	include("conexion.php");
}
else{
	echo "ERROR! No tienes acceso a esta pagina.";
}

?>
