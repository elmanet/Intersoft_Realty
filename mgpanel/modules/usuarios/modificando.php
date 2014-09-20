<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 


$updateSQL = sprintf("UPDATE sis_users SET nombre_usuario=%s, apellido_usuario=%s, ci_usuario=%s, dir_usuario=%s, email_usuario=%s, tel_usuario=%s, movil_usuario=%s, id_user_tipo=%s, status=%s WHERE id_usuario=%s",  
							 
							  GetSQLValueString($_POST['nombre_usuario'], "text"),
                       GetSQLValueString($_POST['apellido_usuario'], "text"),
							  GetSQLValueString($_POST['ci_usuario'], "int"),                       
                       GetSQLValueString($_POST['dir_usuario'], "text"),
                       GetSQLValueString($_POST['email_usuario'], "text"),
                       GetSQLValueString($_POST['tel_usuario'], "text"),
                       GetSQLValueString($_POST['movil_usuario'], "text"),
                       GetSQLValueString($_POST['id_user_tipo'], "int"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['id_usuario'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>
