<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_subtema']))
{
    $subtema_id = mysqli_real_escape_string($con, $_POST['delete_subtema']);

    $query = "DELETE FROM subtemas WHERE idSubTemas='$subtema_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Subtema Eliminado";
        header("Location: Subtemas.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "No se Elimino el Subtema";
        header("Location: Subtemas.php");
        exit(0);
    }
}

if(isset($_POST['update_subtema']))
{
    $subtema_id = mysqli_real_escape_string($con, $_POST['subtema_id']);

    $nombreSubTema = mysqli_real_escape_string($con, $_POST['nombreSubTema']);
    $Descripcion = mysqli_real_escape_string($con, $_POST['Descripcion']);
    

    $query = "UPDATE subtemas SET nombreSubTema='$nombreSubTema', Descripcion='$Descripcion' WHERE idSubTemas='$subtema_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Subtema actualizado con exito";
        header("Location: Subtemas.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Subtema no actualizado";
        header("Location: Subtemas.php");
        exit(0);
    }

}


if(isset($_POST['save_subtema']))
{
    $nombreSubTema = mysqli_real_escape_string($con, $_POST['nombreSubTema']);
    $Descripcion = mysqli_real_escape_string($con, $_POST['Descripcion']);
   


    $query = "INSERT INTO subtemas (nombreSubTema,Descripcion) VALUES ('$nombreSubTema','$Descripcion')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Subtema creado exitosamente";
        header("Location: subtema-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Subtema no creado";
        header("Location: subtema-create.php");
        exit(0);
    }
}

?>