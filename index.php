<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<form method="post" action="manejador.php">
<div class="login-form">
     <h1>Login kiosco Vivi</h1>
     <div class="form-group ">
           <input type="text" class="form-control" placeholder="Usuario " id="User Name" name="user">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Contraseña" id="Passwod" name="password">
       <i class="fa fa-lock"></i>
     </div>
      <!--<span class="alert">Invalid Credentials</span>-->
      <a class="link" href="#">Olvidaste tu contraseña Vivi?</a>
     <input type="submit" name="submit" class="log-btn" value="Entrar!">
   </div>
</form>
</body>
</html>
