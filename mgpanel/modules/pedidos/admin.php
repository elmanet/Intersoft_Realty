<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

mysql_select_db($database_sistemai, $sistemai);
$query_modulo = "SELECT a.id_compra, a.creado, a.status, b.nombre_usuario, b.apellido_usuario  FROM sis_pedido_compra a, sis_users b WHERE a.id_user=b.id_usuario ORDER BY a.creado DESC";
$modulo = mysql_query($query_modulo, $sistemai) or die(mysql_error());
$row_modulo = mysql_fetch_assoc($modulo);
$totalRows_modulo = mysql_num_rows($modulo);

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

		<script type="text/javascript">
			
			$(document).ready(function() {
				
				
				$('.ask-plain').click(function(e) {
					
					e.preventDefault();
					thisHref	= $(this).attr('href');
					
					if(confirm('Are you sure')) {
						window.location = thisHref;
					}
					
				});
				
				$('.ask-custom').jConfirmAction({question : "Quieres Eliminarlo?", yesAnswer : "Si", cancelAnswer : "Cancelar"});
				$('.ask').jConfirmAction();
			});
			
		</script>
</head>
<body style=" background-image: url('../../images/fon_logo.jpg'); background-repeat: no-repeat;">

<center>

<br>

<?php if ($totalRows_modulo>0){ ?>            
<div class="tablaestilo" id="tabla_modulo">
		<table summary="Usuarios" width="90%">
				<caption>Pedidos de Clientes</caption>
				<thead>
              <tr >
 				 
              <th width="5%" height="35"  align="center" scope="col" ><b>No. Pedido</b></th>
				  <th width="40%" align="center" scope="col"><b>Cliente</b></th>
              <th width="25%" height="35"  align="center" scope="col"><b>Fecha Pedido</b></th>
              <th width="15%" height="35"  align="center" scope="col"><b>Status del Pedido</b></th>
              <th width="15%" height="35"  align="center" scope="col"><b>Detalles del Pedido</b></th>
              </tr>
             </thead>
             
              <?php do { ?>
              <tr class="odd">
              <td  height="26" align="center" ><?php echo strtoupper($row_modulo['id_compra']); ?></td>
              <td  height="26" align="center" ><?php echo strtoupper($row_modulo['nombre_usuario']." ".$row_modulo['apellido_usuario']);?></td>
              <td  height="26" align="center" ><?php echo $row_modulo['creado']; ?></td>
              <td  height="26" align="center" ><a href="modificar_status.php?id_compra=<?php echo $row_modulo['id_compra']; ?>"><?php if($row_modulo['status']==1) {?><img src="../../images/iconfinder/1381304434_system-software-update.png" alt="" width="50" title="Pedido sin Procesar" ><?php } ?><?php if($row_modulo['status']==2) {?><img src="../../images/iconfinder/1375822113_shopping-cart-accept.png" alt="" width="50" title="Pedido Procesado" ><?php } ?><?php if($row_modulo['status']==3) {?><img src="../../images/iconfinder/1381304398_no_entry.png" alt="" width="50" title="Pedido Cancelado"><?php } ?></a></td>
              <td  height="26" align="center" ><a href="detalle_pedido.php?id_compra=<?php echo $row_modulo['id_compra']; ?>"><img src="../../images/iconfinder/1381304682_palet03.png" alt="" width="50" title="Detalle del Pedido" ></a></td>
				
        
              </tr>
              <?php } while ($row_modulo = mysql_fetch_assoc($modulo)); ?>
            </table>
            
            </div>
            <?php } ?>
            <?php if (($totalRows_modulo==0)){ ?> 
            <br>
            <center>
            <img src="../../images/iconfinder/vacio.png" alt="" width="200">
				<p style="font-size:19px;">"No Hay Pedidos en este momento!"</p>            
            </center>
            <?php } ?>
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
				<br />

</center>	
</body>

</html>