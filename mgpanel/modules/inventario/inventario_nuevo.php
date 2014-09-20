<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

// SQL PARA REGISTRO DE DATOS

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "captchaform")) {
 $insertSQL = sprintf("INSERT INTO sis_inventario (id, cc, codigo, descripcion, marca_id, full) VALUES ( %s, %s, %s, %s, %s, %s)", 
							  GetSQLValueString($_POST['id'], "int"),
							  GetSQLValueString($_POST['cc'], "text"),
							  GetSQLValueString($_POST['codigo'], "text"),
							  GetSQLValueString($_POST['descripcion'], "text"),
						  	  GetSQLValueString($_POST['marca_id'], "int"),
                       GetSQLValueString($_POST['full'], "double"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());

  $insertGoTo = "inventario_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_sistemai, $sistemai);
$query_marca = "SELECT * FROM sis_marcas";
$marca = mysql_query($query_marca, $sistemai) or die(mysql_error());
$row_marca = mysql_fetch_assoc($marca);
$totalRows_marca = mysql_num_rows($marca);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1, utf-8" />
<title>INTERSOFT | Software Empresarial</title>
<link href="../../css/main_central.css" rel="stylesheet" type="text/css" />
<link href="../../css/modules.css" rel="stylesheet" type="text/css" />
<link href="../../css/input.css" rel="stylesheet" type="text/css">
<link href="../../css/marca.css" rel="stylesheet" type="text/css" />
<?php require_once('../inc/validate.inc.php'); ?>
</head>

<body style=" background-image: url('../../images/fon_logo.jpg'); background-repeat: no-repeat;">
<center>
<table>
<tr>
<td><h1>Agregar Nuevo Producto</h1></td>
</tr>
</table>

<!-- FORMULARIO REGISTRO NUEVO CLIENTE -->

 <form action="<?php echo $editFormAction; ?>"  id="captchaform" method="POST" enctype="multipart/form-data" target="_self" class="cmxform" >

 		<table style="width:500px;">
<tr>
<td>


<table>
 		<tr>
 		

			<td align="right" style="padding-top:0px;"><label> C&oacute;digo: </label></td>
			<td>
		   <input class="text_input_peq" style="width:180px;" type="text" id="codigo" name="codigo" value="" onKeyUp="this.value=this.value.toUpperCase()"/>
		</td>
			
								
		</tr>
						
		<tr>
			<td align="right"><label> CC: </label></td>
			<td>

			<input class="text_input_precios" type="text" id="cc" name="cc" value="" onKeyUp="this.value=this.value.toUpperCase()" /></td>

							
		</tr>	
		
		<tr>
			<td align="right"><label> Descripcion: </label></td>
			<td>
					
			<input class="text_input_peq" type="text" id="descripcion" name="descripcion" value="" onKeyUp="this.value=this.value.toUpperCase()"/></td>
			
		</tr>
		<tr>
			<td align="right"><label> Marca: </label></td>
			<td>
 <select name="marca_id" class="text_input_peq" id="marca_id">
         <option value="">..Selecciona</option>
           <?php do { ?>
              <option value="<?php echo $row_marca['id']; ?>"><?php echo $row_marca['marca']; ?></option>
           <?php } while ($row_marca = mysql_fetch_assoc($marca));
  	   $rows = mysql_num_rows($marca);
  	   if($rows > 0) {
           mysql_data_seek($marca, 0);
	  $row_marca = mysql_fetch_assoc($marca);
		 }
	   ?>
         </select>			
			
			
				</td>			
		</tr>
		<tr>
			<td align="right"><label> Precio Full: </label></td>
			<td>
			
			<input class="text_input_precios" type="text" id="full" name="full" value=""> BsF.
			 </td>

							


</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><input type="submit" name="submit"  value="Procesar Registro" class="texto_grande_gris"  />
		<br /><br />
<a href="javascript:history.back()" style="font-size:16px;"><img src="../../images/png/flecha_atras.png" width="40" alt="" align="middle"> Volver Atr&aacute;s</a>		
		</td>
		</tr>
 		</table>

    
      <input type="hidden" name="id" id="id" value="">
     <input type="hidden" name="MM_insert" value="captchaform">	
</form>  

<!-- FIN DE CLIENTE NUEVO INGRESO -->	


		
</center>
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