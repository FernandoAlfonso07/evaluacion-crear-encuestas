<?php
!isset($_SESSION) ? session_start() : null;
include_once("../model/preguntas.php");

$textResponse = $_POST['textResponse'] ?? null;

if (empty($textResponse)) {
    header("Location: ../view/config_pages.php?create=question&create=response&error=emptyField&seccion=frm_crear_preguntas");
    exit();
}

$response = Preguntas::crearRespuestas($textResponse, $_SESSION['id_pregunta']);

if ($response > 1) {
    header("Location: ../view/config_pages.php?create=question&create=response&error=createResponse&seccion=frm_crear_preguntas");
    exit();
} else {
    header("Location: ../view/config_pages.php?qstn=" . $_SESSION['id_pregunta'] . "&seccion=frm_crear_respuestas");
    exit();
}
