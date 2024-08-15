<?php
!isset($_SESSION) ? session_start() : null;
include_once("../model/encuestas.php");
include_once("../model/preguntas.php");
?>
<?php if (!isset($_GET['qstn'])) {
    ?>
    <div class="container">
        <div class="row">
            <?php echo Encuestas::showQuestions($_SESSION['id_encuesta'], "details") ?>
        </div>
    </div> <?php
} else {
    $_SESSION['id_pregunta'] = $_GET["qstn"];

    ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 my-4">
                Posibles respuestas a la pregunta
                <?php echo Preguntas::showInfoQuestion($_SESSION['id_pregunta'], 1) ?>
            </div>
            <div class="col-md-12">
                <ol>
                    <?php echo Preguntas::showResponses($_SESSION['id_pregunta'], "list") ?>
                </ol>
            </div>
            <div class="col-md-12 my-4">
                <div class="row">
                    <form action="../controller/controller_crear_respuesta.php" method="post">
                        <div class="col-md-12 my-4">
                            <label for="">Posible respuesta</label>
                            <input type="text" name="textResponse" class="form-control">
                        </div>
                        <div class="col-md-12 my-4">
                            <button type="submit" class="btn btn-primary">
                                Crear Respuesta
                            </button>
                        </div>
                    </form>
                    <a href="config_pages.php?seccion=frm_crear_respuestas" class="btn btn-danger">
                        Cerrar y Guardar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php
}

?>