<?php
class Auth {
    // Método para encriptar una contraseña
    public static function encryptPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}

// Ejemplo de uso
$password = "rosendo";
$encryptedPassword = Auth::encryptPassword($password);
echo $encryptedPassword;
?>