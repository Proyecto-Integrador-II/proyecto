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
            $usuario_id = $_SESSION['idUser'];
            $query = mysqli_query($conection, "SELECT * FROM `usuario` where idusuario = $usuario_id");
            $result = mysqli_fetch_array($query);
                if($result > 0)
                {
                    echo implode(" ", ["<script>function alerta(){Swal.fire('",$result['nombre'],'\n',$result['correo'],"')}</script>"]);
                }
        ?>
        <div class="grid-container">
            <div class="usuario" style="position:absolute;top: 6%; left:5% ;width:350px;overflow:hidden;">
                <a onclick="alerta()">
                <img src="../Fotos/usuario.png" alt="usuario" width="40" height="40">
                Usuario
                </a>
                <div class="usuario_foto" style="position: absolute; background-color: White; border-style: solid; margin-top: 20px; left:0%; width:300px;">
                    <img src="../Fotos/usuario.png" alt="usuario" width="100" height="100">
                    <br>
                    <?php
                    
                    $query = mysqli_query($conection, "SELECT * FROM `usuario` where idusuario = $usuario_id");
                    $result = mysqli_fetch_array($query);
                        if($result > 0)
                        {
                            echo implode(" ", [$result['nombre'],"<br>",$result['correo']]);
                        }
                    ?>
                    <br>
                    <br>
                </div>
            </div>
            <div class="item1">
                <h1>UPB FOOD</h1>
            </div>
            <div class="item3">
                <ul class="topnav">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">UPB</a></li>
                    <li><a href="#">Delacuesta</a></li>
                    <li><a href="#">Parque Caracoli</a>
                    <li id="reseña" ><a href="comentarios.php">RESEÑAS-(Clientes)</a>
                    
        
                    <div class="search">
                        <form action="#">
                            <input type="text"
                                id = "buscar"
                                placeholder="Buscar productos"
                                name="search">                            
                        </form>
                    </div>
                </ul>
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
        <script src="busqueda.js"> </script>
    </body>
</html>