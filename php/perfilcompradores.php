<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/perfilcompradores.css">
    <title>Editar perfil compradores</title>
</head>
<body>
    <main>
        <div class="contenedor__editar-producto">
            <form action="" method="POST" class="">
                <h2>
                    Editar Perfil Compradores
                </h2>
                <input type="text" placeholder="Nombre" name="Nombre" >
                <input type="password" placeholder="Contraseña" name="Contraseña" >
                <input type="email" placeholder="Correo" name="correo">
                <button type="submit" name="limpiardatos" value="Cambiar" id="boton">
                    Limpiar
                </button>   
                <button type="submit" name="grabardatos" value="Cambiar" id="boton">
                    Grabar
                </button> 
                <button type="submit" name="modificardatos" value="Cambiar" id="boton">
                    Modificar
                </button> 
                <button type="submit" name="eliminardatos" value="Cambiar" id="boton">
                    Eliminar
                </button> 
            </form>
        </div>
<?php 
$sql="SELECT * FROM usuarios";
$result=mysql_query($conn,$sql);

while($mostrar=mysql_fetch_array($result))
{
?>
<tr> <td><?php echo $mostrar['codigo'] ?>
	<td><?php echo $mostrar['nombre'] ?>
	<td><?php echo $mostrar['edad'] ?>
	<td><?php echo $mostrar['telefono'] ?>

</tr>
<?php
}

?>
    </main>
</body>
</html>


