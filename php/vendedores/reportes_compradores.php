<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
		<title>Reportes de Compradores</title>
	</head>
	<body>
		<?php 
		include '../includes/header.php';
		if(empty($_SESSION['active']) || ($_SESSION['user'] !=2))
		{
			header('Location: ../todos/logout.php');
		}  
		?>
		<div class="container">
			<form class="form-card" method="POST">
				<h2 class="form-card__subtitle">Reportar un comprador</h2>

                <div class="form-card__group">
					<label class="form-card__label" for="razon_reporte">razon del reporte:</label>
					<select name="razon_reporte">
                        <option value="1">Irrespeto con el vendedor</option>
                        <option value="2">No pagó</option>
                        <option value="3">No se encontraba en el lugar de pedido</option>
                        <option value="4">Canceló el servicio despues de haberse comenzado el proceso</option>
                    </select>
				</div>

                <div class="form-card__group">
					<label class="form-card__label" for="descripcion_producto">Descripcion:</label>
                    <textarea id="descripcion_reporte_comprador" name="descripcion_reporte_comprador" rows="4" cols="50"></textarea>
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
					<button class="btn btn--green btn--block" type="submit" name="reportar">Reportar comprador</button>
				</div>
			</form>
		</div>
	</body>
</html>
<?php
	require_once '../todos/conexion.php';
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['razon_reporte']) || empty($_POST['descripcion_reporte_comprador']))
		{
			echo 'Todos los campos son obligatorios';
		}else{
			$descripcion_reporte_comprador = $_POST['descripcion_reporte_comprador']; ;

			if($_REQUEST['razon_reporte'] == '1'){
				$razon_reporte = 1;
			}
			else if($_REQUEST['razon_reporte'] == '2'){
				$razon_reporte = 2;
			}
			else if($_REQUEST['razon_reporte'] == '3'){
				$razon_reporte = 3;
			}
			else if($_REQUEST['razon_reporte'] == '4'){
				$razon_reporte = 4;
			}

			$usuario_id = $_SESSION['idUser'];
			$foto = $_FILES['foto'];
			$nombre_foto = $foto['name'];
			$type = $foto['type'];
			$url_temp = $foto['tmp_name'];
			$imgProducto  = 'img_reporte.png';

			if($nombre_foto != '')
			{
				$destino = '../../img/uploads/';
				$img_nombre = 'img_'.md5(date('d-m-Y H:i:s'));
				$imgProducto = $img_nombre.'.png';
				$src = $destino.$imgProducto;
			}
			$query_insert = mysqli_query($conection,"INSERT INTO reporte() VALUES ()");	
			
			if($query_insert)
            {
				if($nombre_foto != ''){
					move_uploaded_file($url_temp,$src);
				}
				echo 'Reporte guardado correctamente';
			}else{
				echo 'Error al guardar el reporte';
			}
		}	
	}

?>