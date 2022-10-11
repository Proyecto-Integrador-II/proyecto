<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
        <link rel="stylesheet" href="comentarios.css">
        <!-- Core theme CSS (includes Bootstrap)-->
    </head>
    <body>
    <?php 
		include '../includes/header.php';
		if(empty($_SESSION['active']) || ($_SESSION['user'] !=3))
		{
			header('Location: ../todos/logout.php');
		}  
		?>
        <!-- Comentario section-->
        <form method="POST" action="./php/enviarcomentario.php">
            <section id="contact">
                <div class="container px-4">
                    <div class="row gx-4 justify-content-center">
                        <div class="col-lg-8">
                            <h2 id="h2">Comentarios</h2>
                            <br>
                                <br>
    
                                <div class="col-xs-12">
                                    <h3>¡Haz un Comentario!</h3>

                                    <br>
                                <div class="form-group">
                                    <label id="nombre1" for="nombre" class="form-label">Nombre</label>
                                    <input class="form-control" name="nombre" type="text" id="nombre" placeholder="Escribe tu nombre" required >
                                    </div>
                            
                                    
                                    <div class="form-group">
                                    <label id="comentario1" for="comentario" class="form-label">Comentario:</label>
                                    <textarea id="area" required class="form-control" name="comentario" cols="30" rows="10" type="text" id="comentario" 
                                    placeholder="Escribe tu comentario......"></textarea>
                                    </div>
                            <br>
                            <input class="btn btn-primary" id="boton" type="submit"  value="Enviar Comentario">
                            <br>
                            <br>
                            <br>
                                    <?php

$conexion=mysqli_connect("localhost","root","upb2021","proyecto2"); 
$resultado= mysqli_query($conexion, 'SELECT * FROM comentarios');

while($comentario = mysqli_fetch_object($resultado)){

    ?>

    <b><?php echo($comentario->nombre);  ?></b>(<?php echo ($comentario->fecha); ?>) dijo: 
    <br />
    <?php echo ($comentario->comentario);?>
    <br />
    <hr />




    <?php
}

                                    ?>
                            
                                </form>
                    
                </div>
                
            </section>

    


    </body>
</html>
