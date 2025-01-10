<!-- Cabecera -->
<link rel="stylesheet" href="/marketplace/public/css/cardsStyle.css">
<?php
    include '../../../public/plantillas/cabecera.php'; // Incluir el archivo cabecera.php
    include_once __DIR__ . '/../../../app/controllers/actionsController.php';
    //$municipio = ""; //Si get es '' quiere decir que no se busca por municipio sino por categoría y servicio
    if (!isset($_GET['municipio']) ?? '') {
        $servicioSeleccionado = htmlspecialchars_decode($_GET['servicio']) ?? '';
        $categoriaSeleccionada = htmlspecialchars_decode($_GET['categoria']) ?? '';
        
        $actionController = new ActionController();
        $cardsByServicio = $actionController->consultaCards($servicioSeleccionado, $categoriaSeleccionada);
    ?>
        <br>
        <h2><?php echo $categoriaSeleccionada ?></h2>
        <div class="container">
            <?php foreach ($cardsByServicio as $cards): ?>
                <div class="card">
                    <a href='/marketplace/app/controllers/actionsController.php?id_usuario=<?php echo $cards["id_usuario"]; ?>&categoria=<?php echo htmlspecialchars($categoriaSeleccionada) ?>&servicio=<?php echo htmlspecialchars($servicioSeleccionado) ?>'>
                        <img src="<?php echo $cards['imagen']; ?>" data-bs-toggle="tooltipAll" data-bs-placement="top" title="<?php echo $cards['titulo']; ?>">
                    </a>
                    <div class="card-content">
                        <h3 class="card-title"><?php echo $cards['servicio']; ?></h3>
                        <div class='card-info'>
                            <img class="iconoSubmenu" src='/marketplace/public/img/iconos/reader-outline.svg'>
                            <strong>Ofrezco: </strong><?php echo $cards['titulo']; ?><br>
                            <img class="iconoSubmenu" src='/marketplace/public/img/iconos/earth-outline.svg'>
                            <strong>Lugar: </strong><?php echo $cards['municipio']; ?><br>
                            <img class="iconoSubmenu" src='/marketplace/public/img/iconos/cash-outline.svg'>
                            <strong>Precio apróx.: </strong><?php echo $cards['precio']; ?> €
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php
    } else {
        $municipio = $_GET['municipio'];
        $actionController = new ActionController();
        $cardsByMunicipio = $actionController->consultaCardsByMunicipio($municipio);
    ?>
        <br>
        <h2>Categorías / Servicios en <?php echo $municipio ?></h2>
        <div class="container">
            <?php foreach ($cardsByMunicipio as $cards): ?>
                <div class="card">
                    <a href='/marketplace/app/controllers/actionsController.php?id_usuario=<?php echo $cards["id_usuario"]; ?>&categoria=<?php echo $cards["categoria"]; ?>&servicio=<?php echo $cards["servicio"]; ?>'>
                        <img src="<?php echo $cards['imagen']; ?>" data-bs-toggle="tooltipAll" data-bs-placement="top" title="<?php echo $cards['titulo']; ?>">
                    </a>
                    <div class="card-content">
                        <h3 class="card-title"><?php echo $cards['servicio']; ?></h3>
                        <div class='card-info'>
                            <img class="iconoSubmenu" src='/marketplace/public/img/iconos/reader-outline.svg'>
                            <strong>Ofrezco: </strong><?php echo $cards['titulo']; ?><br>
                            <img class="iconoSubmenu" src='/marketplace/public/img/iconos/earth-outline.svg'>
                            <strong>Lugar: </strong><?php echo $cards['municipio']; ?><br>
                            <img class="iconoSubmenu" src='/marketplace/public/img/iconos/cash-outline.svg'>
                            <strong>Precio apróx.: </strong><?php echo $cards['precio']; ?> €
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php } ?>

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

</body>
</html>