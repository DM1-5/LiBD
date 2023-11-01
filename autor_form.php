<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Libd - Autor</title>
    </head>

    <body>
        <?php
        include("navbar.php");
        include("MySQLi.php");

        // verifico si existe el idAutor en la url
        if (isset($_GET["id"])) {
            // defino la variable $update para representar la accion que se va a realizar
            $update = true;
            $idAutor = $_GET["id"];
            $result = mysqli_query($mysqli, "SELECT * FROM autor WHERE idAutor = $idAutor");
            // si es una actualizacion de datos, asigno las variables para agregarlas al value de los inputs
            while ($res = mysqli_fetch_array($result)) {
                $pNombre = $res['pNombre'];
                $sNombre = $res['sNombre'];
                $pApellido = $res['pApellido'];
                $sApellido = $res['sApellido'];
            }
        } else {
            $update = false;
        }
        ?>

        <div class="container mt-3">
            <!-- formulario para enviar los datos al script para autores -->
            <form action="autor_script.php" method="post">

                <div class="row">
                    <!-- primer nombre -->
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Primer nombre <strong style="color:crimson">*</strong></label>
                            <input pattern="^[a-zA-Z]+$" required name="pNombre" type="text" class="form-control"
                                placeholder="Gabriel" value="<?php echo $pNombre ?>">
                        </div>
                    </div>
                    <!-- Segundo nombre -->
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Segundo nombre</label>
                            <input pattern="^[a-zA-Z]+$" name="sNombre" type="text" class="form-control"
                                placeholder="Jose" value="<?php echo $sNombre ?>">
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!-- primer apellido -->
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Primer apellido <strong style="color:crimson">*</strong> </label>
                            <input pattern="^[a-zA-Z]+$" required name="pApellido" type="text" class="form-control"
                                placeholder="Garcia" value=<?php echo $pApellido ?>>
                        </div>
                    </div>

                    <!-- segundo apellido -->
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Segundo apellido</label>
                            <input pattern="^[a-zA-Z]+$" name="sApellido" type="text" class="form-control"
                                placeholder="Marquez" value=<?php echo $sApellido ?>>
                        </div>
                    </div>
                    <!-- input oculto que envia el idAutor al script por medio de POST -->
                    <input type="hidden" name="idAutor" value=<?php echo $idAutor ?>>

                    <!-- condicionales para mostrar los botones de agregar o actualizar -->
                    <?php
                    if ($update) {
                        echo <<<ITEM
                    <div class="d-flex justify-content-end">
                    <button class="btn btn-dark my-5" type="submit" name="update" value="Update">Actualizar</button>
                    </div>
                ITEM;
                    } else {
                        echo <<<ITEM
                    <div class="d-flex justify-content-end">
                    <button class="btn btn-dark my-5" type="submit" name="add" value="Add">Agregar</button>
                    </div>
                ITEM;

                    }
                    ?>



            </form>
        </div>

    </body>

</html>