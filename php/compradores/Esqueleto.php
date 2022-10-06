
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include '../includes/scripts.php' ?>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="../../JavaScript/carritocompras.js"></script>
        <script src="../../JavaScript/comprasfinal.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
        <link rel="stylesheet" href="./compra.css">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
        <div class="container">
            <form action="buscar_productos.php" method="GET" class="form_search">
				<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
				<input type="submit" value="Buscar" class="btn_search">
			</form>
            <section class="container products" id="productsSection">
                <?php 
                    $query = mysqli_query($conection, "SELECT codproducto, descripcion,foto,nombre,precio FROM producto WHERE habilitado = 1");
                    mysqli_close($conection);
                    $result = mysqli_num_rows($query);

                    if($result > 0)
                    {
                        while ($data = mysqli_fetch_array($query))
                        {
                ?>
                            <article class="product" data-id="<?php echo $data['codproducto'] ?>">
                                <img class="product__image" alt="<?php echo $data['descripcion'] ?>" src="../../img/uploads/<?php echo $data['foto'] ?> ">
                                <h3 class="product__title"><?php echo $data['nombre'] ?></h3>
                                <p class="product__price"><?php echo $data['precio'] ?></p>
                                <button class="btn btn--orange btn--block product__cart-button" data-product-id="<?php echo $data['codproducto'] ?>" type="button">
                                    <i class="fa-solid fa-basket-shopping" id="carrito" ></i>Añadir a la canasta</button>
                            </article>
                        <?php } ?>
                    <?php } ?>
            </section>
        </div>
        
        <div id="motalcompleto">
            <input type="checkbox" id="btn-modal">
            <div class="boton-modal">
                <label for="btn-modal">
                    Carrito
                </label>
            </div>

            <div class="container-modal">
                <div class="content-modal">
                    <h2>Tú carrito</h2>
                    <p>Agrega productos a la cesta!</p>
                    <div class="btn-cerrar">
                        <label for="btn-modal">Cerrar</label>
                    </div>
                </div>
            </div>
        </div>

        
        
        <div>
            <div class="nav container">
                <a href="" class="logo">Carrito</a>
                <!-- ICON CART -->
                <i class='bx bxs-shopping-bag' id="icon-cart"></i>
            </div>
        </div>

        <section class="shop container">
                <div class="section-title">Shop</div>
        </section>


























        
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>