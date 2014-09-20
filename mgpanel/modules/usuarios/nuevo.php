<?php


// SQL PARA REGISTRO DE DATOS


mysql_select_db($database_sistemai, $sistemai);
$query_tipo = sprintf("SELECT * FROM sis_users_tipo WHERE cod<5");
$tipo = mysql_query($query_tipo, $sistemai) or die(mysql_error());
$row_tipo = mysql_fetch_assoc($tipo);
$totalRows_tipo = mysql_num_rows($tipo);
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
 	if($("#username").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Tienes que Agregar un Login").show();
      

        return false;  
    }  
    if($("#password").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Debes Agregar una Clave de acceso").show();
      

        return false;  
    }  
 	if($("#nombre_usuario").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Debes Agregar tu Nombre").show();
      

        return false;  
    }  
    if($("#apellido_usuario").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Debes Agregar tu Apellido").show();
         
        return false;  
    }  
    if($("#email_usuario").val().indexOf('@', 0) == -1 || $("#email_usuario").val().indexOf('.', 0) == -1) {   
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Tienes que agregar un Email Válido Ejm: tunombre@empresa.com").show();
      

        return false;  
    }  
    
 var url = "modules/usuarios/grabando.php"; // El script a dónde se realizará la petición.


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
				     url = "index.php?mod=gestor-usuarios";
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
            <h3 class="box-title">Agregar Nuevo Usuario</h3>
     </div><!-- /.box-header -->
<div class="box-body">

 <form   id="captchaform" method="POST"  name"fvalida" enctype="multipart/form-data" >

 		<table style="width:900px;">
<tr>
<td>


<table>
 		<tr>
 		
 		</tr>

		<table>
	 
		

				
		<tr>
			<td align="right"><label> Login: </label></td>
			<td>
				<div class="input-group">
			<span class="input-group-addon"><i><strong class="glyphicon glyphicon-user"></strong></i></span>
			<input class="form-control" type="text" id="username" name="username" value="" style="width:150px;"  /></td>
			</div>
							
		</tr>	
		<tr>
			<td align="right"><label> Clave: </label></td>
			<td>
				<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-lock"></strong></i></span>
			<input class="form-control" type="password" id="password" name="password" value="" style="width:150px;" /></td>
			</div>
							
		</tr>
		
		<tr>
			<td align="right"><label> Nombre: </label></td>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong>N</strong></i></span>		
			<input class="form-control" type="text" id="nombre_usuario" name="nombre_usuario" value="" style="width:300px;" /></td>
			</div>
		</tr>
		<tr>
			<td align="right"><label> Apellido: </label></td>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong>A</strong></i></span>	
			<input class="form-control" type="text" id="apellido_usuario" name="apellido_usuario" value="" style="width:300px;" /></td>
			</div>				
		</tr>

		

		<tr>
			<td align="right"><label> Email: </label></td>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-envelope"></strong></i></span>		
			<input class="form-control" type="email" id="email_usuario" name="email_usuario" value="" style="width:300px;" /></td>
			</div>
							
		</tr>	
</table>

</td>
<td>		

	<table>
	
			
		<tr>
			<td align="right"><label> Direcci&oacute;n: </label></td>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-map-marker"></strong></i></span>		
			<textarea class="form-control" id="dir_usuario" name="dir_usuario" rows="5" style="width:300px;"/></textarea></td>
			</div>			
		</tr>	
	
<tr>
			<td align="right"><label> Tel&eacute;fono Fijo: </label></td>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-phone"></strong></i></span>
			<input class="form-control" type="text" id="tel_usuario" name="tel_usuario" value="" /></td>
			</div>
							
		</tr>			
		<tr>
			<td align="right"><label> Tel&eacute;fono Movil: </label></td>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-mobile"></strong></i></span>
			<input class="form-control" type="text" id="movil_usuario" name="movil_usuario" value="" /></td>
			</div>				
		</tr>
		
						
		
				

		<tr>
			<td align="right"><label> Tipo de Usuario: </label></td>
			<td>
				<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-users"></strong></i></span>
				<select name="id_user_tipo" id="id_user_tipo" class="form-control">
			  <option value="1">Selecciona...</option>
			  <?php do { ?>
			 <option value="<?php echo $row_tipo['id_user_tipo']; ?>"><?php echo $row_tipo['descripcion']; ?></option>
			<?php } while ($row_tipo = mysql_fetch_assoc($tipo));
		  	   $rows = mysql_num_rows($tipo);
		  	   if($rows > 0) {
				   mysql_data_seek($tipo, 0);
			  $row_tipo = mysql_fetch_assoc($tipo);
				 }
			   ?>
			</select>
			</div>
			</td>

							
		</tr>
		
		
</table>

</td>
</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><a href="index.php?mod=gestor-usuarios"  class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <a href="#" id="grabar" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-user"></i><span> Grabar Nuevo</span></a></td>
		</tr>
 		</table>

	
	  <input type="hidden" name="id_usuario" id="id_usuario" value="">
	  <input type="hidden" name="id_user" id="id_user" value="">
	  <input type="hidden" name="status" id="status" value="1">
	 <input type="hidden" name="MM_insert" value="captchaform">	
</form>  
<div id="message" class="alert alert-success alert-dismissable" style="width:300px;position:relative;z-index:10 !important;">
   <i class="fa fa-check"></i><p></p></div>

<!-- FIN DE CLIENTE NUEVO INGRESO -->	
</div>
</div>


		
</center>
</body>
</html>

	