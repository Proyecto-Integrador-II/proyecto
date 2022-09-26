<div class="page-controllers"></div>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../assets/css/style.css" />
		<title>Login</title>
	</head>
	<body>
		<div class="container">
			<form class="form-card" id="login-form" ACTION="./login.php" METHOD="POST">
				<div class="form-card__group">
					<label class="form-card__label" for="email">Email:</label>
					<div class="form-card__input--login">
						<input
							class="form-card__input"
							type="text"
							name="email"
							id="email"
							placeholder="Email"
						/>

						<img
							src="../assets/icons/mail.svg"
							alt="Mail icon"
							class="form-card__input-icon"
						/>
					</div>

					<p class="form-card__error">
						*El correo debe tener la forma username@domain.com
					</p>
				</div>
				<div class="form-card__group">
					<label class="form-card__label" for="password">Contraseña:</label>

					<div class="form-card__input--login">
						<input
							class="form-card__input"
							type="password"
							name="password"
							id="password"
							placeholder="Contraseña"
						/>

						<img
							src="../assets/icons/lock-black.svg"
							alt="Mail icon"
							class="form-card__input-icon"
						/>
					</div>

					<p class="form-card__error">
						*La contraseña debe tener mínimo 8 caracteres, una letra, un número y uno de
						los siguientes caracteres especiales: $ ! % * # ? & / %
					</p>
				</div>

				<a href="#" class="form-card__redirection">¿Has olvidado tu contraseña?</a>
				<div class="cl"></div>
				<a href="./signup.php" class="form-card__redirection">Crea una nueva cuenta.</a>
				<div class="cl"></div>
				<div class="form-card__buttons">
					<button name="submit" class="btn btn--green" type="submit">Accede</button>
				</div>

				<p class="form-card__error" id="form-error">
					Rellene todos los campos del formulario correctamente antes de realizar el
					envío.
				</p>
			</form>
		</div>
		<script src="../assets/javascript/dom.js" type="module"></script>
		<script src="../assets/javascript/validations/login.js"></script>
	</body>
</html>
<?php
    
    $alert = '';
    session_start();
    if(!empty($_SESSION['active']))
    {
		echo 'esta active';
		if($_SESSION['user'] ==1)
		{
			header('location: lista_usuarios.php');
		}
		else if($_SESSION['user'] ==2)
		{
			header('location: añadir_productos.php');
		}
		else if($_SESSION['user'] ==3)
		{
			header('location: Esqueleto.php');
		}
        
    }
	else
	{
		
		if(!empty($_POST))
		{
			require_once 'conexion.php';

			$user = $_POST['email'];
			$pass = $_POST['password'];

			$query = mysqli_query($conection,"SELECT * FROM usuario WHERE correo = '$user' AND clave ='$pass'");
			$result = mysqli_num_rows($query);

			if($result >0)
			{
				$data = mysqli_fetch_array($query);
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['idusuario'];
				$_SESSION['nombre'] = $data['nombre'];
				$_SESSION['apellido'] = $data['apellido'];
				$_SESSION['email'] = $data['correo'];
				$_SESSION['user'] = $data['rol'];

				if($data['rol'] ==1){
					header('location: lista_usuarios.php');
				}
				else if($data['rol'] ==2){
					header('location: añadir_productos.php');
				}
				else if($data['rol'] ==3){
					header('location: Esqueleto.php');
				}
			}
			else
			{
				$alert = 'El usuario o la clave son incorrectos';
				session_destroy();
			}
		}
	}
?>