<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
		<title>Lista de productos</title>
	</head>
	<body>     
		<?php 
		include '../includes/header.php';
		if(empty($_SESSION['active']) || ($_SESSION['user'] !=1))
		{
			header('Location: ../todos/logout.php');
		}  
		?>
        <section id="container">
            <h1>Lista de productos</h1>
			<form action="buscar_productos.php" method="GET" class="form_search">
				<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
				<input type="submit" value="Buscar" class="btn_search">
			</form>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Lugar</th>
                    <th>Descripcion</th>
                    <th>Foto</th>
                    <th>Proveedor</th>
					<th>Acciones</th>
                </tr>
            <?php
				require_once '../todos/conexion.php';
				$sql_registe = mysqli_query($conection,"SELECT COUNT(*) AS total_registro FROM producto WHERE habilitado =1");
				$result_register = mysqli_fetch_array($sql_registe);
				$total_registro = $result_register['total_registro'];
				$por_pagina = 10;
				if(empty($_GET['pagina'])){
					$pagina =1;
				}else{
					$pagina = $_GET['pagina'];
				}
				$desde = ($pagina-1)*$por_pagina;
				$total_paginas = ceil($total_registro/$por_pagina);
                $query = mysqli_query($conection, "SELECT p.codproducto as ID,p.nombre as Nombre,p.precio as Precio,l.nombre as Lugar,p.descripcion AS Descripcion,p.foto as Foto,u.nombre as Proveedor FROM producto p INNER JOIN lugares l ON p.lugar = l.id INNER JOIN usuario u ON u.idusuario = p.proveedor where p.habilitado =1 ORDER BY p.codproducto ASC limit $desde,$por_pagina");
                mysqli_close($conection);
				$result = mysqli_num_rows($query);

                if($result > 0)
                {
                    while ($data = mysqli_fetch_array($query))
                    {
                        $foto='../../img/uploads/'.$data['Foto'];
                ?>
                    <tr>
                        <td><?php echo $data['ID'] ?></td>
                        <td><?php echo $data['Nombre'] ?></td>
                        <td><?php echo $data['Precio'] ?></td>
                        <td><?php echo $data['Lugar'] ?></td>
                        <td><?php echo $data['Descripcion'] ?></td>
                        <td class="img_producto"><img src="<?php echo $foto; ?>" alt="<?php echo $data['Descripcion']; ?>"></td>
                        <td><?php echo $data['Proveedor'] ?></td>
                        <td>
                        
						<a class="link_edit" href="./editar_productos.php?id=<?php echo $data['ID'];?>"><i class="far fa-edit"></i>Editar</a>
                        <a class="link_delete" href="./eliminar_productos.php?id=<?php echo $data['ID'];?>"><i class="far fa-trash-alt"></i>Eliminar</a>
						
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