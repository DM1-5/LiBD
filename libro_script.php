<?php
include_once("MySQLi.php");

if (isset($_POST['add']) || isset($_POST['update'])) {
  $idLibro = $_POST['idLibro'];
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $idAutor = $_POST['idAutor'];
  if ($_POST['anio']) {
    $anio = $_POST['anio'];
  } else {
    $anio = "NULL";
  }
  $paginas = $_POST['paginas'];
  $paginasLeidas = $_POST['paginasLeidas'];
  $biblioteca = $_POST['biblioteca'];
  $siguiente = $_POST['siguiente'];

  if (!isset($biblioteca)) {
    $biblioteca = 0;
  }
  if (!isset($siguiente)) {
    $siguiente = 0;
  }

  if ($idAutor == "Autor") {
    session_start();
    $_SESSION['message'] = "Debes escoger un autor.";
    $_SESSION['status'] = "danger";
    header("Location: libro_form.php");
  }

  // echo "idLibro: " . $idLibro . "<br>";
  // echo "titulo: " . $titulo . "<br>";
  // echo "descripcion: " . $descripcion . "<br>";
  // echo "idAutor: " . $idAutor . "<br>";
  // echo "anio: " . $anio . "<br>";
  // echo "paginas: " . $paginas . "<br>";
  // echo "biblioteca: " . $biblioteca . "<br>";
  // echo "siguiente: " . $siguiente . "<br>";

  if (isset($_POST['add'])) {
    $result = mysqli_query($mysqli, "INSERT INTO libro(titulo, descripcion, idAutor, anio, paginas,paginasLeidas, biblioteca, siguiente) VALUES('$titulo','$descripcion',$idAutor,$anio,$paginas,0,$biblioteca,$siguiente)");
    if ($result) {
      session_start();
      $_SESSION['message'] = "Libro agregado correctamente.";
      $_SESSION['status'] = "success";
      header("Location: libro_view.php");
    } else {
      session_start();
      $_SESSION['message'] = "Error al agregar libro.";
      $_SESSION['status'] = "danger";
      header("Location: libro_form.php");
    }
  }

  if (isset($_POST['update'])) {
    $result = mysqli_query($mysqli, "UPDATE libro SET titulo= '$titulo',descripcion = '$descripcion', idAutor = $idAutor, anio = $anio, paginas = $paginas, paginasLeidas = $paginasLeidas, biblioteca = $biblioteca, siguiente = $siguiente  WHERE idLibro = $idLibro");

    if ($result) {
      session_start();
      $_SESSION['message'] = "Libro actualizado correctamente.";
      $_SESSION['status'] = "success";
      header("Location: libro_view.php");
    } else {
      session_start();
      $_SESSION['message'] = "Error al actualizar libro.";
      $_SESSION['status'] = "danger";
      header("Location: libro_form.php");
    }

  }
  header("Location: libro_view.php");

}

?>