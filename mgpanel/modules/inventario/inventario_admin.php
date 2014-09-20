<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

mysql_select_db($database_sistemai, $sistemai);
$query_inventario = "SELECT * FROM sis_inventario";
$inventario = mysql_query($query_inventario, $sistemai) or die(mysql_error());
$row_inventario = mysql_fetch_assoc($inventario);
$totalRows_inventario = mysql_num_rows($inventario);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>INTERSOFT | Software Empresarial</title>
<link href="../../css/main_central.css" rel="stylesheet" type="text/css" />
<link href="../../css/modules.css" rel="stylesheet" type="text/css" />
<link href="../../css/marca.css" rel="stylesheet" type="text/css" />
</head>

<body style=" background-image: url('../../images/fon_logo.jpg'); background-repeat: no-repeat;">
<!-- CALCULO DE PORCENTAJES -->

<!-- FIN CALCULO -->
<center>
<table>
<tr>
<td><h1>INVENTARIO DE PRODUCTOS</h1></td>
</tr>
</table>

		<table width="950" class="table">
					<tr><td colspan="4"><a href="inventario_nuevo.php" style="font-size:16px;"><img src="../../images/pngnew/agregar-usuarios-icono-3782-48.png" alt="" align="middle">Agregar Nuevo Producto</a></td></tr>
              <tr bgcolor="#A4A4A4" class="textogrande_eloy" >
              <td width="40" height="35" class="textogrande_eloy" align="center" ><b>C&oacute;digo</b></td>
				  <td width="10" class="textogrande_eloy" align="center" ><b>CC</b></td>
              <td width="200" class="textogrande_eloy" align="center" ><b>DESCRIPCION</b></td>
              <td width="40" height="35" class="textogrande_eloy" align="center" ><b>DES.35%</b></td>
              <td width="40" height="35" class="textogrande_eloy" align="center" ><b>DES.30%</b></td>
              <td width="40" height="35" class="textogrande_eloy" align="center" ><b>DES.25%</b></td>
              <td width="40" height="35" class="textogrande_eloy" align="center" ><b>DES.15%</b></td>
              <td width="40" height="35" class="textogrande_eloy" align="center" ><b>FULL</b></td>
              <td width="40" height="35" class="textogrande_eloy" align="center" ><b>Status</b></td>
              </tr>
              <?php do { ?>
              <?php
						$precio=$row_inventario['full'];
						$treintaycinco=($row_inventario['full']-(($row_inventario['full']*35)/100));
						$treinta=($row_inventario['full']-(($row_inventario['full']*30)/100));
						$venticinco=($row_inventario['full']-(($row_inventario['full']*25)/100));
						$quince=($row_inventario['full']-(($row_inventario['full']*15)/100));

					?>			
              <tr bgcolor="#FAFAFA" class="fondo_tabla">
              <td height="26" class="textoVARIOS_eloy" align="center" ><?php echo $row_inventario['codigo']; ?></td>
				  <td class="textoVARIOS_eloy" align="center"  ><?php echo $row_inventario['cc']; ?></td>
				  <td class="textoVARIOS_eloy" align="left"  ><?php echo $row_inventario['descripcion']; ?></td>
              <td class="textoVARIOS_eloy" align="center"  ><?php echo $treintaycinco; ?></td>
              <td class="textoVARIOS_eloy" align="center"  ><?php echo $treinta; ?></td>
              <td class="textoVARIOS_eloy" align="center"  ><?php echo $venticinco; ?></td>
              <td class="textoVARIOS_eloy" align="center"  ><?php echo $quince; ?></td>
              <td class="textoVARIOS_eloy" align="center"  ><?php echo $row_inventario['full']; ?></td>
				  <td  class="textogrande_eloy" align="center" ><a href="inventario_modificar.php?id=<?php echo $row_inventario['id']?>"><img src="../../images/png/32px-Crystal_Clear_action_reload.png" alt="" width="16" ></a>&nbsp;<a href="inventarios_eliminar.php"><img src="../../images/png/cancel_f2.png" alt="" width="16"></a></td>
        
              </tr>
              <?php } while ($row_inventario = mysql_fetch_assoc($inventario)); ?>
            </table>
</center>	
<br />
<br />
<br />
<br />
</body>

</html>
<?php
mysql_free_result($config);
mysql_free_result($inventario);
?>