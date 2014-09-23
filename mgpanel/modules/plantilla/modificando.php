<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 


$updateSQL = sprintf("UPDATE sis_plantilla_modulos SET titulo=%s, contenido=%s, posicion=%s, orden=%s WHERE id=%s",  
							 
					GetSQLValueString($_POST['titulo'], "text"),
					GetSQLValueString($_POST['contenido'], "text"),
					GetSQLValueString($_POST['posicion'], "int"),
					GetSQLValueString($_POST['orden'], "int"),
                    GetSQLValueString($_POST['id'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>