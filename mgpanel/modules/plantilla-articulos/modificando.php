<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 


$updateSQL = sprintf("UPDATE sis_plantilla_articulos SET id_art_cate=%s, titulo_articulo=%s,  alias=%s, contenido=%s, orden=%s, tipo_articulo=%s, status=%s WHERE id_articulo=%s",  
							 
						GetSQLValueString($_POST['id_art_cate'], "int"),							  
						GetSQLValueString($_POST['titulo_articulo'], "text"),
						GetSQLValueString($_POST['alias'], "text"),
						GetSQLValueString($_POST['contenido'], "text"),
						GetSQLValueString($_POST['orden'], "int"),
						GetSQLValueString($_POST['tipo_articulo'], "int"),
                        GetSQLValueString($_POST['status'], "int"),
                        GetSQLValueString($_POST['id_articulo'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>