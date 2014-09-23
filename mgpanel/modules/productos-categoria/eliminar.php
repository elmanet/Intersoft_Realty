<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

$id=$_GET['id'];

$colname_categoria = "-1";
if (isset($_GET['id'])) {
  $colname_categoria = $_GET['id'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_categoria = sprintf("SELECT *  FROM sis_productos_categoria WHERE catep=%s", GetSQLValueString($colname_categoria, "int"));
$categoria = mysql_query($query_categoria, $sistemai) or die(mysql_error());
$row_categoria = mysql_fetch_assoc($categoria);
$totalRows_categoria = mysql_num_rows($categoria);

if($totalRows_categoria>0){
	echo "<center><h3>No se Puede Eliminar esta Categoría..<br> tiene SubCategorías Asociadas</h3></center>";
}else{
	$sql = "DELETE FROM sis_productos_categoria WHERE id=$id LIMIT 1"; 
	$res=mysql_query($sql,$sistemai); 
}  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<title><?php echo $row_config['title_site'];?></title>
<meta http-equiv="Refresh" content="1;url=index.php?mod=gestor-categoria-productos">
</head>

<body>
<br>
<br><br>
<center>
<div class="box box-warning">
     <div class="box-header">
            <h3 class="box-title">Eliminando Categoría</h3>
     </div><!-- /.box-header -->
<div class="box-body">
<img src="images/gif/procesando.gif" alt="" ><br>
<p>Procesando...</p>
</div>
</div>
</center>
</body>

</html>