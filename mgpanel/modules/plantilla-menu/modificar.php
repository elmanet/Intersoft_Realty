<?php

// SQL PARA REGISTRO DE DATOS

  
$colname_modulos = "-1";
if (isset($_GET['id'])) {
  $colname_modulos = $_GET['id'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_modulos = sprintf("SELECT * FROM sis_plantilla_menu_link a, sis_plantilla_menu b WHERE a.id_menu=b.id_menu AND a.id_menu_link=%s", GetSQLValueString($colname_modulos, "int"));
$modulos = mysql_query($query_modulos, $sistemai) or die(mysql_error());
$row_modulos = mysql_fetch_assoc($modulos);
$totalRows_modulos = mysql_num_rows($modulos);


mysql_select_db($database_sistemai, $sistemai);
$query_menusis = sprintf("SELECT * FROM sis_plantilla_menu");
$menusis = mysql_query($query_menusis, $sistemai) or die(mysql_error());
$row_menusis = mysql_fetch_assoc($menusis);
$totalRows_menusis = mysql_num_rows($menusis);

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
    
    
 var url = "modules/plantilla-menu/modificando.php"; // El script a dónde se realizará la petición.


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

<!-- FORMULARIO REGISTRO NUEVO USUARIO -->

<div class="box box-warning">
     <div class="box-header">
            <h3 class="box-title">Modificar Link</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<form   id="captchaform" method="POST"   enctype="multipart/form-data" >
<table>

		<tr>	
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="titulo_link" placeholder="Titulo de Link" name="titulo_link" value="<?php echo $row_modulos['titulo_link'];?>" style="width:300px;" /></td>
			</div>
			</td>
		</tr>

		<tr>	
			<td>
			<small>Menú al que Pertenece</small>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>
			<select name="id_menu" id="id_menu" class="form-control" style="width:300px;">
			<option value="<?php echo $row_modulos['id_menu'];?>">No Modificar...</option>
			<?php do { ?>
				<option value="<?php echo $row_menusis['id_menu']; ?>"><?php echo $row_menusis['id_menu']." - ".$row_menusis['descripcion']; ?></option>
				<?php } while ($row_menusis = mysql_fetch_assoc($menusis));
				$rows = mysql_num_rows($menusis);
				if($rows > 0) {
				mysql_data_seek($menusis, 0);
				$row_menusis = mysql_fetch_assoc($menusis);
			}?>
			</select>	
			</div>
			</td>
		</tr>

		<tr>	
			<td>
			<small>Tipo de Link</small>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>
			<select name="tipo_link" id="tipo_link" class="form-control" style="width:300px;">   
             		<option value="<?php echo $row_modulos['tipo_link'];?>">No Modificar...</option> 
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
			<select name="id_articulo" id="id_articulo" class="form-control" style="width:300px;">
			<option value="<?php echo $row_modulos['id_articulo'];?>">No Modificar...</option> 
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
				<option value="<?php echo $row_modulos['id_art_cate'];?>">No Modificar...</option> 
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
			<input class="form-control" type="text" id="url_int" placeholder="URL Interna" name="url_int" value="<?php echo $row_modulos['url_int'];?>" style="width:300px;" /></td>
			</div>
			</td>
		</tr>

		<tr>	
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="url_ext" placeholder="URL Externa" name="url_ext" value="<?php echo $row_modulos['url_ext'];?>" style="width:300px;" /></td>
			</div>
			</td>
		</tr>

		<tr>	
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="orden" placeholder="Onden" name="orden" value="<?php echo $row_modulos['orden'];?>" style="width:80px;" /></td>
			</div>
			</td>
		</tr>


		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><a href="index.php?mod=gestor-menu" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <a href="#" id="grabar" class="btn btn-primary btn-lg"><i class="fa fa-th-large"></i><span> Grabar Nuevo</span></a></td>
		</tr>
 		</table>


    <input type="hidden" name="id_menu_link" id="id_menu_link" value="<?php echo $row_modulos['id_menu_link'];?>">

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