<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiDB_Libro</title>
  </head>

  <body>
    <?php
    include("../../config.php");
    include(ROOT_DIR . "navbar.php");
    include(ROOT_DIR . "MySQLi.php");
    $result = mysqli_query($mysqli, "SELECT * FROM libro NATURAL JOIN autor WHERE idLibro = $_GET[idLibro]");
    while ($res = mysqli_fetch_array($result)) {
      $idLibro = $res['idLibro'];
      $titulo = $res['titulo'];
      $descripcion = $res['descripcion'];
      $idAutor = $res['idAutor'];
      $anio = $res['anio'];
      $paginas = $res['paginas'];
      $paginasLeidas = $res['paginasLeidas'];
      $biblioteca = $res['biblioteca'];
      $siguiente = $res['siguiente'];
      $pNombre = $res['pNombre'];
      $sNombre = $res['sNombre'];
      $pApellido = $res['pApellido'];
      $sApellido = $res['sApellido'];
    }
    if ($biblioteca = 1) {
      $enBiblioteca = "El libro se encuentra en biblioteca";
    } else {
      $enBiblioteca = "El libro no se encuentra en biblioteca";
    }
    ?>
    <div class="card text-center">
      <div class="card-header">
        <?php echo $titulo ?>
      </div>
      <div class="card-body">
        <h5 class="card-title">
          <?php echo $titulo ?>
        </h5>
        <p class="card-text">
          <?php echo $descripcion . "<br>" ?>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <?php echo $enBiblioteca . "<br>" ?>
          </li>
        </ul>
        <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0"
          aria-valuemax="100">
          <div class="progress-bar bg-danger" style="width: <?php echo floor(($paginasLeidas / $paginas) * 100) ?>%">
            <?php echo floor(($paginasLeidas / $paginas) * 100) . "%" ?>
          </div>
        </div>
        </p>
        <a class='btn btn-outline-dark mx-1 my-1' href='libro_form.php?idLibro=<?php echo $idLibro ?>'
          role='button'>Editar</a>
        <a class='btn btn-outline-danger mx-1 my-1' href='libro_delete.php?idLibro=<?php echo $idLibro ?>'
          role='button'>Borrar</a>
      </div>
      <div class="card-footer text-body-secondary">
        <?php echo $pNombre . " " . $sNombre . " " . $pApellido . " " . $sApellido ?>
      </div>
    </div>

  </body>

</html>