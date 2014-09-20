<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 


$updateSQL = sprintf("UPDATE sis_banners SET  titulo_foto=%s, info=%s, orden=%s WHERE id_foto=%s",  
							 
							 
		GetSQLValueString($_POST['titulo_foto'], "text"),
		GetSQLValueString($_POST['info'], "text"),
		GetSQLValueString($_POST['orden'], "int"),
        GetSQLValueString($_POST['id_foto'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>