<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/bd/Conexion.php";
class ObtenerUltimoIdEtiquetas {
    function __construct() {

    }
    public static function obtenerSiguienteId() {
        try {
            $coleccion = Conexion::obtenerConexionMongo()->blog->etiquetas;
            $respuesta = $coleccion->find([], ['projection' => ['id' => 1],'limit' => 1, 'sort' => ['$natural' => -1]] );
            foreach($respuesta as $dato) {
                $id = intval($dato["_id"]);
            }
            return $id+1;
        
        } catch (Exception $e) {
            return 0;
        }
    }
}
