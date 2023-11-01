<?php
include("navbar.php");
include("MySQLi.php");
if (isset($_POST["fechas"])) {

  if ($_POST["idLibro"] == "Libro") {
    session_start();
    $_SESSION["message"] = "Debes seleccionar un libro";
    $_SESSION["status"] = "danger";
    header("Location: seguimiento.php");
  }

  $idLibro = $_POST["idLibro"];
  $date1 = new DateTime($_POST["anio1"] . "-" . $_POST["mes1"] . "-" . $_POST["dia1"]);
  $date2 = new DateTime($_POST["anio2"] . "-" . $_POST["mes2"] . "-" . $_POST["dia2"]);
  if ($date1 >= $date2) {
    session_start();
    $_SESSION["message"] = "La fecha final debe ser mayor a la fecha inicial";
    $_SESSION["status"] = "danger";
    header("Location: seguimiento.php");
    exit;
  }
  $interval = $date1->diff($date2);
  $days = $interval->format('%a');
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
          <?php echo "Entre las fechas dadas hay " . $days . " dias de diferencia, debes leer aproximadamente " . floor(($paginas - $paginasLeidas) / $days) . " paginas por dia." ?>
        </p>
        <a href="seguimiento.php" class="btn btn-dark">Aceptar</a>
      </div>
    </div>
  </div>

  <body>

  </body>

</html>