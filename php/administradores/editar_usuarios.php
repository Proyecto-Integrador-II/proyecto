<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
		<title>Editar usuarios</title>
	</head>
	<body>
	<?php include '../includes/header.php' ?>

		<div class="container">
			<form class="form-card" id="signup-form" method="POST">
				<h2 class="form-card__subtitle">Actualizar cuenta</h2>
                <?php
				require_once '../todos/conexion.php';
				if(!empty($_POST))
				{
					if(empty($_POST['first-name']) || empty($_POST['last-name']) || empty($_POST['email'])  || empty($_POST['password']))
					{
						echo 'Todos los campos son obligatorios';
					}
					else{

						$idUsuario = $_POST['idUsuario'];
						$nombre = $_POST['first-name'];
						$apellido  = $_POST['last-name'];
						$correo   = $_POST['email'];
						$contraseña  = $_POST['password'];
						

						$query = mysqli_query($conection,"SELECT * FROM usuario WHERE (correo = '$correo' AND idusuario != $idUsuario) ");

						$result = mysqli_fetch_array($query);

						if($result > 0){
							echo 'El correo o el usuario ya existe';
						}else{				
							$sql_update = mysqli_query($conection,"UPDATE usuario SET nombre = '$nombre', apellido = '$apellido',correo='$correo',clave='$contraseña' WHERE idusuario= $idUsuario ");

							if($sql_update)
							{
								echo 'Usuario actualizado correctamente';
							}else
							{
								echo 'Error al actualizar el usuario';
							}
						}
					}
				}
                if(empty($_GET['id']))
                {
					
                }

                $iduser = $_GET['id'];
                $sql = mysqli_query($conection,"SELECT u.idusuario, u.nombre, u.apellido, u.correo, (u.rol) as idrol, (r.rol) as rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE idusuario = $iduser");
                $result_sql = mysqli_num_rows($sql);

                if($result_sql == 0)
                {
                    
					
                }
 
                else{
                    while($data = mysqli_fetch_array($sql)){
                        $iduser = $data['idusuario'];
                        $nombre = $data['nombre'];
                        $apellido = $data['apellido'];
                        $correo = $data['correo'];
                        $idrol = $data['idrol'];
                        $rol = $data['rol'];
                    }
					
                }
                ?>

				<div class="form-card__group">
					<label class="form-card__label"></label>
					<input
						class="form-card__input"
						type="hidden"
						name="idUsuario"
                        value="<?php echo $iduser; ?>"
					/>
					
				</div>

				<div class="form-card__group">
					<label class="form-card__label" for="first-name">Nombre:</label>
					<input
						class="form-card__input"
						type="text"
						name="first-name"
						id="first-name"
						placeholder="Nombres"
                        value="<?php echo $nombre;?>"
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
                        value="<?php echo $apellido;?>"
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
                        value="<?php echo $correo;?>"
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

				<div class="cl"></div>

				<div class="form-card__buttons">
					<button class="btn btn--green btn--block" type="submit" name="crear">Actualizar</button>
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
