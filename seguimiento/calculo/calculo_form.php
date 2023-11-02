<div class="d-flex align-items-start my-3">

  <div class="nav flex-column nav-pills me-3 " id="v-pills-tab" role="tablist" aria-orientation="vertical">

    <button class="nav-link link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
      type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Por
      hojas</button>

    <button class="nav-link " id="v-pills-fechas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fechas"
      type="button" role="tab" aria-controls="v-pills-fechas" aria-selected="false">Por fechas</button>

  </div>
  <div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
      tabindex="0">

      <div class="display-5 mb-3">Hojas por dia</div>

      <form action="/libd/seguimiento/calculo/calculo_hojas.php" method="post">

        <!-- Selector de Libro -->
        <div class="row">
          <div class="col-8">
            <div class="mb-3">
              <label class="form-label">Libro</label>
              <select name="idLibro" class="form-select" aria-label="Default select example">
                <option>Libro</option>
                <!-- Muestra todos los libros agregados a la base de datos  -->
                <?php
                include("../../config.php");
                include(ROOT_DIR . "MySQLi.php");
                $result = mysqli_query($mysqli, "SELECT * FROM libro");
                while ($res = mysqli_fetch_array($result)) {
                  echo '<option value="' . $res['idLibro'] . '">' . $res['titulo'] . '</option>';
                }
                ?>
              </select>
            </div>
          </div>
          <div class="col">
            <div class="mb-3">
              <label class="form-label">Hojas</label>
              <input min="1" name="hojas" type="number" class="form-control" placeholder="666">
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-end">
          <button class="btn btn-dark my-5" type="submit" name="promedio" value="Promedio">Calcular</button>
        </div>

      </form>
    </div>
    <div class="tab-pane fade" id="v-pills-fechas" role="tabpanel" aria-labelledby="v-pills-fechas-tab" tabindex="0">

      <div>
        <div class="display-5 mb-3">Por distancia entre fechas</div>

        <form action="/libd/seguimiento/calculo/calculo_fechas.php" method="post">

          <div class="mb-3">
            <label class="form-label">Libro</label>
            <select name="idLibro" class="form-select" aria-label="Default select example">
              <option>Libro</option>
              <!-- Muestra todos los libros agregados a la base de datos  -->
              <?php
              include("../../config.php");
              include(ROOT_DIR . "MySQLi.php");
              $result = mysqli_query($mysqli, "SELECT * FROM libro");
              while ($res = mysqli_fetch_array($result)) {
                echo '<option value="' . $res['idLibro'] . '">' . $res['titulo'] . '</option>';
              }
              ?>
            </select>
          </div>
          <!-- Fecha inicio -->
          <div>
            <label for="fechas">Fecha inicio</label>
            <!-- Fecha -->
            <div class="row mt-3">
              <!-- input dia -->
              <div class="col">
                <div class="mb-3">
                  <input min="1" max="31" required name="dia1" type="number" class="form-control" placeholder="Dia">
                </div>
              </div>
              <!-- input Mes -->

              <div class="col">
                <div class="mb-3">
                  <input min="1" max="12" required name="mes1" type="number" class="form-control" placeholder="Mes">
                </div>
              </div>
              <!-- input Anio -->

              <div class="col">
                <div class="mb-3">
                  <input min="1900" required name="anio1" type="number" class="form-control" placeholder="Año">
                </div>
              </div>
            </div>
          </div>

          <!-- Fecha final -->
          <div>
            <label for="fecha-final">Fecha final</label>
            <!-- Fecha -->
            <div class="row mt-3">
              <!-- input dia -->
              <div class="col">
                <div class="mb-3">
                  <input min="1" max="31" required name="dia2" type="number" class="form-control" placeholder="Dia">
                </div>
              </div>
              <!-- input Mes -->

              <div class="col">
                <div class="mb-3">
                  <input min="1" max="12" required name="mes2" type="number" class="form-control" placeholder="Mes">
                </div>
              </div>
              <!-- input Anio -->

              <div class="col">
                <div class="mb-3">
                  <input min="1900" required name="anio2" type="number" class="form-control" placeholder="Año">
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-end">
            <button class="btn btn-dark my-5" type="submit" name="fechas" value="Fechas">Calcular</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>