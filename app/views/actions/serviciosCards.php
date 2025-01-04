<!-- Cabecera -->
<?php
    include '../../../public/plantillas/cabecera.php'; // Incluir el archivo cabecera.php

    // Datos simulados de categorías (esto normalmente vendría de una base de datos)
$categories = [
    [
        "image" => "/marketplace/public/img/logotipoOriginal.jpg", // URL de imagen de ejemplo
        "title" => "Electricidad",
        "service_type" => "Instalaciones y reparaciones",
        "providers" => 120,
        "average_price" => 50
    ],
    [
        "image" => "/marketplace/public/img/logotipoOriginal.jpg",
        "title" => "Fontanería",
        "service_type" => "Reparaciones de tuberías",
        "providers" => 90,
        "average_price" => 45
    ],
    [
        "image" => "/marketplace/public/img/logotipoOriginal.jpg",
        "title" => "Pintura",
        "service_type" => "Pintura de interiores y exteriores",
        "providers" => 60,
        "average_price" => 30
    ],
    [
        "image" => "/marketplace/public/img/logotipoOriginal.jpg",
        "title" => "Jardinería",
        "service_type" => "Cuidado de jardines",
        "providers" => 75,
        "average_price" => 25
    ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios que se ofrecen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(210, 225, 236);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background-color: #CFD4FC;
            border: 1px solid #162640;
            border-radius: 10px;
            width: calc(25% - 20px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-content {
            padding: 15px;
        }

        .card-title {
            font-size: 18px;
            color: #162640;
            margin: 10px 0;
        }

        .card-service {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
        }

        .card-info {
            font-size: 14px;
            color: #333;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php foreach ($categories as $category): ?>
            <div class="card">
                <img src="<?php echo $category['image']; ?>" alt="<?php echo $category['title']; ?>">
                <div class="card-content">
                    <h3 class="card-title"><?php echo $category['title']; ?></h3>
                    <p class="card-service"><?php echo $category['service_type']; ?></p>
                    <p class="card-info">Número de proveedores: <?php echo $category['providers']; ?></p>
                    <p class="card-info">Precio medio: <?php echo $category['average_price']; ?> €</p>
                </div>
            </div>
        <?php endforeach; ?>
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