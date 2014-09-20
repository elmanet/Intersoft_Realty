<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');
$id_compra=$_GET['id_compra'];

mysql_select_db($database_sistemai, $sistemai);
$query_pedido = "SELECT * FROM sis_pedido a, sis_productos b WHERE a.id_compra='$id_compra' AND a.id_producto=b.id AND a.status=2";
$pedido = mysql_query($query_pedido, $sistemai) or die(mysql_error());
$row_pedido = mysql_fetch_assoc($pedido);
$totalRows_pedido = mysql_num_rows($pedido);

mysql_select_db($database_sistemai, $sistemai);
$query_spedido = "SELECT SUM(b.precio) as precio, SUM(b.precio*a.cant) as subtotal FROM sis_pedido a, sis_productos b WHERE a.id_compra='$id_compra' AND a.id_producto=b.id AND a.status=2";
$spedido = mysql_query($query_spedido, $sistemai) or die(mysql_error());
$row_spedido = mysql_fetch_assoc($spedido);
$totalRows_spedido = mysql_num_rows($spedido);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<title><?php echo $row_config['title_site'];?></title>
<link href="../../css/main_central.css" rel="stylesheet" type="text/css" />
<link href="../../css/modules.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="../../images/favicon.ico">
<script type="text/javascript" src="../../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../../js/jconfirmaction.jquery.js"></script>

		
</head>
<body style=" background-image: url('../../images/fon_logo.jpg'); background-repeat: no-repeat;">
<div class="boton_modulos">
<a href="admin.php" ><img src="../../images/iconspng/1371153548_sign-up.png" width="28" height="28" alt="" valign="middle" /> Regresar al Listado</a>
</div>
<center>

<br>
           
<div class="tablaestilo" id="tabla_modulo">
		<table summary="Usuarios" width="90%">
				<caption>Detalle del Pedido #<?php echo $_GET['id_compra'];?></caption>
				<thead>
              <table class="t_carrito" >
<tr style="background-color:#f3f3f3;">
	<td width="30"><b>Cant<b></td>
	<td width="340"><b>Producto<b></td>
	<td width="80"><b>Foto<b></td>
	<td width="100"><b>Precio<b></td>

</tr>
 <?php  do { ?>
<tr>
	<td><?php echo $row_pedido['cant'];?></td>
	<td><?php echo $row_pedido['nombre_prod'];?></td>
	<td><?php if($row_pedido['ruta']=="imagenes/"){ ?>
              <img src="../../images/iconfinder/no-imagen2.png" alt="" height="50" >
              <?php } else { ?>
              <img src="../../modules/productos/<?php echo $row_pedido['ruta']; ?>" alt="" height="50" >
              <?php } ?></td>
    <td style="text-align:right;font-family:arial;"><?php $totalp=$row_pedido['precio']*$row_pedido['cant']; echo $totalp." ".$row_config['simbolo_moneda'];?></td>
	
</tr>
 <?php } while ($row_pedido = mysql_fetch_assoc($pedido)); ?>
 <tr>
	<td colspan="3" style="text-align:right;">Sub-Total</td>
	<td style="text-align:right;font-family:arial;"><?php  echo $row_spedido['subtotal']." ".$row_config['simbolo_moneda'];?></td> 

 </tr>
 <tr>
	<td colspan="3" style="text-align:right;">Impuesto <?php echo $row_config['impuesto'];?>%</td>
	<td style="text-align:right;font-family:arial;"><?php $iva=(($row_spedido['subtotal']*$row_config['impuesto'])/100); echo $iva." ".$row_config['simbolo_moneda'];?></td> 
	
 </tr>
  <tr>
	<td colspan="3" style="text-align:right;font-size:18px;">Total a Pagar</td>
	<td style="text-align:right;font-size:18px;font-family:arial;"><?php $total=$iva+$row_spedido['subtotal']; echo $total." ".$row_config['simbolo_moneda'];?></td> 

 </tr>
</table>

            <br />
				<br />
           <br />
            <br />
				<br />
           <br />
            <br />
				<br />
           <br />
            <br />
				<br />

</center>	
</body>

</html>