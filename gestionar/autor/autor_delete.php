<!DOCTYPE html>
<?php
session_start();

include("../../config.php");
include(ROOT_DIR . "navbar.php");
include(ROOT_DIR . "MySQLi.php");

if (empty($_POST['idAutor'])) {
	$idAutor = $_GET['idAutor'];
} else {
	$idAutor = $_POST['idAutor'];
}

if (isset($_POST['delete'])) {
	mysqli_query($mysqli, "DELETE FROM libro WHERE idAutor = $idAutor");
	$result = mysqli_query($mysqli, "DELETE FROM autor WHERE idAutor = $idAutor");
	if ($result) {
		$_SESSION['status'] = "success";
		$_SESSION['message'] = "Autor eliminado correctamente";
	} else {
		$_SESSION['status'] = "danger";
		$_SESSION['message'] = "Error al eliminar el autor";
	}
	header("Location:autor_view.php");
}
?>

<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>LiDB</title>
	</head>

	<body>

		<div class="d-flex justify-content-center">

			<div class="container text-center">

				<div class="row">
					<div class="display-1"> ¿Estas seguro? </div>
					<div class="display-6">Si eliminas este autor, eliminarás con el todos los libros agregados</div>
				</div>

				<div class="row">

					<form action="autor_delete.php" method="post">
						<input type="hidden" name="idAutor" value=<?php echo $idAutor ?>>

						<div class="col my-5">

							<a class="btn btn-danger mx-5" href="autor_view.php" role="button">Cancel</a>
							<button class="btn btn-success mx-5" type="submit" name="delete" value="Delete">Borrar</button>

						</div>

				</div>
			</div>
		</div>

		</form>

		</div>
	</body>

</html>