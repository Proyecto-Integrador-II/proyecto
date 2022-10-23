<?php
    $host = 'localhost:3307';
    $user = 'root';
    $password = 'upb2021';
    $db = 'proyecto2';

    $conection = @sqlsrv_connect($host,$user,$password,$db);

    if(!$conection){
        echo "Error en la conexión";
    }
?>