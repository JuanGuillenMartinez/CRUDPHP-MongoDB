<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/bd/Conexion.php";
try {

    $coleccion = Conexion::obtenerConexionMongo()->blog->noticias;
    $respuesta = $coleccion->find();
    $datos = null;
    foreach($respuesta as $dato) {
        $datos[] = $dato;
    }
    echo json_encode($datos);

} catch (Exception $e) {
    echo json_encode(array('error'=>$e));
}