<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

// SQL PARA REGISTRO DE DATOS

$insertSQL = sprintf("INSERT INTO sis_productos_categoria(id, idcp, nombre_cate, des_cate, ruta, status) VALUES ( %s, %s, %s, %s, %s, %s)", 
						GetSQLValueString($_POST['id'], "int"),
						GetSQLValueString($_POST['idcp'], "int"),
						GetSQLValueString($_POST['nombre_cate'], "text"),
                        GetSQLValueString($_POST['des_cate'], "text"),
                        GetSQLValueString($_POST['ruta'], "text"),
						GetSQLValueString($_POST['status'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());

$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>

