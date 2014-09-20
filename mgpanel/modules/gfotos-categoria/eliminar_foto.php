<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

$id=$_GET['id'];
$ruta=$_GET['ruta'];
$foto="imagenes/";

	if(unlink("$ruta"))
	{
		echo "<center><br><div class='tablaestilo'><table width='90%'><caption>Foto Eliminada con Exito!</caption></table></center>";

 	$updateSQL = sprintf("UPDATE sis_galeria_categoria SET ruta=%s WHERE id_cate=%s",  
		 
		  GetSQLValueString($foto, "text"),
        GetSQLValueString($id, "int"));
        
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());
	}
	else
	{
		echo "Error al Eliminar el Archivo";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<title><?php echo $row_config['title_site'];?></title>
<link href="../../css/main_central.css" rel="stylesheet" type="text/css" />
<link href="../../css/modules.css" rel="stylesheet" type="text/css" />
<link href="../../css/input.css" rel="stylesheet" type="text/css">
<link href="../../css/marca.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../../images/favicon.ico">
</head>

<body>
<br>
<center>
<a href="modificar.php?id=<?php echo $_GET['id'];?>" style="font-size:16px;"><img src="../../images/png/flecha_atras.png" width="40" alt="" align="middle">Volver al Modificar</a> 
</center>
</body>

</html>
