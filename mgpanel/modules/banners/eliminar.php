<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

$id=$_GET['id'];
$id2=$_GET['id'];
$ruta=$_GET['ruta'];

if($ruta=="../../../imagesmg/imagenes/") { //verificamos que no hallan fotos
	
	if($id>0) {
		echo "<center><br><div class='tablaestilo'><table width='90%'><caption>Eliminando Foto!</caption></table></center>";

		$sql = "DELETE FROM sis_banners WHERE id_foto=$id LIMIT 1"; 
	       $res=mysql_query($sql,$sistemai);          
  }else {
  	echo "Error al Eliminar";
  	}
	
	}else { // si hay fotos barralas
		
	if(unlink("$ruta"))
	{
		echo "<center><br><div class='tablaestilo'><table width='90%'><caption>Eliminando Foto!</caption></table></center>";
		
		$sql2 = "DELETE FROM sis_banners WHERE id_foto=$id2 LIMIT 1"; 
	       $res2=mysql_query($sql2,$sistemai);          
  
 
	}
	else
	{
		echo "Error al Eliminar";
	}
	
} // finalizamos el borrado	
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<title><?php echo $row_config['title_site'];?></title>
<meta http-equiv="Refresh" content="1;url=index.php?mod=gestor-banner">
</head>

<body>
<br>
<br><br>
<center>
<div class="box box-warning">
     <div class="box-header">
            <h3 class="box-title"></h3>
     </div><!-- /.box-header -->
<div class="box-body">
<img src="images/gif/procesando.gif" alt="" ><br>
<p>Procesando...</p>
</div>
</div>
</center>
</body>

</html>