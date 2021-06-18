<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/php/bd/SQLGlobal.php";

try {
    $datos = $_POST;

    $idNoticia = $datos["id"];
    $titulo = $datos['titulo'];
    $descripcion = $datos['descripcion'];
    $encabezado = $datos['encabezado'];
    $fkusuario = $datos['idUsuario'];
    $fecha = $datos['fechaPublicacion'];
    $fkEtiqueta = $datos['idEtiqueta'];

    $consulta = 'UPDATE noticias SET titulo = ?, descripcion = ?, encabezado = ?, fkusuario = ?, fecha = ?, fkEtiqueta = ? WHERE idNoticia = ?';
    $parametros = array($titulo, $descripcion, $encabezado, $fkusuario, $fecha, $fkEtiqueta, $idNoticia);
    $respuesta = SQLGlobal::cudFiltro($consulta, $parametros);
    echo json_encode($respuesta);
} catch (Exception $e) {
    echo json_encode("Ocurrio un error".$e);
}  

?>