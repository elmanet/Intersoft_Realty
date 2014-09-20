<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

// SQL PARA REGISTRO DE DATOS


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "captchaform")) {
 $insertSQL = sprintf("INSERT INTO sis_formapago(id_fpago, titulo_fpago, informacion_fpago, status) VALUES ( %s, %s, %s, %s)", 
							  GetSQLValueString($_POST['id_fpago'], "int"),
								GetSQLValueString($_POST['titulo_fpago'], "text"),
								GetSQLValueString($_POST['informacion_fpago'], "text"),
							  GetSQLValueString($_POST['status'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());

 $insertGoTo = "procesando.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  } 
  header(sprintf("Location: %s", $insertGoTo));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1, utf-8" />
<title><?php echo $row_config['title_site'];?></title>
<link href="../../css/main_central.css" rel="stylesheet" type="text/css" />
<link href="../../css/modules.css" rel="stylesheet" type="text/css" />
<link href="../../css/input.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

<?php require_once('../inc/validate.inc.php'); ?>

</head>

<body>
<center>
<br>
<div class="tablaestilo">
<table width="90%">
<caption>Agregar Nueva Forma de Pago</caption>
</table>
</div>

<!-- FORMULARIO REGISTRO NUEVO -->

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
			<td align="right"><label> Titulo Forma de Pago: </label></td>
			<td>
					
			<input class="text_input" type="text" id="titulo_fpago" name="titulo_fpago" value="" style="width:300px;"></td>
			
		</tr>
		<tr>
			<td align="right"><label> Informaci&oacute;n del tipo de Pago: </label></td>
			<td>

			<textarea class="ckeditor" COLS=50 ROWS=3  id="informacion_fpago" name="informacion_fpago" /></textarea></td>
			<?php
			require_once('../inc/file.inc.php'); 
			?>			
		</tr>	
</table>

</td>
</tr>
		<tr><td>&nbsp;</td></tr>

 		</table>
     <input type="submit" name="submit"  value="Guardar" class="boton_guardar"   />

    
      <input type="hidden" name="id_fpago" id="id_fpago" value="">
     <input type="hidden" name="MM_insert" value="captchaform">	
</form>  

<!-- FIN DE NUEVO INGRESO -->	


		
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

	
</body>

</html>
<?php
mysql_free_result($config);

?>