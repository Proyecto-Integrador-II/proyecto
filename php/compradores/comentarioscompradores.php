<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
        <link rel="stylesheet" href="comenta.css">
        <!-- Core theme CSS (includes Bootstrap)-->
    </head>
    <body>
    <?php 
include '../includes/header.php';
if(empty($_SESSION['active']) || ($_SESSION['user'] !=3))
{
    header('Location: ../todos/logout.php');
}  
//?>
        <!-- Comentario section-->

            <div class="contact">
                <div class="hijo">
                <input type="text" id="comment-box" placeholder="Comentario (Seccional, queja)">
                        <button id="post">Enviar</button>
                        <ul id="unordered">
                        </ul>
                </div>
            </div>
    </body>
    
    <script src="codec.js"></script>
</html>
