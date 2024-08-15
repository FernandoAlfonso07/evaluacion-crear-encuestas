<?php
!isset($_SESSION) ? session_start() : null;
include_once("../model/encuestas.php");
$totalPregunas = Encuestas::totalQuestions($_SESSION['id_encuesta']);
?>
<div class="container md-5 my-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Asiga Preguntas para la encuesta <?php echo Encuestas::getInfoEncuesta($_SESSION['id_encuesta'], 1) ?>
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
                        echo Encuestas::showQuestions($_SESSION['id_encuesta']);
                        ?>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <?php if (isset($_GET['create'])) {
                if ($_GET['create'] == "question") {
                    ?> <a href="config_pages.php?create=question&seccion=frm_crear_preguntas">
                        <button class="btn btn-success">
                            Agregar Preguntas
                        </button>
                    </a> <?php
                } else {
                    null;
                }
            } ?>
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
                        </div>
                    </form>
                </div>
                <?php
            } elseif ($_GET["create"] == "response") {
                ?>
                <div class="col-md-12">
                    <form action="../controller/controller_crear_respuesta.php" method="post">
                        <label for="textResponse">Nombre de Respuesta: </label>
                        <input type="text" class="form-control my-3" name="textResponse" id="textResponse"
                            placeholder="Escribe aqui la posible resuesta">
                        <button class="btn btn-primary my-3" type="submit">Asignar Posible respuesta</button>
                    </form>
                </div> <?php
            }
        } else {
            null;
        }
        ?>

    </div>
</div>