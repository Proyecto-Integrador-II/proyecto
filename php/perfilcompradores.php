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
                <input type="text" placeholder="Nombre" name="Nombre" >
                <input type="password" placeholder="Contraseña" name="Contraseña" >
                <input type="email" placeholder="Correo" name="correo">
                <button type="submit" name="Cambiar" value="Cambiar" id="boton">
                    Actualizar
                </button>   
            </form>
        </div>
    </main>
</body>
</html>


<?php
if(isset($_POST['cambiar'])){
    if(!empty($_POST['Nombre'])){
        UPDATE usuarios 



    }
}
?>