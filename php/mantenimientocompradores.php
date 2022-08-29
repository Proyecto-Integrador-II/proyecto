<?php
include("conexionBD.php");
$nombre=$_POST["Nombre"]
$contraseña=$_POST["Contraseña"]
$correo=$_POST["correo"]


if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['limpiardatos']))
{
    header("Location: principal.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['grabardatos']))

{
$sqlgrabar = "INSERT INTO clientes(codigo, nombre, contraseña, correo) values ('$nombre','$contraseña','$correo')";

if(mysqli_query($conn,$sqlgrabar))
{
header("Location: principal.php");
}else 
{
echo "Error: " .$sql."<br>".mysqli_error($conn);
}
    
    
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['modificardatos']))

{
        $sqlmodificar = "UPDATE clientes SET nombre='$nombre',contraseña=''$contraseña'',correo='$correo' WHERE codigo=$cod";

if(mysqli_query($conn,$sqlmodificar))
{
header("Location: principal.php");
}else 
{
echo "Error: " .$sql."<br>".mysqli_error($conn);
}
    
    
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eliminardatos']))

{
        $sqleliminar = "DELETE FROM clientes WHERE codigo=$cod";

if(mysqli_query($conn,$sqleliminar))
{
header("Location: principal.php");
}else 
{
echo "Error: " .$sql."<br>".mysqli_error($conn);
}
    
    
}

?>