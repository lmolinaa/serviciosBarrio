<!-- Cabecera -->
<?php
    include '../../../public/plantillas/cabecera.php'; // Incluir el archivo cabecera.php
?>

<!-- Contenido principal -->
<div class="container my-5">
    <h2 class="text-center mb-4">Registro de Usuario</h2>
    <form action="../../controllers/userController.php" method="POST" class="needs-validation" novalidate>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
                <div class="invalid-feedback">Por favor, ingresa tu nombre.</div>
            </div>
            <div class="col-md-6">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" id="apellido" name="apellido" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
                <div class="invalid-feedback">Por favor, ingresa un email válido.</div>
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" id="direccion" name="direccion" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="municipio" class="form-label">Municipio:</label>
                <input type="text" id="municipio" name="municipio" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="pais" class="form-label">País:</label>
                <input type="text" id="pais" name="pais" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="codigo_postal" class="form-label">Código Postal:</label>
                <input type="text" id="codigo_postal" name="codigo_postal" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" id="password" name="password" value="" class="form-control" required>
            <div class="invalid-feedback">Por favor, ingresa una contraseña.</div>
        </div>
        <div class="mb-3">
            <label for="id_rol" class="form-label">Qué necesitas:</label>
            <select id="id_rol" name="id_rol" class="form-select">
                <option value="" selected>Selecciona Perfil</option>
                <!--<option value="1">Administrador</option>-->
                <option value="2">Ofrezco servicio</option>
                <option value="3">Busco servicio</option>
            </select>
            <input type="hidden" name="action" value="create">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
</div>

-- Modal de inicio de sesión -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Mensaje de error dinámico -->
                <?php
                include './login.php'; // Incluir el archivo login.php
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Pie de página -->
<footer>
    <p>
        <?php
            include '../../../public/plantillas/pie.php';
        ?>
    </p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
