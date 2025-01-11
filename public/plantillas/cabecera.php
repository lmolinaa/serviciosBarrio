<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <!-- Bootstrap y CSS -->
    <link rel="stylesheet" href="../../../public/css/cabecera.css">
   
    <link rel="stylesheet" href="../../../public/css/pie.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 

    <script type="text/javascript" src="../../../public/js/controlObligatorio.js"></script>
</head>

<body>
<?php
include_once __DIR__ . '/../../app/config/session.php';

/*Usamos el json para iterar las categorías y mostrarlas en el menú
Lo ponemos en la cabecera para que esté disponible en toda la web*/
$jsonFile = __DIR__ . '/../files/servicios.json';

// Leer y decodificar el JSON
$jsonData = file_get_contents($jsonFile);
$servicios = json_decode($jsonData, true); // Decodificamos como array asociativo

$permisosEdit = "";
$usuarioS = "";
$emailS = "";
$id_usuario = "";
// Verifica la sesión del usuario
if (isset($_SESSION['email']) ?? '') {
    verifySession();
   //llamo a la checkAccess para controlar lo que puede ver el usuario en función del rol
   $permisosEdit = checkAccess('edit_content'); // Verificar los permisos del usuario}
   $usuarioS = $_SESSION['nombre'];
   $emailS = $_SESSION['email'];
   $id_usuario = $_SESSION['id_usuario'];
}
?>

<!-- Cabecera -->
<header>
    <img src="/marketplace/public/img/logotipo-sinFondo.png" alt="MarketPlace Logo">
    <h3><strong><i>Bringing people together</i></strong></h3>
<nav>
    <ul class="menu">
        <li class="tab"><a href="/marketplace"><img class="iconoMenu" src='/marketplace/public/img/iconos/home-outline.svg'> Home</a></li>
        <li class="dropdown"><a href="/marketplace/app/views/actions/buscoOfrezco.php"><img class="iconoMenu" src='/marketplace/public/img/iconos/server-outline.svg'>Busco/Ofrezco Servicio</a>
            <ul class="submenu">
                <li><a href="/marketplace/app/views/actions/dashboard.php"><img class="iconoSubmenu" src='/marketplace/public/img/iconos/earth-outline.svg'>Por ubicación</a></li>
                <?php
                    // Iterar sobre las categorías
                    foreach ($servicios as $categoria => $listaServicios) {
                        if (is_string($categoria)) {
                            // Generar el enlace con urlencode
                            $categoriaUrl = urlencode($categoria);
                            $categoriaTexto = ucfirst(str_replace("_", " ", htmlspecialchars($categoria)));
                            echo "<li><a href=\"/marketplace/app/views/actions/buscoOfrezco.php?categoria=$categoriaUrl\"><img class='iconoSubmenu' src='/marketplace/public/img/iconos/checkmark-circle-outline.svg'>$categoriaTexto</a></li>";
                        }
                    }
                ?>               
            </ul>
        </li>
        <li class="tab"><a href="/marketplace/app/views/actions/aboutOf.php"><img class="iconoMenu" src='/marketplace/public/img/iconos/information-circle-outline.svg'>Acerca de</a></li>
        <li class="dropdown">
        <?php
        if (!$usuarioS){    
            echo "<a href='#'><img class='iconoMenu' src='/marketplace/public/img/iconos/person-circle-outline.svg'>Usuarios</a>";
        } else {
            echo "<a href='#'><img class='iconoMenu' src='/marketplace/public/img/iconos/person-circle-outline.svg'>$usuarioS</a>";
        } 
        echo "<ul class='submenu'>";
            if (!$emailS){
            echo "<li><a href='#' data-bs-toggle='modal' data-bs-target='#loginModal'><img class='iconoSubmenu' src='/marketplace/public/img/iconos/log-in-outline.svg'>Soy usuario</a></li>";
            echo "<li><a href='/marketplace/app/views/user/formCreateUsers.php'><img class='iconoSubmenu' src='/marketplace/public/img/iconos/person-add-outline.svg'>Crear cuenta</a></li>";
            } else {
                if ($permisosEdit){
                    echo "<li><a href='/marketplace/app/views/administracion/viewUsersList.php'><img class='iconoSubmenu' src='/marketplace/public/img/iconos/id-card-outline.svg'>Lista de usuarios</a></li>";
                    echo "<li><a href='/marketplace/app/views/user/formCreateUsers.php'><img class='iconoSubmenu' src='/marketplace/public/img/iconos/person-add-outline.svg'>Nueva cuenta</a></li>";
                }
            echo "<li><a href='/marketplace/app/views/administracion/configUser.php?usuario=$id_usuario'><img class='iconoSubmenu' src='/marketplace/public/img/iconos/construct-outline.svg' data-bs-toggle='tooltipAll' data-bs-placement='top' title='Configuración de la cuenta'>$emailS</a></li>";
            echo "<li><a href='/marketplace/app/views/user/logout.php?mensaje=La sesión se ha cerrado correctamente.'><img class='iconoSubmenu' src='/marketplace/public/img/iconos/log-out-outline.svg'>Cerrar sesión</a></li>";
            }
        ?>
            </ul>
        </li>
        <li class="tab"><a href="/marketplace/app/views/actions/formContact.php"><img class="iconoMenu" src='/marketplace/public/img/iconos/mail-open-outline.svg'>Contacto</a></li>
    </ul>
</nav>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
