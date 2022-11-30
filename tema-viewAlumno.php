<?php
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

    <title>Temas</title>
</head>
<body>
<?php require_once "vistasAlumno/parte_superior2.php"?>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Gestión de Temas
                            <a href="temasAlumnos.php" class="btn btn-danger float-end">Atras</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['idTemas']))
                        
                            $tema_id = mysqli_real_escape_string($con, $_GET['idTemas']);
                            $query = "SELECT * FROM temas WHERE idTemas='$tema_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $tema = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Nombre del Tema</label>
                                        <p class="form-control">
                                            <?=$tema['nombreTema'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Descripcion</label>
                                        <p class="form-control">
                                            <?=$tema['descripcionDelTema'];?>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php require_once "vistasAlumno/parte_inferior1.php"?>
</body>
</html>