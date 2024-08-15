<?php

class conexion
{

    public static $connect;

    public static function getConexion()
    {
        self::$connect = mysqli_connect("localhost", "root", "", "bd_evaluacion_enrique_15082024");

        if (self::$connect === false) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        return self::$connect;
    }

}