<?php
$logFile = __DIR__ . '/../../logs/actionController.log';
include __DIR__ . '/../models/modeloAcciones.php';

class ActionController {
    public static function consultaCP() {
        include __DIR__ . '/../models/consultaCP.php';
        
        //Registrar log de la operación
        global $logFile;
        $logMessage = date('Y-m-d H:i:s') . " actionController - CP " . json_encode($codigosPostales) . "\n";
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    
        //Devolver los resultados como JSON
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'codigosPostales' => $codigosPostales]);
        exit();
    }

    public function consultaMunicipios() {
        //Instanciamos la clase Acciones del modeloAcciones.php para poder llamar a sus métodos
        $modeloAcciones = new Acciones();
       
        //consultamos por todos municipios existentes en nuestra base de datos
       $allCities = $modeloAcciones->getMunicipios();
       return $allCities;  
    }

    public static function consultaCPbyCity($municipio) {
        global $logFile;
        //Instanciamos la clase Acciones del modeloAcciones.php para poder llamar a sus métodos
        $modeloAcciones = new Acciones();
       
        //consultamos los códigos postales por municipio
       $cpCity = $modeloAcciones->getCpByMunicipio($municipio);

       $logMessage = date('Y-m-d H:i:s') . " actionController - CP del Municipio: " . json_encode($cpCity) . "\n";
       file_put_contents($logFile, $logMessage, FILE_APPEND);
       
       // Devolver los resultados como JSON
       header('Content-Type: application/json');

       echo json_encode(['success' => true, 'codigosPostales' => $cpCity]);
       exit();
   }
}

// Manejo de solicitudes
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['codigoPostal'])) {
            $codigoPostal = $_POST['codigoPostal'];
            ActionController::consultaCP();
        } else if (isset($_POST['city'])) {
            $selectedCity = $_POST['city'];
            // Llamar a la función para manejar la ciudad seleccionada
            ActionController::consultaCPbyCity($selectedCity);
        } 
    } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['city'])) {
            $selectedCity = $_GET['city'];
            // Llamar a la función para manejar la ciudad seleccionada
            ActionController::consultaCPbyCity($selectedCity);
        } 
    }
?>