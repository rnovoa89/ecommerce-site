<?php
// conexion.php
$con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, "__DIR__ ./SSL/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, "tiendaenlinea-server.mysql.database.azure.com", "ushfdkwvxu", "Tiendaenlinea2024", "tienda_online", 3306, MYSQLI_CLIENT_SSL);

// Realizar la conexión a la base de datos
if (!mysqli_real_connect($conn, $servername, $username, $password, $dbname, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    die(json_encode(['success' => false, 'error' => "Conexión fallida: " . mysqli_connect_error()]));
}

// Verificar la conexión
if (mysqli_connect_errno()) {
    die(json_encode(['success' => false, 'error' => "Conexión fallida: " . mysqli_connect_error()]));
}

echo json_encode(['success' => true, 'message' => "Conexión exitosa a la base de datos"]);
?>
