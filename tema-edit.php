<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Editar Alumno</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('msje.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Alumno
                            <a href="temas.php" class="btn btn-danger float-end">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['idTemas']))
                        {
                            $tema_id = mysqli_real_escape_string($con, $_GET['idTemas']);
                            $query = "SELECT * FROM temas WHERE idTemas='$tema_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $tema = mysqli_fetch_array($query_run);
                                ?>
                                <form action="codigoTema.php" method="POST">
                                    <input type="hidden" name="tema_id" value="<?= $tema['idTemas']; ?>">

                                    <div class="mb-3">
                                        <label>Nombre del Tema</label>
                                        <input type="text" name="nombreTema" value="<?=$tema['nombreTema'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Descripción</label>
                                        <input type="text" name="descripcionDelTema" value="<?=$tema['descripcionDelTema'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_tema" class="btn btn-primary">
                                            Actualizar Tema
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>