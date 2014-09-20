<?php

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
<!-- bootstrap wysihtml5 - text editor -->

<style>

#progress { position:relative; width:200px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
#bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
#percent { position:absolute; display:inline-block; top:3px; left:48%; }
</style>



<script src="js/jquery.form.js"></script> 
 
    <script> 
        $(document).ready(function() {  
        	$("#sineditor").hide();
			$('#message').hide();
			$('#msgerror').hide();
			$("#progress").hide();
		 	$("form").keypress(function(e) {
       			if (e.which == 13) {
            return false;
        	}
    		});

 $("#grabar").click(function(){

 	CKEDITOR.instances['contenido1'].updateElement();

 	if($("#titulo_articulo").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> El articulo debe Tener un Titulo").show();
      

        return false;  
    }  
  
  	if($("#contenido1").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Debes agregar informacion al articulo").show();
      

        return false;  
    } 
 
   
});

  var options = { 
    beforeSend: function() 
    {
    	
    	//clear everything
    	$("#bar").width('0%');
		$("#percent").html("0%");
    },
    uploadProgress: function(event, position, total, percentComplete) 
    {
    	$("#progress").show();
    	$("#bar").width(percentComplete+'%');
    	$("#percent").html(percentComplete+'%');

    
    },
    success: function() 
    {
        $("#bar").width('100%');
    	$("#percent").html('100%');
    	$('#message').show();
            	$('#msgerror').hide();
                $("#message p").html("Guardado con Exito!").show();
                
                $('#myForm').hide();

                setTimeout(function() {
				     url = "index.php?mod=gestor-blog";
				      $(location).attr('href',url);
				},1000);

    },
	complete: function(response) 
	{
				
	},
	error: function()
	{
		$("#msgerror").html("<font color='red'> ERROR: unable to upload files</font>");

	}
     
}; 

     $("#myForm").ajaxForm(options);

     	
        }); 


  

    </script> 

</head>


</script>

</head>

<body>

<center>
<br>

<div id="msgerror" class="alert alert-warning alert-dismissable" style="width:300px;position:absolute;z-index:10 !important;right:5px;">
   <i class="fa fa-warning"></i><p></p></div>
<!-- FORMULARIO REGISTRO  -->
<div class="box box-warning">
     <div class="box-header">
            <h3 class="box-title">Agregar Nuevo Articulo</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<form   id="myForm" method="POST" action="modules/plantilla-articulos/grabando.php"  enctype="multipart/form-data" >



<table>
 		
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="titulo_articulo" placeholder="Titulo del Articulo" name="titulo_articulo" value="" style="width:300px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<select name="id_art_cate" id="id_art_cate" class="form-control" style="width:300px;">
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
				<small>Foto Principal</small>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="file" name="imagen" style="width:300px;" /> 
			</div>
			</td>
		</tr>

			
		<tr>
			<td>
			<div class="input-group">
				<label>Tipo de Articulo: </label>
				<input type="radio" name="tipo_articulo" value="0" checked>Normal
		        <input type="radio" name="tipo_articulo" value="1" >Destacado
		        <input type="radio" name="tipo_articulo" value="2" >Portada			
			</div>
			</td>	
		</tr>


		<tr>
			<td>
			<div class="input-group" id="coneditor">
			  <textarea  name="contenido1" id="contenido1" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>                      
               

			</div>
			<div class="input-group" id="sineditor" style="width: 100%;">
			  <textarea  name="contenido2" id="contenido2" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>                      
               <br><a href="#" id="cambiar2">Cambiar a modo Editor</a>

			</div>
			</td>
		</tr>
			


		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="2" align="center">

			<a href="index.php?mod=gestor-blog"  class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <input type="submit" id="grabar" class="btn btn-primary btn-lg " value="Grabar Nuevo" />

			</td>
		</tr>
 		</table>

    
      <input type="hidden" name="id_articulo" id="id_articulo" value="">
      <input type="hidden" name="orden" id="orden" value="1">
      <input type="hidden" name="status" id="status" value="1">

		</form>  

		<!-- FIN DE NUEVO INGRESO -->	
		<div id="message" class="alert alert-success alert-dismissable" style="width:300px;position:relative;z-index:10 !important;">
		   <i class="fa fa-check"></i><p></p></div>
	
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