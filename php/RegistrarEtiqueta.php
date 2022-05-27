<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/bd/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/utils/ObtenerUltimoIdEtiquetas.php";
try {

    $datos = $_POST;
    $id = ObtenerUltimoIdEtiquetas::obtenerSiguienteId();
    $etiqueta = $datos['etiqueta'];

    $coleccion = Conexion::obtenerConexionMongo()->blog->etiquetas;
    $resultado = $coleccion->insertOne(['_id' => $id, 'etiqueta' => $etiqueta]);

    echo json_encode(array(
        'estado' => "Insertado con el ID: '{$resultado->getInsertedId()}'")
    );
    
} catch (Exception $e) {
    echo json_encode(array('error'=>$e));
}
?>
