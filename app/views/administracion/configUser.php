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
 $id_usuario = ""; //Si get es '' el listado permanece cerrado
 if (isset($_GET['usuario'])) {
    $id_usuario = $_GET['usuario']; 
    //$categoria = str_replace('_', ' ', $categoria); // Reemplazar guiones bajos por espacios
}

echo $id_usuario;

?>

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