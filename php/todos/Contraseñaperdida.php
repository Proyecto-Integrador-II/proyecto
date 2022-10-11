<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contraseña.css">    
    <title>Contraseña-Perdida</title>
</head>
<body>
    <main>
        <div class="contenedor__todo">

            <div class="contenedor__login-register">
                <form name ="completo" action="correo.php" class="formulario__login" method="POST">
                    <h2>
                        Recuperar Contraseña
                    </h2>
                    <input type="email"  placeholder="Correo Electronico" required>
                    <button>
                        Enviar
                    </button>
                    <a  id="pregunta">¿Ya tienes una cuenta?</a>
                    <br>
                    <a id="contra" href="login.php">
                        Iniciar sesión
                    </a>
                </form>
            </div>
        </div>
    </main>
</body>
</html>