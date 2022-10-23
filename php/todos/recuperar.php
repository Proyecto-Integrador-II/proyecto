<?php
include('conexion.php');

$correo = $_POST ['txtcorreo'];

$queryusuario = sqlsrv_query($coon, "SELECT * FROM lofin WHERE correo = '$correo'");
$nr           =sqlsrv_num_rows($queryusuario);

if($nr == 1)
{
    $mostrar  = sqlsrv_fetch_array($queryusuario);
    $enviarpass = $mostrar ['password'];

    $paracorreo = $correo;
    $titulo = "Recuperar password"
    $mensaje = "Tu password es: ".$enviarpass;
    
}
?>