<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="loginadmi.css">
	<title>Inicio de sesion Administrador</title>
</head>
<body>
	<div class="square">
		<i style="--clr:#00ff0a;"></i>
		<i style="--clr:#ff0057;"></i>
		<i style="--clr:#fffd44;"></i>
		<div class="login">
			<h2>Inicio de sesion</h2>
			<!-- Formulario que valida el required -->
			<form action="admi.php" method="post">
				<div class="inputBx">
					<input type="text" name="username" placeholder="Correo" required>
				</div>
				<div class="inputBx">
					<input type="password" name="password" placeholder="Contraseña" required>
				</div>
				<div class="inputBx">
					<input type="submit" value="Ingresar">
				</div>
			</form>
		</div>
	</div>
</body>
</html>
