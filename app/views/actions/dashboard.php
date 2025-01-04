<!-- Cabecera -->
<?php
    include '../../../public/plantillas/cabecera.php'; // Incluir el archivo cabecera.php

    //Incluimos el mapa de la ubicación del usuario   
    include '../../views/user/geoUsers.php';
?>

<script src="/marketplace/public/js/geolocalizacion.js"></script>

<div class="centrarB">
    <!--<a href="../../views/user/viewUsersList.php" class="btn btn-primary">Ver  lista de usuarios</a>-->
    <a href="./buscoOfrezco.php" class="btn btn-primary">Buscar/Ofrecer Servicios</a>
</div>

    <!-- Pie de página -->
    <footer>
        <p>
            <?php
                include '../../../public/plantillas/pie.php';
            ?>
        </p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>