<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/php/bd/Conexion.php";

try {
    $idNoticia = intval($_POST["idNoticia"]);
    $coleccion = Conexion::obtenerConexionMongo()->blog->noticias;
    $respuesta = $coleccion->deleteOne(['_id' => $idNoticia]);

    echo json_encode($respuesta->getDeletedCount());
} catch (Exception $e) {
    echo json_encode("Ocurrio un error".$e);
}  

?>