<div class="container my-5">
    <div class="row">
        <form action="../controller/controller_crear_encuesta.php" method="post">
            <h1>
                Crear Encuesta
            </h1>
            <div class="col-md-12 my-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" id="title" placeholder="name@example.com">
                    <label for="title">Titulo</label>
                </div>

            </div>
            <div class="col-md-12 my-3">
                <div class="form-floating">
                    <input type="text" class="form-control" name="description" id="description" placeholder="Password">
                    <label for="description">Descripción</label>
                </div>
            </div>
            <div class="col-md-12 my-3">
                <h1>¿Publicar?</h1>
                <div class="form-check">
                    <input class="form-check-input" name="sn_publicar" type="radio" value="1" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="sn_publicar" type="radio" value="0" id="flexCheckChecked"
                        checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        No
                    </label>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">
                    Crear encuesta
                </button>
            </div>
        </form>
    </div>
</div>