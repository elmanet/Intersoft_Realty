<?php


mysql_select_db($database_sistemai, $sistemai);
$query_menus = sprintf("SELECT * FROM sis_plantilla_menu");
$menus = mysql_query($query_menus, $sistemai) or die(mysql_error());
$row_menus = mysql_fetch_assoc($menus);
$totalRows_menus = mysql_num_rows($menus);

mysql_select_db($database_sistemai, $sistemai);
$query_articulos = sprintf("SELECT * FROM sis_plantilla_articulos");
$articulos = mysql_query($query_articulos, $sistemai) or die(mysql_error());
$row_articulos = mysql_fetch_assoc($articulos);
$totalRows_articulos = mysql_num_rows($articulos);

mysql_select_db($database_sistemai, $sistemai);
$query_articulos_cate = sprintf("SELECT * FROM sis_plantilla_articulo_categoria");
$articulos_cate = mysql_query($query_articulos_cate, $sistemai) or die(mysql_error());
$row_articulos_cate = mysql_fetch_assoc($articulos_cate);
$totalRows_articulos_cate = mysql_num_rows($articulos_cate);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />

<script> 
$(document).ready(function() {
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

 	if($("#titulo_link").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> El Link debe tener un Título/Nombre").show();
      

        return false;  
    }  
    
 var url = "modules/plantilla-menu/grabando.php"; // El script a dónde se realizará la petición.


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
              url = "index.php?mod=gestor-menu";
              $(location).attr('href',url);
              },1000);

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
<!-- FORMULARIO REGISTRO NUEVO CLIENTE -->
<div class="box box-warning">
     <div class="box-header">
            <h3 class="box-title">Agregar Nuevo Link</h3>
     </div><!-- /.box-header -->
<div class="box-body">

 <form   id="captchaform" method="POST"  enctype="multipart/form-data" >



<table>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="titulo_link" placeholder="Titulo del Link" name="titulo_link" value="" style="width:300px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>	
			<select name="id_menu" id="id_menu" class="form-control">
			<?php do { ?>
			<option value="<?php echo $row_menus['id_menu']; ?>"><?php echo $row_menus['descripcion']; ?></option>
			<?php } while ($row_menus = mysql_fetch_assoc($menus));
			$rows = mysql_num_rows($menus);
			if($rows > 0) {
			mysql_data_seek($menus, 0);
			$row_menus = mysql_fetch_assoc($menus);
			}
			?>
			</select>		
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<small>Tipo de Link</small>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>	
			<select name="tipo_link" id="tipo_link" class="form-control">            
             	<option value="1">Art&iacute;culo Simple</option> 
				<option value="2">Categor&iacute;a Art&iacute;culos</option>
				<option value="3">Url Interna</option>   
				<option value="4">Url Externa</option> 
				<option value="5">Categor&iacute;a de Productos</option>           
             </select>		
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<small>Seleccionar Artículo</small>	
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>	
			<select name="id_articulo" id="id_articulo" class="form-control">
            <?php do { ?>
            <option value="<?php echo $row_articulos['id_articulo']; ?>"><?php echo $row_articulos['titulo_articulo']; ?></option>
            <?php } while ($row_articulos = mysql_fetch_assoc($articulos));
		  	$rows = mysql_num_rows($articulos);
		  	if($rows > 0) {
		    mysql_data_seek($articulos, 0);
			$row_articulos = mysql_fetch_assoc($articulos);
			}
			?>
            </select>			
			</div>
			</td>
		</tr>

			<tr>	
			<td>
			<small>Categoría de Artículos</small>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>
			<select name="id_art_cate" id="id_art_cate" class="form-control" style="width:300px;">
	             <?php do { ?>
	             <option value="<?php echo $row_articulos_cate['id_art_cate']; ?>"><?php echo $row_articulos_cate['descripcion']; ?></option>
	             <?php } while ($row_articulos_cate = mysql_fetch_assoc($articulos_cate));
			  	   $rows = mysql_num_rows($articulos_cate);
			  	   if($rows > 0) {
			           mysql_data_seek($articulos_cate, 0);
				  $row_articulos_cate = mysql_fetch_assoc($articulos_cate);
					 }
				   ?>
             </select>	

			</div>
			</td>
		</tr>

		<tr>	
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="url_int" placeholder="URL Interna" name="url_int" value="" style="width:300px;" /></td>
			</div>
			</td>
		</tr>

		<tr>	
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="url_ext" placeholder="URL Externa" name="url_ext" value="" style="width:300px;" /></td>
			</div>
			</td>
		</tr>

		<tr>	
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="orden" placeholder="Onden" name="orden" value="" style="width:80px;" /></td>
			</div>
			</td>
		</tr>
			
		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><a href="index.php?mod=gestor-menu" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <a href="#" id="grabar" class="btn btn-primary btn-lg"><i class="fa fa-th-large"></i><span> Grabar Nuevo</span></a></td>
		</tr>
 		</table>

    
      <input type="hidden" name="id_art_cate" id="id_art_cate" value="">
      <input type="hidden" name="status" id="status" value="1">

</form>  

<!-- FIN DE NUEVO INGRESO -->	
<div id="message" class="alert alert-success alert-dismissable" style="width:300px;position:relative;z-index:10 !important;">
   <i class="fa fa-check"></i><p></p></div>

<!-- FIN DE CLIENTE NUEVO INGRESO -->	
</div>
</div>


		
</center>
</body>
</html>

	