<?php 

$idp=$_GET['135798642Detalle'];

mysql_select_db($database_sistemai, $sistemai);
$query_anuncio = "SELECT *  FROM sis_anuncio a, sis_anuncio_categoria b WHERE a.id_anuncio='$idp' AND a.status=1 AND a.id_categoria=b.id_cat ORDER BY a.creado DESC";
$anuncio = mysql_query($query_anuncio, $sistemai) or die(mysql_error());
$row_anuncio = mysql_fetch_assoc($anuncio);
$totalRows_anuncio = mysql_num_rows($anuncio);

mysql_select_db($database_sistemai, $sistemai);
$query_anunciofoto = "SELECT b.ruta FROM sis_anuncio a, sis_anuncio_foto b WHERE a.id_anuncio='$idp' AND a.id_anuncio=b.id_anuncio";
$anunciofoto = mysql_query($query_anunciofoto, $sistemai) or die(mysql_error());
$row_anunciofoto = mysql_fetch_assoc($anunciofoto);
$totalRows_anunciofoto = mysql_num_rows($anunciofoto);

?>
<?php require_once('modules/inc/barra_buscar.inc.php'); ?>
<hr>
<div style="width:90%;margin:auto;">
<h1><?php echo $row_anuncio['titulo_espanol']; ?>  <span style="font-size:15px;"> - <a href="javascript:history.back()">Regresar</a></span><br>
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
<br>
<span class="p12">
<?php 
$preciov=$row_anuncio['preciov'];
$precioa=$row_anuncio['precioa'];
if($row_anuncio['preciov']>0) {
        echo "Venta: ".$row_config['simbolo_moneda']." ".number_format($preciov,2,'.',',');
        }
 if($row_anuncio['precioa']>0) {
        echo "Alquiler: ".$row_config['simbolo_moneda']." ".number_format($precioa,2,'.',',');
        }
 ?></span><br>
 <br>


</div>
</div>
<div style="width:100%;float:left;">
<p><?php echo $row_anuncio['des_espanol']; ?></p>
</div>

<h1>Comentarios</h1>
<div class="fb-comments" data-href="http://<?php echo $row_config['website'];?>/index.php?mg=anuncios-detalle&135798642Detalle=<?php echo $row_anuncio['id']; ?>" data-width="600" data-numposts="5" data-colorscheme="light"></div>
</div>
