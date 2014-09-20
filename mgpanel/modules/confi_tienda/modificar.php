<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

// INICIO DE BUSQUEDAS SQL
$colname_usua = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_usua = $_SESSION['MM_Username'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_usua = sprintf("SELECT * FROM sis_users a, sis_users_cuenta b, sis_users_tipo c WHERE a.id_usuario=b.id_usuario AND a.id_user_tipo=c.id_user_tipo AND b.username = %s", GetSQLValueString($colname_usua, "text"));
$usua = mysql_query($query_usua, $sistemai) or die(mysql_error());
$row_usua = mysql_fetch_assoc($usua);
$totalRows_usua = mysql_num_rows($usua);

// SQL PARA REGISTRO DE DATOS

  
mysql_select_db($database_sistemai, $sistemai);
$query_modulos = sprintf("SELECT * FROM sis_config");
$modulos = mysql_query($query_modulos, $sistemai) or die(mysql_error());
$row_modulos = mysql_fetch_assoc($modulos);
$totalRows_modulos = mysql_num_rows($modulos);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<script> 
$(document).ready(function() {
 	$("#sineditor").hide();
	$('#message').hide();
	$('#msgerror').hide();
	$("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
}); 
$(function(){
 $("#grabar").click(function(){

 	
 	
    
 var url = "modules/confi_tienda/modificando.php"; // El script a dónde se realizará la petición.


    $.ajax({

         type: "POST",
           url: url,
           data: $("#captchaform").serialize(), // Adjuntar los campos del formulario enviado.

           success: function(data) {
           		$('#message').show();
           		$('#msgerror').hide();
            	
                $("#message p").html("Guardado con Exito!").show();
                
                $('#captchaform').hide();

                setTimeout(function() {
    				$("#divtest").load('modules/confi_tienda/modificar.php');
  				},500);

            }
         });
 

    return false; // Evitar ejecutar el submit del formulario.
 });

});


</script>
</head>

<body>

<center>
<br>
<div id="msgerror" class="alert alert-warning alert-dismissable" style="width:300px;position:absolute;z-index:10 !important;right:5px;">
   <i class="fa fa-warning"></i><p></p></div>

<!-- FORMULARIO REGISTRO NUEVO USUARIO -->

<div class="box box-warning">
     <div class="box-header">
            <h3 class="box-title">Configuración General del Sistema</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<form   id="captchaform" method="POST"   enctype="multipart/form-data" >

<div class="box-formulario1">
<table>
 		
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="title_site" placeholder="Titulo del Sitio" name="title_site" value="<?php echo $row_modulos['title_site'];?>" style="width:300px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<textarea  class="form-control fm" COLS=50 ROWS=3  id="meta_des" name="meta_des" placeholder="Descripción del Sitio"><?php echo $row_modulos['meta_des'];?></textarea>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="email" placeholder="Email de Contacto" name="email" value="<?php echo $row_modulos['email'];?>" style="width:300px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="website" placeholder="website" name="website" value="<?php echo $row_modulos['website'];?>" style="width:300px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="meta_clave" placeholder="Palabras Clave del Sitio" name="meta_clave" value="<?php echo $row_modulos['meta_clave'];?>" style="width:300px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="id_google" placeholder="ID Google Analytics" name="id_google" value="<?php echo $row_modulos['id_google'];?>" style="width:300px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="fuente_google" placeholder="Codigo Fuente Google" name="fuente_google" value="<?php echo $row_modulos['fuente_google'];?>" style="width:300px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="tipof_google" placeholder="Tipo Fuente Google" name="tipof_google" value="<?php echo $row_modulos['tipof_google'];?>" style="width:300px;" />
			</div>
			</td>
		</tr>

		
	<?php if($row_usua['cod']==5) {?>
		<tr>
			<td>
			<label> Tienda Virtual: </label>
			<?php if($row_modulos['tienda']==1) {?>
			<input type="radio" name="tienda" value="1" checked>Si
			<input type="radio" name="tienda" value="0">No
			<?php }else {?>
			<input type="radio" name="tienda" value="1" >Si
         <input type="radio" name="tienda" value="0" checked>No
         <?php }?>
        <?php } else { ?>	
			<?php if($row_modulos['tienda']==1) {?>
			<input type="hidden" name="tienda" value="1">
			<?php }else {?>
			<input type="hidden" name="tienda" value="0">
         <?php }?>
		</tr>
	<?php }  ?>	

</table>
</div>


<?php if($row_modulos['tienda']==1) {?>
<div class="box-formulario2">
	<table>
 
		<tr>
			
			<td>
			<label> Modo Cat&aacute;logo: </label>
			<?php if($row_modulos['catalogo']==1) {?>
			<input type="radio" name="catalogo" value="1" checked>Si
			<input type="radio" name="catalogo" value="0">No
			<?php }else {?>
			<input type="radio" name="catalogo" value="1" >Si
        	<input type="radio" name="catalogo" value="0" checked>No
         	<?php }?>
			
			
			</td>
			
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="simbolo_moneda" placeholder="$" name="simbolo_moneda" value="<?php echo $row_modulos['simbolo_moneda'];?>" style="width:40px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="impuesto" placeholder="%" name="impuesto" value="<?php echo $row_modulos['impuesto'];?>" style="width:70px;" />
			<small> Sin Impuesto (Valor 0.00)</small>
			</div>

			</td>
		</tr>

	
		<tr>
			<td>
			<label> Activar env&iacute;os: </label>
			<?php if($row_modulos['envios']==1) {?>
			<input type="radio" name="envios" value="1" checked>Si
			<input type="radio" name="envios" value="0">No
			<?php }else {?>
			<input type="radio" name="envios" value="1" >Si
         <input type="radio" name="envios" value="0" checked>No
         <?php }?>
		<tr><td>&nbsp;</td></tr>
		</table>
	

		<?php }else { ?>
		<input type="hidden" id="impuesto" name="impuesto" value="<?php echo $row_modulos['impuesto'];?>">
		<input type="hidden" id="simbolo_moneda" name="simbolo_moneda" value="<?php echo $row_modulos['simbolo_moneda'];?>">
		<input type="hidden" id="envios" name="envios" value="<?php echo $row_modulos['envios'];?>"></td>
      <?php } ?>
 	
 	<a href="index.php" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <a href="#" id="grabar" class="btn btn-primary btn-lg"><i class="fa fa-th-large"></i><span> Modificar</span></a>
	<input type="hidden" name="id_config" id="id_config" value="<?php echo $row_modulos['id_config'];?>">
	
</form>  

		<!-- FIN DE NUEVO INGRESO -->	
		<div id="message" class="alert alert-success alert-dismissable" style="width:300px;position:relative;z-index:10 !important;">
		   <i class="fa fa-check"></i><p></p></div>
		 </table>
		<!-- FIN DE CLIENTE NUEVO INGRESO -->	
		</div>
		</div>


				
		</center>

		</body>
		</html>
