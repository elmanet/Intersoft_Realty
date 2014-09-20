<?php 
require_once('../inc/conexion.inc.php'); 
require_once('../inc/config.inc.php');

// INICIO DE BUSQUEDAS SQL
$colname_usuario = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_usuario = $_SESSION['MM_Username'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_usuario = sprintf("SELECT * FROM sis_users a, sis_users_cuenta b, sis_users_tipo c WHERE a.id_usuario=b.id_usuario AND a.id_user_tipo=c.id_user_tipo AND b.username = %s", GetSQLValueString($colname_usuario, "text"));
$usuario = mysql_query($query_usuario, $sistemai) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);
// FIN DE BUSQUEDAS SQL
//HOJA DE MENU DE MODULOS 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; utf-8" />
<title><?php echo $row_config['title_site'];?></title>
<link href="../../css/main_central.css" rel="stylesheet" type="text/css">
<link href="../../css/modules.css" rel="stylesheet" type="text/css">
<link href="../../css/fondo.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../../images/favicon.ico">
</head>
<center>
<body>
<!-- INICIO DEL CONTENEDOR PRINCIPAL -->
<div id="contenedor_menu_top">
 <?php require_once('../inc/sesion_users.inc.php'); ?>
</div>
 <?php if (($row_usuario['cod']==5)){ // INICIO DE LA CONSULTA ?>
<div id="contenedor_central_modulo">
  
	<!-- INICIO DE AREA ADMINISTRATIVA -->   



	<!-- FIN DE AREA ADMINISTRATIVA -->

</div>
<?php } //FIN DE LA CONSULTA ?> 
<?php require_once('../inc/barra_publicidad.inc.php'); ?>	
<!-- FIN DEL CONTENEDOR PRINCIPAL -->
</body>
</center>
</html>
<?php
mysql_free_result($config);
mysql_free_result($usuario);
?>
