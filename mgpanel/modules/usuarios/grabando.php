<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

// SQL PARA REGISTRO DE DATOS
$n=rand(1,900);
$rutaEnServidor='imagenes';
$rutaTemporal=$_FILES['imagen']['tmp_name'];
$nombreImagen=$_FILES['imagen']['name'];
if($nombreImagen=="") {
$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
}else {
  $rutaDestino=$rutaEnServidor.'/'.$n.$nombreImagen;
  }
move_uploaded_file($rutaTemporal,$rutaDestino);  
  

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$pass=md5($_POST['password']);

 $insertSQL = sprintf("INSERT INTO sis_users (id_usuario, nombre_usuario, apellido_usuario, ci_usuario, dir_usuario, email_usuario, tel_usuario, movil_usuario, id_user_tipo, ruta, status) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 
             GetSQLValueString($_POST['id_usuario'], "int"),
             GetSQLValueString($_POST['nombre_usuario'], "text"),
             GetSQLValueString($_POST['apellido_usuario'], "text"),
             GetSQLValueString($_POST['ci_usuario'], "int"),
             GetSQLValueString($_POST['dir_usuario'], "text"),
             GetSQLValueString($_POST['email_usuario'], "text"),
             GetSQLValueString($_POST['tel_usuario'], "text"),
             GetSQLValueString($_POST['movil_usuario'], "text"),
             GetSQLValueString($_POST['id_user_tipo'], "text"),
             GetSQLValueString($rutaDestino, "text"),
             GetSQLValueString($_POST['status'], "int"));
             
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());


mysql_select_db($database_sistemai, $sistemai);
$query_usuario = "SELECT * FROM sis_users a, sis_users_tipo b WHERE a.id_user_tipo=b.id_user_tipo ORDER BY a.id_usuario DESC";
$usuario = mysql_query($query_usuario, $sistemai) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);
$value= $row_usuario['id_usuario'];


 $insertSQL = sprintf("INSERT INTO sis_users_cuenta (id_user, username, password, id_usuario) VALUES ( %s, %s, %s, %s)", 
                GetSQLValueString($_POST['id_user'], "int"),
                GetSQLValueString($_POST['username'], "text"),
                GetSQLValueString($pass, "text"),
                GetSQLValueString($value, "int"));
             
  mysql_select_db($database_sistemai, $sistemai);
  $Result2 = mysql_query($insertSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>

