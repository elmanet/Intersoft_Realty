<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

$idp=$_GET['id'];

mysql_select_db($database_sistemai, $sistemai);
$query_producto = "SELECT *  FROM sis_anuncio_foto WHERE id_anuncio='$idp'";
$producto = mysql_query($query_producto, $sistemai) or die(mysql_error());
$row_producto = mysql_fetch_assoc($producto);
$totalRows_producto = mysql_num_rows($producto);

?> 
<script>
$(function() {

$("#recarga").click(function(){
  $("#recargado").load('modules/anuncios/recargafoto.php?id=<?php echo $_GET['id']; ?>');
}); 

});

</script>
			<?php if ($totalRows_producto>0) { ?>
				
			<h3>Listado de Fotos</h3>
			<div ><a href="index.php?mod=gestor-anuncio" class="btn btn-danger btn"><i class="glyphicon glyphicon-arrow-left"></i><span> Volver</span></a>&nbsp;&nbsp;<a href="#" id="recarga" class="btn btn-primary btn"><i class="glyphicon glyphicon-repeat"></i><span> Recargar</span></a></div>
        
             
              <?php $n=1; do { ?>
              <div class="marco-foto-pre">
              <div class="foto-pre-eliminar"><a href="#" onclick="cargar('#recargado', 'modules/anuncios/foto3_eliminar.php?id=<?php echo $row_producto['id_foto'];?>&id_anuncio=<?php echo $row_producto['id_anuncio'];?>&ruta=<?php echo '../../../imagesmg/'.$row_producto['ruta'];?>')"><i class="glyphicon glyphicon-remove"></a></i></div>	
              <?php if($row_producto['ruta']=="imagenes/"){ ?>
              <img src="images/iconfinder/no-imagen2.png" alt="" height="50" >
              <?php } else { ?>
              <img src="../imagesmg/<?php echo $row_producto['ruta']; ?>" alt=""  >
              <?php } ?>
              </div>
              <?php $n=$n+1;} while ($row_producto = mysql_fetch_assoc($producto)); ?>

              <?php }else{ ?>
      <h3>No Existen Fotos Cargadas...</h3>
      <div ><a href="index.php?mod=gestor-anuncio" class="btn btn-danger btn"><i class="glyphicon glyphicon-arrow-left"></i><span> Volver</span></a></div>
      <?php } ?>
