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
 $insertSQL = sprintf("INSERT INTO sis_productos_fabricantes(id, nombre_marca, des_marca, ruta, status) VALUES ( %s, %s, %s, %s, %s)", 
							  GetSQLValueString($_POST['id'], "int"),
						  	  GetSQLValueString($_POST['nombre_marca'], "text"),
                       GetSQLValueString($_POST['des_marca'], "text"),
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
<title><?php echo $row_config['title_site'];?></title>
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
<caption>Agregar Nuevo Fabricante/Marca</caption>
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
			<td align="right"><label> Nombre del Fabricante/Marca: </label></td>
			<td>
					
			<input class="text_input" type="text" id="nombre_marca" name="nombre_marca" value="" style="width:300px;" /></td>
			
		</tr>
			<tr>
			<td align="right"><label>Seleccione la Imagen: </label></td>
			<td>
					
			<input type="file" name="imagen" class="text_input"/>
			
		</tr>	
			
		<tr>
			<td align="right"><label> Descripci&oacute;n: </label></td>
			<td>

			<textarea class="ckeditor" COLS=50 ROWS=3  id="des_marca" name="des_marca" /></textarea></td>
			<?php
			require_once('../inc/file.inc.php'); 
			?>			
		</tr>	
	

</table>

</td>
</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><input type="submit" name="submit"  value="Procesar Registro" class="boton_guardar" /></td>
		</tr>
 		</table>

    
      <input type="hidden" name="id" id="id" value="">
      <input type="hidden" name="status" id="status" value="1">
      <input type="hidden" name="foto_cate" id="foto_cate" value="0">
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