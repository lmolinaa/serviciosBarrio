<?php
include __DIR__ . '/../config/session.php';
$logFile = '/marketplace/logs/userController.log';

class UserController {
    public static function create() {
        // Datos recibidos del formulario (método POST)
        $nombre = $_POST['nombre'] ?? '';
        $apellido = $_POST['apellido'] ?? '';
        $email = $_POST['email'] ?? '';
        $telefono = $_POST['telefono'] ?? '';
        $direccion = $_POST['direccion'] ?? '';
        $municipio = $_POST['municipio'] ?? '';
        $pais = $_POST['pais'] ?? '';
        $codigo_postal = $_POST['codigo_postal'] ?? '';
        $password = $_POST['password'] ?? '';
        $id_rol = $_POST['id_rol'] ?? ''; 

        // Validar datos obligatorios aunque se controla por javascript en el from
        if (empty($nombre) || empty($email) || empty($password)) {
            die('Nombre, email y contraseña son obligatorios.');
        }

        // Validar formato del email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die('El formato del email no es válido.');
        }

        // Crear un nuevo usuario
        include '../models/createUsers.php';
      
        // Registrar log de creación de usuario
        $logMessage = date('Y-m-d H:i:s') . " userController - Usuario " . $nombre . " creado\n";
        file_put_contents($logFile, $logMessage, FILE_APPEND);
        header("Location: ../views/actions/dashboard.php");
        exit();
    }

    public static function checkUserExists() {
        $nombre = $_POST['nombre'] ?? '';
        $email = $_POST['email'] ?? '';
  
        // Incluir modelo para verificar usuario
        include '../models/checkUsers.php';
        
        // Registrar log de verificación de usuario
        $logMessage = date('Y-m-d H:i:s') . " userController - Verificación de usuario " . $nombre . " Email " . $email . "\n";
        file_put_contents($logFile, $logMessage, FILE_APPEND);
        
        echo json_encode(['success' => true, 'redirect' => '/marketplace/app/views/actions/dashboard.php']);
        exit();
        /*header("Location: ../views/actions/acceso.php");
        exit();*/
    }
}

// Manejo de solicitudes dependerá de lo que llegue en el action se hara una cosa u otra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;

    switch ($action) {
        case 'create':
            UserController::create();
            break;

        case 'checkUserExists':
            UserController::checkUserExists();
            break;

        /*case 'delete':
            UserController::deleteUser();
            break;*/

        default:
            echo "Acción no válida.";
            break;
    }
}

?>