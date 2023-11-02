<!DOCTYPE html>
<?php
include("../../config.php");
include(ROOT_DIR . "MySQLi.php");


if (empty($_POST['idLibro'])) {
  $idLibro = $_GET['idLibro'];
} else {
  $idLibro = $_POST['idLibro'];
}

if (isset($_POST['delete'])) {
  $result0 = mysqli_query($mysqli, "DELETE from historico WHERE idLibro = $idLibro");
  if (!$result0) {
    session_start();
    $_SESSION['message'] = "Error al eliminar libro.";
    $_SESSION['status'] = "danger";
  }
  $result = mysqli_query($mysqli, "DELETE FROM libro WHERE idLibro = $idLibro");
  if ($result) {
    session_start();
    $_SESSION['message'] = "Libro eliminado correctamente.";
    $_SESSION['status'] = "success";
  } else {
    session_start();
    $_SESSION['message'] = "Error al eliminar libro.";
    $_SESSION['status'] = "danger";
  }
  header("Location:libro_view.php");
}
?>

<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiDB</title>
  </head>

  <body>
    <?php
    include(ROOT_DIR . "navbar.php");
    ?>

    <div class="d-flex justify-content-center">

      <div class="container text-center">

        <div class="row">
          <div class="display-1"> ¿Estas seguro? </div>
          <div class="display-6">Si eliminas este libro, eliminarás con el todo el historico relacionado</div>

        </div>

        <div class="row">
          <form action="libro_delete.php" method="post">
            <input type="hidden" name="idLibro" value=<?php echo $idLibro ?>>
            <div class="col my-5">
              <a class="btn btn-danger mx-5" href="libro_view.php" role="button">Cancelar</a>
              <button class="btn btn-success mx-5" type="submit" name="delete" value="Delete">Borrar</button>
            </div>

        </div>
      </div>
    </div>
    </form>
    </div>
  </body>

</html>