<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/bd/Conexion.php";
try {

    $datos = $_POST;

    $id = intval($datos['idNoticia']);
    $coleccion = Conexion::obtenerConexionMongo()->blog->noticias;
    $respuesta = $coleccion->findOne(['_id' => $id]);
    $datos = null;
    foreach($respuesta as $dato) {
        $datos[] = $dato;
    }
    echo json_encode($datos);
    
} catch (Exception $e) {
    echo ($e);
}
?>
