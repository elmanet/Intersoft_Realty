<?php


mysql_select_db($database_sistemai, $sistemai);
$query_cate = sprintf("SELECT * FROM sis_galeria_categoria");
$cate = mysql_query($query_cate, $sistemai) or die(mysql_error());
$row_cate = mysql_fetch_assoc($cate);
$totalRows_cate = mysql_num_rows($cate);
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

 	CKEDITOR.instances['info'].updateElement();

 	if($("#imagen").val().length < 1) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Debes agregar una Imagen").show();
      

        return false;  
    } 
 

 	if($("#orden").val().length < 1) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> El debe tener un Orden").show();
      

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
              url = "index.php?mod=gestor-banner";
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
            <h3 class="box-title">Agregar Nuevo Banner</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<form   id="myForm" method="POST" action="modules/banners/grabando.php"  enctype="multipart/form-data" >

<table>

		<tr>
			<td>
			<small>Selecciona Imagen del Banner</small>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="file" name="imagen" style="width:300px;" id="imagen"/> 
			</div>
			</td>
		</tr>
		
		<tr>
			<td>
			<small>Orden del Banner</small>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="orden" placeholder="orden" name="orden" value="" style="width:60px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="titulo_foto" placeholder="Vinculo del Banner" name="titulo_foto" value="" style="width:300px;" />
			</div>
			</td>
		</tr>
		
		<tr>
			<td>
			<div class="input-group" >
			  <textarea  name="info" placeholder="Titular de la Foto" id="info" style="width: 350px; height: 80px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>                      
             </div>
			</td>
		</tr>

		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="2" align="center">

			<a href="index.php?mod=gestor-banner" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <input type="submit" id="grabar" class="btn btn-primary btn-lg " value="Grabar Nuevo" />

			</td>
		</tr>
 		</table>

    
      <input type="hidden" id="posicion" name="posicion" value="1" />
      <input type="hidden" name="id_foto" id="id_foto" value="">
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