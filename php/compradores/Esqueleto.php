<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CSS/Diseño.css" rel="stylesheet">
        <?php include '../includes/scripts.php' ?>
    </head>
    
    <body>
        <?php 
		include '../includes/header.php';
		if(empty($_SESSION['active']) || ($_SESSION['user'] !=3))
		{
			header('Location: ../todos/logout.php');
		}  
		require_once '../todos/conexion.php';
        ?>
        <div class="grid-container">
            <div class="grid-container-numeros">
                <div>
                    <h3 class="nombre_producto">
                        Empanada
                    </h3>
                    <img class="imagen_producto" src="https://cdn.shopify.com/s/files/1/0548/9888/4843/products/Empanadas_El_Machetico_Empanada_de_papa_y_carne_x_10_unidades_2.jpg?v=1633958068">
                    <p class="precio_producto">
                        2500
                    </p>

                </div>
                <div>
                    <h3 class="nombre_producto">
                        Hamburguesa
                    </h3>
                    <img class="imagen_producto" src="https://arc-anglerfish-arc2-prod-infobae.s3.amazonaws.com/public/FJKXKQKMMJBV7KQ7XQ3YNFO7LU.jpg">
                    <p class="precio_producto">
                        5000
                    </p>

                </div>
                <div>
                    <h3 class="nombre_producto">
                        Perro
                    </h3>
                    <img class="imagen_producto" src="https://misrecetascolombia.com/wp-content/uploads/2020/12/Perros-Calientes-Colombianos.jpg">
                    <p class="precio_producto">
                        3000
                    </p>

                </div>
                <div>
                    <h3 class="nombre_producto">
                        Galleta
                    </h3>
                    <img class="imagen_producto" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbR-E_fS13rUZ4UsxBzdaACaRiSB_E39bTNg&usqp=CAU">
                    <p class="precio_producto">
                        1000
                    </p>

                </div>
            </div>
        </div>
    </body>
</html>