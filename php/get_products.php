<?php
header('Content-Type: application/json');

// Datos de conexión a la base de datos
$servername = "tiendaenlinea-server.mysql.database.azure.com";
$username = "ushfdkwvxu";
$password = "Tindaonline2024";
$dbname = "tienda_online";

// Habilitar reportes de errores de MySQLi para depuración
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Crear la conexión
$conn = mysqli_init();

// Verificar si la configuración SSL se establece correctamente
if (!mysqli_ssl_set($conn, NULL, NULL, __DIR__ . "/../SSL/DigiCertGlobalRootCA.crt.pem", NULL, NULL)) {
    die(json_encode(['success' => false, 'error' => "Falló la configuración SSL"]));
}

// Realizar la conexión a la base de datos
if (!mysqli_real_connect($conn, $servername, $username, $password, $dbname, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    die(json_encode(['success' => false, 'error' => "Conexión fallida: " . mysqli_connect_error()]));
}

// Comprobar la conexión
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => "Conexión fallida: " . $conn->connect_error]));
}

// Consultar los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

$productos = array();

// Guardar los productos en un array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

// Devolver los productos como JSON
echo json_encode($productos);

// Cerrar la conexión
$conn->close();
?>
