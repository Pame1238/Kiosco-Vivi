<?php

session_start();

if(isset($_POST['submit'])){

	if(isset($_POST['user'])&&isset($_POST['password'])){
		$usuario=$_POST['user'];
		$password=$_POST['password'];
		$link=mysqli_connect("localhost","root","","bdd");
		$result=mysqli_query($link,"SELECT * FROM usuarios WHERE user ='$usuario' AND pass='$password'");
		$row = mysqli_fetch_row($result);
		
		if($row[0]==$usuario&&$row[1]==$password){
			switch ($row[2]) {
				case 0: //admin facu
					$_SESSION['usuario'] = $row[0];
                	header("location: admin.php");# code...
					break;
				case 1: //pame
					$_SESSION['usuario'] = $row[0];
                	header("location: admin.php");# code...
					break;
				case 2: //seba
					$_SESSION['usuario'] = $row[0];
                	header("location: admin.php");# code...
					break;
				case 3: //alan
					$_SESSION['usuario'] = $row[0];
                	header("location: admin.php");# code...
					break;
				default:
					# code...
					break;
			}
		}else{
			echo '<script>alert("usuario o contraseña incorrectos");
                window.location.href="index.php"</script>';
		}
	

	}else{
		echo '<script>alert("usuario o contraseña incorrectos");
               window.location.href="index.php"</script>';
	}
	
}
?>

?>
