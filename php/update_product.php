<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/editar_producto.css">
    <title>Actualizar producto</title>
</head>
<body>
    <main>
        <div class="contenedor__editar-producto">
            <form action="" method="POST" class="">
                <h2>
                    Editar producto
                </h2>
                <input type="text" placeholder="nombre" name="nombre" >
                <input type="number" placeholder="cantidad" name="cantidad">
                <input type="number" placeholder="precio" name="precio">
                <label placeholder="imagen"><input  type="file" name="imagen"></label>
                <br></br>
                <label><textarea placeholder="Descripcion del producto" id="descripcion"></textarea></label>
                <label><input type="checkbox" name="habilitado" id="check">Habilitado</label>
                <br></br>
                <button type="submit" name="Cambiar" value="Cambiar" id="boton">
                    Actualizar
                </button>
            </form>
        </div>
    </main>
</body>
</html>
<?php
    include 'conexion.php';
    if (isset($_POST["Cambiar"])) {
        $file = fopen($_POST['image'], 'rb');
        $sql = "UPDATE inventario SET lugar_id=:lugar_id,
                                        usuario_id=:usuario_id,
                                        cantidad =:cantidad,
                                        nombre=:nombre,
                                        descripcion =:descripcion.
                                        precio=:precio,
                                        imagen = $file,
                                        habilitado = :habilitado;"
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':lugar_id', $_POST['lugar_id']);
        $stmt->bindParam(':usuario_id', $_POST['usuario_id']);
        $stmt->bindParam(':cantidad', $_POST['cantidad']);
        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':descripcion', $_POST['descripcion']);
        $stmt->bindParam(':precio', $_POST['precio']);
        $stmt->bindParam(':imagen',  $file, PDO::PARAM_BOOL);
        $stmt->bindParam(':habilitado', $_POST['habilitado']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (count($result) !== 0) {
            ?>
                <h1 class="bad">Se registro el producto correctamente</h1>
            <?php
        }

        else {
            ?>
                <h1 class="bad">Error, no se ha podido registrar el producto</h1>
            <?php
        }
    }
?>
