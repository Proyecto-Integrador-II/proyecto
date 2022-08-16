<?php
    include 'conexion.php';
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $tipo = $_POST['tipo'];

    $query  = "INSERT INTO usuarios(nombre_completo,correo,contrasena,tipo)
                VALUES ('$nombre_completo','$correo','$contrasena','$tipo')";
    $ejecutar = mysqli_query($conexion, $query);
?>