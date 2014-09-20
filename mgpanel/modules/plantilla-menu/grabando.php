<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

// SQL PARA REGISTRO DE DATOS

$insertSQL = sprintf("INSERT INTO sis_plantilla_menu_link(id_menu_link, titulo_link, tipo_link, id_articulo, id_art_cate, url_int, url_ext, id_menu, orden,  status) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 
		GetSQLValueString($_POST['id_menu_link'], "int"),
		GetSQLValueString($_POST['titulo_link'], "text"),
		GetSQLValueString($_POST['tipo_link'], "int"),
		GetSQLValueString($_POST['id_articulo'], "int"),
		GetSQLValueString($_POST['id_art_cate'], "int"),
		GetSQLValueString($_POST['url_int'], "text"),
		GetSQLValueString($_POST['url_ext'], "text"),
		GetSQLValueString($_POST['id_menu'], "int"),
		GetSQLValueString($_POST['orden'], "int"),
        GetSQLValueString($_POST['status'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>

