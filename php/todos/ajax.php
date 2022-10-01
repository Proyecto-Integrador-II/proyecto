<?php
    include 'conexion.php';
    session_start();

    if(!empty($_POST)){
        if($_POST['action'] == 'infoProducto')
        {
            $producto_id = $_POST['producto'];

            $query = mysqli_query($conection, "SELECT codproducto, nombre FROM producto WHERE codproducto = '$producto_id' AND habilitado = 1");
            mysqli_close($conection);

            $result = mysqli_num_rows($query);
            if($result > 0){
                $data = mysqli_fetch_assoc($query);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
                exit;
            }
            echo 'Error';
            exit;
        }
        if($_POST['action'] == 'infoUsuario')
        {
            $usuario_id = $_POST['usuario'];

            $query = mysqli_query($conection, "SELECT idusuario, nombre FROM usuario WHERE idusuario = '$usuario_id' AND habilitado = 1");
            mysqli_close($conection);

            $result = mysqli_num_rows($query);
            if($result > 0){
                $data = mysqli_fetch_assoc($query);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
                exit;
            }
            echo 'Error';
            exit;
        }
        if($_POST['action'] == 'delProduct' )
        {
            if(empty($_POST['producto_id']) || !is_numeric($_POST['producto_id']) ){
                echo 'error';
            }else{
                $idproducto = $_POST['producto_id'];
                $query_delete = mysqli_query($conection, "UPDATE producto SET habilitado = 0 WHERE codproducto = $idproducto");
                mysqli_close($conection);

                if($query_delete){
                    echo 'ok';
                }else{
                    echo 'Error al eliminar';
                }
            }
        }
        if($_POST['action'] == 'delUser' )
        {
            if(empty($_POST['usuario_id']) || !is_numeric($_POST['usuario_id']) ){
                echo 'error';
            }else{
                $idusuario = $_POST['usuario_id'];
                $query_delete = mysqli_query($conection, "UPDATE usuario SET habilitado = 0 WHERE idusuario = $idusuario");
                mysqli_close($conection);

                if($query_delete){
                    echo 'ok';
                }else{
                    echo 'Error al eliminar';
                }
            }
        }
        
    }
    exit;
?>