<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_curso']))
{
    $curso_id = mysqli_real_escape_string($con, $_POST['delete_curso']);

    $query = "DELETE FROM curso WHERE idCurso='$curso_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['mensaje'] = "Curso Eliminado";
        header("Location: cursos.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "No se Elimino el curso";
        header("Location: cursos.php");
        exit(0);
    }
}

if(isset($_POST['update_curso']))
{
    $curso_id = mysqli_real_escape_string($con, $_POST['curso_id']);

    $nombreCurso = mysqli_real_escape_string($con, $_POST['nombreCurso']);
    $descripcionCurso = mysqli_real_escape_string($con, $_POST['descripcionCurso']);
    $nombreProfesor = mysqli_real_escape_string($con, $_POST['nombreProfesor']);
    $fechaInicio =mysqli_real_escape_string($con, $_POST['fechaInicio']);
    $fechaFinal = mysqli_real_escape_string($con, $_POST['fechaFinal']);

    $query = "UPDATE curso SET nombreCurso='$nombreCurso', descripcionCurso='$descripcionCurso', nombreProfesor='$nombreProfesor', fechaInicio='$fechaInicio', fechaFinal='$fechaFinal' WHERE idCurso='$curso_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['mensaje'] = "Curso actualizado con exito";
        header("Location: cursos.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "Curso no actualizado";
        header("Location: cursos.php");
        exit(0);
    }

}


if(isset($_POST['save_curso']))
{
    $nombreCurso = mysqli_real_escape_string($con, $_POST['nombreCurso']);
    $descripcionCurso = mysqli_real_escape_string($con, $_POST['descripcionCurso']);
    $nombreProfesor = mysqli_real_escape_string($con, $_POST['nombreProfesor']);
    $fechaInicio =mysqli_real_escape_string($con, $_POST['fechaInicio']);
    $fechaFinal = mysqli_real_escape_string($con, $_POST['fechaFinal']);


    $query = "INSERT INTO curso (nombreCurso,descripcionCurso,nombreProfesor,fechaInicio,fechaFinal) VALUES ('$nombreCurso','$descripcionCurso','$nombreProfesor','$fechaInicio','$fechaFinal')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['mensaje'] = "curso creado exitosamente";
        header("Location: cursos.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensaje'] = "curso no creado";
        header("Location: cursos.php");
        exit(0);
    }
}

?>