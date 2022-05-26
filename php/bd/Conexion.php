<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/php/bd/db_config.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';
    error_reporting(E_ERROR | E_PARSE);

    class Conexion {

        static $connection = null;

        function __construct() {

        }

        public static function obtenerConexionMongo() {
            if (self::$connection==null) {
                self::$connection = new MongoDB\Client("mongodb://localhost:27017");
            return self::$connection;
            } else {
                return self::$connection;
            }
        }
    }

    
