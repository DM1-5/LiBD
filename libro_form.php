<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiBD - Libro</title>
  </head>

  <body>

    <?php
    // incluyo la barra de navegacion
    include("navbar.php");
    alerta();
    //incluyo la conexion a la base de datos
    include("MySQLi.php");
    // verifico si existe el idLibro en la url
    if (isset($_GET["idLibro"])) {
      // defino la variable $update para representar la accion que se va a realizar
      $update = true;
      $idLibro = $_GET["idLibro"];
      $result = mysqli_query($mysqli, "SELECT * FROM libro WHERE idLibro=$idLibro");
      // Asigno todas las variables para agregarlas al value de los inputs
      while ($res = mysqli_fetch_array($result)) {
        $titulo = $res['titulo'];
        $descripcion = $res['descripcion'];
        $anio = $res['anio'];
        $paginas = $res['paginas'];
        $paginasLeidas = $res['paginasLeidas'];
        $biblioteca = $res['biblioteca'];
        $siguiente = $res['siguiente'];
      }
    } else {
      $update = false;
    }
    function chequeo($checked)
    {
      if ($checked == 1) {
        echo "checked";
      }
    }
    ?>

    <!-- formulario para enviar los datos al script para Libros -->
    <div class="container mt-3">
      <form action="libro_script.php" method="post">

        <!-- Titulo -->
        <div class="mb-3">
          <label class="form-label">Titulo</label>
          <input required name="titulo" type="text" class="form-control" placeholder="100 años de soledad"
            value="<?php echo $titulo ?>">
        </div>

        <!-- Descripcion -->
        <div class="mb-3">
          <label for="libro_descripcion" class="form-label">Descripcion</label>
          <input required name="descripcion" type="text" class="form-control"
            placeholder="Libro premio novel de literatura" value="<?php echo $descripcion ?>">
        </div>

        <!-- Selector de Autor -->
        <div class="mb-3">
          <select required name="idAutor" class="form-select" aria-label="Default select example">
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
          <a class="btn btn-outline-dark mt-3" href="autor_form.php" rollhe="button">Agregar autor</a>

        </div>

        <div class="row">

          <!-- año de publicacion -->
          <div class="col">
            <div class="mb-3">
              <label class="form-label">Año</label>
              <input name="anio" type="number" class="form-control" placeholder="1982" value="<?php echo $anio ?>">
            </div>
          </div>

          <!-- Numero de paginas -->
          <div class="col">
            <div class="mb-3">
              <label class="form-label">Paginas</label>
              <input required name="paginas" type="number" class="form-control" placeholder="666"
                value="<?php echo $paginas ?>">
            </div>
          </div>

          <!--
        <div class="col">
          <div class="mb-3">
            <label class="form-label">Paginas Leidas</label>
            <input name="paginasLeidas" type="number" class="form-control" placeholder="0" value="">
          </div>
        </div>
      </div>
        -->

          <div class="row">

            <!-- Está o no en la biblioteca -->
            <div class="col">
              <div class="form-check">
                <input name="biblioteca" class="form-check-input" type="checkbox" value="1" id="libro_biblioteca"
                  <?php chequeo($biblioteca) ?>>
                <label class="form-check-label" for="libro_biblioteca">
                  En Biblioteca
                </label>
              </div>
            </div>

            <!-- Es el siguiente libro a leer -->
            <div class="col">
              <div class="form-check">
                <input name="siguiente" class="form-check-input" type="checkbox" value="1" id="libro_seguiente" <?php chequeo($siguiente) ?>>
                <label class="form-check-label" for="libro_seguiente">
                  Siguiente
                </label>
              </div>
            </div>

            <input type="hidden" name="idLibro" value=<?php echo $idLibro ?>>
            <input type="hidden" name="paginasLeidas" value=<?php echo $paginasLeidas ?>>

            <?php
            if ($update) {
              echo <<<ITEM
                    <div class="d-flex justify-content-between">
                    <a class="btn btn-danger my-5" href="libro_form.php" role="button">Cancelar</a>
                    <button class="btn btn-dark my-5" type="submit" name="update" value="Update">Actualizar</button>
                    </div>
                ITEM;
            } else {
              echo <<<ITEM
                    <div class="d-flex justify-content-between">
                    <a class="btn btn-danger my-5" href="libro_view.php" role="button">Cancelar</a>
                    <button class="btn btn-dark my-5" type="submit" name="add" value="Add">Agregar</button>
                    </div>
                ITEM;

            }
            ?>

      </form>
    </div>
  </body>

</html>