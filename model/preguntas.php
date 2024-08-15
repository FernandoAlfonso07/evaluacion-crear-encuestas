<?php
include_once("../config/connect.php");

class Preguntas extends conexion
{

    public static function buscaIdPregunta()
    {
        $connect = self::getConexion();
        $sql = "SELECT MAX(id_pregunta) FROM tb_preguntas ";
        $s = "";
        $response = $connect->query($sql);

        while ($row = $response->fetch_array()) {
            $s = $row[0];
        }
        $connect->close();
        return $s;
    }

    public static function crearPregunt($textQuestion, $id_encuesta)
    {
        $connect = self::getConexion();

        $sql = "INSERT INTO tb_preguntas (texto_pregunta, fecha_registro, id_encuesta) VALUES ('$textQuestion',now(),'$id_encuesta') ";

        $connect->query($sql);

        $affected_rows = $connect->affected_rows;
        $connect->close();

        return $affected_rows;
    }
    public static function crearRespuestas($textRespone, $id_encuesta)
    {
        $connect = self::getConexion();

        $sql = "INSERT INTO tb_posibles_respuestas (texto_respuesta, fecha_registro, id_pregunta) VALUES ('$textRespone',now(),'$id_encuesta') ";

        $connect->query($sql);

        $affected_rows = $connect->affected_rows;
        $connect->close();

        return $affected_rows;
    }

    
}