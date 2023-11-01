<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libd</title>
  </head>

  <body>
    <!-- 
      Esta pagina contiene los formularios para las diferentes busquedas y envia por 
      POST los datos a buscar 
    -->

    <?php
    include("navbar.php");
    alerta();
    ?>


    <div class="container">
      <!-- Defiicion de las tabs -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <!-- Tab_titulo -->
        <li class="nav-item" role="presentation">
          <button class="nav-link link-dark active" id="titulo-tab" data-bs-toggle="tab"
            data-bs-target="#titulo-tab-pane" type="button" role="tab" aria-controls="titulo-tab-pane"
            aria-selected="true">Titulo</button>
        </li>
        <!-- Tab_año -->
        <li class="nav-item" role="presentation">
          <button class="nav-link link-dark" id="anio-tab" data-bs-toggle="tab" data-bs-target="#anio-tab-pane"
            type="button" role="tab" aria-controls="anio-tab-pane" aria-selected="false">Año</button>
        </li>
        <li class="nav-item " role="presentation">
          <button class="nav-link link-dark" id="autor-tab" data-bs-toggle="tab" data-bs-target="#autor-tab-pane"
            type="button" role="tab" aria-controls="autor-tab-pane" aria-selected="false">Autor</button>
        </li>
        <li class="nav-item link-dark" role="presentation">
          <button class="nav-link link-dark" id="biblioteca-tab" data-bs-toggle="tab"
            data-bs-target="#biblioteca-tab-pane" type="button" role="tab" aria-controls="biblioteca-tab-pane"
            aria-selected="false">Biblioteca</button>
        </li>

      </ul>

      <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="titulo-tab-pane" role="tabpanel" aria-labelledby="titulo-tab"
          tabindex="0">

          <!-- Busqueda por titulo -->
          <div>
            <div class="display-1 my-3">Busqueda por titulo</div>

            <form action="busqueda.php" method="post">
              <div class="row">

                <div class="col">
                  <div class="mb-3">
                    <input required name="dato" type="text" class="form-control" placeholder="Titulo a buscar">
                  </div>
                </div>

                <div class="col">
                  <button class="btn btn-dark" type="submit" name="tipo" value="titulo">Buscar</button>
                </div>

              </div>

            </form>
          </div>



        </div>
        <div class="tab-pane fade" id="anio-tab-pane" role="tabpanel" aria-labelledby="anio-tab" tabindex="0">
          <!-- Busqueda por año -->
          <div>
            <div class="display-1 my-3">Busqueda por año</div>

            <form action="busqueda.php" method="post">
              <div class="row">

                <div class="col-4">
                  <div class="mb-3">
                    <input required name="dato" type="number" class="form-control" placeholder="Año a buscar">
                  </div>
                </div>

                <div class="col">
                  <button class="btn btn-dark" type="submit" name="tipo" value="anio">Buscar</button>
                </div>

              </div>
            </form>
          </div>

        </div>
        <div class="tab-pane fade" id="autor-tab-pane" role="tabpanel" aria-labelledby="autor-tab" tabindex="0">

          <div>
            <div class="display-1 my-3">Busqueda por autor</div>

            <form action="busqueda.php" method="post">
              <div class="row">

                <div class="mb-3">
                  <select name="dato" class="form-select" aria-label="Default select example">
                    <option>Autor</option>
                    <!-- Muestra todos los autores agregados a la base de datos  -->

                    <!-- Cuando es el proceso de actualizacion se debe volver a seleccionar el autor -->
                    <?php
                    include("MySQLi.php");
                    $result = mysqli_query($mysqli, "SELECT * FROM autor");
                    while ($res = mysqli_fetch_array($result)) {
                      echo '<option value="' . $res['idAutor'] . '">' . $res['pNombre'] . ' ' . $res['sNombre'] . ' ' . $res['pApellido'] . ' ' . $res['sApellido'] . '</option>';
                    }
                    ?>

                  </select>
                </div>

                <div class="col">
                  <button class="btn btn-dark" type="submit" name="tipo" value="autor">Buscar</button>
                </div>

              </div>
            </form>
          </div>

        </div>
        <div class="tab-pane fade" id="biblioteca-tab-pane" role="tabpanel" aria-labelledby="biblioteca-tab"
          tabindex="0">
          <!-- Busqueda por en biblioteca -->
          <div class="display-1 my-3">Libros en biblioteca</div>


          <form action="busqueda.php" method="post">
            <input value="0" type="radio" class="btn-check" name="dato" id="danger-outlined" autocomplete="off">
            <label class="btn btn-outline-danger" for="danger-outlined">Fuera de biblioteca</label>
            <input value="1" type="radio" class="btn-check" name="dato" id="success-outlined" autocomplete="off"
              checked>
            <label class="btn btn-outline-success" for="success-outlined">En biblioteca</label>

            <div class="col">
              <button class="btn btn-outline-dark my-3" type="submit" name="tipo" value="biblioteca">Buscar</button>
            </div>
          </form>


        </div>
      </div>
    </div>


  </body>

</html>