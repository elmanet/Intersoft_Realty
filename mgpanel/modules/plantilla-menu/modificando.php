<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

$updateSQL = sprintf("UPDATE sis_plantilla_menu_link SET titulo_link=%s, tipo_link=%s, id_articulo=%s, id_art_cate=%s, url_int=%s, url_ext=%s, id_menu=%s, orden=%s WHERE id_menu_link=%s",  
							 
GetSQLValueString($_POST['titulo_link'], "text"),
 GetSQLValueString($_POST['tipo_link'], "int"),
GetSQLValueString($_POST['id_articulo'], "int"),
GetSQLValueString($_POST['id_art_cate'], "int"),
GetSQLValueString($_POST['url_int'], "text"),
GetSQLValueString($_POST['url_ext'], "text"),
GetSQLValueString($_POST['id_menu'], "int"),
GetSQLValueString($_POST['orden'], "int"),
GetSQLValueString($_POST['id_menu_link'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>
