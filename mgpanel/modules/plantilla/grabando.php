<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 



 $insertSQL = sprintf("INSERT INTO sis_plantilla_modulos(id, titulo, contenido, posicion, orden,  nivel, hecho, status) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s)", 
                    GetSQLValueString($_POST['id'], "int"),
                    GetSQLValueString($_POST['titulo'], "text"),
                    GetSQLValueString($_POST['contenido'], "text"),
                    GetSQLValueString($_POST['posicion'], "int"),
                    GetSQLValueString($_POST['orden'], "int"),
                    GetSQLValueString($_POST['nivel'], "int"),
                    GetSQLValueString($_POST['hecho'], "int"),
                    GetSQLValueString($_POST['status'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>

