<?php
// Controlamos la sesión del usuario, guardamos el nombre de usuario, el rol y el tiempo de inactividad
session_start();

// Tiempo máximo de inactividad en segundos (1 hora)
define('SESSION_TIMEOUT', 3600);

// Verifica si la sesión está activa y si se ha excedido el tiempo de inactividad
function verifySession() {
    if (isset($_SESSION['last_activity'])) {
        $inactive_time = time() - $_SESSION['last_activity'];
        if ($inactive_time > SESSION_TIMEOUT) {
            session_unset(); // Limpia las variables de sesión
            session_destroy(); // Destruye la sesión
            header("Location: /marketplace/app/views/user/logout.php?timeout=true");
            exit();
        }
    }
    $_SESSION['last_activity'] = time(); // Actualiza el tiempo de actividad
}

// Inicia sesión para el usuario con datos específicos
function loginUser($nombre, $rol, $email) {
    //logs
    $logFile = __DIR__ . '/../../logs/session.log';

    $_SESSION['nombre'] = $nombre;
    $_SESSION['rol'] = $rol;
    $_SESSION['email'] = $email;
    $_SESSION['last_activity'] = time(); // Registra el tiempo actual

    $logMessage = date('Y-m-d H:i:s') . " session - Nombre: " . $nombre . " Rol: " . $rol . " Email: " . $email . "\n";
        file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Cierra sesión
function logoutUser() {
    session_unset();
    session_destroy();
}

//Control de acceso por roles
function checkAccess($requiredPermission) {
    if (!isset($_SESSION['rol'])) {
        header("Location: /marketplace/app/views/user/login.php");
        exit();
    }

    $userRole = $_SESSION['rol'];
  
//Definimos los permisos de cada rol
$permissions = [
    'administrador' => [
        'home','dashboard', 'manage_users', 'offer_services', 'search_services', 'view_reports', 'edit_content', 'view_content',
    ],
    'usuarioOfrece' => [
        'home','dashboard', 'offer_services', 'view_content',
    ],
    'usuarioBusca' => [
        'home','dashboard', 'search_services', 'view_content',
    ],
];

    // Verificar si el rol tiene el permiso requerido
    if (!isset($permissions[$userRole]) || !in_array($requiredPermission, $permissions[$userRole])) {
        die('No tienes permiso para acceder a esta página.');
        exit();
    }
}
?>
