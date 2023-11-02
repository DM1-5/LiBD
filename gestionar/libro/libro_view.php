<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiDB_Libros</title>
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
      integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
  </head>

  <body>

    <?php
    include("../../config.php");
    include(ROOT_DIR . "navbar.php");
    include(ROOT_DIR . "MySQLi.php");
    alerta();
    if (isset($_POST['sql'])) {
      $result = mysqli_query($mysqli, $_POST['sql']);

    } else {
      $result = mysqli_query($mysqli, "SELECT * FROM libro natural JOIN autor;");
    }

    ?>

    <div class="container-md mt-3">
      <div class="d-flex justify-content-start">
        <a class="btn btn-dark mb-3" href="libro_form.php" role="button">Agregar</a>
      </div>
      <!-- Muestra el contenido de la tabla libro y sus autores -->
      <table class=" mx-1 table table-hover ">
        <thead>
          <tr>
            <!-- Atributos a mostrar -->
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Año</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!-- Ciclo while para iterar sobre los arrays del resultado -->
          <?php
          while ($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $res['titulo'] . "</td>";
            echo "<td>" . $res['pNombre'] . " " . $res['sNombre'] . " " . $res["pApellido"] . " " . $res["sApellido"] . "</td>";
            echo "<td>" . $res['anio'] . "</td>";
            echo "<td>" . "<a class='btn btn-outline-dark mx-1 my-1' href='libro_ver.php?idLibro=$res[idLibro]' role='button'>Ver</a>" . "<a class='btn btn-outline-secondary mx-1 my-1' href='libro_form.php?idLibro=$res[idLibro]' role='button'>Editar</a>" . "<a class='btn btn-outline-danger mx-1 my-1' href='libro_delete.php?idLibro=$res[idLibro]' role='button'>Borrar</a>" . "</td>";
          } ?>
        </tbody>
      </table>
    </div>
  </body>

</html>