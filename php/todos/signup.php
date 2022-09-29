<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
		<title>Registro de usuarios</title>
	</head>
	<body>
		<div class="container">
			<form class="form-card" id="signup-form" action="" method="POST">
				<h2 class="form-card__subtitle">Crear una nueva cuenta</h2>

				<div class="form-card__group">
					<label class="form-card__label" for="first-name">Nombre:</label>
					<input
						class="form-card__input"
						type="text"
						name="first-name"
						id="first-name"
						placeholder="Nombres"
					/>
					<p class="form-card__error">
						Los nombres solo puede contener de 5 a 40 letras.
					</p>
				</div>

				<div class="form-card__group">
					<label class="form-card__label" for="last-name">Apellido:</label>
					<input
						class="form-card__input"
						type="text"
						name="last-name"
						id="last-name"
						placeholder="Apellidos"
					/>
					<p class="form-card__error">
						Los apellildos solo puede contener de 5 a 40 letras.
					</p>
				</div>

				<div class="form-card__group">
					<label class="form-card__label" for="email">Email:</label>
					<input
						class="form-card__input"
						type="text"
						name="email"
						id="email"
						placeholder="Email"
					/>
					<p class="form-card__error">
						*El correo debe tener la forma username@domain.com
					</p>
				</div>
				<div class="form-card__group">
					<label class="form-card__label" for="password">Contraseña:</label>
					<input
						class="form-card__input"
						type="password"
						name="password"
						id="password"
						placeholder="Contraseña"
					/>
					<p class="form-card__error">
						*La contraseña debe tener mínimo 8 caracteres, una letra, un número y uno de
						los siguientes caracteres especiales: $ ! % * # ? & / %
					</p>
				</div>
				<div class="form-card__group">
					<label class="form-card__label" for="password-2"
						>Confirmación contraseña:</label
					>
					<input
						class="form-card__input"
						type="password"
						name="password-2"
						id="password-2"
						placeholder="Repetir contraseña"
					/>
					<p class="form-card__error">Ambas contraseñas deben ser iguales.</p>
				</div>
				<div class="form-card__group">
				<label class="form-card__label">
					Tipo de usuario
				</label>

				<select name="rol" id="rol">
					<option value="3">Comprador</option>
					<option value="2">Vendedor</option>
				</select>

				<a href="./login.php" class="form-card__redirection"
					>¿Ya tienes una cuenta? Inicia sesión</a
				>
				<div class="cl"></div>

				<div class="form-card__buttons">
					<button class="btn btn--green btn--block" type="submit" name="crear">Crear cuenta</button>
				</div>

				<p class="form-card__error" id="form-error">
					Rellene todos los campos del formulario correctamente antes de realizar el
					envío.
				</p>
			</form>
		</div>
		<script src="../assets/javascript/dom.js" type="module"></script>
		<script src="../assets/javascript/validations/signup.js"></script>
	</body>
</html>
<?php
	if(!empty($_POST))
	{
		require_once 'conexion.php';
	
		$nombre = $_POST['first-name'];
		$apellido = $_POST['last-name'];
		$correo = $_POST['email'];
		$contraseña = $_POST['password'];
		$repi_contraseña = $_POST['password-2'];
		
		if($_REQUEST['rol'] == '3'){
			$rol = 3;
		}
		else if($_REQUEST['rol'] == '2'){
			$rol = 2;
		}

		$query = mysqli_query($conection, "SELECT * FROM usuario WHERE correo = '$correo'");
		
		$result = mysqli_fetch_array($query);

		if($result > 0)
		{
			echo 'ya existe';
		}
		else
		{
			$query_insert = mysqli_query($conection, "INSERT INTO usuario(nombre,apellido,correo,clave,rol,habilitado,calificacion) VALUES('$nombre','$apellido','$correo','$contraseña','$rol',1,0)");
			if($query_insert)
			{
				echo 'creado';
			}
			else
			{
				echo 'error';
			}
		}
	}

?>
