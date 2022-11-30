<?php
    session_start();
    require 'dbcon.php';
?>
<?php require_once "vistasAlumno/parte_superior2.php"?>

  
    <div class="container-md">

        <?php include('msje.php'); ?>
<h1>Gestión de Temas</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Temas
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del tema</th>
                                    <th>Descripción</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM temas";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $tema)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $tema['idTemas']; ?></td>
                                                <td><?= $tema['nombreTema']; ?></td>
                                                <td><?= $tema['descripcionDelTema']; ?></td>
                                        

                                                <td>
                                                    <a href="tema-viewAlumno.php?idTemas=<?= $tema['idTemas']; ?>" class="btn btn-info btn-sm">Ver</a>
                                                    <form action="codigoTema.php" method="POST" class="d-inline">
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