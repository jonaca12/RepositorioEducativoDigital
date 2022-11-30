<?php
    session_start();
    require 'dbcon.php';
?>
<?php require_once "vistasAlumno/parte_superior2.php"?>

  
    <div class="container mt-4">

        <?php include('mensaje.php'); ?>
<h1>Gestion de Cursos</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalles del Curso
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre Curso</th>
                                    <th>Descripción</th>
                                    <th>Nombre Profesor</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha final
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM curso";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $curso)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $curso['nombreProfesor']; ?></td>
                                                <td><?= $curso['descripcionCurso']; ?></td>
                                                <td><?= $curso['nombreProfesor']; ?></td>
                                                <td><?= $curso['fechaInicio']; ?></td>
                                                <td><?= $curso['fechaFinal']; ?></td>

                                                <td>
                                                    <a href="curso-viewAlumno.php?idCurso=<?= $curso['idCurso']; ?>" class="btn btn-info btn-sm">Ver</a>
                                                    <form action="codigoAlumno.php" method="POST" class="d-inline">
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./contador.js"></script>
    <script src="./contador.js"></script>



    <?php require_once "vistasAlumno/parte_inferior1.php"?>