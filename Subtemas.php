<?php
    session_start();
    require 'dbcon.php';
?>
<?php require_once "vistasProfesor/parte_superior2.php"?>

  
    <div class="container-fluid">

        <?php include('whats.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Subtema
                            <a href="subtema-create.php" class="btn btn-primary float-end">Agregar Subtema</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del Subtema</th>
                                    <th>Descripción</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM subtemas";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $subtema)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $subtema['idSubTemas']; ?></td>
                                                <td><?= $subtema['nombreSubTema']; ?></td>
                                                <td><?= $subtema['Descripcion']; ?></td>
                            
                                                <td>
                                                    <a href="subtema-view.php?idSubTemas=<?= $subtema['idSubTemas']; ?>" class="btn btn-info btn-sm">Ver</a>
                                                    <a href="subtema-edit.php?idSubTemas=<?= $subtema['idSubTemas']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <form action="codigoSubTema.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_subtema" value="<?=$subtema['idSubTemas'];?>" class="btn btn-danger btn-sm">Eliminar</button>
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
    <?php require_once "vistasProfesor/parte_inferior1.php"?>