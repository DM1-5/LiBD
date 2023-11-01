<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links de bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
      integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">

  </head>

  <body>

    <div class="container">
      <nav class="navbar p-3 mb-5 shadow navbar-expand-lg bg-body-tertiary rounded">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">LiBD</a>
          <!-- Logica para colapsar el nav -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- elementos del nav -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <!-- Dropdown de gestion -->
              <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Gestionar
                </a>

                <ul class="dropdown-menu">

                  <li><a class="dropdown-item" href="libro_view.php">Libros</a></li>

                  <li>
                    <hr class="dropdown-divider">
                  </li>

                  <li><a class="dropdown-item" href="autor_view.php">Autores</a></li>

                </ul>
              </li>

              <a class="nav-link" href="seguimiento.php">Seguimiento</a>

              <a class="nav-link" href="busqueda_form.php">Busqueda</a>

            </ul>
          </div>
        </div>
      </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
  </body>

</html>

<?php

function alerta()
{
  session_start();

  // Check if an error message is set
  if (isset($_SESSION['message'])) {
    // Display the error message in an alert

    if ($_SESSION['status'] == "success") {
      echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">';
      echo '<strong>¡Perfecto!</strong>';
      echo ' ' . $_SESSION['message'];
      echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
      echo '</div>';

    }

    if ($_SESSION['status'] == "danger") {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
      echo '<strong>¡Error!</strong>';
      echo ' ' . $_SESSION['message'];
      echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
      echo '</div>';
    }

    // Unset the error message
    unset($_SESSION['message']);
    unset($_SESSION['status']);
  }

}
?>