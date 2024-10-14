<?php
// conexion.php
$servername = "tiendaenlinea-server.mysql.database.azure.com";
$username = "ushfdkwvxu";
$password = "Tindaenlinea2024";
$dbname = "tienda_online";

// Crear conexión
//$conn = new mysqli($servername, $username, $password, $dbname);

//Eliminar esto despues de haberlo pasado a Rene para lo de Azure y dejar solamente la cadena para la DB local

$con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, "SSL/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, "tiendaenlinea-server.mysql.database.azure.com", "ushfdkwvxu", "Tiendaenlinea2024", "tienda_online", 3306, MYSQLI_CLIENT_SSL);

//$conn = mysqli_init();
//mysqli_ssl_set($conn,NULL,NULL, "SSl/DigiCertGlobalRootG2.crt.pem", NULL, NULL);
//mysqli_real_connect($conn, $servername, $username, $password, $dbname, 3306, MYSQLI_CLIENT_SSL);
//if (mysqli_connect_errno()) {
    //die('Conexión fallida: Con MySQL de Azure: '.mysqli_connect_error());
//}

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => "Conexión fallida: " . $conn->connect_error]));
}
?>
