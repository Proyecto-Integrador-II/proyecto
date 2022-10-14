
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
        <script src="buscador.js"></script>
        <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
        <link rel="stylesheet" href="./compra.css">
        <link rel="stylesheet" href="buscar.css">
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
            <form action="" method="GET" class="form_search">
				<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
				<!-- <input type="submit" value="Buscar" class="btn_search"> -->
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
                            <article id="buscar" class="product" data-id="<?php echo $data['codproducto'] ?>">
                                <img id="buscar" class="product-img" alt="<?php echo $data['descripcion'] ?>" src="../../img/uploads/<?php echo $data['foto'] ?> ">
                                <h3  id="buscar" class="product-title"><?php echo $data['nombre'] ?></h3>
                                <p id="buscar"  class="price"><?php echo $data['precio'] ?></p>
                                <button id="buscar" class="btn btn--orange btn--block product__cart-button" data-product-id="<?php echo $data['codproducto'] ?>" type="button">
                                    <i id="buscar" class="fa-solid fa-basket-shopping cart-add" id="carrito" >Carrito</i></button>
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

        
        <!-- ACAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
        <div>
            <div class="nav container">
                <a href="" class="logo"></a>
                <!-- ICON CART -->
                <i class='bx bxs-shopping-bag' id="icon-cart"></i>
                <!-- CART -->
                <div class="carta">
                        <h2 class="carta-title">Tú carrito!</h2>

                        <div class="carta-content">

                        </div>
                        <div class="total">
                            <div class="title-total">Valor total :</div>
                            <div class="price-total">$0</div>
                        </div>

                        <button type="button" class="btn-buy">Eres una increible persona!</button>

                        <i class='bx bxs-shield-x' id="close-cart" ></i>
                </div>
            </div>
        </div>

        <section class="shop container">
                <h2 class="section-title"></h2>
                <div class="shop-content">
                    <!-- box 1 -->
                    <div class="product-box">
                        <img src="empa.jpg" alt="" class="product-img" >
                        <h2 class="product-title">Empanada</h2>
                        <span class="price">$15000</span>
                        <i class='bx bx-shopping-bag cart-add'></i>
                    </div> 

                </div>
        </section>

        <script>
            let cartIcon = document.querySelector('#icon-cart');
            let cart = document.querySelector('.carta');
            let closeCart = document.querySelector('#close-cart');

            cartIcon.onclick = () =>{
                cart.classList.add('active')
            };

            closeCart.onclick = () =>{
                cart.classList.remove('active')
            };

            if (document.readyState == 'loading'){
                document.addEventListener('DOMContentLoaded', ready)
            }else{
                ready();
            }

            function ready(){
                var removeCartButtons = document.getElementsByClassName('carta-remove')
                for(var i = 0; i<removeCartButtons.length; i++){
                    var button = removeCartButtons[i]
                    button.addEventListener('click' ,removeCartItem)
                }
                var quantityInputs = document.getElementsByClassName('carta-quantity');
                for (var i = 0; i<quantityInputs.length; i++){
                    var input = quantityInputs[i]
                    input.addEventListener('change', quantitychanged);
                }
                var addCart = document.getElementsByClassName('cart-add')
                for(var i = 0; i<addCart.length; i++){
                    var button = addCart[i];
                    button.addEventListener('click', addCartClicked);
                }
            }


            function removeCartItem(event){
                var buttonClicked = event.target;
                buttonClicked.parentElement.remove();
                updatetotal();
            }

            function quantitychanged(event){
                var input = event.target
                if (isNaN(input.value) || input.value <= 0){
                    input.value = 1;
                };
                updatetotal();
            }


            function addCartClicked(event){
                var button = event.target;
                var shopProducts = button.parentElement;
                var title = shopProducts.getElementsByClassName('product-title')[0].innerText;
                var price = shopProducts.getElementsByClassName('price')[0].innerText;
                var productImg = shopProducts.getElementsByClassName('product-img')[0].src;
                addProductToCart(title, price,productImg);
                updatetotal();
            }

            function addProductToCart(title, price, productImg){
                var cartShopBox = document.createElement('div');
                    cartShopBox.classList.add('carta-box');
                var cartItems = document.getElementsByClassName('carta-content')[0];
                var cartItemsNames =cartItems.getElementsByClassName('carta-product-title');
                for(var i = 0; i<cartItemsNames.length; i++){
                    if(cartItemsNames[i].innerText == title){
                        alert('Ya agregaste al carrito este producto!');
                        return;
                        console.log(cartItemsNames)
                    }
                }
            
            var cartBoxContent=`
                                <img src="${productImg}" alt="" class="carta-img">
                                <div class="detalles-box">
                                <div class="carta-product-title">${title}</div>
                                <div class="carta-price">${price}</div>
                                <input type="number" value="1" class="carta-quantity">
                                </div>
                                <i class='bx bx-trash-alt carta-remove' ></i>`;
cartShopBox.innerHTML = cartBoxContent;
cartItems.append(cartShopBox);

cartShopBox.getElementsByClassName('carta-remove')[0]
.addEventListener('click', removeCartItem);
cartShopBox.getElementsByClassName('carta-quantity')[0]
.addEventListener('change', quantitychanged);

}

            function updatetotal(){
                var cartContent = document.getElementsByClassName('carta-content')[0];
                var cartBoxes = cartContent.getElementsByClassName('carta-box');
                var total = 0;
                for(var i = 0; i<cartBoxes.length; i++){
                    var cartBox = cartBoxes[i];
                    var priceElement = cartBox.getElementsByClassName('carta-price')[0];
                    var quiantityElement = cartBox.getElementsByClassName('carta-quantity')[0];
                    var price = parseFloat(priceElement.innerText.replace('$',''));
                    var quantity = quiantityElement.value;
                    total= total + (price * quantity);
                }
                    total = Math.round(total * 100)/ 100;

                    document.getElementsByClassName('price-total')[0].innerText = '$' + total;
                
            }



        </script>


    <style>
    .carta{
        position: fixed;
        top: 0;
        right: -100%;
        width: 360px;
        min-height: 100vh;
        padding: 20px;
        background-color: white;
        box-shadow: -2px 0 4px hsl(0, 4%, 15% /10%);
        transition: 0.3s;
    }

    .carta.active{
        right: 0;
    }
    .title-total{
        font-size: 20px;
    }

    .price-total{
        font-size: 20px;
    }
</style>















        
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>