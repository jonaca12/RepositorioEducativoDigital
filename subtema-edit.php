<?php
session_start();
require 'dbcon.php';
?>

<?php require_once "vistasProfesor/parte_superior2.php"?>


    <title>Editar Subtema</title>

  
    <div class="container mt-5">

        <?php include('whats.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Subtema
                            <a href="Subtemastemas.php" class="btn btn-danger float-end">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['idSubTemas']))
                        {
                            $subtema_id = mysqli_real_escape_string($con, $_GET['idSubTemas']);
                            $query = "SELECT * FROM subtemas WHERE idSubTemas='$subtema_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $subtema = mysqli_fetch_array($query_run);
                                ?>
                                <form action="codigoSubTema.php" method="POST">
                                    <input type="hidden" name="subtema_id" value="<?= $subtema['idSubTemas']; ?>">

                                    <div class="mb-3">
                                        <label>Nombre del Subtema</label>
                                        <input type="text" name="nombreSubTema" value="<?=$subtema['nombreSubTema'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Descripción</label>
                                        <input type="text" name="Descripcion" value="<?=$subtema['Descripcion'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_subtema" class="btn btn-primary">
                                            Actualizar Subtema
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

    <?php require_once "vistasProfesor/parte_inferior1.php"?>