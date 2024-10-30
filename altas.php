<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Título de la página</title>
</head>
<body>
    <?php
// Configuración de la base de datos
$servername = "sql206.thsite.top"; // Cambia si tu servidor es diferente
$username = "thsi_37566429"; // Cambia por tu usuario de MySQL
$password = "tlJz4c?a"; // Cambia por tu contraseña de MySQL
$dbname = "thsi_37566429_ck";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $domicilio = $_POST['domicilio'];
    $telefono = $_POST['correo_electronico'];
    $telefono = $_POST['contraseña'];
    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("INSERT INTO registro_usuario (nombre,domicilio,correo_electronico, contraseña) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombre,$domicilio, $correo_electronico, $contraseña);

    if ($stmt->execute()) {
        echo "¡Te has registrado!.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

</body>
</html>
