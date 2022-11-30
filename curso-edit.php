<?php
session_start();
require 'dbcon.php';
?>

<?php require_once "vistasProfesor/parte_superior2.php"?>

  
    <div class="container mt-5">

        <?php include('mensaje.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Curso
                            <a href="cursos.php" class="btn btn-danger float-end">Regresar</a>
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
                                <form action="codigo.php" method="POST">
                                    <input type="hidden" name="curso_id" value="<?= $curso['idCurso']; ?>">

                                    <div class="mb-3">
                                        <label>Nombre Curso</label>
                                        <input type="text" name="nombreCurso" value="<?=$curso['nombreCurso'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Descripción</label>
                                        <input type="text" name="descripcionCurso" value="<?=$curso['descripcionCurso'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Nombre Profesor</label>
                                        <input type="text" name="nombreProfesor" value="<?=$curso['nombreProfesor'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Fecha Inicio</label>
                                        <input type="date" name="fechaInicio" value="<?=$curso['fechaInicio'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                    <div class="mb-3">
                                        <label>Fecha Final</label>
                                        <input type="date" name="fechaFinal" value="<?=$curso['fechaFinal'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_curso" class="btn btn-primary">
                                            Actualizar Curso
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