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
					<label class="form-card__label" for="nombre_comprador">Nombre del comprador:</label>
					<input
						class="form-card__input"
						type="text"
						name="nombre_comprador"
						id="nombre_comprador"
						placeholder="Nombre del comprador"
					/>
				</div>

                <div class="form-card__group">
					<label class="form-card__label" for="lugar_producto">razon del reporte:</label>
					<select name="lugar_producto">
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
        <script src="../JavaScript/jquery.min.js"></script>
        <script src="../JavaScript/functions.js"></script>
	</body>
</html>
