<?php
!isset($_SESSION) ? session_start() : null;
include_once("../model/encuestas.php");
include_once("../model/validate.php");
include_once("../model/buscar.php");

$array = ['title', 'description', 'sn_publicar'];

foreach ($array as $element) {
    ${$element} = isset($_POST[$element]) ? trim(htmlspecialchars($_POST[$element])) : null;

}

$conteoCoiciencias = validate::conteoData("encuestas", $title, 0);

if ($conteoCoiciencias >= 1) {
    header("Location: ../view/config_pages.php?error=encuestaExistente&seccion=frm_crear_encuesta");
    exit();
}

foreach ($array as $element) {
    if (empty($element)) {
        header("Location: ../view/config_pages.php?error=emptyField&seccion=frm_crear_encuesta");
        exit();
    }
}

$create = Encuestas::crearEncuestas($title, $description, $sn_publicar);

if ($create > 1) {
    header("Location: ../view/config_pages.php?error=errCreate&seccion=frm_crear_encuesta");
    exit();
} else {
    $_SESSION['id_encuesta'] = Buscar::buscarID($title);
    header("Location: ../view/config_pages.php?seccion=frm_crear_preguntas");
    exit();
}