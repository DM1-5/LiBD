<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libd - Busqueda</title>
  </head>

  <body>
    <?php
    include("../config.php");
    include(ROOT_DIR . "navbar.php");
    include(ROOT_DIR . "MySQLi.php");

    $sql = sequal($_POST["dato"], $_POST["tipo"]);
    $result = mysqli_query($mysqli, $sql);
    ?>


    <div class="container-md mt-3">
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
            echo "<td>" . "<a class='btn btn-outline-dark mx-1 my-1' href='/libd/gestionar/libro/libro_ver.php?idLibro=$res[idLibro]' role='button'>Ver</a>" . "<a class='btn btn-outline-secondary mx-1 my-1' href='/libd/gestionar/libro/libro_form.php?idLibro=$res[idLibro]' role='button'>Editar</a>" . "<a class='btn btn-outline-danger mx-1 my-1' href='/libd/gestionar/libro/libro_delete.php?idLibro=$res[idLibro]' role='button'>Borrar</a>" . "</td>";
          } ?>
        </tbody>
      </table>
    </div>
  </body>

</html>

<?php
function sequal($var, $tipo)
{
  switch ($tipo) {

    case "titulo":
      $sql = "SELECT * FROM libro NATURAL JOIN autor WHERE titulo LIKE '%$var%'";
      break;
    case "anio":
      $sql = "SELECT * FROM libro NATURAL JOIN autor WHERE anio LIKE '%$var%'";
      break;
    case "autor":
      if ($var == "Autor") {
        session_start();
        $_SESSION['message'] = "Seleccione un autor";
        $_SESSION['status'] = "danger";
        header("Location: busqueda_form.php");
      }
      $sql = "SELECT * FROM libro  NATURAL JOIN autor WHERE idAutor = $var";
      break;
    case "biblioteca":
      $sql = "SELECT * FROM libro NATURAL JOIN autor WHERE biblioteca = $var";
      break;
  }
  return $sql;
}
?>