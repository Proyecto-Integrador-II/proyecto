<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
		<title>Añadir productos</title>
	</head>
	<body>
		<?php 
		include '../includes/header.php';
		if(empty($_SESSION['active']) || ($_SESSION['user'] !=2))
		{
			header('Location: ../todos/logout.php');
		}  
		?>
		<div class="container" id="container">
			<form class="form-card" enctype="multipart/form-data" method="POST">
				<h2 class="form-card__subtitle">Añade un producto</h2>

				<div class="form-card__group">
					<label class="form-card__label" for="nombre_producto">Nombre:</label>
					<input
						class="form-card__input"
						type="text"
						name="nombre_producto"
						id="nombre_producto"
						placeholder="Nombre del producto"
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
					/>
				</div>

                <div class="form-card__group">
					<label class="form-card__label" for="lugar_producto">Lugar:</label>
					<select name="lugar_producto">
                        <option value="1">UPB</option>
                        <option value="2">Delacuesta</option>
                        <option value="3">Parque caracoli</option>
                    </select>
				</div>

                <div class="form-card__group">
					<label class="form-card__label" for="descripcion_producto">Descripcion:</label>
                    <textarea id="descripcion_producto" name="descripcion_producto" rows="4" cols="50"></textarea>
				</div>

                <div class="form-card__group">
					<label class="form-card__label" for="foto">Foto:</label>
					<div class="prevPhoto">
                        <span class="delPhoto notBlock">X</span>
                        <label for="foto"></label>
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
<?php
	session_start();
	require_once '../todos/conexion.php';
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre_producto']) || empty($_POST['precio_producto']) || empty($_POST['descripcion_producto']))
		{
			echo 'Todos los campos son obligatorios';
		}else{
			$nombre_producto = $_POST['nombre_producto'];
			$precio_producto = $_POST['precio_producto'] ;

			if($_REQUEST['lugar_producto'] == '1'){
				$lugar_producto = 1;
			}
			else if($_REQUEST['lugar_producto'] == '2'){
				$lugar_producto = 2;
			}
			else if($_REQUEST['lugar_producto'] == '3'){
				$lugar_producto = 3;
			}

			$descripcion_producto = $_POST['descripcion_producto'];
			$usuario_id = $_SESSION['idUser'];
			$foto = $_FILES['foto'];
			$nombre_foto = $foto['name'];
			$type = $foto['type'];
			$url_temp = $foto['tmp_name'];
			$imgProducto  = 'img_producto.png';

			if($nombre_foto != '')
			{
				$destino = '../../img/uploads/';
				$img_nombre = 'img_'.md5(date('d-m-Y H:i:s'));
				$imgProducto = $img_nombre.'.png';
				$src = $destino.$imgProducto;
			}
			$query_insert = mysqli_query($conection,"INSERT INTO producto(nombre,precio,lugar,descripcion,foto,proveedor) VALUES ('$nombre_producto','$precio_producto','$lugar_producto','$descripcion_producto','$imgProducto','$usuario_id')");	
			
			if($query_insert)
            {
				if($nombre_foto != ''){
					move_uploaded_file($url_temp,$src);
				}
				echo 'Producto guardado correctamente';
			}else{
				echo 'Error al guardar el producto';
			}
		}	
	}

?>