<?php 

$idp=$_GET['135798642Detalle'];

mysql_select_db($database_sistemai, $sistemai);
$query_anuncio = "SELECT * FROM sis_anuncio a, sis_anuncio_categoria b WHERE a.id_anuncio='$idp' AND a.status=1 AND a.id_categoria=b.id_cat ORDER BY a.creado DESC";
$anuncio = mysql_query($query_anuncio, $sistemai) or die(mysql_error());
$row_anuncio = mysql_fetch_assoc($anuncio);
$totalRows_anuncio = mysql_num_rows($anuncio);

mysql_select_db($database_sistemai, $sistemai);
$query_anuncio_beneficio = "SELECT * FROM sis_anuncio a, sis_anuncio_beneficios b WHERE a.id_anuncio='$idp' AND a.status=1 AND a.id_anuncio=b.id_anuncio";
$anuncio_beneficio = mysql_query($query_anuncio_beneficio, $sistemai) or die(mysql_error());
$row_anuncio_beneficio = mysql_fetch_assoc($anuncio_beneficio);
$totalRows_anuncio_beneficio = mysql_num_rows($anuncio_beneficio);

mysql_select_db($database_sistemai, $sistemai);
$query_anuncio_ubicacion = "SELECT * FROM sis_anuncio a, sis_anuncio_ubicacion b WHERE a.id_anuncio='$idp' AND a.status=1 AND a.id_ubicacion=b.id_ubi";
$anuncio_ubicacion = mysql_query($query_anuncio_ubicacion, $sistemai) or die(mysql_error());
$row_anuncio_ubicacion = mysql_fetch_assoc($anuncio_ubicacion);
$totalRows_anuncio_ubicacion = mysql_num_rows($anuncio_ubicacion);

mysql_select_db($database_sistemai, $sistemai);
$query_anunciofoto = "SELECT b.ruta FROM sis_anuncio a, sis_anuncio_foto b WHERE a.id_anuncio='$idp' AND a.id_anuncio=b.id_anuncio";
$anunciofoto = mysql_query($query_anunciofoto, $sistemai) or die(mysql_error());
$row_anunciofoto = mysql_fetch_assoc($anunciofoto);
$totalRows_anunciofoto = mysql_num_rows($anunciofoto);

?>
<?php require_once('modules/inc/barra_buscar.inc.php'); ?>
<hr>
<div style="width:90%;margin:auto;">
<h1><?php echo $row_anuncio['titulo_espanol']; ?>  <span style="font-size:15px;"> - <a href="javascript:history.back()">Back</a></span><br>
<span>
<div class="fb-share-button" data-href="http://<?php echo $row_config['website'];?>/index.php?mg=anuncios-detalle&135798642Detalle=<?php echo $row_anuncio['id']; ?>" data-type="button_count"></div>
</span>
</h1>
<div style="width:100%;float:left;">
<div class="fotoendetalle">
  <?php if($row_anuncio['ruta']=="imagenes/"){ ?>
  <img src="mgpanel/images/iconfinder/no-imagen2.png" alt="" height="150" >
  <?php } else { ?>

<div class="clearfix" id="content"  >
    <div class="clearfix">
    	
	<a href="imagesmg/<?php echo $row_anuncio['ruta']; ?>" class="jqzoom" rel='gal1'  title="<?php echo utf8_encode($row_anuncio['titulo_espanol']); ?>" >
	  <img src="imagesmg/<?php echo $row_anuncio['ruta']; ?>" width="100%" title="triumph" alt="" style="border:0px solid #000;" id="img_02" />
	</a>
    </div>
    
	<br/>
</div>
	<?php } ?>
