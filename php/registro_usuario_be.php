<?php
    include 'conexion.php';
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $tipo = $_POST['tipo'];

    if($_REQUEST['Tipo'] =="Compradores"){
        $query  = "INSERT INTO compradores(nombre_completo,correo,contrasena)
                VALUES ('$nombre_completo','$correo','$contrasena','$tipo')";
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            echo '
                <script>
                    alert("Comprador registrado correctamente");
                    window.location = "Esqueleto.php";
                </script>
            '
        }else{
            echo '
                <script>
                    alert("Error");
                    window.location = "Login_SignUp.php";
                </script>
            '
        }
    }else if($_REQUEST['Tipo'] =="Vendedores"){
        $query  = "INSERT INTO vendedores(nombre_completo,correo,contrasena)
                VALUES ('$nombre_completo','$correo','$contrasena','$tipo')";
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            echo '
                <script>
                    alert("Vendedor registrado correctamente");
                    window.location = "";
                </script>
            '
        }else{
            echo '
                <script>
                    alert("Error");
                    window.location = "Login_SignUp.php";
                </script>
            '
        }
    }
    mysqli_close($conexion);
?>