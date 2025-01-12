<?php
require_once __DIR__ . './../helpers/db.php';

class Users {
    public function getDataUser($id_usuario) {
        $logFile = __DIR__ . '/../../logs/modeloUsers.log';
        $db = Database::connect();
        $query = "SELECT a.id_usuario, a.nombre, a.apellido, a.id_rol, a.password, b.direccion,
                        c.nombre_rol, b.email, b.telefono, b.municipio, b.codigo_postal, b.pais
                    FROM marketplace.usuarios a
                    INNER JOIN marketplace.datos_personales b ON a.id_usuario = b.id_usuario
                    INNER JOIN marketplace.roles c ON a.id_rol = c.id_rol
                    WHERE a.id_usuario = :id_usuario";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);

         try {
            $stmt->execute();
            $allDataUser = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $allDataUser;
        } catch (PDOException $e) {
            $logMessage = date('Y-m-d H:i:s') . " Consulta fallida: " . $query . "\n";
            file_put_contents($logFile, $logMessage, FILE_APPEND);
            return false;
        }       
    }

    public function updateDataUser($datosUsuario) {
        $logFile = __DIR__ . '/../../logs/modeloUsers.log';
        $db = Database::connect();
        
        try {
            // Iniciar la transacción
            $db->beginTransaction();
    
            // Update para tabla usuarios
            $queryUsuarios = "UPDATE usuarios SET
                                nombre = :nombre,
                                apellido = :apellido,
                                id_rol = :id_rol,
                                password = :password
                              WHERE id_usuario = :id_usuario";
            
            $stmtUsuario = $db->prepare($queryUsuarios);
            $stmtUsuario->execute([
                ':nombre' => $datosUsuario['nombre'],
                ':apellido' => $datosUsuario['apellido'],
                ':id_rol' => $datosUsuario['id_rol'],
                ':password' => $datosUsuario['password'],
                ':id_usuario' => $datosUsuario['id_usuario']
            ]);
    
            // Update para tabla datos_personales
            $queryDatosPersonales = "UPDATE datos_personales SET
                                        codigo_postal = :codigo_postal,
                                        direccion = :direccion,
                                        email = :email,
                                        telefono = :telefono,
                                        municipio = :municipio,
                                        pais = :pais
                                     WHERE id_usuario = :id_usuario";
    
            $stmtDatosPersonales = $db->prepare($queryDatosPersonales);
            $stmtDatosPersonales->execute([
                ':codigo_postal' => $datosUsuario['codigo_postal'],
                ':direccion' => $datosUsuario['direccion'],
                ':email' => $datosUsuario['email'],
                ':telefono' => $datosUsuario['telefono'],
                ':municipio' => $datosUsuario['municipio'],
                ':pais' => $datosUsuario['pais'],
                ':id_usuario' => $datosUsuario['id_usuario']
            ]);

               
            // Confirmar la transacción, solo ocurre si todo va bien
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $logMessage = date('Y-m-d H:i:s') . " Update fallido en modeloUser->updateUser para usuario " . $datosUsuario['id_usuario'] . ": " . $e->getMessage() . "\n";
            file_put_contents($logFile, $logMessage, FILE_APPEND);
            $db->rollBack(); // Revertir la transacción si ocurre un error
            return false;
        }
    }
}

?>