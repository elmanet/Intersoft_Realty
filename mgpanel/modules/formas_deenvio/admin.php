<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

mysql_select_db($database_sistemai, $sistemai);
$query_modulo = "SELECT *  FROM sis_formaenvio";
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
<div class="boton_modulos">
<a href="nuevo.php" ><img src="../../images/iconspng/1371153548_sign-up.png" width="28" height="28" alt="" valign="middle" /> Nuevo</a>
</div>
<center>

<br>

<?php if ($totalRows_modulo>0){ ?>            
<div class="tablaestilo" id="tabla_modulo">
		<table summary="Usuarios" width="90%">
				<caption>Gestor de Formas de Env&iacute;o</caption>
				<thead>
              <tr >
 				 
              <th width="40%" height="35"  align="center" scope="col" ><b>Tipo de Env&iacute;o</b></th>
				  <th width="20%" align="center" scope="col"><b>Status</b></th>
              <th width="10%" height="35"  align="center" scope="col"><b>Opciones</b></th>
              </tr>
             </thead>
             
              <?php do { ?>
              <tr class="odd">
              <td  height="26" align="center" ><?php echo strtoupper($row_modulo['titulo_fenvio']); ?></td>
              <td  align="center" >
					<?php if ($row_modulo['status']==0){ ?><img src="../../images/iconfinder/not.gif" alt=""  ></a> <?php }  ?>
					<?php if ($row_modulo['status']==1){ ?><img src="../../images/iconfinder/yes.gif" alt=""  ></a> <?php }  ?>           
              </td>
				  <td  align="center" ><a href="modificar.php?id=<?php echo $row_modulo['id_fenvio'];?>"><img src="../../images/png/32px-Crystal_Clear_action_reload.png" alt="" width="16" ></a>&nbsp;<a href="eliminar.php?id=<?php echo $row_modulo['id_fenvio'];?>" class="ask-custom"><img src="../../images/png/cancel_f2.png" alt="" width="16"></a></td>
        
              </tr>
              <?php } while ($row_modulo = mysql_fetch_assoc($modulo)); ?>
            </table>
            
            </div>
            <?php } ?>
            <?php if (($totalRows_modulo==0)){ ?> 
            <br>
            <center>
            <img src="../../images/iconfinder/vacio.png" alt="" width="200">
				<p style="font-size:19px;">"No Hay Formas de envio Registradas!"</p>            
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