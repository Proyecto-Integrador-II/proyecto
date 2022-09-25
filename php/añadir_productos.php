<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../css/style.css" />
		<title>Añadir productos</title>
	</head>
	<body>
		<div class="container">
			<div class="form-card" id="signup-form" action="" method="POST">
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
					<label class="form-card__label" for="nombre_producto">Precio:</label>
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
					<select name="select">
                        <option value="1">UPB</option>
                        <option value="2">Delacuesta</option>
                        <option value="3">Parque caracoli</option>
                    </select>
				</div>

                <div class="form-card__group">
					<label class="form-card__label" for="nombre_producto">Descripcion:</label>
                    <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
				</div>

                <div class="form-card__group">
					<label class="form-card__label">Foto:</label>
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