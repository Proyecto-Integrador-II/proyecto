<?php
$serverName = "pi-servidor.database.windows.net";
$connectionInfo = array( "Database"=>"PI-database", "UID"=>"administrador", "PWD"=>"Jeanparra17@");
$conection = sqlsrv_connect( $serverName, $connectionInfo);

if( $conection ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>