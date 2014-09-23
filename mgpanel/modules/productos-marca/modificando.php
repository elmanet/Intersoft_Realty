<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

$updateSQL = sprintf("UPDATE sis_productos_fabricantes SET nombre_marca=%s, des_marca=%s, status=%s WHERE id=%s",  
							 
						GetSQLValueString($_POST['nombre_marca'], "text"),
                        GetSQLValueString($_POST['des_marca'], "text"),
                        GetSQLValueString($_POST['status'], "int"),
                        GetSQLValueString($_POST['id'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>
