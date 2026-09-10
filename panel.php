<?php
// panel.php

// Configuración de la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejar solicitudes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'login':
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            // Lógica de autenticación
            break;
        case 'send_command':
            $id = $_POST['id'] ?? '';
            $command = $_POST['command'] ?? '';
            // Lógica para enviar comandos
            break;
        case 'truncate':
            // Lógica para truncar la base de datos
            break;
        case 'logout':
            // Lógica para cerrar sesión
            break;
        default:
            echo json_encode(['status' => 'error', 'message' => 'Acción no válida']);
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? '';

    switch ($action) {
        case 'get_records':
            // Lógica para obtener registros
            break;
        default:
            echo json_encode(['status' => 'error', 'message' => 'Acción no válida']);
            break;
    }
}

// Cerrar conexión
$conn->close();
?>
