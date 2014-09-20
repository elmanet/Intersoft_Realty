<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

// SQL PARA REGISTRO DE DATOS

  

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "captchaform")) {

   $updateSQL = sprintf("UPDATE sis_formaenvio SET titulo_fenvio=%s, informacion_fenvio=%s, monto_envio=%s, status=%s WHERE id_fenvio=%s",  
							 
							  GetSQLValueString($_POST['titulo_fenvio'], "text"),
							  GetSQLValueString($_POST['informacion_fenvio'], "text"),
							  GetSQLValueString($_POST['monto_envio'], "int"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['id_fenvio'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());

  $updateGoTo = "procesando.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_modulos = "-1";
if (isset($_GET['id'])) {
  $colname_modulos = $_GET['id'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_modulos = sprintf("SELECT * FROM sis_formaenvio WHERE id_fenvio=%s", GetSQLValueString($colname_modulos, "int"));
$modulos = mysql_query($query_modulos, $sistemai) or die(mysql_error());
$row_modulos = mysql_fetch_assoc($modulos);
$totalRows_modulos = mysql_num_rows($modulos);


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
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

<link rel="shortcut icon" href="../../images/favicon.ico">
<?php require_once('../inc/condicion_eliminar.inc.php'); ?>

</head>
<body>

<center>
<br>
<div class="tablaestilo">
<table summary="tabla" width="90%">
<caption>Modificar Forma de Env&iacute;o</caption>
</table>
</div>
<!-- FORMULARIO MODIFICACION -->

 <form action="<?php echo $editFormAction; ?>"  id="captchaform" method="POST" enctype="multipart/form-data" target="_self" class="cmxform" >
<table style="width:900px;">
<tr>
<td>

 		<table>
 		<tr>

 		</tr>

		<table>
		<tr>
			<td align="right"><label> Publicado: </label></td>
			<td>
			<input type="radio" name="status" value="1" checked>Si
         <input type="radio" name="status" value="0">No

			
			
			</td>
			
		</tr>	
		
		
		<tr>
			<td align="right"><label> Titulo Forma de Env&iacute;o: </label></td>
			<td>
					
			<input class="text_input" type="text" id="titulo_fenvio" name="titulo_fenvio" value="<?php echo $row_modulos['titulo_fenvio'];?>" style="width:300px;" /></td>
			
		</tr>		
		<tr>
			<td align="right"><label> Informaci&oacute;n del tipo de Env&iacute;o: </label></td>
			<td>

			<textarea class="ckeditor" COLS=50 ROWS=3  id="informacion_fenvio" name="informacion_fenvio" /><?php echo $row_modulos['informacion_fenvio'];?></textarea></td>
			<?php
			require_once('../inc/file.inc.php'); 
			?>			
		</tr>	
		<tr>
			<td align="right"><label> Monto env&iacute;o por Peso: </label></td>
			<td>
					
			<input class="text_input" type="text" id="monto_envio" name="monto_envio" value="<?php echo $row_modulos['monto_envio'];?>" style="width:120px;"></td>
			
		</tr>

		
		<tr>
		<td>&nbsp;</td>
		<td><br><br><input type="submit" name="submit"  value="Modificar" class="boton_guardar"  /><br>
			
		</td>		
		</tr>
</table>

</td>
</tr>

 		</table>

    <input type="hidden" name="id_fenvio" id="id_fenvio" value="<?php echo $row_modulos['id_fenvio'];?>">
     <input type="hidden" name="MM_update" value="captchaform">	
</form>  
<br /><br />

<!-- FIN DE CLIENTE NUEVO INGRESO -->	


		
</center>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />	
</body>

</html>