<?php
$paracorreo = "sololosproscomoyo@gmail.com";
$titulo = "Test Correo";
$mensaje = "Hola Mundo";
$tucorreo = "from :awosutfm@gmail.com";

if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
    echo "Correo Enviado";
}else{
    echo "Error ERROR";
}
?>