<?php
require_once __DIR__ . './../helpers/db.php';
$logFile = __DIR__ . '/../../logs/consultaCP.log';


class Acciones {
    public function getMunicipios() {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT DISTINCT municipio FROM codigos_postales ORDER BY municipio");
        $stmt->execute();
        $municipios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $municipios;
    }

    public function getCpByMunicipio($municipio){
        $db = Database::connect();
        $stmt = $db->prepare("SELECT codigo_postal, municipio FROM codigos_postales WHERE municipio = :municipio ORDER BY codigo_postal");
        $stmt->bindParam(':municipio', $municipio, PDO::PARAM_STR);
        $stmt->execute();
        $cpCity = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cpCity;
    }

}