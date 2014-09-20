<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');
require_once('../inc/usuario.inc.php');

// CAMBIAR EL STATUS
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "captchaform")) {
 if ($_POST['status']==0){ 
 $status=1;
 }else {
 $status=0;
 }
 $insertSQL = sprintf("UPDATE sis_plantilla_posiciones SET status=%s WHERE id_pos=%s",  
							 
                       GetSQLValueString($status, "int"),
                       GetSQLValueString($_POST['id_pos'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());

 $insertGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  } 
  header(sprintf("Location: %s", $insertGoTo));
}
// FIN DE CAMBIAR EL STATUS



mysql_select_db($database_sistemai, $sistemai);
$query_modulo = "SELECT * FROM sis_plantilla_posiciones";
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
 <link href="../../css/marca.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../../images/favicon.ico">
<?php require_once('../inc/condicion_eliminar.inc.php'); ?>
</head>
<body>
<?php if($row_usua['cod']==5) {?>
<div class="boton_modulos">
<a href="nuevo.php" ><img src="../../images/iconspng/1371153548_sign-up.png" width="28" height="28" alt="" valign="middle" /> Nuevo</a>
</div>
<center>

<br>
            
<?php if ($totalRows_modulo>0){ ?>            
<div class="tablaestilo">
		<table summary="Usuarios" width="90%">
				<caption>LISTADO DE POSICIONES</caption>
				<thead>
              <tr >
              <th width="10%" height="35"  align="center" scope="col"><b>ID</b></th>
              <th width="10%" height="35"  align="center" scope="col"><b>COD POSICION</b></th>
              <th width="30%" height="35"  align="center" scope="col" ><b>DESCRIPCION</b></th>
              <th width="20%" align="center" scope="col"><b>Status</b></th>
              <th width="10%" height="35"  align="center" scope="col"><b>Opciones</b></th>
              </tr>
             </thead>
             
              <?php do { ?>
              <tr class="odd">
              <td  height="26" align="center" ><?php echo $row_modulo['id_pos']; ?></td>
              <td  height="26" align="center" ><?php echo $row_modulo['cod_pos']; ?></td>
              <td  height="26" align="center" ><?php echo $row_modulo['des_pos']; ?></td>
             
              <td  align="center" >
					<?php //CAMBIAR EL STATUS ?>
              <form action="<?php echo $editFormAction; ?>"  id="captchaform" method="POST" enctype="multipart/form-data" target="_self" class="cmxform" >
					<?php if ($row_modulo['status']==0){ ?><input type="submit" name="Aceptar" id="Aceptar" value="" style="background-image:url('../../images/iconfinder/not.gif');background-repeat:no-repeat;border:0px;width:25px;height:23px;cursor:pointer;" /><?php }  ?>
					<?php if ($row_modulo['status']==1){ ?><input type="submit" name="Aceptar" id="Aceptar" value="" style="background-image:url('../../images/iconfinder/yes.gif');background-repeat:no-repeat;border:0px;width:25px;height:23px;cursor:pointer;" /><?php }  ?>
					<input type="hidden" name="status" id="status" value="<?php echo $row_modulo['status'];?>">
					<input type="hidden" name="id_pos" id="id_pos" value="<?php echo $row_modulo['id_pos'];?>">
					<input type="hidden" name="MM_insert" value="captchaform">	           
              </form>
              <?php //FIN DE CAMBIAR EL STATUS ?>              
              </td>
				  <td  align="center" ><a href="modificar.php?id=<?php echo $row_modulo['id_pos'];?>"><img src="../../images/png/32px-Crystal_Clear_action_reload.png" alt="" width="16" ></a>&nbsp;<?php if($row_usua['cod']==5) {?><a href="eliminar.php?id=<?php echo $row_modulo['id_pos'];?>" class="ask-custom"><img src="../../images/png/cancel_f2.png" alt="" width="16"></a> <?php } ?></td>
        
              </tr>
              <?php } while ($row_modulo = mysql_fetch_assoc($modulo)); ?>
            </table>
            
            </div>
            <?php } ?>
           <?php if (($totalRows_modulo==0)){ ?> 
            <br>
            <center>
            <img src="../../images/iconfinder/vacio.png" alt="" width="200">
				<p style="font-size:19px;">"No Hay Posiciones Registradas!"</p>            
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
</center>
<?php }else { ?>
<center>
<img src="../../images/iconfinder/1381304398_no_entry.png" alt="" width="200">
<p style="font-size:19px;">"No estas autorizado para realizar cambios!"</p>
</center>
<?php } ?>	
</body>

</html>