<!-- Cabecera -->
<link rel="stylesheet" href="/marketplace/public/css/cardsStyle.css">
<?php
    include '../../../public/plantillas/cabecera.php'; // Incluir el archivo cabecera.php
    if (isset($_SESSION['buscarPalabrasByCards']) ?? '') {
        $buscarPalabrasByCards = $_SESSION['buscarPalabrasByCards'];
        //print_r($buscarPalabrasByCards);
        /*echo "Sí hay datos";
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';*/
    } else {
        echo "No hay datos";
        //print_r($buscarPalabrasByCards);
    }
    ?>
   
   <br>
        <h2><a href="./buscoOfrezco.php">    
            <img class="iconoMenu" src='/marketplace/public/img/iconos/play-skip-back-outline.svg' data-bs-toggle="tooltipAll" data-bs-placement="top" title='Volver a la pantalla anterior.'>
        Categorías / Servicios</a></h2>
        
        <div class="container">
            <?php foreach ($buscarPalabrasByCards as $cards): ?>
                <div class="card">
                    <a href='/marketplace/app/controllers/actionsController.php?id_usuario=<?= htmlspecialchars($cards["id_usuario"]) ?>&categoria=<?= htmlspecialchars($cards["categoria"]) ?>&servicio=<?= htmlspecialchars($cards["servicio"]) ?>&isUbicacion=false'>
                        <img src="<?= htmlspecialchars($cards['imagen']) ?>" data-bs-toggle="tooltipAll" data-bs-placement="top" title="<?= htmlspecialchars($cards['titulo']) ?>">
                    </a>
                    <div class="card-content">
                        <h3 class="card-title"><?= htmlspecialchars($cards['servicio']) ?></h3>
                        <div class='card-info'>
                            <img class="iconoSubmenu" src='/marketplace/public/img/iconos/reader-outline.svg'>
                            <strong>Ofrezco: </strong><?= htmlspecialchars($cards['titulo']) ?><br>
                            <img class="iconoSubmenu" src='/marketplace/public/img/iconos/earth-outline.svg'>
                            <strong>Lugar: </strong><?= htmlspecialchars($cards['municipio']) ?><br>
                            <img class="iconoSubmenu" src='/marketplace/public/img/iconos/cash-outline.svg'>
                            <strong>Precio apróx.: </strong><?= htmlspecialchars($cards['precio']) ?> €
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
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

</body>
</html>