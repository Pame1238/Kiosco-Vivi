<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estiloTres.css">
</head>
<body>
	<div id="out">
		<?php
		session_start();
		if(isset($_SESSION['usuario'])){ ///username
 			$sesion=ucfirst($_SESSION['usuario']); //guardo el nombre de usuario en la variable con la primera letra en mayuscula
    		echo "<div align='right'>Sesión: $sesion</div>";
    	}
    	?>
		<input class="log-btn" type="submit" onclick="location.href='logout.php';" value="Cerrar Sesión"/>
	</div>
	<div>
		<img src="store.png">
	</div>
	<h1 >Sistema Kiosco Vivi</h1>
	<nav id="navmenu">
		<form method="post" action="productos.php">
			<ul id="menu">
				<li><input class="log-btn" type="submit" name="clientes" value="Stock"></input>
				</li>
			</ul>
		</form>
	</nav>
	<?php
	if(isset($_POST['clientes'])){
		$link=mysqli_connect("localhost","root","","bdd");
		$result=mysqli_query($link,"SELECT * FROM producto");
		echo "<div class='login-form'>";
		echo "<table> \n";
		echo "<tr>
					<th>Categoria</th>
					<th>Marca</th>
					<th>Detalle</th>
					<th>Precio</th>
					<th>Stock</th>
				</tr> \n";

		while ($row = mysqli_fetch_row($result)) {
			echo "<tr>
					<td>$row[5]</td>
					<td>$row[2]</td>
					<td>$row[1]</td>
					<td>$row[4]</td>
					<td>$row[3]</td>
				  </tr>\n";
		}

		echo "</table> \n";
		echo "</div>";
	}
	?>
	<div class="back-btn">
		<input class="log-btn" type="submit" onclick="location.href='admin.php';" value="Volver atrás"/>
	</div>
</body>
</html>
