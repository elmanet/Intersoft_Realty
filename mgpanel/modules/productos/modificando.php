<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

    $des_prod=$_POST['contenido'];

$updateSQL = sprintf("UPDATE sis_productos SET cod_prod=%s, nombre_prod=%s, id_cate=%s, id_marca=%s, des_prod=%s, des_prod_corto=%s, existencia=%s, precio=%s, descuento=%s, destacado=%s, clave=%s, status=%s WHERE id=%s",  
							 
							GetSQLValueString($_POST['cod_prod'], "text"),
							GetSQLValueString($_POST['nombre_prod'], "text"),
							GetSQLValueString($_POST['id_cate'], "int"),
							GetSQLValueString($_POST['id_marca'], "int"),
		                    GetSQLValueString($des_prod, "text"),
		                    GetSQLValueString($_POST['des_prod_corto'], "text"),
		                    GetSQLValueString($_POST['existencia'], "int"),
		                    GetSQLValueString($_POST['precio'], "double"),
		                    GetSQLValueString($_POST['descuento'], "double"),
		                    GetSQLValueString($_POST['destacado'], "int"),
		                    GetSQLValueString($_POST['clave'], "text"),
		                    GetSQLValueString($_POST['status'], "int"),
		                    GetSQLValueString($_POST['id'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>
