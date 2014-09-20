<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

$id=$_GET['id'];
$ruta=$_GET['ruta'];
$foto="imagenes/";

	if(unlink("$ruta"))
	{
		

 	$updateSQL = sprintf("UPDATE sis_users SET ruta=%s WHERE id_usuario=%s",  
		 
		GetSQLValueString($foto, "text"),
        GetSQLValueString($id, "int"));
        
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());
	}
	else
	{
		echo "Error al Eliminar el Archivo Foto";
		$updateSQL = sprintf("UPDATE sis_users SET ruta=%s WHERE id_usuario=%s",  
		 
		GetSQLValueString($foto, "text"),
        GetSQLValueString($id, "int"));
        
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<meta http-equiv="Refresh" content="1;url=index.php?mod=gestor-usuarios">
<title><?php echo $row_config['title_site'];?></title>

</head>

<body>
<center>
<div class="box box-warning">
     <div class="box-header">
            <h3 class="box-title">Eliminando Foto</h3>
     </div><!-- /.box-header -->
<div class="box-body">
<img src="images/gif/procesando.gif" alt="" ><br>
<p>Procesando...</p>
</div>
</div>
</center>
</body>

</html>