</div>
<div class="precioendetalle">
	<?php if($totalRows_anunciofoto>0) { //COMPROBAMOS SI HAY MAS FOTOS ?>
   <div class="clearfix" >
	<ul id="thumblist" class="clearfix" >
	       <li><a  href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './imagesmg/<?php echo $row_anuncio['ruta']; ?>',largeimage: './imagesmg/<?php echo $row_anuncio['ruta']; ?>'}"><img src="imagesmg/<?php echo $row_anuncio['ruta']; ?>" width="80" height="80"></a></li>
			 <?php do { ?>		
				     <li><a  href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './imagesmg/<?php echo $row_anunciofoto['ruta']; ?>',largeimage: './imagesmg/<?php echo $row_anunciofoto['ruta']; ?>'}"><img src="imagesmg/<?php echo $row_anunciofoto['ruta']; ?>" width="80" height="80"></a></li>
			  <?php } while ($row_anunciofoto = mysql_fetch_assoc($anunciofoto)); ?> 
   </ul>
	</div>
	<?php } //FIN DE LA COMPROBACION ?>

</div>
</div>
<div style="width:100%;float:left;">
	<div style="width: 38%;float: left;background: #ECEAEA;border: 1px solid #CACACA;padding: 1%;">
		<h2>Features</h2>
		<p>
		<?php 
		$preciov=$row_anuncio['preciov'];
		$precioa=$row_anuncio['precioa'];
		if($row_anuncio['preciov']>0) {
		        echo "<b>Sale:</b> ".$row_config['simbolo_moneda']." ".number_format($preciov,2,'.',',');
		        }
		 if($row_anuncio['precioa']>0) {
		        echo "<br><b>Rental:</b> ".$row_config['simbolo_moneda']." ".number_format($precioa,2,'.',',');
		        }
		 ?><br>
		<b>Location:</b> <?php echo $row_anuncio_ubicacion['nombre_ubi']; ?><br>
		<?php if($row_anuncio['recama']>0){?><b>bedrooms:</b> <?php echo $row_anuncio['recama']; ?><br><?php } ?>
		<?php if($row_anuncio['banios']>0){?><b>Bathrooms:</b> <?php echo $row_anuncio['banios']; ?><br><?php } ?>
		<?php if($row_anuncio['estacio']>0){?><b>Parking:</b> <?php echo $row_anuncio['estacio']; ?><br><?php } ?>
		<?php if($row_anuncio['mconstru']>0){?><b>Construction Area:</b> <?php echo $row_anuncio['mconstru']; ?> Mts.<br><?php } ?>
		<?php if($row_anuncio['mterreno']>0){?><b>Meters of Land:</b> <?php echo $row_anuncio['mterreno']; ?> Mts.<br><?php } ?>
		<?php if($row_anuncio['tipo_pisos']>0){?><b>Type of Flooring:</b> <?php echo $row_anuncio['tipo_pisos']; ?><br><?php } ?>
		<?php if($row_anuncio['niveles']>0){?><b>levels:</b> <?php echo $row_anuncio['niveles']; ?><br><?php } ?>
		<?php if($row_anuncio['altura']>0){?><b>Height:</b> <?php echo $row_anuncio['altura']; ?><br><?php } ?>
		<?php if($row_anuncio['anios_constru']>0){?><b>Years of Construction:</b> <?php echo $row_anuncio['anios_constru']; ?><br><?php } ?>
		<?php if($row_anuncio['piso_num']>0){?><b>Apartment Number:</b> <?php echo $row_anuncio['piso_num']; ?><br><?php } ?>
		<?php if($row_anuncio['costo_mante']>0){?><b>Maintenance Cost:</b> <?php echo $row_anuncio['costo_mante']; ?><br><?php } ?>
		<b>swimming pool:</b> <?php if($row_anuncio['piscina']==1) echo "Si"; if($row_anuncio['piscina']==0) echo "No"; ?><br>
		<b>balcony:</b> <?php if($row_anuncio['balcon']==1) echo "Si"; if($row_anuncio['balcon']==0) echo "No"; ?><br>
		

		</p>
	</div>	

	<div style="width:55%;margin-left:4%;float:left;">
		<p><?php echo $row_anuncio['des_espanol']; ?></p>
	</div>
</div>

</div>
