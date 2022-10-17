<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
		<title>Notificaciones</title>
	</head>
	<body>     
		<?php 
		include '../includes/header.php';
		if(empty($_SESSION['active']) || ($_SESSION['user'] !=3))
		{
			header('Location: ../todos/logout.php');
		}  
		?>
        <section id="container">
            <h1><i class="fas fa-user"></i>tus reportes</h1>
            <table>
                <tr>
                    <th>razon de reporte</th>
                    <th>comentario</th>
                </tr>
            <?php
				require_once '../todos/conexion.php';
				
				$sql_registe = mysqli_query($conection,"SELECT COUNT(*) AS total_registro FROM reporte");
				$result_register = mysqli_fetch_array($sql_registe);
				$total_registro = $result_register['total_registro'];
				$por_pagina = 50;
				if(empty($_GET['pagina'])){
					$pagina =1;
				}else{
					$pagina = $_GET['pagina'];
				}
				$desde = ($pagina-1)*$por_pagina;
				$total_paginas = ceil($total_registro/$por_pagina);
                $query = mysqli_query($conection, "SELECT r.reporte, v.tipo_reporte FROM reporte r INNER JOIN razones_reporte v on r.id = v.id ORDER BY r.id ASC limit $desde,$por_pagina");
                mysqli_close($conection);
				$result = mysqli_num_rows($query);

                if($result > 0)
                {
                    while ($data = mysqli_fetch_array($query))
                    {
                ?>
                    <tr>
                        <td><?php echo $data['reporte'] ?></td>
                        <td><?php echo $data['tipo_reporte'] ?></td>

                    </tr>
            <?php
                    }
                }
            ?>
            </table>
			<div class="paginador">
				<ul>
				<?php
					if($pagina !=1)
					{
				?>
					<li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
					<li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
				<?php
					}
					for ($i=1;$i<$total_paginas;$i++){
						if($i ==$pagina)
						{
							echo '<li class="pageSelected">'.$i.'</li>';
						}else{
							echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
						}
					}
					if($pagina != $total_paginas)
					{
				?>
					<li><a href="?pagina=<?php echo $pagina+1; ?>">>></a></li>
					<li><a href="?pagina=<?php echo $total_paginas; ?>">>|</a></li>
				<?php } ?>
				</ul>
			</div>
        </section>
    </body>
</html>
