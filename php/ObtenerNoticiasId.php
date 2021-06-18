<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/bd/SQLGlobal.php";
try {

    $datos = $_POST;

    $id = $datos['idNoticia'];
    $consulta = "SELECT * FROM view_informacion_noticia WHERE idNoticia = ?";
    $parametros = array($id);
    $respuesta = SQLGlobal::selectArrayFiltro($consulta, $parametros);
    if(!empty($respuesta)) {
        echo json_encode($respuesta);
    } else {
        echo json_encode("notData");
    }
    
} catch (Exception $e) {
    echo SQLGlobal::errorAJson($e);
}
?>
