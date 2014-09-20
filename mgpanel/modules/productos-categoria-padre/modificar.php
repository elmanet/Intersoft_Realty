<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

// SQL PARA REGISTRO DE DATOS

  

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "captchaform")) {

   $updateSQL = sprintf("UPDATE sis_productos_categoria_padre SET nombre_catep=%s, des_catep=%s, status=%s WHERE id=%s",  
							 
							  GetSQLValueString($_POST['nombre_catep'], "text"),
                       GetSQLValueString($_POST['des_catep'], "text"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['id'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());

  $updateGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_categoria = "-1";
if (isset($_GET['id'])) {
  $colname_categoria = $_GET['id'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_categoria = sprintf("SELECT * FROM sis_productos_categoria_padre WHERE id=%s", GetSQLValueString($colname_categoria, "int"));
$categoria = mysql_query($query_categoria, $sistemai) or die(mysql_error());
$row_categoria = mysql_fetch_assoc($categoria);
$totalRows_categoria = mysql_num_rows($categoria);


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
<script type="text/javascript" src="../../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../../js/jconfirmaction.jquery.js"></script>
		<script type="text/javascript">
			
			$(document).ready(function() {
				
				
				$('.ask-plain').click(function(e) {
					
					e.preventDefault();
					thisHref	= $(this).attr('href');
					
					if(confirm('Are you sure')) {
						window.location = thisHref;
					}
					
				});
				
				$('.ask-custom').jConfirmAction({question : "Quieres Eliminarlo?", yesAnswer : "Si", cancelAnswer : "Cancelar"});
				$('.ask').jConfirmAction();
			});
			
		</script>
 
</head>

<body>

<center>
<br>
<div class="tablaestilo">
<table summary="tabla" width="90%">
<caption>Modificar Categor&iacute;a Principal (Padre)</caption>
</table>
</div>
<!-- FORMULARIO MODIFICACION -->

 <form action="<?php echo $editFormAction; ?>"  id="captchaform" method="POST" enctype="multipart/form-data" target="_self" class="cmxform" >
<table style="width:80%">
<tr>
<td>

 		<table>
 		<tr>

 		</tr>

		<table>
		<tr>
			<td align="right" style="padding-top:0px;"><label> Foto Categor&iacute;a: </label></td>
			<td>
			  <?php if($row_categoria['ruta'] == "imagenes/") { ?>
				<img src="../../images/iconfinder/no-imagen2.png" alt="" width="120">	<br>
				
				<a href="cargar_foto.php?id=<?php echo $row_categoria['id'];?>">Subir Foto</a>

				<?php } else { ?>
				 <img src="<?php echo $row_categoria['ruta'];?>" alt="" width="120" style="border:1px solid;"><br>
					<a href="eliminar_foto.php?id=<?php echo $row_categoria['id'];?>&ruta=<?php echo $row_categoria['ruta'];?>" class="ask-custom">Eliminar Foto</a>
				<?php } ?>    
   		</td>
			
								
		</tr>
		<tr>
			<td align="right" style="padding-top:0px;"><label> Nombre de la Categor&iacute;a: </label></td>
			<td>
		  
			<input class="text_input_peq" style="width:300px;" type="text" id="nombre_catep" name="nombre_catep" value="<?php echo $row_categoria['nombre_catep'];?>" />
		</td>
			
								
		</tr>
				
		
		<tr>
			<td align="right"><label> Descripci&oacute;n: </label></td>
			<td>

			<textarea class="ckeditor" COLS=50 ROWS=3  id="des_catep" name="des_catep" /><?php echo $row_categoria['des_catep'];?></textarea></td>
			<?php
			require_once('../inc/file.inc.php'); 
			?>			
		</tr>

		
		<tr>
			<td align="right"><label> Status: </label></td>
			<td>
				<select name="status" id="status" class="text_input_peq">
				 <option value="<?php echo $row_categoria['status'];?>">
				   <?php if($row_categoria['status']==1) { echo "Activo"; }?>
				   <?php if($row_categoria['status']==0) { echo "Desactivado"; }?>
				   </option>
             
             <option value="0">Desactivado</option>
             <option value="1">Activo</option>
             
             </select>		
		</tr>	
		<tr>
		<td>&nbsp;</td>
		<td><br><br><input type="submit" name="submit"  value="Modificar Registro" class="boton_guardar" /><br>
			
		</td>		
		</tr>
</table>

</td>
</tr>

 		</table>

    <input type="hidden" name="id" id="id" value="<?php echo $row_categoria['id'];?>">
      
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
</body>

</html>