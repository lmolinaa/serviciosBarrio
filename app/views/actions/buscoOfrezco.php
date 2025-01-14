<!-- Cabecera -->
<?php
    include '../../../public/plantillas/cabecera.php'; // Incluir el archivo cabecera.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de categorías/servicios</title>
    <link rel="stylesheet" href="/marketplace/public/css/style.css">
</head>
<body>

<?php
//Verificar si el parámetro 'categoria' está presente en la URL (ocurre cuando es llamado desde el menú superior)
 $categoria = ""; //Si get es '' el listado permanece cerrado
 if (isset($_GET['categoria'])) {
    $categoria = trim(urldecode($_GET['categoria'])); // Decodificar el valor
    $categoria = str_replace('_', ' ', $categoria); // Reemplazar guiones bajos por espacios
}
$permisos = '';
if (isset($_SESSION['rol']) == "administrador") {
    $permisos = $_SESSION['rol'];
}

    if ($servicios) {
        echo '<div class="container mt-5 formu">';
        echo '<h2 class="text-center">Listado de Servicios</h2>';
        echo '<div class="accordion-container">';
        echo '<div class="align-right"><br>
                <a href="./dashboard.php">
                    <img class="iconoSubmenu" src="/marketplace/public/img/iconos/earth-outline.svg">
                    Buscar por ubicación
                </a>
              </div><br>';
        foreach ($servicios as $nombreCategoria => $listaServicios) {
            //Validar que la categoría sea un string
            if (is_string($nombreCategoria)) {
            //Mostramos el nombre de la categoría
            $categoriaProcesada = ucfirst(str_replace("_", " ", htmlspecialchars($nombreCategoria)));
            

            // Comparar con el valor de la categoría recibida por GET
            $isOpen = (strcasecmp($categoria, $categoriaProcesada) === 0) ? ' open' : '';

            echo '<details' . $isOpen . '>'; // Añadir el atributo open si coincide
            echo '<summary>';
            if ($permisos==="administrador") {
            echo '&nbsp;&nbsp;
            <a href="#"><img class="iconoMenu" src="/marketplace/public/img/iconos/add-circle-outline.svg" data-bs-toggle="tooltipAll" data-bs-placement="top" title="Añadir Servicio"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                . ucfirst(str_replace('_', ' ', htmlspecialchars($nombreCategoria)));
            }else{
                echo ucfirst(str_replace('_', ' ', htmlspecialchars($nombreCategoria)));
            }
            echo '</summary>';
                //Validar que la lista de servicios sea un array
                if (is_array($listaServicios)) {
                    echo '<ul>';
                    foreach ($listaServicios as $servicio) {
                        //Validar que el servicio sea un string antes de mostrarlo
                        if (is_string($servicio)) {
                            echo '<li>';
                            if ($permisos==="administrador"){
                                /******************* Está pendiente de desarrollar el edit y el delete ************** */
                                echo '&nbsp;&nbsp;<a href="/marketplace/app/views/actions/editService.php?categoria=' . urlencode($nombreCategoria) . '&servicio=' . urlencode($servicio) . '"><img class="iconoMenu" src="/marketplace/public/img/iconos/pencil-outline.svg" data-bs-toggle="tooltipAll" data-bs-placement="top" title="Editar"></a>';
                                echo '&nbsp;&nbsp;&nbsp;<a href="/marketplace/app/views/actions/deleteService.php?categoria=' . urlencode($nombreCategoria) . '&servicio=' . urlencode($servicio) . '"><img class="iconoMenu" src="/marketplace/public/img/iconos/trash-outline.svg" data-bs-toggle="tooltipAll" data-bs-placement="top" title="Eliminar"></a>';
                            }
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="./serviciosCards.php?servicio=' . htmlspecialchars($servicio) . '&categoria=' . htmlspecialchars($nombreCategoria) . '">' . htmlspecialchars($servicio) . '</a></li>';
                        } else {
                            echo '<li>Elemento no válido</li>';
                        }
                    }
                    echo '</ul>';
                } else {
                    echo '<p>Lista de servicios no válida</p>';
                }
                echo '</details>';
            }
        }
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