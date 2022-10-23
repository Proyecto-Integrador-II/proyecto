<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php include '../includes/scripts.php' ?>
		<title>Reportes de Vendedores</title>
	</head>
	<body>
		<?php 
		include '../includes/header.php';
		if(empty($_SESSION['active']) || ($_SESSION['user'] !=3))
		{
			header('Location: ../todos/logout.php');
		}  
		?>
		<div class="container" id="container">
			<form class="form-card" enctype="multipart/form-data" method="POST">
				<h2 class="form-card__subtitle">Reportar un vendedor</h2>
				<?php
				require_once '../todos/conexion.php';
				if(empty($_GET['id']))
				{
					echo 'no recibe nada';
				}

				$iduser = $_GET['id'];
				$sql = sqlsrv_query($conection,"SELECT u.idusuario FROM usuario u WHERE idusuario = $iduser");
				$result_sql = sqlsrv_num_rows($sql);

				if($result_sql === true)
				{
					header("Location: lista_vendedores.php");
				}

				else{
					while($data = sqlsrv_fetch_array($sql)){
						$iduser = $data['idusuario'];
					}
				
				}
				?>
				<div class="form-card__group">
					<label class="form-card__label"></label>
					<input
						class="form-card__input"
						type="hidden"
						name="idUsuario"
                        value="<?php echo $iduser; ?>"
					/>
					
				</div>

                <div class="form-card__group">
					<label class="form-card__label" for="razon_reporte_vendedor">Razón del reporte:</label>
					<select name="razon_reporte_vendedor">
                        <option value="1">Fue irrespetuoso</option>
                        <option value="2">No ofreció el producto</option>
                        <option value="3">No se encontraba en el lugar de pedido</option>
                        <option value="4">El producto estaba en malas condiciones</option>
						<option value="5">No tenía vueltos</option>
                    </select>
				</div>

                <div class="form-card__group">
					<label class="form-card__label" for="descripcion_producto">Descripción:</label>
                    <textarea id="descripcion_reporte_vendedor" name="descripcion_reporte_vendedor" rows="4" cols="50"></textarea>
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
					<button class="btn btn--green btn--block" type="submit" name="reportar">Reportar vendedor</button>
				</div>
			</form>
		</div>
	</body>
</html>
<?php
if(!empty($_POST))
{
	$alert='';
	if(empty($_POST['razon_reporte_vendedor']) || empty($_POST['descripcion_reporte_vendedor']))
	{
		echo 'Todos los campos son obligatorios';
	}else{
		$descripcion_reporte_vendedor = $_POST['descripcion_reporte_vendedor']; ;

		if($_REQUEST['razon_reporte_vendedor'] == '1'){
			$razon_reporte_vendedor = 1;
		}
		else if($_REQUEST['razon_reporte_vendedor'] == '2'){
			$razon_reporte_vendedor = 2;
		}
		else if($_REQUEST['razon_reporte_vendedor'] == '3'){
			$razon_reporte_vendedor = 3;
		}
		else if($_REQUEST['razon_reporte_vendedor'] == '4'){
			$razon_reporte_vendedor = 4;
		}
		else if($_REQUEST['razon_reporte_vendedor'] == '5'){
			$razon_reporte_vendedor = 5;
		}

		$idUsuario = $_POST['idUsuario'];
		$foto = $_FILES['foto'];
		$nombre_foto = $foto['name'];
		$type = $foto['type'];
		$url_temp = $foto['tmp_name'];
		$imgReseña  = 'img_reporte.png';

		if($nombre_foto != '')
		{
			$destino = '../../img/reports_seller/';
			$img_nombre = 'img_'.md5(date('d-m-Y H:i:s'));
			$imgReseña = $img_nombre.'.png';
			$src = $destino.$imgReseña;
		}
		$query_insert = sqlsrv_query($conection,"INSERT INTO reporte_vendedor(id_razon,id_reportado,reporte,foto) VALUES ('$razon_reporte_vendedor','$idUsuario','$descripcion_reporte_vendedor','$imgReseña')");	
		
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
