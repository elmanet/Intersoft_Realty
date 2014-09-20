<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

// CAMBIAR EL STATUS
if ($_GET['status']==0){ 
 $status=1;
 }else {
 $status=0;
 }

 $insertSQL = sprintf("UPDATE sis_plantilla_modulos SET status=%s WHERE id=%s",  
							 
                       GetSQLValueString($status, "int"),
                       GetSQLValueString($_GET['id'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());


// FIN DE CAMBIAR EL STATUS


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<title><?php echo $row_config['title_site'];?></title>
<meta http-equiv="Refresh" content="1;url=index.php?mod=gestor-modulos">

</head>

<body>
<br>
<br><br>
<center>
<div class="box box-warning">
     <div class="box-header">
            <h3 class="box-title">Cambiando Status</h3>
     </div><!-- /.box-header -->
<div class="box-body">
<img src="images/gif/procesando.gif" alt="" ><br>
<p>Procesando...</p>
</div>
</div>
</center>
</body>

</html>