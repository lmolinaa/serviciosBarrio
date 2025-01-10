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

   //Usamos esta función para sacar los datos de las cards
    public function consultaCards($servicioSeleccionado, $categoriaSeleccionada){
        //Instanciamos la clase Acciones del modeloAcciones.php para poder llamar a sus métodos
        $modeloAcciones = new Acciones();
       
        //consultamos el método getDatosCards para pintar los datos básicos del servicio seleccionado
       $cardsByServicio = $modeloAcciones->getCardsByServicio($servicioSeleccionado, $categoriaSeleccionada);
       return $cardsByServicio;  
    }
     
    public function consultaCardsByMunicipio($municipio){
        //Instanciamos la clase Acciones del modeloAcciones.php para poder llamar a sus métodos
        $modeloAcciones = new Acciones();

        //consultamos el método getDatosCards para pintar los datos básicos del servicio seleccionado
        $cardsByMunicipio = $modeloAcciones->getCardsByMunicipio($municipio);
        
        return $cardsByMunicipio;
    }

    //Usamos esta función para sacar el detalle del usuario que ofrece un servicio
    public static function consultaCardsDetalle($id_usuario, $servicioSeleccionado, $categoriaSeleccionada, $isUbicacion){
        // Iniciar la sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //Instanciamos la clase Acciones del modeloAcciones.php para poder llamar a sus métodos
        $modeloAcciones = new Acciones();
       
        //consultamos el método getDetalleByCard para pintar los detalles del usuario
       $detalleByCard = $modeloAcciones->getDetalleByCard($id_usuario, $servicioSeleccionado, $categoriaSeleccionada);
        
       /* Guardamos los datos en la sesión por seguridad y porque son muchos datos los que van a viajar
        a otra php distinta de la que le ha llamado al controller*/
        $_SESSION['detalleByCard'] = $detalleByCard;
        $_SESSION['isUbicacion'] = $isUbicacion;

        // Redirige a la página destino
        header("Location: /marketplace/app/views/actions/detalleServicio.php");
        exit();  
    }

    public static function busarPalabrasIndex($buscarPalabras){
         // Iniciar la sesión si no está iniciada
         if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        //Instanciamos la clase Acciones del modeloAcciones.php para poder llamar a sus métodos
        $modeloAcciones = new Acciones();
        $buscarPalabrasByCards = $modeloAcciones->getBuscarPalabrasByCards($buscarPalabras);
        
        //Metemos en la session todo lo que nos venga de la búsqueda (es más seguro)
        $_SESSION['buscarPalabrasByCards'] = $buscarPalabrasByCards;
        //Redirige a la página destino
        header("Location: /marketplace/app/views/actions/buscarServiciosCards.php");
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
        } else if (isset($_GET['id_usuario'])) {
            $id_usuario = $_GET['id_usuario'];
            $servicioSeleccionado = $_GET['servicio'];
            $categoriaSeleccionada = $_GET['categoria'];
            $isUbicacion = $_GET['isUbicacion'];
            ActionController::consultaCardsDetalle($id_usuario, $servicioSeleccionado, $categoriaSeleccionada, $isUbicacion);
        } else if (isset($_GET['buscarPalabras'])) {
            $buscarPalabras = $_GET['buscarPalabras'];
            ActionController::busarPalabrasIndex($buscarPalabras);
        }
    }
?>