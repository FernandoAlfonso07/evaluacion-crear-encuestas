<?php

include_once("config/connect.php");

class encuestas extends conexion
{

    public static function crearEncuestas($title, $description, $sn_show)
    {
        $connect = self::getConexion();


        $sql = "INSERT INTO tb_encuestas (titulo_encuesta, descripcion_larga, sn_publicar) VALUES ('$title','$description','$sn_show');";

        $connect->query($sql);

        $affected_rows = $connect->affected_rows;
        $connect->close();

        return $affected_rows;
    }

}