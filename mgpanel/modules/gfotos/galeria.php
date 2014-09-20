<?php
require_once('../inc/conexion_sinsesion_modules.inc.php'); 
require_once('../inc/config.inc.php');

mysql_select_db($database_sistemai, $sistemai);
$query_modulo = "SELECT * FROM sis_galeria";
$modulo = mysql_query($query_modulo, $sistemai) or die(mysql_error());
$row_modulo = mysql_fetch_assoc($modulo);
$totalRows_modulo = mysql_num_rows($modulo);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<title><?php echo $row_config['title_site'];?></title>

	<link rel="stylesheet" href="../../css/lightbox.css" media="screen"/>
	<script src="../../js/modernizr.custom.js"></script>
	<script src="../../js/jquery-1.10.2.min.js"></script>
	<script src="../../js/lightbox-2.6.min.js"></script>
</head>
<body>

<center>

<br>

<?php if ($totalRows_modulo>0){ ?>            

             
              <?php do { ?>
              <div >
              <?php if($row_modulo['ruta']=="imagenes/"){ ?>
              <img src="../../images/iconfinder/no-imagen2.png" alt="" height="120" >
              
              <?php } else { ?>
	
              <div class="image-row" style="float:left;position:relative;padding:3px;">
             	 <a  href="<?php echo $row_modulo['ruta']; ?>" data-lightbox="example-set"><img src="<?php echo $row_modulo['ruta']; ?>"  class="example-image" alt="" height="120" ></a>
              </div>
    
              <?php } ?>
              </div>
             
              <?php } while ($row_modulo = mysql_fetch_assoc($modulo)); ?>
   
            

            <?php } ?>
            <?php if (($totalRows_modulo==0)){ ?> 
            <br>
            <center>
            <img src="../../images/iconfinder/vacio.png" alt="" width="200">
				<p style="font-size:19px;">"No Hay Fotos en la Galer&iacute;a!"</p>            
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

</body>

</html>