<?php
require 'dbcon.php';
?>
<?php require_once "vistasProfesor/parte_superior2.php"?>


    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Gestión de Cursos
                            <a href="cursos.php" class="btn btn-danger float-end">Atras</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['idCurso']))
                        {
                            $curso_id = mysqli_real_escape_string($con, $_GET['idCurso']);
                            $query = "SELECT * FROM curso WHERE idCurso='$curso_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $curso = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Nombre Curso</label>
                                        <p class="form-control">
                                            <?=$curso['nombreCurso'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Descripcion</label>
                                        <p class="form-control">
                                            <?=$curso['descripcionCurso'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Nombre Profesor</label>
                                        <p class="form-control">
                                            <?=$curso['nombreProfesor'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Fecha Inicio</label>
                                        <p class="form-control">
                                            <?=$curso['fechaInicio'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Fecha Final</label>
                                        <p class="form-control">
                                            <?=$curso['fechaFinal'];?>
                                        </p>
                                    </div>

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