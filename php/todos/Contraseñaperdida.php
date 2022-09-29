<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/contraseñaperdida.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Contraseña-Perdida</title>
</head>
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-register">
                    <h3>
                    </h3>
                    <button id="btn__registrarse">
                    </button>
                </div>
            </div>
            <div class="contenedor__login-register">
                <form name ="completo" action="correo.php" class="formulario__login" method="POST">
                    <h2>
                        Recuperar Contraseña
                    </h2>
                    <input type="email"  placeholder="Correo Electronico" required>
                    <button>
                        Enviar
                    </button>
                    <a id="pregunta">¿Ya tienes una cuenta?</a>
                    <br>
                    <a id="contra" href="Login_Signup.php">
                        Iniciar sesión
                    </a>
                </form>
            </div>
        </div>
    </main>
</body>
</html>