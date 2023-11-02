<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiBD - Autor </title>
  </head>

  <body>
    <?php

    include("../../config.php");
    include(ROOT_DIR . "navbar.php");
    include(ROOT_DIR . "MySQLi.php");
    alerta();
    // consulta de todos los autores 
    $result = mysqli_query($mysqli, "SELECT * FROM autor");
    ?>

    <div class="container-md mt-3">


      <!-- Boton para agregar un nuevo autor -->
      <div class="d-flex justify-content-start mb-3">
        <a class="btn btn-dark" href="autor_form.php" role="button">Agregar</a>
      </div>
      <!-- tabla para mostrar los autores -->
      <table class=" mx-1 table table-hover ">
        <thead>
          <tr>
            <!-- atributos de la base de datos  -->
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!-- iteracion sobre los resultados de la consulta  -->
          <?php
          while ($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $res['pNombre'] . " " . $res['sNombre'] . "</td>";
            echo "<td>" . $res['pApellido'] . " " . $res['sApellido'] . "</td>";
            echo "<td>" . "<a class='btn btn-outline-dark mx-1 my-1' href='autor_form.php?id=$res[idAutor]' role='button'>Editar</a>" . "<a class='btn btn-outline-danger mx-1 my-1' href='autor_delete.php?idAutor=$res[idAutor]' role='button'>Borrar</a>" . "</td>";
          } ?>
        </tbody>
      </table>
    </div>

  </body>

</html>