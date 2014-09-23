<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

$des_cate=$_POST['contenido'];

$updateSQL = sprintf("UPDATE sis_productos_categoria SET nombre_cate=%s, des_cate=%s, catep=%s, orden=%s, status=%s WHERE id=%s",  
					   
					   GetSQLValueString($_POST['nombre_cate'], "text"),
                       GetSQLValueString($des_cate, "text"),
                       GetSQLValueString($_POST['catep'], "int"),
                       GetSQLValueString($_POST['orden'], "int"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['id'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>
