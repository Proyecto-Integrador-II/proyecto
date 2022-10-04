
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                                    <i class="fa-solid fa-basket-shopping" ></i>Añadir a la canasta</button>
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
                    <div class="btn-cerrar">
                        <label for="btn-modal">Cerrar</label>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>