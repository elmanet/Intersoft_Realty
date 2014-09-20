<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

// SQL PARA REGISTRO DE DATOS

 $insertSQL = sprintf("INSERT INTO sis_plantilla_articulo_categoria(id_art_cate, descripcion, status) VALUES ( %s, %s, %s)", 
                GetSQLValueString($_POST['id_art_cate'], "int"),
                  GetSQLValueString($_POST['descripcion'], "text"),
                GetSQLValueString($_POST['status'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());



$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>

