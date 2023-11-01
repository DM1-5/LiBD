<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lidb-Historico</title>
  </head>

  <body>
    <?php
    include("navbar.php");
    alerta();
    ?>


    <div class="container">

      <div class="display-1 text-center mb-3">Historico</div>
      <form action="historico_script.php" method="post">

        <div class="row">

          <!-- Selector de Libro -->
          <div class="col-8">
            <div class="mb-3">
              <select name="idLibro" class="form-select" aria-label="Default select example">
                <option>Libro</option>
                <!-- Muestra todos los libros agregados a la base de datos  -->
                <?php
                include("MySQLi.php");
                $result = mysqli_query($mysqli, "SELECT * FROM libro");
                while ($res = mysqli_fetch_array($result)) {
                  echo '<option value="' . $res['idLibro'] . '">' . $res['titulo'] . '</option>';
                }
                ?>
              </select>
            </div>
          </div>

          <!-- Numero de paginas  -->
          <div class="col">
            <div class="mb-3">
              <input min="1" required name="leido" type="number" class="form-control" placeholder="# Paginas">
            </div>
          </div>

        </div>

        <label for="fechas">Fecha</label>

        <!-- Fecha -->
        <div class="row mt-3">
          <!-- input dia -->
          <div class="col">
            <div class="mb-3">
              <input min="1" max="31" required name="dia" type="number" class="form-control" placeholder="Dia">
            </div>
          </div>
          <!-- input Mes -->

          <div class="col">
            <div class="mb-3">
              <input min="1" max="12" required name="mes" type="number" class="form-control" placeholder="Mes">
            </div>
          </div>
          <!-- input Anio -->

          <div class="col">
            <div class="mb-3">
              <input min="1900" required name="anio" type="number" class="form-control" placeholder="Año">
            </div>
          </div>


        </div>

        <div class="col">
          <button required class="btn btn-outline-dark my-3" type="submit" name="add" value="Add">Agregar</button>
        </div>

      </form>

    </div>

  </body>

</html>