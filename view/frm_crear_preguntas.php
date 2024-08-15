<?php
!isset($_SESSION) ? session_start() : null;
include_once("../model/encuestas.php");
$totalPregunas = Encuestas::totalQuestions($_SESSION['id_encuesta']);
?>
<div class="container md-5 my-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Asiga Preguntas para la encuesta
                <?php echo Encuestas::getInfoEncuesta($_SESSION['id_encuesta'], 1) ?>
            </h1>
        </div>
        <div class="col-md-12 my-5">
            <div class="row">
                <div class="col-md-6">
                    <h3>Total de Preguntas: <?php echo $totalPregunas ?></h3>
                </div>
                <div class="col-md-6">
                    <h3>Listado de preguntas</h3>
                    <ol>
                        <?php
                        echo Encuestas::showQuestions($_SESSION['id_encuesta'], "list");
                        ?>
                    </ol>
                </div>
            </div>
        </div>

        <?php
        if (isset($_GET['create'])) {
            if ($_GET['create'] == "question") {
                ?>
                <div class="col-md-12">
                    <form action="../controller/controller_create_question.php" method="post">
                        <div class="form-floating mb-3 my-3">
                            <input type="text" class="form-control" name="titleQuestion" id="title_cuestion">
                            <label for="title_cuestion">Titulo de pregunta</label>
                            <button class="btn btn-primary my-3" type="submit">Crear pregunta</button>
                            <a href="config_pages.php?seccion=frm_crear_respuestas" class="btn btn-warning">
                                Cerrar y Guardar
                            </a>
                        </div>
                    </form>
                </div>
                <?php
            } else {
                null;
            }
        }
        ?>

    </div>
</div>