<!-- Cabecera -->
<?php
    include '../../../public/plantillas/cabecera.php'; // Incluir el archivo cabecera.php

        /*echo "Nombre: " . $_SESSION['nombre'] . " - ";
        echo "Rol: " . $_SESSION['rol'] . " - ";
        echo "Email: " . $_SESSION['email'] . "<br>";*/

if ($servicios) {
    echo '<div class="container mt-5">';
    echo '<h2 class="text-center">Listado de Servicios</h2>';
    echo '<div class="table-container">';
    echo '<table class="tableUsers table-bordered table-hover">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Categoría</th>';
    echo '<th>Servicios</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($servicios as $categoria => $listaServicios) {
        // Validar que la categoría sea un string
        if (is_string($categoria)) {
            echo '<tr>';
            echo '<td colspan="2" class="fw-bold"><a href="#">' . ucfirst(str_replace('_', ' ', htmlspecialchars($categoria))) . '</a></td>';
            echo '</tr>';
            // Validar que la lista de servicios sea un array
            if (is_array($listaServicios)) {
                foreach ($listaServicios as $servicio) {
                    // Validar que el servicio sea un string antes de mostrarlo
                    if (is_string($servicio)) {
                        echo '<tr>';
                        echo '<td></td>'; // Celda vacía para alinear los servicios
                        echo '<td><a href="#">' . htmlspecialchars($servicio) . '</a></td>';
                        echo '</tr>';
                    } else {
                        echo '<tr>';
                        echo '<td></td>'; // Celda vacía para alinear los servicios
                        echo '<td>Elemento no válido</td>';
                        echo '</tr>';
                    }
                }
            } else {
                echo '<tr>';
                echo '<td></td>'; // Celda vacía para alinear los servicios
                echo '<td>Lista de servicios no válida</td>';
                echo '</tr>';
            }
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
} else {
    echo "No se pudo cargar la lista de servicios.";
}
?>
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
</body>
</html>