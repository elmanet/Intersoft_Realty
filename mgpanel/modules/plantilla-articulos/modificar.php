<?php

// SQL PARA REGISTRO DE DATOS

$colname_modulos = "-1";
if (isset($_GET['id'])) {
  $colname_modulos = $_GET['id'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_modulos = sprintf("SELECT * FROM sis_plantilla_articulos WHERE id_articulo=%s", GetSQLValueString($colname_modulos, "int"));
$modulos = mysql_query($query_modulos, $sistemai) or die(mysql_error());
$row_modulos = mysql_fetch_assoc($modulos);
$totalRows_modulos = mysql_num_rows($modulos);

mysql_select_db($database_sistemai, $sistemai);
$query_categoria = sprintf("SELECT * FROM sis_plantilla_articulo_categoria");
$categoria = mysql_query($query_categoria, $sistemai) or die(mysql_error());
$row_categoria = mysql_fetch_assoc($categoria);
$totalRows_categoria = mysql_num_rows($categoria);
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

 	CKEDITOR.instances['contenido1'].updateElement();
 	
 	if($("#titulo_articulo").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> El Articulo debe tener un Titulo").show();
      

        return false;  
    }  

    if($("#alias").val().length < 2) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Debes tener un Alias tu Articulo").show();
      

        return false;  
    } 
   
    
 var url = "modules/plantilla-articulos/modificando.php"; // El script a dónde se realizará la petición.


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
				     url = "index.php?mod=gestor-blog";
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
            <h3 class="box-title">Modificar Articulo</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<form   id="captchaform" method="POST"   enctype="multipart/form-data" >


 		<table>
 		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="titulo_articulo" placeholder="Titulo del Articulo" name="titulo_articulo" value="<?php echo $row_modulos['titulo_articulo'];?>" style="width:300px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="alias" placeholder="Alias del Articulo" name="alias" value="<?php echo $row_modulos['alias'];?>" style="width:300px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<select name="id_art_cate" id="id_art_cate" class="form-control" style="width:300px;">
				<option value="<?php echo $row_modulos['id_art_cate']; ?>">Modificar...</option>
	            <?php do { ?>
		            <option value="<?php echo $row_categoria['id_art_cate']; ?>"><?php echo $row_categoria['descripcion']; ?></option>
		            <?php } while ($row_categoria = mysql_fetch_assoc($categoria));
				  	$rows = mysql_num_rows($categoria);
				  	if($rows > 0) {
				    mysql_data_seek($categoria, 0);
					$row_categoria = mysql_fetch_assoc($categoria);
				}?>
            </select>	
			</div>
			</td>
		</tr>

			
		<tr>
			<td>
			<div class="input-group">
				<label>Tipo de Articulo</label>
			    
         
			<?php if($row_modulos['tipo_articulo']==0) { ?><input type="radio" name="tipo_articulo" value="0" checked>Normal <input type="radio" name="tipo_articulo" value="1">Destacado <input type="radio" name="tipo_articulo" value="2">Portada<?php } ?>
         <?php if($row_modulos['tipo_articulo']==1) { ?><input type="radio" name="tipo_articulo" value="0" >Normal <input type="radio" name="tipo_articulo" value="1" checked>Destacado <input type="radio" name="tipo_articulo" value="2">Portada<?php } ?>
         <?php if($row_modulos['tipo_articulo']==2) { ?><input type="radio" name="tipo_articulo" value="0" >Normal <input type="radio" name="tipo_articulo" value="1">Destacado <input type="radio" name="tipo_articulo" value="2" checked>Portada<?php } ?>							
			</div>
			</td>	
		</tr>


		<tr>
			<td>
			<div class="input-group" id="coneditor" >
			
			<textarea name="contenido1" id="contenido1" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row_modulos['contenido'];?></textarea>

			</div>

			<div class="input-group" id="sineditor" style="width: 100%;">
			
			<textarea  name="contenido2" id="contenido2" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row_modulos['contenido'];?></textarea>
			<br><a href="#" id="cambiar2">Cambiar a modo Editor</a>
			</div>
			</td>
		</tr>
			


		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><a href="index.php?mod=gestor-blog" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <a href="#" id="grabar" class="btn btn-primary btn-lg"><i class="fa fa-th-large"></i><span> Modificar</span></a></td>
		</tr>
 		</table>

    
      <input type="hidden" name="id_articulo" id="id_articulo" value="<?php echo $row_modulos['id_articulo'];?>">
      <input type="hidden" name="status" id="status" value="1">

		</form>  

		<!-- FIN DE NUEVO INGRESO -->	
		<div id="message" class="alert alert-success alert-dismissable" style="width:300px;position:relative;z-index:10 !important;">
		   <i class="fa fa-check"></i><p></p></div>
		 </table>
		<!-- FIN DE CLIENTE NUEVO INGRESO -->	
		</div>
		</div>


				
		</center>

      <script src="js/plugins/ckeditor/ckeditor.js"></script>
      <script src="js/plugins/ckeditor/config.js"></script>
       

		<script type="text/javascript">
            $(function() {
            	 CKEDITOR.replace('contenido1',{
            	 	    filebrowserBrowseUrl : 'modules/file/ft2.php',
            	 		uiColor: '#c3c3c3',
						allowedContent: true
						
            	 		
            	 	});
            	
            });

            $(function(){
			   $("#cambiar1").click(function(){
				$("#sineditor").show();
				$("#coneditor").hide();
			   });

			   $("#cambiar2").click(function(){
				$("#sineditor").hide();
				$("#coneditor").show();
			   });

			   });
        </script>
		</body>
		</html>
