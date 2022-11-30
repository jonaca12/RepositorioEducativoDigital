
<?php

session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if( $validar == null || $validar = ''){

  header("Location: ../includes/login.php");
  die();
  
}


?>
<?php require_once "vistasAlumno/parte_superior2.php"?>


<?php require_once "vistasAlumno/parte_inferior1.php"?>