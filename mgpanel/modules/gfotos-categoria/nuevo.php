<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

// SQL PARA REGISTRO DE DATOS

 srand (time());
$n=rand(1,900);
$rutaEnServidor='imagenes';
$rutaTemporal=$_FILES['imagen']['tmp_name'];
$nombreImagen=$_FILES['imagen']['name'];
if($nombreImages=="") {
$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
}else {
	$rutaDestino=$rutaEnServidor.'/'.$n.$nombreImagen;
	}
move_uploaded_file($rutaTemporal,$rutaDestino);  

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "captchaform")) {
 $insertSQL = sprintf("INSERT INTO sis_galeria_categoria(id_cate, alias, titulo_cate, ruta, status) VALUES ( %s, %s, %s, %s, %s)", 
							  GetSQLValueString($_POST['id_cate'], "int"),
							  GetSQLValueString($_POST['alias'], "text"),
						  	  GetSQLValueString($_POST['titulo_cate'], "text"),
                       GetSQLValueString($rutaDestino, "text"),
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
<title>INTERSOFT | Software Educativo</title>
<link href="../../css/main_central.css" rel="stylesheet" type="text/css" />
<link href="../../css/modules.css" rel="stylesheet" type="text/css" />
<link href="../../css/input.css" rel="stylesheet" type="text/css">
<link href="../../css/marca.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

<?php require_once('../inc/validate.inc.php'); ?>

</head>

<body style=" background-image: url('../../images/fon_logo.jpg'); background-repeat: no-repeat;">
<center>
<br>
<div class="tablaestilo">
<table width="90%">
<caption>Agregar Nueva Galer&iacute;a</caption>
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
			<td align="right"><label> Nombre de la Galer&iacute;a: </label></td>
			<td>
					
			<input class="text_input" type="text" id="titulo_cate" name="titulo_cate" value="" style="width:300px;" /></td>
			
		</tr>
		<tr>
			<td align="right"><label> Alias Enlace: </label></td>
			<td>
					
			<input class="text_input" type="text" id="alias" name="alias" value="" style="width:200px;" /></td>
			
		</tr>
			<tr>
			<td align="right"><label>Seleccione la Imagen Categor&iacute;a: </label></td>
			<td>
					
			<input type="file" name="imagen" class="text_input"/>
			
		</tr>	
			
</table>

</td>
</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><input type="submit" name="submit"  value="Guardar Galer&iacute;a" class="boton_guardar" /></td>
		</tr>
 		</table>

    
      <input type="hidden" name="id_cate" id="id_cate" value="">
      <input type="hidden" name="status" id="status" value="1">
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
	
</body>

</html>