<div style="width:100%;">
	<div style="float:left; width:80%;padding-left:8%;box-sizing:border-box; ">
		<div style="float:left;"><img src="images/logo_tienda.png" alt="" ></div>
	</div>
	<div style="float:left; width:20%; ">
	
		<div style="float:left;padding-top:7px;;">
		 <span class="texto_pequeno_gris" style="color:#fff;"> 
			<b>HOLA! </b> <?php echo $row_usua['nombre_usuario'];?>&nbsp;&nbsp;&nbsp; <br><br>
			<a href="<?php echo $logoutAction ?>"><span class="texto_pequeno_gris" style="color:#fff;">&nbsp;&nbsp;&nbsp;&nbsp;<b>CERRAR SESION</b></span></a>
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
</div>
