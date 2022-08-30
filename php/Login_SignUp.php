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
                    <input type="text" placeholder="Correo Electronico" name="correo" ID="correo_login">
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
                    <input type="text" placeholder="Correo Electronico" name="correo" id="correo_login">
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
<?php
    include 'conexion.php';
    if(isset($_POST['registro'])){
        if($_POST['contrasena'] === $_POST['repi_contrasena']){
            if(strlen($_POST['contrasena']) >= 8){
                if(filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
                    if(preg_match('@[A-Z]@', $_POST['contrasena'])){
                        if(preg_match('@[a-z]@', $_POST['contrasena'])){
                            if(preg_match('@[0-9]@', $_POST['contrasena'])){
                                if(preg_match('@[^\w]@', $_POST['contrasena'])){
                                    if ($_POST['tipo'] == 'Compradores'){
                                        if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['contrasena']) && !empty($_POST['repi_contrasena'])) {
                                            if($_POST['contrasena'] = $_POST['repi_contrasena']){
                                                $sql = "INSERT INTO usuarios (permisos_id,nombre,correo,contrasena) VALUES (2,:nombre,:correo,:contrasena)";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->bindParam(':nombre', $_POST['nombre']);
                                                $stmt->bindParam(':correo', $_POST['correo']);
                                                $password = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
                                                $stmt->bindParam(':contrasena', $password);
                                                if ($stmt->execute()) {
                                                    ?>
                                                        <h1 class="good">Comprador registrado con exito</h1>
                                                    <?php
                                                } 
                                                else {
                                                    ?>
                                                        <h1 class="bad">Error, no se ha podido registrar el comprador</h1>
                                                    <?php
                                                }
                                            }
                                            else{
                                                ?>
                                                        <h1 class="bad">Error, no se ha podido registrar el comprador</h1>
                                                <?php
                                            }
                                        }
                                        else{
                                            ?>
                                                <h1 class="bad">Error, se debe llenar todos los campos</h1>
                                            <?php
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
                                                ?>
                                                    <h1 class="good">Vendedores registrado con exito</h1>
                                                <?php
                                        } 
                                            else {
                                                ?>
                                                    <h1 class="bad">Error, no se ha podido registrar el vendedores</h1>
                                                <?php
                                            }
                                        }
                                        else{
                                            ?>
                                                <h1 class="bad">Error, se debe llenar todos los campos"</h1>
                                            <?php
                                        }

                                    }
                                    else{
                                        ?>
                                            <h1 class="bad">No se selecciono ningun tipo</h1>
                                        <?php
                                    }
                                }
                                else{
                                    ?>
                                        <h1 class="bad">La contraseña debe tener un caracter especial</h1>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                    <h1 class="bad">La contraseña debe tener un numero</h1>
                                <?php
                            }
                        }
                        else{
                            ?>
                                <h1 class="bad">La contraseña debe tener una minuscula</h1>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <h1 class="bad">La contraseña debe tener una mayuscula</h1>
                        <?php

                    }
                }
                else{
                    ?>
                        <h1 class="bad">Correo no valido</h1>
                    <?php
                }
            }else{
                ?>
                    <h1 class="bad">La contraseña es muy corta</h1>
                <?php
            }
        }
        else{
            ?>
                <h1 class="bad">Las contraseñas no coinciden</h1>
            <?php
        }
    }

    else if(isset($_POST['iniciar'])){
        session_start();
        if (!empty($_POST['correo']) && !empty($_POST['contrasena'])) {
            $records = $conn->prepare('SELECT permisos_id,correo,contrasena FROM usuarios WHERE correo = :correo;');
            $records->bindParam(':correo', $_POST['correo']);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
            
            if (count($results) > 0 && password_verify($_POST['contrasena'], $results['contrasena'])) {
                if($results['permisos_id'] =1){
                    header("Location: vendedores.php");

                }
                else if($results['permisos_id']=2){
                    header("Location: Esqueleto.php");
                }
            }
            else{
                ?>
                    <h1 class="bad">Credenciales invalidas</h1>
                <?php
            }
        }
        else{
            ?>
                <h1 class="bad">Error, se deben llenar todos los campos</h1>
            <?php
        }
    }
?>