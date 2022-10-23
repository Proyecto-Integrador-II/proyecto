<?php
    include 'conexion.php';
    session_start();

    if(!empty($_POST)){
        if($_POST['action'] == 'infoProducto')
        {
            $producto_id = $_POST['producto'];

            $query = sqlsrv_query($conection, "SELECT codproducto, nombre FROM producto WHERE codproducto = '$producto_id' AND habilitado = 1");
            sqlsrv_close($conection);

            $result = sqlsrv_num_rows($query);
            if($result === false){
                $data = sqlsrv_fetch_assoc($query);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
                exit;
            }
            echo 'Error';
            exit;
        }
        if($_POST['action'] == 'infoUsuario')
        {
            $usuario_id = $_POST['usuario'];

            $query = sqlsrv_query($conection, "SELECT idusuario, nombre FROM usuario WHERE idusuario = '$usuario_id' AND habilitado = 1");
            sqlsrv_close($conection);

            $result = sqlsrv_num_rows($query);
            if($result === false){
                $data = sqlsrv_fetch_assoc($query);
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
                $query_delete = sqlsrv_query($conection, "UPDATE producto SET habilitado = 0 WHERE codproducto = $idproducto");
                sqlsrv_close($conection);

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
                $query_delete = sqlsrv_query($conection, "UPDATE usuario SET habilitado = 0 WHERE idusuario = $idusuario");
                sqlsrv_close($conection);

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