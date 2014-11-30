<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 


    $des_prod=$_POST['contenido'];


$updateSQL = sprintf("UPDATE sis_anuncio SET titulo_espanol=%s, titulo_ingles=%s, des_espanol=%s, preciov=%s, precioa=%s, recama=%s, banios=%s, mconstru=%s, mterreno=%s, estacio=%s, direccion=%s, costo_mante=%s, altura=%s, anios_constru=%s, tipo_pisos=%s, niveles=%s, piso_num=%s, piscina=%s, balcon=%s, video=%s WHERE id_anuncio=%s",  
							 
							GetSQLValueString($_POST['titulo_espanol'], "text"),
							GetSQLValueString($_POST['titulo_ingles'], "text"),
							GetSQLValueString($des_prod, "text"),
							GetSQLValueString($_POST['preciov'], "double"),
		                    GetSQLValueString($_POST['precioa'], "double"),
		                    GetSQLValueString($_POST['recama'], "int"),
		                    GetSQLValueString($_POST['banios'], "int"),
		                    GetSQLValueString($_POST['mconstru'], "text"),
		                    GetSQLValueString($_POST['mterreno'], "text"),
		                    GetSQLValueString($_POST['estacio'], "int"),
		                    GetSQLValueString($_POST['direccion'], "text"),
		                    GetSQLValueString($_POST['costo_mante'], "text"),
		                    GetSQLValueString($_POST['altura'], "text"),
		                    GetSQLValueString($_POST['anios_constru'], "text"),
		                    GetSQLValueString($_POST['tipo_pisos'], "text"),
		                    GetSQLValueString($_POST['niveles'], "int"),
		                    GetSQLValueString($_POST['piso_num'], "int"),
		                    GetSQLValueString($_POST['piscina'], "int"),
		                    GetSQLValueString($_POST['balcon'], "int"),
		                    GetSQLValueString($_POST['video'], "text"),
		                    GetSQLValueString($_POST['id_anuncio'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>
