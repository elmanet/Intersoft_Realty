<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

// SQL PARA REGISTRO DE DATOS
srand (time());
$n=rand(1,900);
$rutaEnServidor='imagenes';
$rutaTemporal=$_FILES['imagen']['tmp_name'];
$nombreImagen=$_FILES['imagen']['name'];
if($nombreImagen=="") {
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
 $insertSQL = sprintf("INSERT INTO sis_galeria(id_foto, id_foto_cate, titulo_foto, ruta) VALUES ( %s, %s, %s, %s)", 
							  GetSQLValueString($_POST['id_foto'], "int"),
								GetSQLValueString($_POST['id_foto_cate'], "int"),
						  	  GetSQLValueString($_POST['titulo_foto'], "text"),
								GetSQLValueString($rutaDestino, "text"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());

 $insertGoTo = "procesando.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  } 
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_sistemai, $sistemai);
$query_cate = sprintf("SELECT * FROM sis_galeria_categoria");
$cate = mysql_query($query_cate, $sistemai) or die(mysql_error());
$row_cate = mysql_fetch_assoc($cate);
$totalRows_cate = mysql_num_rows($cate);
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
<caption>Agregar Nuevo Producto</caption>
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
			<td align="right"><label> T&iacute;tulo de la Foto: </label></td>
			<td>
					
			<input class="text_input" type="text" id="titulo_foto" name="titulo_foto" value="" style="width:300px;" /> <span style="color:red;">(Opcional)</span></td>
			
		</tr>
		
		<tr>
			<td align="right"><label> Galer&iacute;a de Fotos: </label></td>
			<td>
					
				<select name="id_foto_cate" id="id_foto_cate" class="text_input">
             
              <?php do { ?>
             <option value="<?php echo $row_cate['id_cate']; ?>"><?php echo $row_cate['titulo_cate']; ?></option>
            <?php } while ($row_cate = mysql_fetch_assoc($cate));
		  	   $rows = mysql_num_rows($cate);
		  	   if($rows > 0) {
		           mysql_data_seek($cate, 0);
			  $row_cate = mysql_fetch_assoc($cate);
				 }
			   ?>
             </select>	
			
			</td>
			
		</tr>	

		<tr>
			<td align="right"><label>Seleccione la Foto: </label></td>
			<td>
					
			<input type="file" name="imagen" class="text_input"/>
			
		</tr>	
			

	

</table>

</td>
</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><input type="submit" name="submit"  value="Guardar Foto" class="boton_guardar"  /></td>
		</tr>
 		</table>

    
      <input type="hidden" name="id_foto" id="id_foto" value="">
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
<?php
mysql_free_result($config);

?>