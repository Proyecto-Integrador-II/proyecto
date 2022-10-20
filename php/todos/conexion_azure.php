<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:pi-servidor.database.windows.net,1433; Database = PI-database", "administrador", "Jeanparra17@");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "administrador", "pwd" => "Jeanparra17@", "Database" => "PI-database", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:pi-servidor.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>