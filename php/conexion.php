<?php
// conexion.php
$servername = "tiendaenlinea-server.mysql.database.azure.com";
$username = "ushfdkwvxu";
$password = "Tindaenlinea2024";
$dbname = "tienda_online";
$ssl_cert_path = __DIR__ . "/SSL/DigiCertGlobalRootCA.crt.pem";  // Ruta completa al certificado

// Crear la conexión
$conn = mysqli_init();

// Establecer las opciones SSL para la conexión
mysqli_ssl_set($conn, NULL, NULL, $ssl_cert_path, NULL, NULL);

// Realizar la conexión a la base de datos
if (!mysqli_real_connect($conn, $servername, $username, $password, $dbname, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    die(json_encode(['success' => false, 'error' => "Conexión fallida: " . mysqli_connect_error()]));
}

echo json_encode(['success' => true, 'message' => "Conexión exitosa a la base de datos"]);
?>
