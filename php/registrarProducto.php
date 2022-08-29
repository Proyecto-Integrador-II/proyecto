<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/registrarProducto.css">
</head>
<body>
	<main>
		<div class="container">
			<form action="" name="add_product" id="add_product" class="">

				<div class="header">						
					<h2 class="title">Añadir Producto</h2>
				</div>
				<div class="formulario">
					<div class="form-group">
						<input type="text" id="id" placeholder="ID" required>
					</div>
					<div class="form-group">
						<input type="text" id="name" placeholder="Nombre" required>
					</div>
					<div class="form-group">
						<input type="number" id="stock" placeholder="Cantidad" required>
					</div>
					<div class="form-group">
						<input type="text" id="price" placeholder="Precio" required>
					</div>
					<div class="form-group">
						<input type="text" id="description" placeholder="Descripción" required>
					</div>
					<br>
					<div class="form-group">
						<label>Habilitado</label>  
						<select id="transporte">
							<option value="1">Si</option>
							<option value="2">No</option>
						</select>
					</div>
					<div class="modal-footer">
					<input type="button" class="cancelar" value="Cancelar">
					<input type="submit" class="registrar" value="Guardar datos">
				</div>
			</form>
		</div>
	</main>
</body>
</html>