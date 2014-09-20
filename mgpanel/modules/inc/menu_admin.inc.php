<div class="wrap">

	<nav>
	
		<ul class="menu">
		  <li><img src="images/logo-cms.png" height="60" alt="" /></li>
			<li><a href="index.php"><img src="images/iconspng/1371153398_home.png" width="32" height="32" alt="" /></a></li>
			<li><a href="#"><img src="images/iconspng/1371153440_hire-me.png" width="32" height="32" alt="" /></a>
				<ul>
					<li><a href="modules/usuarios/admin.php" target="frame">Gestor de Usuarios</a></li>
					<li><a href="modules/usuarios/nuevo.php" target="frame">Nuevo Usuario</a></li>
				</ul>
			</li>
			<?php if($row_config['tienda']==1) { //MOSTRAR SI ESTA ACTIVA TIENDA?>
			<li><a href="#"><img src="images/iconspng/1371153521_free-for-job.png" width="32" height="32" alt="" /></a>
				<ul>
					<li><a href="modules/productos/admin.php" target="frame">Gestor de Productos</a></li>
					<li><a href="modules/productos-categoria/admin.php" target="frame">Gestor de Categor&iacute;as</a></li>
					<li><a href="modules/productos-marca/admin.php" target="frame">Gestor de Fabricantes/Marcas</a></li>
					
				</ul>
			</li>
			<li><a href="#"><img src="images/iconspng/1371153448_search.png" width="32" height="32" alt="" /></a>
				<ul>
					<li><a href="modules/pedidos/admin.php" target="frame">Listado de Pedidos</a></li>
					
				</ul>
			</li>
			<li><a href="#"><img src="images/iconspng/1371153415_finished-work.png" width="32" height="32" alt="" /></a>
				<ul>
					
					<li><a href="modules/formas_depago/admin.php" target="frame">Formas de Pago</a></li>
					<li><a href="modules/formas_deenvio/admin.php" target="frame">Tipo de Envios</a></li>
				</ul>
			</li>
			<?php } //CONDICION PARA LA TIENDA VIRTUAL ?>
			<?php if($row_usua['cod']>=4) {?>
			<li><a href="#"><img src="images/iconspng/1371153530_pencil.png" width="32" height="32" alt="" /></a>
				<ul>
				   <li><a href="../index.php" target="_blank">Ver Sitio</a></li>
				   <li><hr></li>	
					<li><a href="modules/plantilla/admin.php" target="frame">Gestor de M&oacute;dulos</a></li>	
					<li><a href="modules/banners/admin.php" target="frame">Gestor de Banners</a></li>				
					<li><a href="modules/plantilla-menu/admin.php" target="frame">Gestor de Men&uacute;</a></li>		
					<li><a href="#" >Art&iacute;culos</a>
						 <ul>
						 <li><a href="modules/plantilla-articulos/admin.php" target="frame">Gestor de Art&iacute;culos</a></li>
						 <li><a href="modules/plantilla-articulos-categoria/admin.php" target="frame">Gestor de Categor&iacute;as</a></li></ul></li>
					<li><hr></li>					
					<li><a href="modules/file/ft2.php" target="frame">Gestor Multimedia</a></li>
					<!--<li><hr></li>	
					<li><a href="modules/oficina_virtual/modificar.php" target="frame">Oficina Virtual</a></li>
					-->
				</ul>
			</li>
			<li><a href="#"><img src="images/iconspng/1371153483_lightbulb.png" width="32" height="32" alt="" /></a>
				<ul>
				   <li><a href="modules/gfotos/admin.php" target="frame">Gestor de Galer&iacute;a</a></li>
				   <li><a href="modules/gfotos-categoria/admin.php" target="frame">Gestor de Categor&iacute;as</a></li>
					
				</ul>
			</li>
			<?php } ?>
			<?php if($row_usua['cod']>3) {?>
			<li><a href="#"><img src="images/iconspng/1371153504_settings.png" width="32" height="32" alt="" /></a>
				<ul>
					<li><a href="modules/confi_tienda/modificar.php" target="frame">Configurar Sitio</a></li>
				<?php if($row_usua['cod']==5) {?>
				   <li><a href="modules/confi-posiciones/admin.php" target="frame">Configurar Posiciones</a></li>
					<li><a href="editor/ft2.php" target="frame">Editor de Web</a></li>
				<?php } ?>

				</ul>
			</li>
			<?php } ?>
		</ul>
		
		
			<div style="float:right; margin-top:5px;">
	
		<div style="float:left;padding-top:7px;">
		 <span class="texto_pequeno_gris" style="color:#000;"> 
			<b>HOLA! </b> <?php echo strtoupper($row_usua['nombre_usuario']);?>&nbsp;&nbsp;&nbsp; <br><br>
			<a href="<?php echo $logoutAction ?>"><span style="color:#000;font-size:12px;">&nbsp;&nbsp;<strong>CERRAR SESION</strong></span></a>&nbsp;&nbsp;&nbsp;
		 </span> 
		</div>
	<div style="float:left;">
		<?php if($row_usua['ruta'] == "imagenes/") { ?>
		<img src="images/pngnew/blanco-naranja-usuario-masculino-icono-6118-48.png" alt="" height="35" align="middle" style="border:1px solid;background-color:#fff;">
			<?php } else { ?>
			<img src="modules/usuarios/<?php echo $row_usua['ruta'];?>" alt="" height="35" align="middle" style="border:1px solid;">
		<?php } ?>
	</div>
	
</div>
		<div class="clearfix"></div>
	</nav>
	</div>