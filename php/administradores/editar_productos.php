<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
		<title>Editar productos</title>
	</head>
	<body>
		<?php 
		include '../includes/header.php';
		if(empty($_SESSION['active']) || ($_SESSION['user'] !=1))
		{
			header('Location: ../todos/logout.php');
		}  
		?>
		<div class="container">
			<form class="form-card" method="POST" enctype="multipart/form-data">
				<h1 class="form-card__subtitle fas">Editar producto</h1>
                <?php
				require_once '../todos/conexion.php';
				if(!empty($_POST))
				{
					if(empty($_POST['nombre_producto']) || empty($_POST['precio_producto']) || empty($_POST['lugar_producto'])  || empty($_POST['descripcion_producto']) || empty($_POST['foto_producto'])) 
					{
						$alert='<p class="msg_error">Todos los campos son obligatorios</p>';
					}
					else{
						$nombre_producto = $_POST['nombre_producto'];
						$precio_producto = $_POST['precio_producto'];
						$lugar_producto = $_POST['lugar_producto'];
						$descripcion_producto = $_POST['descripcion_producto'];
						$foto = $_FILES['foto'];
						$nombre_foto = $foto['name'];
						$type = $foto['type'];
						$url_temp = $foto['tmp_name'];
						$imgProducto  = 'img_producto.png';

						if($nombre_foto != '')
						{
							$destino = '../../img/uploads/';
							$imgProducto = 'img_'.$nombre_producto.'.png';
							$src = $destino.$imgProducto;
						}
						
						

						$query_update = mysqli_query($conection,"UPDATE producto SET nombre = '$nombre_producto',precio ='$precio_producto',lugar='$lugar_producto',foto='$imgProducto' WHERE codproducto = $codproducto;");

						if($sql_update)
						{
							if($nombre_foto != '')
							{
								move_uploaded_file($url_temp,$src);
							}
							echo 'Producto actualizado correctamente';
						}else
						{
							echo 'Error al actualizar el producto';
						}
						
					}
				}
                if(empty($_GET['id']))
                {
					header('Location: lista_productos.php');
                }

                $codproducto = $_GET['id'];
                $query_producto = mysqli_query($conection,"SELECT p.codproducto, p.nombre AS producto, p.precio, l.nombre AS lugar,  p.descripcion, p.foto, u.nombre, l.id FROM producto p INNER JOIN usuario u ON p.proveedor = u.idusuario INNER JOIN lugares l ON l.id = p.lugar WHERE codproducto = $codproducto AND p.habilitado = 1;");
                $result_producto = mysqli_num_rows($query_producto);
				$foto = '';
				$classRemove = 'notBlock';

                if($result_producto > 0)
                {
                    $data_producto = mysqli_fetch_assoc($query_producto);
					
					$classRemove = '';
					$foto = '<img id="img" src="../../img/uploads/'.$data_producto['foto'].'" alt="Producto">';
				}	
 
                else{
                    header('location: lista_productos.php');
					
                }
                ?>

				<div class="form-card__group">
					<label class="form-card__label"></label>
					<input
						class="form-card__input"
						type="hidden"
						name="codproducto"
                        value="<?php echo $data_producto['codproducto']; ?>"
					/>
					
				</div>

				<div class="form-card__group">
					<label class="form-card__label"></label>
					<input
						class="form-card__input"
						type="hidden"
						name="foto_actual"
						id="foto_actual"
                        value="<?php echo $data_producto['foto']; ?>"
					/>
					
				</div>

				<div class="form-card__group">
					<label class="form-card__label"></label>
					<input
						class="form-card__input"
						type="hidden"
						name="foto_remove"
						id="foto_remove"
                        value="<?php echo $data_producto['foto']; ?>"
					/>
					
				</div>

				<div class="form-card__group">
					<label class="form-card__label" for="nombre_producto">Nombre:</label>
					<input
						class="form-card__input"
						type="text"
						name="nombre_producto"
						id="nombre_producto"
						placeholder="Nombre del producto"
						value="<?php echo $data_producto['producto'];?>"
					/>
				</div>

                <div class="form-card__group">
					<label class="form-card__label" for="precio_producto">Precio:</label>
					<input
						class="form-card__input"
						type="number"
						name="precio_producto"
						id="precio_producto"
						placeholder="Precio del producto"
						value="<?php echo $data_producto['precio']; ?>"
					/>
				</div>

                <div class="form-card__group">
					<label class="form-card__label" for="lugar_producto">Lugar:</label>
					<select name="lugar_producto" class="notItemOne">
						<option value="<?php echo $data_producto['id']; ?>" selected><?php echo $data_producto['lugar']; ?></option>
                        <option value="1">UPB</option>
                        <option value="2">Delacuesta</option>
                        <option value="3">Parque caracoli</option>
                    </select>
				</div>

                <div class="form-card__group">
					<label class="form-card__label" for="descripcion_producto">Descripcion:</label>
                    <textarea id="descripcion_producto" name="descripcion_producto" rows="4" cols="50" ><?php echo htmlspecialchars($data_producto['descripcion']); ?></textarea>
				</div>

                <div class="form-card__group">
					<label class="form-card__label" for="foto">Foto:</label>
					<div class="prevPhoto">
                        <span class="delPhoto <?php echo $classRemove; ?>">X</span>
                        <label for="foto"></label>
						<?php echo $foto; ?>
                    </div>
                    <div class="upimg">
                        <input type="file" name="foto" id="foto">
                    </div>
                    <div id="form_alert"></div>
                 
                </div>

				<div class="form-card__buttons">
					<button class="btn btn--green btn--block" type="submit" name="crear">Añadir producto</button>
				</div>
			</form>
		</div>
        <script src="../JavaScript/jquery.min.js"></script>
        <script src="../JavaScript/functions.js"></script>
	</body>
</html>