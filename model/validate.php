<?php
include_once("../config/connect.php");

class validate extends conexion
{
    public static function conteoData($opc, $id_data, $rowSelected)
    {
        $connect = self::getConexion();
        $sql = "";
        $nameTable = "";
        $identificador = "";

        switch ($opc) {
            case "encuestas":
                $nameTable = "tb_encuestas";
                $identificador = "titulo_encuesta";
                break;
        }
        $sql = "SELECT COUNT(*) FROM $nameTable WHERE $identificador = '$id_data' ;";

        $s = "";
        $reponse = $connect->query($sql);
        while ($row = $reponse->fetch_array()) {
            $s = isset($row[$rowSelected]) ? $row[$rowSelected] : null;
        }
        return $s;
    }
}