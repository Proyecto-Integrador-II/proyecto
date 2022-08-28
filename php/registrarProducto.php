<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Diseño.css">
</head>
<body>
    <div class="container">
		<div class="content">
			<form name="add_product" id="add_product">
				<div class="header">						
					<h4 class="title">Añadir Producto</h4>
				</div>
				<div class="formulario">
					<div class="form-group">
						<label>ID</label>
						<input type="text" id="id" required>
						
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" id="name" required>
					</div>
					<div class="form-group">
						<label>Categoría</label>
						<input type="text" id="category" required>
					</div>
					<div class="form-group">
						<label>Cantidad</label>
						<input type="number" id="stock" required>
					</div>
					<div class="form-group">
						<label>Precio</label>
						<input type="text" id="price" required>
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<input type="text" id="description" required>
					</div>
					<div class="form-group">
						<label>Habilitado</label>  
						<select id="transporte" >
							<option value="1">Si</option>
							<option value="2">No</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="cancelar" value="Cancelar">
					<input type="submit" class="registrar" value="Guardar datos">
				</div>
			</form>
		</div>
    </div>
</body>
</html>