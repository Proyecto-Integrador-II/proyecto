<?php
    include 'conexion.php';
    if(isset($_POST['registro'])){
        if ($_POST['tipo'] == 'Compradores'){
            if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['contrasena']) && !empty($_POST['repi_contrasena'])) {
                $sql = "INSERT INTO usuarios (permisos_id,nombre,correo,contrasena) VALUES (2,:nombre,:correo,:contrasena)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nombre', $_POST['nombre']);
                $stmt->bindParam(':correo', $_POST['correo']);
                $password = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
                $stmt->bindParam(':contrasena', $password);
                if ($stmt->execute()) {
                    echo "Comprador registrado con exito";
                } 
                else {
                    echo "Error, no se ha podido registrar el comprador";
                }
            }
            else{
                echo "Error, se debe llenar todos los campos";
            }
        }
        else if($_POST['tipo'] == "Vendedores"){
            if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['contrasena']) && !empty($_POST['repi_contrasena'])) {
                $sql = "INSERT INTO usuarios (permisos_id,nombre,correo,contrasena) VALUES (1,:nombre,:correo,:contrasena)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nombre', $_POST['nombre']);
                $stmt->bindParam(':correo', $_POST['correo']);
                $password = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
                $stmt->bindParam(':contrasena', $_POST['contrasena']);
                if ($stmt->execute()) {
                    echo "Vendedores registrado con exito";
                } 
                else {
                    echo "Error, no se ha podido registrar el vendedores";
                }
            }
            else{
                echo "Error, se debe llenar todos los campos";
            }

        }
    }

    else if(isset($_POST['iniciar'])){
        session_start();
        if (!empty($_POST['correo']) && !empty($_POST['contrasena'])) {
            $records = $conn->prepare('SELECT correo,contrasena FROM usuarios WHERE correo = :correo;');
            $records->bindParam(':correo', $_POST['correo']);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
            
            if (count($results) > 0 && password_verify($_POST['contrasena'], $results['contrasena'])) {
                header("Location: Esqueleto.php");
            }
            
            else{
                echo 'Credenciales invalidas';
            }
        }
        else{
            echo "Error, se deben llenar todos los campos";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Login_SignUp.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Iniciar y registrar sección</title>
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
                    <input type="text" placeholder="Correo Electronico" required >
                    <input type="password" placeholder="Contraseña"required >
                    <button>
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
    <script src="../JavaScript/Login_SignUp.js"></script>
</body>
</html>