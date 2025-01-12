<!-- Cabecera -->
<?php
    include '../../../public/plantillas/cabecera.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurar usuario</title>
    <link rel="stylesheet" href="/marketplace/public/css/style.css">
</head>
<body>

<?php
include_once __DIR__ . '/../../../app/controllers/userController.php';

$id_rolSession = '';
if (isset($_SESSION['rol']) ?? '') {
    $id_rolSession = $_SESSION['rol'];
}

$nombre = '';
$apellido = '';
$id_rol = '';
$nombre_rol = '';
$email = '';
$telefono = '';
$municipio = '';
$codigo_postal = '';
$pais = '';
$direccion = '';
$password = '';
$id_usuario = "";

if (isset($_GET['mensaje']) ?? '') {
    $mensaje = $_GET['mensaje']; 
}
if (isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario']; 
  
    //Instaciamos al UserController para llamar a sus métodos y traer los datos del usuario
    $userController = new UserController();
    $result = $userController->consultaDatosUser($id_usuario);
    
    //Traigo los arrays de las consultas para mostrar por pantalla los datos necesarios.
    $allDataUser = $result['allDataUser']; //Datos usuario
    $allMunicipios = $result['allMunicipios']; //Datos municipios (luego carga los CP)

    foreach ($allDataUser as $datosUsuario){
        $nombre=htmlspecialchars($datosUsuario['nombre']);
        $apellido=htmlspecialchars($datosUsuario['apellido']);
        $id_rol=htmlspecialchars($datosUsuario['id_rol']);
        $nombre_rol=htmlspecialchars($datosUsuario['nombre_rol']);
        $email=htmlspecialchars($datosUsuario['email']);
        $telefono=htmlspecialchars($datosUsuario['telefono']);
        $municipio=htmlspecialchars($datosUsuario['municipio']);
        $codigo_postal=htmlspecialchars($datosUsuario['codigo_postal']);
        $pais=htmlspecialchars($datosUsuario['pais']);
        $direccion=htmlspecialchars($datosUsuario['direccion']);
        $password=htmlspecialchars($datosUsuario['password']);
    }
}
?>

<!-- Formulario modificar usuarios -->
<div class="container my-5 formu" style="border: 1px solid #ccc; padding: 15px; margin-bottom: 20px;">
    <h2 class="text-center mb-4">Modificar Datos de Usuario</h2>
    <form action="../../controllers/userController.php" id="consultaUser" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre*:</label>
                <input type="text" id="nombre" name="nombre" value="<?= $nombre ?>" class="form-control">
                <span id="nombre_error" class="error-message"></span>
           </div>
            <div class="col-md-6">
                <label for="apellido" class="form-label">Apellidos*:</label>
                <input type="text" id="apellido" name="apellido" value="<?= $apellido ?>" class="form-control">
                <span id="apellido_error" class="error-message"></span>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Email*:</label>
                <input type="email" id="email" name="email" value="<?= $email ?>" class="form-control">
                <span id="email_error" class="error-message"></span>
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value="<?= $telefono ?>" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="pais" class="form-label">País:</label>
                <input type="text" id="pais" name="pais" value="<?= $pais ?>" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="<?= $direccion ?>" class="form-control">
            </div>
        </div>

           <!-- Cargamos de bbdd los municipios -->
           <div class="row mb-3">
            <div class="col-md-6">
                <label for="localidad" class="form-label">Localidad*:</label>
                <select id="localidad" name="localidad" onchange="changeCity('localidad')" class="form-select">
                <option value="<?= $municipio ?>"><?= $municipio ?></option>
                    <?php foreach ($allMunicipios as $municipio): ?>
                        <option value="<?php echo htmlspecialchars($municipio['municipio']); ?>">
                            <?php echo htmlspecialchars($municipio['municipio']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <span id="listMunicipios_error" class="error-message"></span>
            </div>
            <div class="col-md-6">
                <label for="resultadoCP" class="form-label">Código Postal*:</label>
                <select id="resultadoCP" name="resultadoCP" class="form-select">
                    <option value="<?= $codigo_postal ?>"><?= $codigo_postal ?></option>
                </select>
                <span id="resultadoCP_error" class="error-message"></span>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="password" class="form-label">Contraseña*:</label>
                <input type="password" id="password" name="password" value="<?= $password ?>" class="form-control" readonly>
                <span id="password_error" class="error-message"></span>
            </div>
            <div class="col-md-6">
                <label for="id_rol" class="form-label">Qué necesitas*:</label>
                <select id="id_rol" name="id_rol" class="form-select" onchange="toggleServiceForm(this.value)">
                    <option value="<?= $id_rol ?>" selected><?= $nombre_rol ?></option>
                    <option value="2">Ofrezco servicio</option>
                    <option value="3">Busco servicio</option>
                    <?php if ($id_rolSession==="administrador"): ?>
                        <option value="1">Administrador</option>
                    <?php endif; ?>
                </select>
                <span id="id_rol_error" class="error-message"></span>
                <input type="hidden" id='action' name="action" value="update">
                <input type="hidden" id='id_usuario' name="id_usuario" value="<?= $id_usuario ?>">
            </div>
        </div>
        <div class="text-center">
            <button class='botonDeco' type="submit">Modificar</button>
        </div>
    </form>
</div>
<br><br>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= $mensaje ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<br>

<!-- Pie de página -->
   <footer>
        <p>
            <?php
                include '../../../public/plantillas/pie.php';
            ?>
        </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="/marketplace/public/js/geolocalizacion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>