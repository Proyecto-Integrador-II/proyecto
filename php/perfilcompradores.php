<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/perfilcompradores.css">
    <title>Editar perfil compradores</title>
</head>
<body>
    <main>
        <div class="contenedor__editar-producto">
            <form action="" method="POST" class="">
                <h2>
                    Editar Perfil Compradores
                </h2>
                <input type="text" placeholder="Nombre" name="nombre" >
                <input type="password" placeholder="Contraseña" name="contraseña" >
                <input type="email" placeholder="Correo" name="correo">
                <button type="submit" name="grabardatos" value="Cambiar" id="boton">
                    Grabar
                </button> 
                <button type="submit" name="modificardatos" value="Cambiar" id="boton">
                    Modificar
                </button> 
            </form>
        </div>
<?php 
include 'conexion.php';
if(isset($_POST['modificardatos'])){

    $sql= $conn->prepare("UPDATE usuarios set nombre =:nombre, contrasena=:contrasena, correo=:correo;");
    $sql->bindParam(':nombre', $_POST['nombre']);
    $sql->bindParam(':contrasena', $_POST['contrasena']);
    $sql->bindParam(':correo', $_POST['correo']);
    $sql->execute();
    $results = $sql->fetch(PDO::FETCH_ASSOC);

    if($results)
    {
        echo 'entro';
    }else{
        echo 'no entra';
    }
}

?>
    </main>
</body>
</html>


