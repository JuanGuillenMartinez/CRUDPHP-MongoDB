<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/php/bd/SQLGlobal.php";

try {
    $idNoticia = $_POST["idNoticia"];

    $consulta = 'CALL borrarNoticia(?)';
    $parametros = array($idNoticia);
    $respuesta = SQLGlobal::cudFiltro($consulta, $parametros);
    echo json_encode($respuesta);
} catch (Exception $e) {
    echo json_encode("Ocurrio un error".$e);
}  

?>