<?php
require 'dbcon.php';
?>
<?php require_once "vistasProfesor/parte_superior2.php"?>

    <title>Subtemas</title>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Gestión de Subtemas
                            <a href="Subtemas.php" class="btn btn-danger float-end">Atras</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['idSubTemas']))
                        
                            $subtema_id = mysqli_real_escape_string($con, $_GET['idSubTemas']);
                            $query = "SELECT * FROM subtemas WHERE idSubTemas='$subtema_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $subtema = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Nombre del Subtema</label>
                                        <p class="form-control">
                                            <?=$subtema['nombreSubTema'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Descripcion</label>
                                        <p class="form-control">
                                            <?=$subtema['Descripcion'];?>
                                        </p>
                                    </div>


                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./contador.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php require_once "vistasProfesor/parte_inferior1.php"?>