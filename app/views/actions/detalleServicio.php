<!-- Cabecera -->
<?php
    include '../../../public/plantillas/cabecera.php'; // Incluir el archivo cabecera.php
    $permisosEdit = checkAccess('login');
    if (isset($_SESSION['detalleByCard'])) {
        $detalleByCard = $_SESSION['detalleByCard'];
        $isUbicacion = $_SESSION['isUbicacion'];

        /*echo "<pre>";
            print_r($_SESSION);
            echo "</pre>";*/
            //die();
    } 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta detalle</title>
    <link rel="stylesheet" href="/marketplace/public/css/style.css">
    <link rel="stylesheet" href="/marketplace/public/css/detalleOfreceStyle.css">
</head>
<body>
      
    <?php foreach ($detalleByCard as $card): 
        $date = new DateTime($card['fecha']);
    ?>
        <h2>
            <?php
            //Controlamos adonde debe volver, si es por ubicación o por categoría/servicio
                if ($isUbicacion === "false"){
            ?>
            <a href="./serviciosCards.php?servicio=<?= htmlspecialchars($card['servicio']) ?>&categoria=<?= htmlspecialchars($card['categoria']) ?>">    
            <?php } else { ?>
                <a href="./serviciosCards.php?municipio=<?= htmlspecialchars($card['municipio']) ?>">
            <?php } ?>    
            <img class="iconoMenu" src='/marketplace/public/img/iconos/play-skip-back-outline.svg' data-bs-toggle="tooltipAll" data-bs-placement="top" title='Volver a la pantalla anterior.'>
            <?= htmlspecialchars($card['categoria']) ?> / <?= htmlspecialchars($card['servicio']) ?></a>
        </h2>
    <div class="container">
        <div class="card">
            <img class= 'card-img' src="<?= htmlspecialchars($card['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($card['titulo']) ?>">
            <div class="card-contact">
            <div class="card-title">Contacta</div>
                <img class="iconoSubmenu" src='/marketplace/public/img/iconos/man-outline.svg'>
                <strong>Contacto:</strong> <?= htmlspecialchars($card['nombre']) ?> <?= htmlspecialchars($card['apellido']); ?><br>
                <img class="iconoSubmenu" src='/marketplace/public/img/iconos/storefront-outline.svg'>
                <strong>Empresa:</strong> <?= htmlspecialchars($card['empresa']) ?><br>
                <img class="iconoSubmenu" src='/marketplace/public/img/iconos/call-outline.svg'>
                <strong>Teléfono de contacto:</strong> <?= htmlspecialchars($card['telefono']) ?><br>
                <img class="iconoSubmenu" src='/marketplace/public/img/iconos/mail-open-outline.svg'>
                <strong>Email de contacto:</strong> <?= htmlspecialchars($card['email']) ?><br>
                <a href="javascript:alert('Esta funciononalidad no está implementada aún.')"><img class='iconoSubmenu' src='/marketplace/public/img/iconos/paper-plane-outline.svg'>
                <strong>Contacta ahora:</strong></a><br><br><br>
                
                <?php if (($_SESSION['id_usuario']===$card["id_usuario"]) || ($_SESSION['rol']==="administrador")): ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='/marketplace/app/views/actions/updateCard.php?id_card=<?= htmlspecialchars($card["id"]) ?>'><img class='iconoSubmenu' src='/marketplace/public/img/iconos/pencil-outline.svg' data-bs-toggle='tooltipAll' data-bs-placement='top' title='Editar datos tarjeta'></a>
                        &nbsp;&nbsp;
                    <a href='/marketplace/app/views/actions/deleteCard.php?id_card=<?= htmlspecialchars($card["id"]) ?>'><img class='iconoMenu' src='/marketplace/public/img/iconos/trash-outline.svg' data-bs-toggle='tooltipAll' data-bs-placement='top' title='Eliminar tarjeta'></a>
                <?php endif; ?>
            </div>
            <div class="card-content">
                <div class="card-title"><?= htmlspecialchars($card['titulo']) ?></div>
                <div class="card-detail"><?= htmlspecialchars($card['detalle']) ?></div>
                <div class="card-footer">
                    <img class='iconoSubmenu' src='/marketplace/public/img/iconos/megaphone-outline.svg'>
                    <strong>Activo desde:</strong> <?= htmlspecialchars($date->format('d/m/Y')) ?><br>
                    <img class="iconoSubmenu" src='/marketplace/public/img/iconos/earth-outline.svg'>
                    <strong>Municipio del servicio:</strong> <?= htmlspecialchars($card['municipio']) ?><br>
                    <img class="iconoSubmenu" src='/marketplace/public/img/iconos/cash-outline.svg'>
                    <strong>Precio aproximado:</strong> <?= htmlspecialchars($card['precio']) ?> €<br>
                </div> <br><br>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

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
    </body>
</html>