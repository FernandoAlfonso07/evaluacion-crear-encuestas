<?php
include_once("../config/connect.php");
class Buscar extends conexion
{
    public static function buscarID($data)
    {
        $connect = self::getConexion();
        $sql = "SELECT id_encuesta FROM tb_encuestas WHERE titulo_encuesta = '$data' ";
        $s = "";
        $response = $connect->query($sql);

        while ($row = $response->fetch_array()) {
            $s = $row[0];
        }
        $connect->close();
        return $s;
    }
}