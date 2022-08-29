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
    if (isset($_POST["enabled"])) {
        $succeed = $conn->update_product(
            $_GET["id"],
            $_POST["lugar_id"],
            $_POST["cantidad"],
            $_POST["nombre"],
            $_POST["descripcion"],
            $_POST["precio"],
            $_POST["imagen"]
            isset($_POST["habilitado"]),
        );
        if (!$succeed) {
            echo "error";
        }
    }
?>
