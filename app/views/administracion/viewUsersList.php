
<!-- Cabecera -->
    <?php
    include '../../../public/plantillas/cabecera.php'; // Incluir el archivo cabecera.php
    $logFile = __DIR__ . '/../../logs/viewUsersList.log';
    //Damos permisos para esta página solo al administrador
    checkAccess('manage_users');

    // Verifica si el usuario está autenticado
    if (!isset($_SESSION['email']) || !isset($_SESSION['rol'])) {
        header("Location: ./logout.php");
        exit();
    }

    // Verifica tiempo de inactividad
    verifySession();
    
    require_once '../../models/checkUsers.php'; //consulta a base de datos el/los usuarios
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de contacto</title>
    <link rel="stylesheet" href="/marketplace/public/css/style.css">
</head>
<body>  

<div class="container mt-5">
    <h2 class="text-center">Listado de Usuarios</h2>
    <div class="table-container">
        <table class="tableUsers table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><a href="#"><?= htmlspecialchars($usuario['nombre']) ?></a></td>
                        <td><?= htmlspecialchars($usuario['apellido']) ?></td>
                        <td><?= htmlspecialchars($usuario['nombre_rol']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

    <?php
     $logMessage = date('Y-m-d H:i:s') . " viewUsersList - Lista de usuarios " . "\n";
     file_put_contents($logFile, $logMessage, FILE_APPEND);
    ?>

    <footer>
        <p>
            <?php
                include '../../../public/plantillas/pie.php';
            ?>
        </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>