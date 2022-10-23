<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
		<title>Buscar usuarios</title>
		<link rel="stylesheet" href="../css/style.css" />
		<title></title>
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
            <?php
                $busqueda = strtolower($_REQUEST['busqueda']);
                if(empty($busqueda))
                {
                    header('Location: ./lista_usuarios.php');
                }
            ?>
			<h1><i class="fas fa-user"></i>Lista de Usuarios</h1>
			<form action="buscar_usuarios.php" method="GET" class="form_search">
				<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
				<button type="submit" value="Buscar" class="btn_search"><i class="fas fa-search"></i></button>
			</form>

			
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            <?php
				require_once '../todos/conexion.php';
				$rol = '';
				if($busqueda == 'Administradores')
				{
					$rol = " OR rol LIKE '%1%' ";
				}else if($busqueda == 'Vendedores'){
					$rol = " OR rol LIKE '%2%' ";
				}else if($busqueda == 'Compradores'){
					$rol = " OR rol LIKE '%3%' ";
				}
				$sql_registe = sqlsrv_query($conection,"SELECT COUNT(*) AS total_registro FROM usuario WHERE (idusuario LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' OR apellido LIKE '%$busqueda%' OR correo LIKE '%$busqueda%' $rol) AND habilitado =1");
				
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
                $query = sqlsrv_query($conection, "SELECT u.idusuario, u.nombre,u.apellido,u.correo,r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol where (u.idusuario LIKE '%$busqueda%' OR u.nombre LIKE '%$busqueda%' OR u.correo LIKE '%$busqueda%' OR r.rol LIKE '%$busqueda%') AND habilitado =1 order by u.idusuario OFFSET $desde ROWS FETCH NEXT $por_pagina ROWS ONLY");
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
                        <td><?php echo $data['rol'] ?></td>
                        <td>
                        
						<?php if($data['rol'] != 'Administradores'){ ?>
							<a class="link_edit" href="./editar_usuarios.php?id=<?php echo $data['idusuario'];?>">Editar</a>
                            <a class="link_delete" href="./eliminar_usuarios.php?id=<?php echo $data['idusuario'];?>">Eliminar</a>
						<?php } ?>
                        </td>
                    </tr>
            <?php
                    }
                }
            ?>
            </table>
    <?php
        if($total_paginas != 0) 
        {
    ?>
            <div class="paginador">
				<ul>
				<?php
					if($pagina !=1)
					{
				?>
					<li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>">|<</a></li>
					<li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda; ?>"><<</a></li>
				<?php
					}
					for ($i=1;$i<$total_paginas;$i++){
						if($i ==$pagina)
						{
							echo '<li class="pageSelected">'.$i.'</li>';
						}else{
							echo '<li><a href="?pagina='.$i.'$busqueda='.$busqueda.'">'.$i.'</a></li>';
						}
					}
					if($pagina != $total_paginas)
					{
				?>
					<li><a href="?pagina=<?php echo $pagina+1; ?>$busqueda=<?php echo $busqueda; ?>">>></a></li>
					<li><a href="?pagina=<?php echo $total_paginas; ?>$busqueda=<?php $busqueda; ?>">>|</a></li>
				<?php } ?>
				</ul>
			</div>
    <?php } ?>
    </body>
</html>
