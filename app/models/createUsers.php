<?php
require_once __DIR__ . './../helpers/db.php';
require_once __DIR__ . './../helpers/auth.php';

$logFile = __DIR__ . '/../../logs/createUsers.log';

// Encriptar la contraseña
$hashedPassword = Auth::encryptPassword($password);

try {
    // Iniciar conexión a la base de datos
    $db = Database::connect();

    // Insertar en la tabla usuarios
    $stmt = $db->prepare(
        "INSERT INTO usuarios (nombre, apellido, password, id_rol, fecha_registro) 
         VALUES (:nombre, :apellido, :password, :id_rol, NOW())"
    );
    $stmt->execute([
        ':nombre' => $nombre,
        ':apellido' => $apellido,
        ':password' => $hashedPassword,
        ':id_rol' => $id_rol,
    ]);

    // Obtener el ID del usuario recién creado
    $usuario_id = $db->lastInsertId();

    // Insertar en la tabla datos_personales
    $stmt = $db->prepare(
        "INSERT INTO datos_personales (id_usuario, email, telefono, direccion, municipio, pais, codigo_postal) 
         VALUES (:id_usuario, :email, :telefono, :direccion, :municipio, :pais, :codigo_postal)"
    );
    $stmt->execute([
        ':id_usuario' => $usuario_id,
        ':email' => $email,
        ':telefono' => $telefono,
        ':direccion' => $direccion,
        ':municipio' => $municipio,
        ':pais' => $pais,
        ':codigo_postal' => $codigo_postal,
    ]);

    // Necesito sacar el nombre del id_rol para meterlo en la sesión
   $stmt = $db->prepare(
    "SELECT u.nombre, u.password, r.nombre_rol, e.email
    FROM usuarios u 
    JOIN roles r ON u.id_rol = r.id_rol 
    JOIN datos_personales e ON u.id_usuario = e.id_usuario
    WHERE e.email = :email" //Solo buscamos por email ya que no puede repetirse.
    );
    $stmt->execute([':email' => $email]);
    $usuarioNuevo = $stmt->fetch(PDO::FETCH_ASSOC);

    loginUser($usuarioNuevo['nombre'], $usuarioNuevo['nombre_rol'], $usuarioNuevo['email']);

    // Registrar log de creación de usuario
    $logMessage = date('Y-m-d H:i:s') . " createUsers - Nombre: " . $usuarioNuevo['nombre'] . " - creado con ID: " . $usuario_id . " - Nombre Rol: " . $usuarioNuevo['nombre_rol'] . " - Email: " . $usuarioNuevo['email'] . "\n";
    file_put_contents($logFile, $logMessage, FILE_APPEND);

} catch (Exception $e) {
    $logMessage = date('Y-m-d H:i:s') . " createUsers - Error: " . $e->getMessage() . "\n";
    file_put_contents($logFile, $logMessage, FILE_APPEND);
    die("Error: " . $e->getMessage());
}
?>