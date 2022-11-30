<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_tema']))
{
    $tema_id = mysqli_real_escape_string($con, $_POST['delete_tema']);

    $query = "DELETE FROM temas WHERE idTemas='$tema_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Tema Eliminado";
        header("Location: temas.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "No se Elimino el Tema";
        header("Location: temas.php");
        exit(0);
    }
}

if(isset($_POST['update_tema']))
{
    $tema_id = mysqli_real_escape_string($con, $_POST['tema_id']);

    $nombreTema = mysqli_real_escape_string($con, $_POST['nombreTema']);
    $descripcionDelTema = mysqli_real_escape_string($con, $_POST['descripcionDelTema']);
    

    $query = "UPDATE temas SET nombreTema='$nombreTema', descripcionDelTema='$descripcionDelTema' WHERE idTemas='$tema_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Tema actualizado con exito";
        header("Location: temas.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Tema no actualizado";
        header("Location: temas.php");
        exit(0);
    }

}


if(isset($_POST['save_tema']))
{
    $nombreTema = mysqli_real_escape_string($con, $_POST['nombreTema']);
    $descripcionDelTema = mysqli_real_escape_string($con, $_POST['descripcionDelTema']);
   


    $query = "INSERT INTO temas (nombreTema,descripcionDelTema) VALUES ('$nombreTema','$descripcionDelTema')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "tema creado exitosamente";
        header("Location: tema-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "tema no creado";
        header("Location: tema-create.php");
        exit(0);
    }
}

?>