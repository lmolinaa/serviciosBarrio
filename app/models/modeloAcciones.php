<?php
require_once __DIR__ . './../helpers/db.php';

class Acciones {
    public function getMunicipios() {
        $logFile = __DIR__ . '/../../logs/modeloAcciones.log';
        $db = Database::connect();
        $query = "SELECT DISTINCT municipio FROM codigos_postales ORDER BY municipio";
        $stmt = $db->prepare($query);

         try {
            $stmt->execute();
            $municipios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $municipios;
        } catch (PDOException $e) {
            $logMessage = date('Y-m-d H:i:s') . " Consulta fallida: " . $query . "\n";
            file_put_contents($logFile, $logMessage, FILE_APPEND);
            return false;
        }       
    }

    public function getCpByMunicipio($municipio){
        $logFile = __DIR__ . '/../../logs/modeloAcciones.log';
        $db = Database::connect();
        $query = "SELECT codigo_postal, municipio FROM codigos_postales WHERE municipio = :municipio ORDER BY codigo_postal";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':municipio', $municipio, PDO::PARAM_STR);

        try {
            $stmt->execute();
            $cpCity = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cpCity;
        } catch (PDOException $e) {
            $logMessage = date('Y-m-d H:i:s') . " Consulta fallida: " . $query . "\n";
            file_put_contents($logFile, $logMessage, FILE_APPEND);
            return false;
        }  
    }

    public function getCardsByServicio($servicioSeleccionado, $categoriaSeleccionada){
        $logFile = __DIR__ . '/../../logs/modeloAcciones.log';
        $db = Database::connect();
        $query = "SELECT * FROM usuario_ofrece WHERE categoria = :categoria AND servicio = :servicio ORDER BY fecha";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':categoria', $categoriaSeleccionada, PDO::PARAM_STR);
        $stmt->bindParam(':servicio', $servicioSeleccionado, PDO::PARAM_STR);
        
        try {
            $stmt->execute();
            $cardsByServicio = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cardsByServicio;
        } catch (PDOException $e) {
            // Registrar la consulta y los parámetros en el log si hay error
            $logMessage = date('Y-m-d H:i:s') . " Consulta fallida: " . $query . " - Params: " . json_encode([':categoria' => $categoriaSeleccionada, ':servicio' => $servicioSeleccionado]) . " - Error: " . $e->getMessage() . "\n";
            file_put_contents($logFile, $logMessage, FILE_APPEND);
            return false;
        }
    }

    public function getCardsByMunicipio($municipio){
        $logFile = __DIR__ . '/../../logs/modeloAcciones.log';
        $db = Database::connect();
        $query = "SELECT * FROM usuario_ofrece WHERE municipio = :municipio ORDER BY fecha";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':municipio', $municipio, PDO::PARAM_STR);
        
        try {
            $stmt->execute();
            $cardsByMunicipio = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cardsByMunicipio;
        } catch (PDOException $e) {
            // Registrar la consulta y los parámetros en el log si hay error
            $logMessage = date('Y-m-d H:i:s') . " Consulta fallida: " . $query . " - Params: " . json_encode([':municipio' => $municipio]) . " - Error: " . $e->getMessage() . "\n";
            file_put_contents($logFile, $logMessage, FILE_APPEND);
            return false;
        }

    }

    public function getDetalleByCard($id_usuario, $servicioSeleccionado, $categoriaSeleccionada){
        $logFile = __DIR__ . '/../../logs/modeloAcciones.log';
        $db = Database::connect();
        $query = "SELECT
                                a.id_usuario, a.categoria, a.servicio, a.titulo, a.detalle, a.imagen, a.fecha, a.precio, a.municipio,
                                b.email, b.telefono,
                                c.nombre, c.apellido
                                FROM usuario_ofrece a 
                                INNER JOIN datos_personales b ON a.id_usuario = b.id_usuario
                                INNER JOIN usuarios c ON a.id_usuario = c.id_usuario
                                WHERE a.id_usuario = :id_usuario AND a.categoria = :categoria AND a.servicio = :servicio";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
        $stmt->bindParam(':categoria', $categoriaSeleccionada, PDO::PARAM_STR);
        $stmt->bindParam(':servicio', $servicioSeleccionado, PDO::PARAM_STR);
        
        try{
            $stmt->execute();
            $detalleByCard = $stmt->fetchAll(PDO::FETCH_ASSOC);
            /*$logMessage = date('Y-m-d H:i:s') . " Consulta fallida: " . $query . "\n" . "id Usuarios: " . $id_usuario . " Servicio: " .  $servicioSeleccionado . " Categoria: " . $categoriaSeleccionada . "\n";
            file_put_contents($logFile, $logMessage, FILE_APPEND);*/
            return $detalleByCard;
        } catch (PDOException $e){
            $logMessage = date('Y-m-d H:i:s') . " Consulta fallida: " . $query . "\n";
            file_put_contents($logFile, $logMessage, FILE_APPEND);
            return false;
        }
    }  

}