<?php include("conexion.php");



$buscardor=mysqli("SELECT * FROM archivo WHERE nombre LIKE LOWER('%".$_POST["buscar"]."%') OR categoria LIKE LOWER ('%".$_POST["buscar"]."%') "); 
$numero = mysql_num_rows($buscardor); ?>


<h5 class="card-tittle">Resultados encontrados (<?php echo $numero; ?>):</h5>

<?php while($resultado = mysql_fetch_assoc($buscardor)){ ?>


<p class="card-text"><?php echo $resultado["nombre"]; ?> - <?php echo $resultado["categoria"] ?></p>


<?php }  ?>