<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contraseña.css">  
    <link rel="stylesheet" href="botones.css">  
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
                    <input type="submit" id="enviar" value="Enviar" onclick="javascript: return confirm('¿Estás segur@?')";> </input>
                    <a  id="pregunta">¿Ya tienes cuenta?</a>
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