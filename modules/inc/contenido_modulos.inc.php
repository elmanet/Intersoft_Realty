<?php if($_GET['mg']==""){ //CONSULTA DE MODULOS	?> 
			<?php if($_GET['mod']==""){?>
			<?php do { ?>		
				<div>	
				   <?php /* require_once('modules/index/articulos_portada.php'); */?>	
				   <?php echo $row_contenido['contenido']; ?>	
				</div>		
			<?php } while ($row_contenido = mysql_fetch_assoc($contenido)); ?>
			<?php }else{ ?>	     
              <?php require_once('modules/index/link.php'); ?>
          <?php } ?>
          <?php  }else { //SI EXISTE MODULO  ?>
            <?php if($_GET['mg']=="categoria-de-articulos"){ // CONSULTA POR ARTICULOS ?>
			      <?php require_once('modules/index/articulos_categoria.php'); ?>
			   <?php } ?>
            <?php if($_GET['mg']=="mi-cuenta"){ // MODULO MI CUENTA ?>
			      <?php require_once('modules/productos/micuenta.php'); ?>
			   <?php } ?>
			   
			   <?php if($_GET['mg']=="carrito"){ // MODULO CARRITO DETALLE ?>
			      <?php require_once('modules/productos/carrito_detalle.php'); ?>
			   <?php } ?>
			   
			   <?php if($_GET['mg']=="agregando-producto"){ // AGREGANDO A CARRITO  ?>
			      <?php require_once('modules/productos/detalle2.php'); ?>
			   <?php } ?>
			   
			    <?php if($_GET['mg']=="compra-exitosa"){ // COMPRA EXITOSA  ?>
			      <?php require_once('modules/productos/carrito_compra2.php'); ?>
			   <?php } ?>
			   
			   <?php if($_GET['mg']=="productos"){ // MODULO PRODUCTOS GENERAL ?>
			      <?php require_once('modules/productos/productos_general.inc.php'); ?>
			   <?php } ?>
			   
			    <?php if($_GET['mg']=="categoria-de-productos"){ // MODULO PRODUCTOS CATEGORIA ?>
			      <?php require_once('modules/productos/productos.inc.php'); ?>
			   <?php } ?>
			   
            <?php if($_GET['mg']=="buscar-productos"){ // MODULO PRODUCTOS BUSCAR ?>
			      <?php require_once('modules/productos/productos_buscar.inc.php'); ?>
			   <?php } ?>
			   
			   <?php if($_GET['mg']=="producto-detalle"){ // MODULO PRODUCTO DETALLE ?>
			      <?php require_once('modules/productos/detalle.php'); ?>
			   <?php } ?>


			   <?php /* ****** MODULO ANUNCIOS ******** */ ?>

			   <?php if($_GET['mg']=="anuncios"){ // MODULO anuncios GENERAL ?>
			      <?php require_once('modules/anuncios/anuncios_general.inc.php'); ?>
			   <?php } ?>
			   
			    <?php if($_GET['mg']=="categoria-de-anuncios"){ // MODULO anuncios CATEGORIA ?>
			      <?php require_once('modules/anuncios/anuncios.inc.php'); ?>
			   <?php } ?>
			   
            <?php if($_GET['mg']=="buscar-anuncios"){ // MODULO anuncios BUSCAR ?>
			      <?php require_once('modules/anuncios/anuncios_buscar.inc.php'); ?>
			   <?php } ?>
			   
			   <?php if($_GET['mg']=="anuncios-detalle"){ // MODULO PRODUCTO DETALLE ?>
			      <?php require_once('modules/anuncios/detalle.php'); ?>
			   <?php } ?>
			   
			   <?php /* ****** FIN MODULO ANUNCIOS ******** */ ?>


			   <?php if($_GET['mg']=="galeria-fotos"){ // GALERIA DE FOTOS ?>
                	<h1 style="margin-bottom:0px;">Galer&iacute;a de Fotos</h1>
			           <?php if ($totalRows_modulo>0){ ?>			
							  <?php do { ?>
							  <div >
								  <?php if($row_modulo['ruta']=="imagenes/"){ ?>
									  <img src="mgpanel/images/iconfinder/no-imagen2.png" alt="" height="120" >
				              <?php } else { ?>
					              <div class="image-row" style="float:left;position:relative;padding:3px;">
									  <a  href="mgpanel/modules/gfotos/<?php echo $row_modulo['ruta']; ?>" data-lightbox="example-set"><img src="mgpanel/modules/gfotos/<?php echo $row_modulo['ruta']; ?>"  class="example-image" alt="" height="180" ></a>
								     </div>
		                    <?php } ?>
			              </div>  
			    	        <?php } while ($row_modulo = mysql_fetch_assoc($modulo)); ?>
                   <?php } ?>
						<?php if (($totalRows_modulo==0)){ ?> 
						<br>
						<center>
						<img src="mgpanel/images/iconfinder/vacio.png" alt="" width="200">
							<p style="font-size:19px;text-align:center;">"No Hay Fotos en la Galer&iacute;a!"</p>			
						</center>
						<?php } ?>
				<?php } ?>
				
				<?php if($_GET['mg']=="contacto"){ // MODULO PRODUCTOS DETALLE ?>
				   <?php require_once('modules/index/link.php'); ?>
			      <?php require_once('modules/correos/index.php'); ?>
			   <?php } ?>		
			   
			<?php } // FIN DE CONSULTA DE MODULOS 	?>