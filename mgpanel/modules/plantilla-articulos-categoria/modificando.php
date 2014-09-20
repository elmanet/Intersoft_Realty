<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

$updateSQL = sprintf("UPDATE sis_plantilla_articulo_categoria SET descripcion=%s, status=%s WHERE id_art_cate=%s",  
               
                GetSQLValueString($_POST['descripcion'], "text"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['id_art_cate'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>
