<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

$updateSQL = sprintf("UPDATE sis_config SET title_site=%s, meta_des=%s, meta_clave=%s, id_google=%s, fuente_google=%s, tipof_google=%s, tienda=%s, catalogo=%s, simbolo_moneda=%s, impuesto=%s, envios=%s, email=%s, website=%s WHERE id_config=%s",  
							 
GetSQLValueString($_POST['title_site'], "text"),
GetSQLValueString($_POST['meta_des'], "text"),
GetSQLValueString($_POST['meta_clave'], "text"),
GetSQLValueString($_POST['id_google'], "text"),
GetSQLValueString($_POST['fuente_google'], "text"),
GetSQLValueString($_POST['tipof_google'], "text"),
GetSQLValueString($_POST['tienda'], "int"),
GetSQLValueString($_POST['catalogo'], "int"),
GetSQLValueString($_POST['simbolo_moneda'], "text"),
GetSQLValueString($_POST['impuesto'], "double"),
GetSQLValueString($_POST['envios'], "int"),
GetSQLValueString($_POST['email'], "text"),
GetSQLValueString($_POST['website'], "text"),
GetSQLValueString($_POST['id_config'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());



$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>