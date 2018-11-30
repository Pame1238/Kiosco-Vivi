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
		<form method="post" action="proveedores.php">
			<ul id="menu">
				<li><input class="log-btn" type="submit" name="consulta1" value="Datos de los proveedores"></input>
				</li>
				<li><input class="log-btn" type="submit" name="consulta2" value="Pedidos"></input>
				</li>
			</ul>
			<input type="date" name="fecha"><input type="submit" name="buscar" value="buscar!" class="log-btn">
		</form>
	</nav>
	<!--escribir aca php-->
	<?php
		if(isset($_POST['consulta1'])){
		$link=mysqli_connect("localhost","root","","bdd");
		$result=mysqli_query($link,"SELECT * FROM proveedor");
		echo "<div class='login-form'>";
		echo "<table> \n";
		echo "<tr>
					
					<th>Proveedor ID</th>
					<th>Nombre</th>
					<th>e mail</th>
					<th>Direccion</th>
					<th>Rubro</th>
				</tr> \n";

		while ($row = mysqli_fetch_row($result)) {
			echo "<tr>
					<td>$row[0]</td>
					<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>$row[4]</td>

				  </tr>\n";
		}

		echo "</table> \n";
		echo "</div>";
	}
	#PEDIDOS
	if(isset($_POST['consulta2'])){
		$link=mysqli_connect("localhost","root","","bdd");
		$result=mysqli_query($link,"SELECT p.*,pro.proveedor_nombre FROM proveedor pro, pedido p WHERE p.proveedor_id = pro.proveedor_id");
		echo "<div class='login-form'>";
		echo "<table> \n";
		echo "<tr>
					
					<th>Pedido ID</th>
					<th>Fecha de Pedido</th>
					<th>Proveedor ID</th>
					<th>Empleado</th>
					<th>Proveedor Nombre</th>
				</tr> \n";

		while ($row = mysqli_fetch_row($result)) {
			echo "<tr>
					<td>$row[0]</td>
					<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>$row[4]</td>

				  </tr>\n";
		}

		echo "</table> \n";
		echo "</div>";
	}

	#BUSCAR POR FECHA

		if (isset($_POST['buscar'])) {
			$fecha = $_POST['fecha'];

			$link=mysqli_connect("localhost","root","","bdd");
			$resultFecha=mysqli_query($link,"SELECT pro.proveedor_nombre, p.pedido_fecha, e.empleado_nombre FROM pedido p, proveedor pro, empleado e WHERE p.proveedor_id = pro.proveedor_id AND p.empleado_id = e.empleado_id AND '$fecha' = pedido_fecha");

			echo "<div class='login-form'>";
		echo "<table> \n";
		echo "<tr>
					
					<th>Proveedor Nombre</th>
					<th>Fecha de Pedido</th>
					<th>Empleado</th>
				</tr> \n";

		while ($row = mysqli_fetch_row($resultFecha)) {
			echo "<tr>
					<td>$row[0]</td>
					<td>$row[1]</td>
					<td>$row[2]</td>
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
