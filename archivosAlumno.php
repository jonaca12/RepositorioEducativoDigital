<?php require_once "vistasAlumno/parte_superior2.php"?>

<!--Inicio del conte principal-->

   
    <div class="container">
        <h1>Gestión de Material educativo</h1>
        <form class="m-auto w-50 mt-2 mb-2" method="POST" enctype="multipart/form-data" action="acciones/insertar.php">
        <table class="table table-sm table-striped">
            <thead class="table-dark">
                <tr>
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
                    <td><?php echo $nombre ;?></td>
                    <td><?php echo $categoria;?></td>
                    <td><a href="cargar.php?id=<?php echo $id; ?>"><?php echo $valor ;?> descargar</a></td>
                    <td><?php echo $fecha ;?></td>
                    <td><a class='btn btn-secondary' href="editarAlumno.php?id=<?php echo $id?>">Ver</a> </td>

                </tr>

                <?php 
                    }
                ?>
            </tbody>
        </table>


    </div>


<script src="bootstrap/bootstrap.bundle.min.js"></script>
<script src="./contador.js"></script>
<script src="./contador.js"></script>




<?php require_once "vistasAlumno/parte_inferior1.php"?>