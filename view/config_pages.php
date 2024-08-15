<?php

$seccion = "home";
if (isset($_GET['seccion'])) {
    $seccion = $_GET['seccion'];
} else {
    header('location: logout.php');
}

include ("index.php");