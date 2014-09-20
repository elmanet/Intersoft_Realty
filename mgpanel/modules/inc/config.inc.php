<?php 
error_reporting(E_ALL ^ E_NOTICE);
mysql_select_db($database_sistemai, $sistemai);
$query_config = "SELECT * FROM sis_config";
$config = mysql_query($query_config, $sistemai) or die(mysql_error());
$row_config = mysql_fetch_assoc($config);
$totalRows_config = mysql_num_rows($config);
?>