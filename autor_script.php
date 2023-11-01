<?php
// incluye una vez la conexion a la base de datos
include_once("MySQLi.php");
session_start();
if (isset($_POST['add']) || isset($_POST['update'])) {
  $idAutor = $_POST['idAutor'];
  $pNombre = $_POST['pNombre'];
  $sNombre = $_POST['sNombre'];
  $pApellido = $_POST['pApellido'];
  $sApellido = $_POST['sApellido'];

  if (isset($_POST['add'])) {
    $result = mysqli_query($mysqli, "INSERT INTO autor(pNombre, sNombre, pApellido, sApellido) VALUES('$pNombre','$sNombre','$pApellido','$sApellido')");
    if ($result) {
      $_SESSION['status'] = "success";
      $_SESSION['message'] = "Autor agregado correctamente";
    }
  }

  if (isset($_POST['update'])) {
    $result = mysqli_query($mysqli, "UPDATE autor SET pNombre= '$pNombre',sNombre = '$sNombre', pApellido = '$pApellido', sApellido = '$sApellido' WHERE idAutor = $idAutor");
  }

  header("Location: autor_view.php");

}