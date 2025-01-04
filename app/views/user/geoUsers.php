<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubicación</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

</head>
<body>

<?php
// Verifica tiempo de inactividad
verifySession();
require_once '../../models/consultaCP.php'; //Este sistema no me gusta, ataca directamente al modelo (buscar cambio)
require_once '../../controllers/actionsController.php';
$actionController = new ActionController();
$municipios = $actionController->consultaMunicipios();
?>

<div class="containerMap">
    <div id="map"></div>
        <div class="info">
        <!-- Contenedor para la ubicación con un enlace a Google Maps -->
        <strong>Ubicación del Usuario Detectada:</strong>
            <!-- Datos de ubicación del usuario -->
            <div id="postalCode">
                <strong>Código Postal:</strong> <span>No disponible</span>
            </div>
            <div id="city">
                <strong>Ciudad:</strong> <span>No disponible</span>
            </div>
            <div id="location">
            <strong>Googel Maps:</strong><span id="coords">Desconocida</span>
            </div>

    <!-- Desplegable con los códigos postales de Alcorcón -->
    <div id="postalCodesDropdown">
        <strong>Selecciona un Código Postal dónde quieras buscar:</strong>
        
        <img width="24px" height="24" src="/marketplace/public/img/iconos/help-circle-outline.svg" 
        data-bs-toggle="tooltipAll" data-bs-placement="top" title="Si seleccionas otro código postal, distinto del del mapa, te llevaremos a 'BuscarOfrecer Servicios' cercanos al elegido.">
    
        <br>
        <select id="resultadoCP"></select>
        <select id="municipios" onchange="changeCity()">
        <option id='localidad'></option>
            <?php
                foreach ($municipios as $municipio) {?>
                    <option value="<?php echo $municipio['municipio']; ?>"><?php echo $municipio['municipio']; ?></option>
            <?php }  
            ?>
        </select>
        <a href="javascript:getSelectedValue()">
        <img width="24px" height="24" src="/marketplace/public/img/iconos/earth-outline.svg"
        data-bs-toggle="tooltipAll" data-bs-placement="top" title="Ver en el mapa.">
        </a>
        </div>
    </div>
</div>

    <!-- Script de geolocalización para los usuarios -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> 
    <script src="/marketplace/public/js/geolocalizacion.js"></script>
   
</body>
</html>
