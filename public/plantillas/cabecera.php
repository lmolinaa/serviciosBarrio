<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <!-- Bootstrap y CSS -->
    <!--<link rel="stylesheet" href="../../../public/css/bootstrap5.3.css">-->
    <link rel="stylesheet" href="../../../public/css/cabecera.css">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="../../../public/css/pie.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
</head>

<body>
<?php
include_once __DIR__ . '/../../app/config/session.php';

//Usamos el json para iterar las categorías y mostrarlas en el menú
$jsonFile = __DIR__ . '/../files/servicios.json';

// Leer y decodificar el JSON
$jsonData = file_get_contents($jsonFile);
$servicios = json_decode($jsonData, true); // Decodificamos como array asociativo

$controlSesion = false;
// Verifica la sesión del usuario
if (isset($_SESSION['email']) ?? '') {
    verifySession();
    $controlSesion = true;
    $admin = $_SESSION['rol'] == 'administrador';
}
?>

<!-- Cabecera -->
<header>
    <img src="/marketplace/public/img/logotipo-sinFondo.png" alt="MarketPlace Logo">
    <h3><strong>MarketPlace, tu plataforma de servicios</strong></h3>
    <nav>
        <ul class="menu">
            <li class="tab"><a href="/marketplace"><img width="24px" height="24" src='/marketplace/public/img/iconos/home-outline.svg'> Home</a></li>
            <li class="dropdown"><a href="/marketplace/app/views/actions/buscoOfrezco.php"><img width="24px" height="24" src='/marketplace/public/img/iconos/server-outline.svg'>Busco/Ofrezco Servicio</a>
                <ul class="submenu">
                <?php
                    //Iterar sobre las categorías
                    foreach ($servicios as $categoria => $listaServicios) {

                        if (is_string($categoria)) {
                            // Generar el enlace con urlencode
                            $categoriaUrl = urlencode($categoria);
                            $categoriaTexto = ucfirst(str_replace("_", " ", htmlspecialchars($categoria)));
                            echo "<li><a href=\"/marketplace/app/views/actions/buscoOfrezco.php?categoria=$categoriaUrl\">$categoriaTexto</a></li>";
                        }
                    }
                ?>               
                </ul>
            </li>
          
            <li class="tab"><a href="/marketplace/app/views/actions/formContact.php"><img width="24px" height="24" src='/marketplace/public/img/iconos/mail-open-outline.svg'>Contacto</a></li>
            <li class="tab"><a href="/marketplace/app/views/actions/formAbout.php"><img width="24px" height="24" src='/marketplace/public/img/iconos/information-circle-outline.svg'>Acerca de</a></li>
            <li class="dropdown">
                <a href="#"><img width="24px" height="24" src='/marketplace/public/img/iconos/person-circle-outline.svg'>Usuarios</a>
                <ul class="submenu">
                <?php
                    if (!$controlSesion){ 
                        echo "<li><a href='#' data-bs-toggle='modal' data-bs-target='#loginModal'><img width='24px' height='24' src='/marketplace/public/img/iconos/log-in-outline.svg'>Soy usuario</a></li>";
                        echo "<li><a href='/marketplace/app/views/user/formCreateUsers.php'><img width='24px' height='24' src='/marketplace/public/img/iconos/person-add-outline.svg'>Crear cuenta</a></li>";
                    } 
                    if ($controlSesion){
                        if ($admin) {
                            echo "<li><a href='/marketplace/app/views/administracion/viewUsersList.php'><img width='24px' height='24' src='/marketplace/public/img/iconos/id-card-outline.svg'>Lista de usuarios</a></li>";
                        }
                        echo "<li><a href='/marketplace/app/views/user/logout.php'><img width='24px' height='24' src='/marketplace/public/img/iconos/log-out-outline.svg'>Cerrar sesión</a></li>";
                    }
                ?>
                </ul>
            </li>
        </ul>
    </nav>
</header>