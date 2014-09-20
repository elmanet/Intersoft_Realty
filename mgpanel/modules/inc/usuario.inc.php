<?php 
$colname_usua = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_usua = $_SESSION['MM_Username'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_usua = sprintf("SELECT * FROM sis_users a, sis_users_cuenta b, sis_users_tipo c WHERE a.id_usuario=b.id_usuario AND a.id_user_tipo=c.id_user_tipo AND b.username = %s", GetSQLValueString($colname_usua, "text"));
$usua = mysql_query($query_usua, $sistemai) or die(mysql_error());
$row_usua = mysql_fetch_assoc($usua);
$totalRows_usua = mysql_num_rows($usua);
?>