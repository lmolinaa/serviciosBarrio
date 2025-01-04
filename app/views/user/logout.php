    <!-- Cabecera -->
    <?php
    include '../../../public/plantillas/cabecera.php'; // Incluir el archivo cabecera.php
    //Llamamos a la función logoutUser para cerrar la sesión.
    logoutUser();
    ?>
<div class="container mt-5 text-center">
        <div class="alert alert-warning">
            <strong>Sesión cerrada.</strong>
        </div>
    <a href="/marketplace" class="btn btn-primary">Volver al Home</a>
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