<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/bd/Conexion.php";
try {

    $datos = $_POST;
    $titulo = $datos['titulo'];
    $descripcion = $datos['descripcion'];
    $encabezado = $datos['encabezado'];
    $usuario = $datos['idUsuario'];
    $fecha = $datos['fechaPublicacion'];
    $etiqueta = $datos['idEtiqueta'];

    $coleccion = Conexion::obtenerConexionMongo()->blog->noticias;
    $resultado = $coleccion->insertOne(['titulo' => $titulo, 'descripcion' => $descripcion, 'encabezado' => $encabezado, 'usuario' => $usuario,
    'fechaPublicacion' => $fecha, 'etiquetas' => $etiqueta]);

    echo json_encode(array(
        'estado' => "Insertado con el ID: '{$resultado->getInsertedId()}'")
    );
    
} catch (Exception $e) {
    echo json_encode(array('error'=>$e));
}
?>
