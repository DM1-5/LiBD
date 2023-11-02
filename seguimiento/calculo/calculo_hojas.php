<?php

include("../../config.php");
include(ROOT_DIR . "navbar.php");
include(ROOT_DIR . "MySQLi.php");


if (isset($_POST["promedio"])) {
  if ($_POST["idLibro"] == "Libro") {
    session_start();
    $_SESSION["message"] = "Debes seleccionar un libro";
    $_SESSION["status"] = "danger";
    header("Location: /libd/seguimiento/seguimiento.php");
  }
  $idLibro = $_POST["idLibro"];
  $hojas = $_POST["hojas"];


  $result = mysqli_query($mysqli, "SELECT * FROM libro WHERE idLibro=$idLibro");
  while ($res = mysqli_fetch_array($result)) {
    $titulo = $res['titulo'];
    $paginas = $res['paginas'];
    $paginasLeidas = $res['paginasLeidas'];
  }

}

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo</title>
  </head>

  <div class="container">
    <div class="card">
      <div class="card-header">Hojas por dia
      </div>
      <div class="card-body">
        <h5 class="card-title">
          <?php echo $titulo ?>
        </h5>
        <p class="card-text">
          <?php echo " Has leido ya " . $paginasLeidas . " paginas de " . $paginas . " paginas totales." . "<br>"; ?>
          <?php echo " Si lees " . $hojas . " hojas por dia, terminaras en aproximadamente " . floor(($paginas - $paginasLeidas) / $hojas) . " dias."; ?>
        </p>
        <a href="/libd/seguimiento/seguimiento.php" class="btn btn-dark">Aceptar</a>
      </div>
    </div>
  </div>

  <body>

  </body>

</html>