<?php
require_once __DIR__ . './../helpers/db.php';
require_once __DIR__ . './../helpers/auth.php';

$logFile = __DIR__ . '/../../logs/createUsers.log';

// Encriptar la contraseña
$hashedPassword = Auth::encryptPassword($password);

$nombre_rol = '';
if (isset($_SESSION['rol'])) {
    $nombre_rol = $_SESSION['rol'];

}

$db = Database::connect();

try {
    // Iniciar la transacción
    $db->beginTransaction();

    // Insertar en la tabla usuarios
    $queryUsuario = "INSERT INTO usuarios (nombre, apellido, password, fecha_registro, id_rol) 
                     VALUES (:nombre, :apellido, :password, NOW(), :id_rol)";
    $stmtUsuario = $db->prepare($queryUsuario);
    $stmtUsuario->execute([
        ':nombre' => $nombre,
        ':apellido' => $apellido,
        ':password' => $password,
        ':id_rol' => $id_rol,
    ]);

    // Obtener el ID del usuario insertado
    $usuario_id = $db->lastInsertId();

    // Insertar en la tabla datos_personales
    $queryDatosPersonales = "INSERT INTO datos_personales (id_usuario, email, telefono, direccion, municipio, pais, codigo_postal) 
                             VALUES (:id_usuario, :email, :telefono, :direccion, :municipio, :pais, :codigo_postal)";
    $stmtDatosPersonales = $db->prepare($queryDatosPersonales);
    $stmtDatosPersonales->execute([
        ':id_usuario' => $usuario_id,
        ':email' => $email,
        ':telefono' => $telefono,
        ':direccion' => $direccion,
        ':municipio' => $municipio,
        ':pais' => $pais,
        ':codigo_postal' => $codigo_postal,
    ]);

    // Insertar en la tabla usuario_ofrece si el id_rol es 2
    if ($id_rol == 2) {
        $queryUsuarioOfrece = "INSERT INTO usuario_ofrece (id_usuario, categoria, servicio, titulo, detalle, imagen, fecha, precio, municipio) 
                               VALUES (:id_usuario, :categoria, :servicio, :titulo, :detalle, :imagen, :fecha, :precio, :municipioOfrece)";
        $stmtUsuarioOfrece = $db->prepare($queryUsuarioOfrece);
        $stmtUsuarioOfrece->execute([
            ':id_usuario' => $usuario_id,
            ':categoria' => $categoria,
            ':servicio' => $servicio,
            ':titulo' => $titulo,
            ':detalle' => $detalle,
            ':imagen' => $relativePathImg,
            ':fecha' => $fecha,
            ':precio' => $precio,
            ':municipioOfrece' => $municipioOfrece,
        ]);
    }

    // Necesito sacar el nombre del id_rol para meterlo en la sesión si el usuario no existe.
    if (!$nombre_rol == 'administrador'){
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
    }

    //Si llegamos aquí sin error, cargamos la imagen en el servidor
   /* $uploadDir = '/marketplace/public/files/images/';
    $uploadFile = $uploadDir . basename($_FILES['imagen']['name']);

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadFile)) {
        // Guardar la ruta en la base de datos
        // $db->query("INSERT INTO imagenes (ruta) VALUES ('$uploadFile')");
        echo "Imagen subida con éxito: $uploadFile";
    } else {
        echo "Error al subir la imagen.";
    }*/
     
    //Confirmar la transacción, solo si ocurre si todo va bien
     $db->commit();
     $logMessage = date('Y-m-d H:i:s') . " Inserción satisfactoria - Nombre: " . $nombre . " - creado con ID: " . $usuario_id . " - Nombre Rol: " . $nombre_rol . " - Email: " . $email . " -Municipio " . $municipio . " -CP: " . $codigo_postal . "\n";
     file_put_contents($logFile, $logMessage, FILE_APPEND);
} catch (Exception $e) {
     // Revertir la transacción si ocurre un error
     $db->rollBack();
     $logMessage = date('Y-m-d H:i:s') . " Inserción fallida: " . $e->getMessage() . "\n";
     file_put_contents($logFile, $logMessage, FILE_APPEND);
}
?>