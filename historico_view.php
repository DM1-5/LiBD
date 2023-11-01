<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libd - Seguimiento</title>
  </head>

  <body>
    <?php
    include('MySQLi.php');
    $result = mysqli_query($mysqli, "SELECT * from historico h JOIN libro l ON (h.idLibro = l.idLibro) order by fecha DESC ");
    ?>

    <div class="container-md mt-3">

      <!-- Boton para agregar un nuevo autor -->
      <div class="d-flex justify-content-start mb-3">
        <a class="btn btn-dark" href="historico_form.php" role="button">Agregar</a>
      </div>
      <!-- tabla para mostrar los autores -->


      <table class=" mx-1 table table-hover" id="tabla_historico">

        <thead>
          <tr>
            <!-- atributos de la base de datos  -->
            <th scope="col">Libro</th>
            <th scope="col">Fecha</th>
            <th scope="col">Paginas leidas</th>
            <th scope="col">Paginas</th>
          </tr>
        </thead>

        <tbody>
          <!-- iteracion sobre los resultados de la consulta  -->
          <?php
          while ($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $res['titulo'] . " " . "</td>";
            echo "<td>" . $res['fecha'] . "</td>";
            echo "<td>" . $res['leido'] . "</td>";
            echo "<td>" . $res['paginasLeidas'] . "/" . $res['paginas'] . "</td>";
          } ?>
        </tbody>

      </table>
    </div>




  </body>

</html>