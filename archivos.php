<?php require_once "vistasProfesor/parte_superior2.php"?>

<!--Inicio del conte principal-->
<!DOCTYPE html>
<html lang="es">
Gestión de Material Eductativo

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</head>
    <div class="container">
        <form class="m-auto w-50 mt-2 mb-2" method="POST" enctype="multipart/form-data" action="acciones/insertar.php">
            
        <div class="mb-2">
                <label class="form-label">Nombre del archivo</label>
                <input class='form-control form-control-sm' type="text" name="nombreArchivo">
            </div>
            <div class="mb-2">
                <label class="form-label">Selecciona un archivo</label>
                <input class='form-control form-control-sm' type="file" name="archivo">
            </div>
            <button class="btn btn-primary btn-sm">Subir archivo</button>
        </form>
        <table class="table table-sm table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>categoria</th>
                    <th>Archivo</th>
                    <th>fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include 'config/bd.php';
                    $conexion1=conexion1();
                    $query=listar($conexion1);
                    $contador=0;
                    while($datos=mysqli_fetch_assoc($query)){
                        $contador++;
                        $id=$datos['id'];
                        $nombre=$datos['nombre'];
                        $categoria=$datos['categoria'];
                        $fecha=$datos['fecha'];
                        $archivo=$datos['archivo'];
                        $tipo=$datos['tipo'];

                    $valor="";
                    if($categoria=='jpg' || $categoria=='png'){
                        $valor="<img width='50' src='data:image/jpg;base64,".base64_encode($archivo)."'>";
                    }

                    if($categoria=='pdf'){
                        $valor="<img  width='50' src='img/pdf.png'>";
                    }

                    if($categoria=='xls' || $categoria=='xlsm' ){
                        $valor="<img  width='50' src='img/exel.png'>";
                    }

                    if($categoria=='doc' || $categoria=='docx'){
                        $valor="<img  width='50' src='img/word.png'>";
                    }
                    if($categoria=='mp4'){
                        $valor="<img  width='50' src='img/desconocido.png'>";
                    }

                    if($categoria=='mp3'){
                        $valor="<img  width='50' src='img/desconocido.png'>";
                    }

                    if($valor==''){
                        $valor="<img  width='50' src='img/desconocido.png'>";
                    }

                    
                ?>
                <tr>
                    <td><?php echo $contador;?></td>
                    <td><?php echo $nombre ;?></td>
                    <td><?php echo $categoria;?></td>
                    <td><a href="cargar.php?id=<?php echo $id; ?>"><?php echo $valor ;?> descargar</a></td>
                    <td><?php echo $fecha ;?></td>
                    <td><a class='btn btn-secondary' href="editar.php?id=<?php echo $id?>">Editar</a> <a class='btn btn-danger' href="acciones/eliminar.php?id=<?php echo $id?>">Eliminar</a></td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>


    </div>
    

<script src="bootstrap/bootstrap.bundle.min.js"></script>



<?php require_once "vistasProfesor/parte_inferior1.php"?>