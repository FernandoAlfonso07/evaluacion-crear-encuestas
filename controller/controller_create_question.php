<?php
!isset($_SESSION) ? session_start() : null;
include_once("../model/preguntas.php");
$textQuestio = htmlspecialchars($_POST['titleQuestion']) ?? null;

if ($textQuestio == null) {
    header("Location: ../view/config_pages.php?create=question&error=isNull&seccion=frm_crear_preguntas");
    exit();
}

$response = Preguntas::crearPregunt($textQuestio, $_SESSION['id_encuesta']);

if ($response > 1) {
    header("Location: ../view/config_pages.php?create=question&error=createQuestions&seccion=frm_crear_preguntas");
    exit();
} else {

    $_SESSION['id_pregunta'] = Preguntas::buscaIdPregunta();
    header("Location: ../view/config_pages.php?create=question&seccion=frm_crear_preguntas");
    exit();
}