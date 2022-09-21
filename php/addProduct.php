<?php

include("conexion.php");

if(isset($_POST['save'])){

    $sql = "INSERT INTO inventario (lugar_id,vendedor_id,cantidad,nombre, descripcion, precio) 
            VALUES (1,1,3,'empanada','son feas',22)";

    $stmt = $conn->prepare($sql);

    //$stmt->bindParam(':lugar', $_POST['cantidad']);
    $stmt->bindParam(':name', $_POST['nombre']);
    $stmt->bindParam(':stock', $_POST['cantidad']);
    $stmt->bindParam(':description', $_POST['descripcion']);
    $stmt->bindParam(':price', $_POST['precio']);
    //$stmt->bindParam(':image', $_POST['imagen']);
    //$stmt->bindParam(':enable', $_POST['habilitado']);
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

    header("location:registrarProducto.php");
}
?>
