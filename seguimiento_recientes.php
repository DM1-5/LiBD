<?php
include('MySQLi.php');
$result = mysqli_query(
  $mysqli,
  "SELECT * from historico h join libro l on (h.idLibro = l.idLibro) ORDER BY fecha DESC LIMIT 5;"
);
?>

<div class="container mt-3">

  <div class="d-flex justify-content-start mb-3">
    <a class="btn btn-dark" href="historico_form.php" role="button">Agregar</a>
  </div>
  <!-- tabla para mostrar el historico -->
  <table class=" mx-1 table table-hover">

    <thead>
      <tr>
        <!-- atributos de tabla  -->
        <th scope="col">Libro</th>
        <th scope="col">Fecha</th>
        <th scope="col">Paginas leidas</th>
        <th scope="col">Paginas</th>
      </tr>
    </thead>

    <tbody>
      <!-- iteracion sobre los resultados de la consulta  -->
      <?php
      while ($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $res['titulo'] . " " . "</td>";
        echo "<td>" . $res['fecha'] . "</td>";
        echo "<td>" . $res['leido'] . "</td>";
        echo "<td>" . $res['paginasLeidas'] . "/" . $res['paginas'] . "</td>";
      } ?>
    </tbody>

  </table>
</div>