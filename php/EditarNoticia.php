<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/php/bd/Conexion.php";

try {
    $datos = $_POST;
    $idNoticia = intval($datos["idNoticia"]);
    $titulo = $datos['titulo'];
    $descripcion = $datos['descripcion'];
    $encabezado = $datos['encabezado'];
    $usuario = $datos['idUsuario'];
    $fecha = $datos['fechaPublicacion'];
    $etiqueta = $datos['idEtiqueta'];

    $coleccion = Conexion::obtenerConexionMongo()->blog->noticias;
    $resultado = $coleccion->updateOne(
        ['_id' => $idNoticia],
        ['$set' => [
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'encabezado' => $encabezado,
                    'usuario'  => $usuario,
                    'fechaPublicacion' => $fecha,
                    'etiquetas' => $etiqueta
                  ]]
    );
    echo json_encode($resultado->getModifiedCount());
} catch (Exception $e) {
    echo json_encode("Ocurrio un error".$e);
}  

?>