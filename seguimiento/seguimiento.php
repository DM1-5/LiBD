<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libd - Seguimiento</title>
  </head>

  <body>
    <?php
    include("../config.php");
    include(ROOT_DIR . "navbar.php");
    alerta();
    ?>


    <div class="container">
      <!-- Defiicion de las tabs -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <!-- Tab_titulo -->
        <li class="nav-item" role="presentation">
          <button class="nav-link link-dark active" id="recientes-tab" data-bs-toggle="tab"
            data-bs-target="#recientes-tab-pane" type="button" role="tab" aria-controls="recientes-tab-pane"
            aria-selected="true">Recientes</button>
        </li>

        <!-- Tab_año -->
        <li class="nav-item" role="presentation">
          <button class="nav-link link-dark" id="historico-tab" data-bs-toggle="tab"
            data-bs-target="#historico-tab-pane" type="button" role="tab" aria-controls="historico-tab-pane"
            aria-selected="false">Historico</button>
        </li>
        <li class="nav-item " role="presentation">
          <button class="nav-link link-dark" id="calculo-tab" data-bs-toggle="tab" data-bs-target="#calculo-tab-pane"
            type="button" role="tab" aria-controls="calculo-tab-pane" aria-selected="false">Calculo</button>
        </li>


      </ul>

      <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="recientes-tab-pane" role="tabpanel" aria-labelledby="recientes-tab"
          tabindex="0">

          <?php
          include(ROOT_DIR . 'seguimiento/seguimiento_recientes.php');
          ?>

        </div>
        <div class="tab-pane fade" id="historico-tab-pane" role="tabpanel" aria-labelledby="historico-tab" tabindex="0">

          <?php
          include(ROOT_DIR . 'seguimiento/historico/historico_view.php');
          ?>

        </div>
        <div class="tab-pane fade" id="calculo-tab-pane" role="tabpanel" aria-labelledby="calculo-tab" tabindex="0">

          <?php
          include(ROOT_DIR . 'seguimiento/calculo/calculo_form.php');
          ?>

        </div>
      </div>
    </div>



  </body>

</html>