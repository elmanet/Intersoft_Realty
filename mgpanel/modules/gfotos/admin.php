<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

mysql_select_db($database_sistemai, $sistemai);
$query_modulo = "SELECT a.id_foto, a.ruta, a.creado, a.creado, b.titulo_cate FROM sis_galeria a, sis_galeria_categoria b WHERE a.id_foto_cate=b.id_cate ORDER BY a.creado DESC";
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
<!--<script type="text/javascript" src="../../js/jquery-1.4.2.min.js"></script>-->
<script type="text/javascript" src="../../js/jconfirmaction.jquery.js"></script>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Karla:400,700">
	<link rel="stylesheet" href="../../css/lightbox.css" media="screen"/>
	<script src="../../js/modernizr.custom.js"></script>
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
<body>
<div class="boton_modulos">
<a href="nuevo.php" ><img src="../../images/iconspng/1371153548_sign-up.png" width="28" height="28" alt="" valign="middle" /> Nuevo</a>
</div>
<center>

<br>

<?php if ($totalRows_modulo>0){ ?>            
<div class="tablaestilo">
		<table summary="Usuarios" width="90%">
				<caption>GESTOR DE FOTOGRAFIAS</caption>
				<thead>
              <tr >
 				 <th width="20%" height="35"  align="center" scope="col" ><b>Foto</b></th>
              <th width="30%" height="35"  align="center" scope="col" ><b>Categor&iacute;a</b></th>
					<th width="20%" align="center" scope="col"><b>Fecha Subida</b></th>
              <th width="10%" height="35"  align="center" scope="col"><b>Opciones</b></th>
              </tr>
             </thead>
             
              <?php do { ?>
              <tr class="odd">
              <td  height="26" align="center" >
              <?php if($row_modulo['ruta']=="imagenes/"){ ?>
              <img src="../../images/iconfinder/no-imagen2.png" alt="" height="100" >
              <?php } else { ?>
	
              <div class="image-row">
             	 <a  href="<?php echo $row_modulo['ruta']; ?>" data-lightbox="example-set"><img src="<?php echo $row_modulo['ruta']; ?>"  class="example-image" alt="" height="100" ></a>
              </div>
    
              <?php } ?>
              </td>
              <td  height="26" align="center" ><?php echo $row_modulo['titulo_cate']; ?></td>
				  <td align="center" ><?php echo $row_modulo['creado']; ?></td>
                          
				  <td  align="center" ><a href="eliminar.php?id=<?php echo $row_modulo['id_foto'];?>&ruta=<?php echo $row_modulo['ruta'];?>" class="ask-custom"><img src="../../images/png/cancel_f2.png" alt="" width="25"></a></td>
        
              </tr>
              <?php } while ($row_modulo = mysql_fetch_assoc($modulo)); ?>
            </table>
            
            </div>
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
	<script src="../../js/jquery-1.10.2.min.js"></script>
	<script src="../../js/lightbox-2.6.min.js"></script>
</body>

</html>