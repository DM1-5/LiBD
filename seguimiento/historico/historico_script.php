<?php

include("../../config.php");
include(ROOT_DIR . "MySQLi.php");


if (isset($_POST["add"])) {

  // if ($_POST["idLibro"] = "Libro") {
  //   session_start();
  //   $_SESSION["message"] = "Debes seleccionar un libro";
  //   $_SESSION["status"] = "danger";
  //   header("Location: historico_form.php");
  // }

  $idLibro = $_POST["idLibro"];
  $leido = $_POST["leido"];
  $dia = $_POST["dia"];
  $mes = $_POST["mes"];
  $anio = $_POST["anio"];


  // echo "idLibro: " . $idLibro . "<br>";
  // echo "Leido: " . $leido . "<br>";
  // echo "dia: " . $dia . "<br>";
  // echo "mes: " . $mes . "<br>";
  // echo "anio: " . $anio . "<br>";

  if (verificar($mysqli, $leido, $idLibro)) {
    $result0 = mysqli_query($mysqli, "UPDATE libro SET paginasLeidas = paginasLeidas + $leido WHERE idLibro = $idLibro");
    if (!$result0) {
      session_start();
      $_SESSION['message'] = "No se pudo actualizar las paginas leidas";
      $_SESSION['status'] = "danger";
      header("Location: historico_form.php");
    }
    $result = mysqli_query($mysqli, "INSERT INTO historico (idLibro, leido, fecha) VALUES($idLibro, $leido, '$anio-$mes-$dia')");
    if (!$result0) {
      session_start();
      $_SESSION['message'] = "No se pudo agregar al historico";
      $_SESSION['status'] = "danger";
      header("Location: historico_form.php");
    } else {
      session_start();
      $_SESSION['message'] = "Entrada agregada correctamente";
      $_SESSION['status'] = "success";
      header("Location: /libd/seguimiento/seguimiento.php");
    }
  } else {
    session_start();
    $_SESSION['message'] = "No se puede leer mas paginas de las que tiene el libro";
    $_SESSION['status'] = "danger";
    header("Location: historico_form.php");
  }
}
?>

<?php

function verificar($mysqli, $leido, $idLibro)
{
  $result = mysqli_query($mysqli, "SELECT * FROM libro where idLibro = $idLibro");
  while ($res = mysqli_fetch_array($result)) {
    $paginas = $res['paginas'];
    $paginasLeidas = $res['paginasLeidas'];
  }
  return (($paginasLeidas + $leido) <= $paginas);
}
?>