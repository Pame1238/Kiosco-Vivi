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
		<form method="post" action="ventas.php">
			<ul id="menu">
				<li><input class="log-btn" type="submit" name="todo" value="Todas las ventas"></input>
				</li>
				<li><input class="log-btn" type="submit" name="detalle" value="Detalle de ventas"></input>
				</li>
			</ul>
			<input type="date" name="fecha"><input type="submit" name="date" value="Buscar fecha!" class="log-btn">
		</form>
		<form method="post" action="ventas.php">
			<h1>Elija un filtro de informacion:</h1>
			Ventas por: 
			<input type="checkbox" name="monto" value="por monto">Por monto
			<input type="checkbox" name="turno" value="por turno">Por turno
			<input type="checkbox" name="cliente" value="por cliente">Por cliente
			<input type="submit" name="sub" class="log-btn" value="Fitrar!">
		</form>
	</nav>
	<!--escribir aca php-->
	<!-- los dos primeros botones-->
	<?php
		if(isset($_POST['todo'])){
		$link=mysqli_connect("localhost","root","","bdd");
		$result=mysqli_query($link,"SELECT * FROM venta");
		echo "<div class='login-form'>";
		echo "<table> \n";
		echo "<tr>
					
					<th>Monto_total</th>
					<th>Venta_fecha</th>
					<th>Turno_id</th>
					<th>Cliente_id</th>
				</tr> \n";

		while ($row = mysqli_fetch_row($result)) {
			echo "<tr>
					<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>$row[4]</td>

				  </tr>\n";
		}

		echo "</table> \n";
		echo "</div>";
	}
	if(isset($_POST['detalle'])){
		$link=mysqli_connect("localhost","root","","bdd");
		$result=mysqli_query($link,"SELECT * FROM venta_detalle");
		echo "<div class='login-form'>";
		echo "<table> \n";
		echo "<tr>
					
					<th>Cantidad</th>
					<th>Venta_id</th>
					<th>Producto_id</th>
					
				</tr> \n";

		while ($row = mysqli_fetch_row($result)) {
			echo "<tr>
					<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					

				  </tr>\n";
		}

		echo "</table> \n";
		echo "</div>";
	}

	#ACA LO DEL CALENDARIO


			if(isset($_POST['date'])){

				$fecha=$_POST['fecha'];
				$link=mysqli_connect("localhost","root","","bdd");
				$resultFecha=mysqli_query($link,"SELECT v.venta_id, v.monto_total, v.venta_fecha, t.turno_detalle,c.cliente_nombre FROM venta v, cliente c, turno t WHERE v.cliente_id = c.cliente_id AND v.turno_id = t.turno_id AND '$fecha' = venta_fecha");

				echo "<div class='login-form'>";
						echo "<table> \n";
						echo "<tr>
								
									<th>Venta ID</th>
									<th>Monto Total</th>
									<th>Fecha de la Venta</th>
									<th>Turno Detalle</th>
									<th>Cliente Nombre</th>
									
								</tr> \n";

						while ($row = mysqli_fetch_row($resultFecha)) {
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
						mysqli_close($link);

			}
	#ACA ES EL CODIGO DEL CHECKBOX

				if (isset($_POST['sub'])) {
					
					$link=mysqli_connect("localhost","root","","bdd");
					$resultUno=mysqli_query($link,"SELECT venta_id, monto_total FROM venta");
					$resultDos=mysqli_query($link,"SELECT t.turno_detalle, v.venta_id 
												   FROM venta v, turno t 
												   WHERE v.turno_id = t.turno_id");
					$resultTres=mysqli_query($link,"SELECT c.cliente_nombre, v.venta_id 
												   FROM venta v, cliente c 
												   WHERE v.cliente_id = c.cliente_id");

					#POR MONTO	
					if (isset($_POST['monto'])) {

						echo "<div class='login-form'>";
						echo "<table> \n";
						echo "<tr>
								
									<th>Venta ID</th>
									<th>Monto Total</th>
									
								</tr> \n";

						while ($row = mysqli_fetch_row($resultUno)) {
							echo "<tr>
									<td>$row[0]</td>
									<td>$row[1]</td>
								</tr>\n";
						}

						echo "</table> \n";
						echo "</div>";
						mysqli_close($link);
					}
					
					#POR TURNO
					if (isset($_POST['turno'])) {
							echo "<div class='login-form'>";
						echo "<table> \n";
						echo "<tr>
								
									<th>Turno</th>
									<th>Venta ID</th>
									
								</tr> \n";

						while ($row = mysqli_fetch_row($resultDos)) {
							echo "<tr>
									<td>$row[0]</td>
									<td>$row[1]</td>
								</tr>\n";
						}

						echo "</table> \n";
						echo "</div>";	
					}

					#POR CLIENTE
					if (isset($_POST['cliente'])) {
						echo "<div class='login-form'>";
						echo "<table> \n";
						echo "<tr>
								
									<th>Cliente Nombre</th>
									<th>Venta ID</th>
									
								</tr> \n";

						while ($row = mysqli_fetch_row($resultTres)) {
							echo "<tr>
									<td>$row[0]</td>
									<td>$row[1]</td>
								</tr>\n";
						}

						echo "</table> \n";
						echo "</div>";
					}

				}
	?>


	<div class="back-btn">
		<input class="log-btn" type="submit" onclick="location.href='admin.php';" value="Volver atrás"/>
	</div>
</body>
</html>
