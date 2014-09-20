<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

// SQL PARA REGISTRO DE DATOS

 $id_compra=$_GET['id_compra'];
 mysql_select_db($database_sistemai, $sistemai);
$query_modulos = sprintf("SELECT * FROM sis_users a, sis_pedido_compra b WHERE a.id_usuario=b.id_user AND  b.id_compra='$id_compra'");
$modulos = mysql_query($query_modulos, $sistemai) or die(mysql_error());
$row_modulos = mysql_fetch_assoc($modulos);
$totalRows_modulos = mysql_num_rows($modulos);

   if($_POST['status']==1) {
	$status="Pedido sin Procesar";
	}
	if($_POST['status']==2) {
	$status="Pedido Procesado";
	}
	if($_POST['status']==3) {
	$status="Pedido Cancelado";
	} 

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "captchaform")) {

   $updateSQL = sprintf("UPDATE sis_pedido_compra SET status=%s WHERE id_compra=%s",  
							 
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['id_compra'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());
  
  //ENVIO DE EMAIL
if($_POST['email']==!NULL){
 $dia=date("m.d.Y");
 $hora=date("H:i:s");
 $nombre = $row_modulos['nombre_usuario'];  
 $email = $_POST['email']; 
 $email_envio=$row_config['email'];  
 $asunto = 'Status Pedido';
 $no_pedido=$_POST['id_compra'];
 $status_pedido=$status;
 $mensaje = $_POST['observaciones'];
 $subject= $asunto;
$message = "
<html>
<head>
<title>Status Pedido</title>
</head>
<body>
<h2>El Estatus de t&uacute; pedido ha cambiado</h2> <br />
 Este mensaje se a enviado el dia: $dia a las: $hora<br /><br />
----------------------------------------------------------------------------<br />
Estimado(a) $nombre<br />
Te informamos que t&uacute; pedido #$no_pedido ha sido cambiado de Status a: <b>$status_pedido</b><br>
<b>Observaciones:</b> $mensaje<br />
 
----------------------------------------------------------------------------<br /><br /><br />
  
Atentamente;<br /><br />

Servicio de Atenci&oacute;n al Cliente
  
</body>
</html>
";
 
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: Tienda Virtual <'.$email_envio.'>' . "\r\n";
 mail($email, $subject, $message, $headers);
}
	
 //FIN DEL ENVIO DEL CORREO

  $updateGoTo = "procesando.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

<link rel="shortcut icon" href="../../images/favicon.ico">
<?php require_once('../inc/condicion_eliminar.inc.php'); ?>

</head>
<body>

<center>
<br>
<div class="tablaestilo">
<table summary="tabla" width="90%">
<caption>Modificar Status de Pedido</caption>
</table>
</div>
<!-- FORMULARIO MODIFICACION -->

 <form action="<?php echo $editFormAction; ?>"  id="captchaform" method="POST" enctype="multipart/form-data" target="_self" class="cmxform" >
<table style="width:900px;">
<tr>

			<td align="center"><label> Status del Pedido <b>#<?php echo $_GET['id_compra'];?></b>: </label></td>
			</tr>
			<tr>
			<td align="center">
			
			<select id="status" name="status" style="font-size: 18px;background-color: #FFFFC3;">
				<option value="1">Sin Procesar</option>
				<option value="2">Pedido Procesado</option>
				<option value="3">Pedido Cancelado</option>			
			</select>
         
			</td>
			
		</tr>	
		<tr>
			<td align="center">
			<label> Observaciones del Cambio de Status: </label><br>
			

			<textarea class="ckeditor" COLS=50 ROWS=3  id="observaciones" name="observaciones" /><?php echo $row_modulos['informacion_fpago'];?></textarea></td>
			<?php
			require_once('../inc/file.inc.php'); 
			?>			
		</tr>	
		
		
		<tr>
		<td>&nbsp;</td>
		<td><br><br><input type="submit" name="submit"  value="Modificar" class="boton_guardar"  /><br>
			
		</td>		
		</tr>


 		</table>
  
  <input type="hidden" name="email" id="email" value="<?php echo $row_modulos['email_usuario'];?>">
    <input type="hidden" name="id_compra" id="id_compra" value="<?php echo $_GET['id_compra'];?>">
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