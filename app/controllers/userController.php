<?php
//Controlamos que la session no esté activa
if (session_status() == PHP_SESSION_NONE) {
    include __DIR__ . '/../config/session.php';
}
include __DIR__ . '/../models/modeloUsers.php';
include __DIR__ . '/../models/modeloAcciones.php';

class UserController {
    public static function create() {
        $logFile = '/marketplace/logs/userController.log';
        //Datos básicos recibidos del formulario de alta
        $nombre = $_POST['nombre'] ?? '';
        $apellido = $_POST['apellido'] ?? '';
        $email = $_POST['email'] ?? '';
        $telefono = $_POST['telefono'] ?? '';
        $pais = $_POST['pais'] ?? '';
        $direccion = $_POST['direccion'] ?? '';
        $municipio = $_POST['listMunicipios'] ?? '';
        $codigo_postal = $_POST['resultadoCP'] ?? '';
        $password = $_POST['password'] ?? '';
        $id_rol = $_POST['id_rol'] ?? ''; 

        //Datos extra del usuario ofrezco 
        $categoria = $_POST['categoria'] ?? ''; 
        $servicio = $_POST['servicio'] ?? ''; 
        $titulo = $_POST['titulo'] ?? ''; 
        $fecha = $_POST['fecha'] ?? ''; 
        $detalle = $_POST['detalle'] ?? ''; 
        $file = $_POST['file'] ?? '';  
        $precio = $_POST['precio'] ?? ''; 
        $serviceMunicipio = $_POST['serviceMunicipio'] ?? ''; 
        $imagen = $_POST['imagen'] ?? ''; 
        $relativePathImg = "";

        //Para la carga de la imagen
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/marketplace/public/files/images/';
        $uploadFile = $uploadDir . basename($_FILES['imagen']['name']);
    
        //Verificamos si la carpeta existe, y la creamos si no
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        //Movemos el archivo subido a la carpeca correcta
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadFile)) {
            // Guardar la ruta en la base de datos
            $relativePathImg = '/marketplace/public/files/images/' . basename($_FILES['imagen']['name']);
            echo "Imagen subida con éxito: $uploadFile";
        } else {
            echo "Error al subir la imagen.";
        }

        /*var_dump($_POST . "\n");
        die();*/

        // Validar datos obligatorios aunque se controla por javascript en el from
        if (empty($nombre) || empty($email) || empty($password)) {
            die('Nombre, email y contraseña son obligatorios.');
        }

        // Validar formato del email aunque se controla por javascript en el from
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die('El formato del email no es válido.');
        }

        //Crear un nuevo usuario
        include '../models/createUsers.php';
             
        // Registrar log de creación de usuario
        $logMessage = date('Y-m-d H:i:s') . " userController -> create: - Usuario " . $nombre . " creado\n";
        file_put_contents($logFile, $logMessage, FILE_APPEND);
        header("Location: ../views/actions/dashboard.php");
        exit();
    }

    public static function checkUserExists() {
        $logFile = '/marketplace/logs/userController.log';
        $nombre = $_POST['nombre'] ?? '';
        $email = $_POST['email'] ?? '';
  
        // Incluir modelo para verificar usuario
        include '../models/checkUsers.php';
        
        // Registrar log de verificación de usuario
        $logMessage = date('Y-m-d H:i:s') . " userController -> checkUserExists: Verificación de usuario " . $nombre . " Email " . $email . "\n";
        file_put_contents($logFile, $logMessage, FILE_APPEND);
        
        echo json_encode(['success' => true, 'redirect' => '/marketplace/app/views/actions/buscoOfrezco.php']);
        exit();
    }

    public function consultaDatosUser($id_usuario){
        $logFile = '/marketplace/logs/userController.log';
        $modeloUsers = new Users();
        $modeloAcciones = new Acciones();
        
        /*echo $id_usuario;
        die();*/
        
       //Consultamos por todos los datos del usuario
       $allDataUser = $modeloUsers->getDataUser($id_usuario);
       //consultamos por todos municipios existentes en nuestra base de datos
       $allMunicipios = $modeloAcciones->getMunicipios();
       
        // Devolver ambos arrays en un array asociativo
        return [
            'allDataUser' => $allDataUser,
            'allMunicipios' => $allMunicipios
        ];
    }

    public static function updateUser(){
        $logFile = '/marketplace/logs/userController.log';
        //Datos básicos recibidos del formulario update
        $datosUsuario = [
            "nombre" => $_POST['nombre'],
            "apellido"=> $_POST['apellido'],
            "email" =>$_POST['email'],
            "telefono" => $_POST['telefono'],
            "pais" => $_POST['pais'],
            "direccion" => $_POST['direccion'],
            "municipio" => $_POST['localidad'],
            "codigo_postal" => $_POST['resultadoCP'],
            "password" => $_POST['password'],
            "id_rol" => $_POST['id_rol'],
            "id_usuario" => $_POST['id_usuario']
        ];

        //Modificar usaurio
        $modeloUsers = new Users();
        $modifOK=$modeloUsers->updateDataUser($datosUsuario);
        
        /*echo $modifOK;
        die();*/

        // Registrar log de verificación de usuario
        $logMessage = date('Y-m-d H:i:s') . " userController -> updateUser: - Verificación de usuario " . $datosUsuario['nombre'] . " Email " . $datosUsuario['email'] . "\n";
        file_put_contents($logFile, $logMessage, FILE_APPEND);
        
        if ($modifOK===true){
            header("Location: ../views/administracion/configUser.php?id_usuario=" . $datosUsuario['id_usuario'] . "&mensaje=Actualización satisfactoria");
            exit();
        }else{
            header("Location: ../views/administracion/configUser.php?mensaje=Se ha producido un error en la modificación del usuario.");
            exit(); 
        }
    }
}

// Manejo de solicitudes dependerá de lo que llegue en el action se hara una cosa u otra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;

    switch ($action) {
        case 'create':
            UserController::create();
            break;

        case 'checkUserExists':
            UserController::checkUserExists();
            break;

        case 'update':
            UserController::updateUser();
            break;

        /*case 'delete':
            UserController::deleteUser();
            break;*/

        default:
            echo "Acción no válida.";
            break;
    }
}

?>