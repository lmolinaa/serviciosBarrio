<!-- Cabecera -->
<?php
    include '../../../public/plantillas/cabecera.php'; //Incluir el archivo cabecera.php
   
   //******** PENDIENTE DE CONFIGURAR EL ENVÍO DE CORREOS CON SMTP *********/
    include '../../config/servicioEmail.php'; //Incluir el archivo servicioEmail par enviar correos de usuarios
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
<br>
<div class="container my-5 formu">
    <h2>Contacta MarketPlace</h2>
    <form action="" id="formContact" class="control-form" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="mensajeUsuario" class="form-label">Mensaje</label>
            <textarea class="form-control" id="mensajeUsuario" name="mensajeUsuario" rows="4" required></textarea>        
        </div>
        <div class="mensajeInadecuado"></div>
        <button type="submit" class='botonDeco'>Enviar</button>
        <p id="mensajeInadecuado"></p>
    </form>
</div>


<!-- Modal de inicio de sesión -->
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
                include '../user/login.php'; // Incluir el archivo login.php
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
    <script src="/marketplace/public/js/controlPalabrasGenerico.js"></script>
</body>
</html>