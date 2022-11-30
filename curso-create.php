<?php
session_start();
?>


  

        <?php include('mensaje.php'); ?>
        <?php require_once "vistasProfesor/parte_superior2.php"?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Agregar Curso 
                            <a href="cursos.php" class="btn btn-danger float-end">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="codigo.php" method="POST">

                            <div class="mb-3">
                                <label>Nombre Curso</label>
                                <input type="text" name="nombreCurso" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Descripción</label>
                                <input type="text" name="descripcionCurso" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Nombre Profesor</label>
                                <input type="text" name="nombreProfesor" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Fecha inicio</label>
                                <input type="date" name="fechaInicio" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Fecha final</label>
                                <input type="date" name="fechaFinal" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_curso" class="btn btn-primary">Guardar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php require_once "vistasProfesor/parte_inferior1.php"?>