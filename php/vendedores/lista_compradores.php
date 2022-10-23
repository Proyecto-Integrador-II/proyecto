<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
		<title>Lista de compradores</title>
	</head>
	<body>     
		<?php 
		include '../includes/header.php';
		if(empty($_SESSION['active']) || ($_SESSION['user'] !=2))
		{
			header('Location: ../todos/logout.php');
		}  
		?>
        <section id="container">
            <h1><i class="fas fa-user"></i>Lista de compradores</h1>
			<form action="buscar_compradores.php" method="GET" class="form_search">
				<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
				<button type="submit" value="Buscar" class="btn_search"><i class="fa fa-search"></i></button>
			</form>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Reporte</th>
                </tr>
            <?php
				require_once '../todos/conexion.php';
				
				$sql_registe = sqlsrv_query($conection,"SELECT COUNT(*) AS total_registro FROM usuario WHERE rol = 3 and habilitado =1");
				$result_register = sqlsrv_fetch_array($sql_registe);
				$total_registro = $result_register['total_registro'];
				$por_pagina = 50;
				if(empty($_GET['pagina'])){
					$pagina =1;
				}else{
					$pagina = $_GET['pagina'];
				}
				$desde = ($pagina-1)*$por_pagina;
				$total_paginas = ceil($total_registro/$por_pagina);
                $query = sqlsrv_query($conection, "SELECT u.idusuario, u.nombre,u.apellido,u.correo FROM usuario u where rol = 3 and habilitado =1 ORDER BY u.idusuario OFFSET $desde ROWS FETCH NEXT $por_pagina ROWS ONLY");
				$result = sqlsrv_num_rows($query);

                if($result === false)
                {
                    while ($data = sqlsrv_fetch_array($query))
                    {
                ?>
                    <tr>
                        <td><?php echo $data['idusuario'] ?></td>
                        <td><?php echo $data['nombre'] ?></td>
                        <td><?php echo $data['apellido'] ?></td>
                        <td><?php echo $data['correo'] ?></td>
                        <td>
							<a class="" href="./reportes_compradores.php?id=<?php echo $data['idusuario'];?>"><i class=""></i>Reportar</a>
                        </td>
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
