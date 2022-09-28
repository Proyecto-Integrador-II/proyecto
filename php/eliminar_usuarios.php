<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../css/style.css" />
		<title>Eliminar usuarios</title>
	</head>
	<body>
        <div class="container">
            <h2>¿Esta seguro de eliminar el siguiente usuario?</h2>
        <?php
            require_once 'conexion.php';
            
                $idusuario = $_REQUEST['id'];
                $query = mysqli_query($conection,"SELECT u.nombre,u.apellido,r.rol FROM usuario u INNER JOIN rol r ON u.rol =r.idrol WHERE u.idusuario = '$idusuario'");
                $result = mysqli_num_rows($query);

                if($result > 0){

                    while($data = mysqli_fetch_array($query)){
                        
                        $nombre = $data['nombre'];
                        $apellido = $data['apellido'];
                        $rol = $data['rol'];
                    }
                    if(empty($_REQUEST['id']) || $rol== 'Administradores'){
                        header("Location:./lista_usuarios.php");
                    }
                }else{
                    header("Location:./lista_usuarios.php");
                }
            
        ?>
            <p>Nombre: <span><?php echo $nombre; ?></span></p>
            <p>Apellido: <span><?php echo $apellido; ?></span></p>
            <p>Tipo de usuario: <span><?php echo $rol; ?></span></p>
            <form method="post" action="">
                <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>" />
                <a href="./lista_usuarios.php" class="btn">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn">
            </form>

    </body>
</html>

<?php
    if(!empty($_POST)){
        $idusuario = $_POST['idusuario'];
        $query_delete = mysqli_query($conection, "UPDATE usuario SET habilitado = 0 where idusuario = '$idusuario'");
        if($query_delete){
            header("Location: ./lista_usuarios.php");
        }else{
            echo "Error al eliminar usuario";
        }
    }
    
?>