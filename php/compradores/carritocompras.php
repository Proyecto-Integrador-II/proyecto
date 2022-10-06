
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include '../includes/scripts.php' ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="../../JavaScript/carrito.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <link rel="stylesheet" href="../../CSS/style.css">
    </head>
    
    <body>

        <div class="pt-5 text-center">
            <h1>Carrito Compras <a href="#" class="btn btn-success"><sup>4</sup><i class="icon ion-md-cart"></i></a></h1>
        </div>      
        <div class="contenedorpro pt-5">
            <div class="row">
                            <table class="table">
                <thead class="thead-dark" id="th">
                    <tr>
                    <th scope="col">PRODUCTO</th>
                    <th scope="col">PRECIO</th>
                    <th scope="col">CANTIDAD</th>
                    <th scope="col">SUBTOTAL</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td ><img src="1.jpg" height="120" width="100" class="card-img-top" alt="..."></td>
                        <td class="pt-5">100.000</td>
                        <td class="pt-5"><input type="text" name="cant" value="1"></td>
                        <td class="pt-5">100.000</td>
                        <td class="pt-5"><button id="btn-delete" class="btn btn-danger">Borrar</button></td>
                    </tr>

                    <tr>
                        <td ><img src="1.jpg" height="120" width="100" class="card-img-top" alt="..."></td>
                        <td class="pt-5">100.000</td>
                        <td class="pt-5"><input type="text" name="cant" value="1"></td>
                        <td class="pt-5">100.000</td>
                        <td class="pt-5"><button id="btn-delete" class="btn btn-danger">Borrar</button></td>
                    </tr>

                    <tr>
                        <td ><img src="1.jpg" height="120" width="100" class="card-img-top" alt="..."></td>
                        <td class="pt-5">100.000</td>
                        <td class="pt-5"><input type="text" name="cant" value="1"></td>
                        <td class="pt-5">100.000</td>
                        <td class="pt-5"><button id="btn-delete" class="btn btn-danger">Borrar</button></td>
                    </tr>

                </tbody>
                </table>
            </div>
            <a href="" class="btn btn-primary"><button>Seguir Comprando</button></a>
            <h4 class="text-right">Total <span  id="total" class="text-muted" >$300.00</span></h4>
        </div>





    </body>
</html>