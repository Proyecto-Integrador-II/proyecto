<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Login_SignUp.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Actualizar producto</title>
</head>
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class ="caja__trasera-login">
                    <h3>
                        ¿Ya tienes cuenta?
                    </h3>
                    <button id="btn__iniciar-sesion">
                        Iniciar Sesión
                    </button>
                </div>
                <div class="caja__trasera-register">
                    <h3>
                        ¿Aún no tienes una cuenta?
                    </h3>
                    <button id="btn__registrarse">
                        Regístrarse
                    </button>
                </div>
            </div>
            <div class="contenedor__login-register">
                <form action="Login_SignUp.php" method="POST" class="formulario__login">
                    <h2>
                        Iniciar Sesión
                    </h2>
                    <input type="text" placeholder="Correo Electronico" name="correo">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <button type="submit" name="iniciar" value="iniciar">
                        Entrar
                    </button>
                    <a id="contra" href="Contraseñaperdida.php">
                        ¿Olvidaste tú contraseña?
                    </a>
                </form>
                <form action="Login_SignUp.php" method="POST" class="formulario__register">
                    <h2>
                        Regístrarse
                    </h2>
                    <input type="text" placeholder="Nombre completo" name="nombre" id="nombre">
                    <input type="text" placeholder="Correo Electronico" name="correo" id="correo">
                    <input type="password" placeholder="Contraseña" name="contrasena" id="contrasena">
                    <input type="password" placeholder="Repita contraseña" name="repi_contrasena" id="repi_contrasena">
                    <input type="radio" name="tipo" value="Compradores">Compradores
                    <input type="radio" name="tipo" value="Vendedores">Vendedores
                    <br>
                    <button type="submit" name="registro" value="registro">
                        Regístrarse
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>