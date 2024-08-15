<?php
include_once("../config/connect.php");

class Encuestas extends conexion
{

    public static function crearEncuestas($title, $description, $sn_show)
    {
        $connect = self::getConexion();

        $sql = "INSERT INTO tb_encuestas (titulo_encuesta, descripcion_larga, sn_publicar, fecha_registro) VALUES ('$title','$description','$sn_show', now());";

        $connect->query($sql);

        $affected_rows = $connect->affected_rows;
        $connect->close();

        return $affected_rows;
    }


    public static function crearPreguntas($nPreguntas)
    {
        $pregunta = "";
        for ($i = 1; $i < $nPreguntas; $i++) {
            $i .= $pregunta;
        }
        return $pregunta;

    }

    public static function getInfoEncuesta($id, $selectedRow = null)
    {
        $connect = self::getConexion();

        $sql = "SELECT * FROM tb_encuestas WHERE id_encuesta= '$id' ";

        $response = $connect->query($sql);
        $s = "";
        while ($row = $response->fetch_array()) {
            $s = isset($row[$selectedRow]) ? $row[$selectedRow] : null;
        }
        $connect->close();

        return $s;
    }
    public static function totalQuestions($id_encuesta)
    {
        $connect = self::getConexion();
        $sql = "SELECT COUNT(*) FROM tb_preguntas WHERE id_encuesta = '$id_encuesta' ";
        $s = "";
        $response = $connect->query($sql);

        while ($row = $response->fetch_array()) {
            $s = isset($row[0]) ?? null;
        }
        $connect->close();
        return $s;
    }

    public static function showQuestions($id_encuesta, $opc)
    {
        $connect = self::getConexion();
        $sql = "SELECT texto_pregunta, texto_pregunta, id_pregunta FROM tb_preguntas WHERE id_encuesta = '$id_encuesta' ";
        $s = "";
        $response = $connect->query($sql);

        while ($row = $response->fetch_array()) {

            if ($opc == "list") {
                $s .= "<li>" . $row[0] . "</li>";
                    
            } elseif ($opc == "details") {
                $s .= "
                <div class='col-md-12 my 2'>
                    <a href='config_pages.php?qstn=" . $row[2] . "&seccion=frm_crear_respuestas'>" . $row[1] . "</a>
                </div>
                ";
            }

        }
        $connect->close();
        return $s;
    }

}