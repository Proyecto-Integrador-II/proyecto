<?php
// Multiple recipients
$para = 'mateito8001@hotmail.com' . ','; // note the comma

// Subject
$titulo = 'Restablecer Contraseña';
$codigo = rand(1000,9999);

// Message
$mensaje = '
<html>
<head>
<title>Restablecer</title>
</head>
<body>
    <h1>Prueba</h1>
    <div style="text-align:center;">
        <p>Restablecer contraseña</p>
        <h3>'.$codigo.'</h3>
        <p><small>Omita si usted no envió esto</small> </p>
    </div>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$cabeceras[] = 'MIME-Version: 1.0';
$cabeceras[] = 'Content-type: text/html; charset=iso-8859-1';

// // Additional headers
// $headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
// $headers[] = 'From: Birthday Reminder <birthday@example.com>';
// $headers[] = 'Cc: birthdayarchive@example.com';
// $headers[] = 'Bcc: birthdaycheck@example.com';

// Mail it
mail($para, $titulo, $mensaje, implode("\r\n", $cabeceras));
?>