<?php

include("conexion.php");

if(isset($_POST['save'])){
   
    $sql = "INSERT INTO inventario (nombre, cantidad, descripcion, precio) 
            VALUES (:name,:stock,:description,:price,)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':name', $_POST['nombre']);
    $stmt->bindParam(':stock', $_POST['cantidad']);
    $stmt->bindParam(':description', $_POST['descripcion']);
    $stmt->bindParam(':price', $_POST['precio']);
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
