<?php
    //Incluyo la funcion
    include 'crear_respaldo.php';

    if(isset($_POST['backup'])){
        //get credentails via post
        $server = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'crud_2019';
        
        //Realiza la acciones de la funcion backDB
        backDb($server, $username, $password, $dbname);
        
        exit();
        
    }
?>
