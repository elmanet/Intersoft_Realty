<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; utf-8" />
<title><?php echo $row_config['title_site'];?></title>
<link href="../../css/main_central.css" rel="stylesheet" type="text/css" />
<link href="../../css/modules.css" rel="stylesheet" type="text/css" />
<link href="../../css/input.css" rel="stylesheet" type="text/css">
<link href="../../css/marca.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../../images/favicon.ico">
</head>
<body>
<center>
<br>
<div class="tablaestilo">
<table summary="tabla"  width="90%">
<caption>Cargar Imagen de la Categor&iacute;a</caption>
<tr class="odd"><td>
<center>
<form id="form1" name="form1" method="post" action="recibir_foto.php" enctype="multipart/form-data">
  <p>Seleccione la Imagen:
    <input type="file" name="imagen"/>
  </p>
  <p>
    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'];?>" />
    
    <input type="submit" name="Aceptar" id="Aceptar" value="Aceptar" />
    
  </p>
  <p>&nbsp;</p>

  
</form>
</center>
 </td></tr>
 </table>
</div>

</center>
</body>
</html>
