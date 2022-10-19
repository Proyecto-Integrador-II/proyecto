<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
		<title>Recomendaciones</title>
	</head>
	<body>
		<?php 
		include '../includes/header.php';
        include 'simple_html_dom.php';
		if(empty($_SESSION['active']) || ($_SESSION['user'] !=3))
		{
			header('Location: ../todos/logout.php');
		}  
        $url ='https://www.rappi.com.co/restaurantes/900101113-avocalia';

        $html = file_get_html($url);

        echo "
            <div class='container'>
                <section class='container products' id='productsSection'>
        ";

        foreach($html->find('div[class="css-t5hujq"]') as $comida) {
            $nombre = $comida->find('div[class="css-k008qs"] p',0);
            $descripcion = $comida->find('p[class="chakra-text sc-f7e281dd-2 TTnoE css-1rmjo0r"]');
            $precio = $comida->find('div[class="css-0"] span');
            $foto = $comida->find('div[class="sc-34e632bd-0 cxugzC sc-f7e281dd-1 knCjyr"] img');
            $descripcion_post = implode($descripcion);
            $precio_post = implode($precio);
            $foto_post = implode($foto);
            
            echo "
            <article id='buscar' class='product' data-id=''>
                <img id='buscar' class='product-img' alt='' src=''>
                <h3  id='buscar' class='product-title'>$nombre</h3>
                <p id='buscar'  class='price'></p>
                <button id='buscar' class='btn btn--orange btn--block product__cart-button' data-product-id='' type='button'>
                    <i id='buscar' class='fa-solid fa-basket-shopping cart-add' id='carrito' >Carrito</i>
                </button>
            </article>";
        }

        echo "
            </section>
        </div>
        ";
    
 
        
        ?>
        
	</body>
</html>
