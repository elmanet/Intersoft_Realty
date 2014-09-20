<?php

// SQL PARA REGISTRO DE DATOS

$colname_usuario = "-1";
if (isset($_GET['id_usuario'])) {
  $colname_usuario = $_GET['id_usuario'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_usuario = sprintf("SELECT * FROM sis_users a, sis_users_tipo b WHERE a.id_user_tipo=b.id_user_tipo AND  a.id_usuario=%s", GetSQLValueString($colname_usuario, "bigint"));
$usuario = mysql_query($query_usuario, $sistemai) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);


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
    
 var url = "modules/usuarios/modificando.php"; // El script a dónde se realizará la petición.


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

<!-- FORMULARIO REGISTRO NUEVO USUARIO -->

<div class="box box-warning">
     <div class="box-header">
            <h3 class="box-title">Modificar Usuario</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<form   id="captchaform" method="POST"   enctype="multipart/form-data" >

<table>
<tr>
<td>

 		<table >
 		<tr>

 		</tr>



		<tr>
			<td align="right"><label> Nombre: </label></td>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong>N</strong></i></span>			
			<input class="form-control" type="text" id="nombre_usuario" name="nombre_usuario" value="<?php echo $row_usuario['nombre_usuario'];?>" /></td>
			</div>
		</tr>
		<tr>
			<td align="right"><label> Apellido: </label></td>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong>A</strong></i></span>		
			<input class="form-control" type="text" id="apellido_usuario" name="apellido_usuario" value="<?php echo $row_usuario['apellido_usuario'];?>" /></td>
			</div>				
		</tr>

		
		
		<tr>
			<td align="right"><label> Direcci&oacute;n: </label></td>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>		
			<textarea class="form-control"  id="dir_usuario" name="dir_usuario"><?php echo $row_usuario['dir_usuario'];?></textarea></td>
			</div>		
		</tr>



	
<tr>
			<td align="right"><label> Email: </label></td>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
			<input class="form-control" type="email" id="email_usuario" name="email_usuario" value="<?php echo $row_usuario['email_usuario'];?>" required/> </td>
            </div>
							
		</tr>			
	
<tr>
			<td align="right"><label> Tel&eacute;fono (Hab): </label></td>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-phone"></i></span>		
			<input class="form-control" type="text" id="tel_usuario" name="tel_usuario" value="<?php echo $row_usuario['tel_usuario'];?>" /></td>
			</div>	
							
		</tr>			
		<tr>
			<td align="right"><label> Tel&eacute;fono (Movil): </label></td>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-mobile"></i></span>		
			<input class="form-control" type="text" id="movil_usuario" name="movil_usuario" value="<?php echo $row_usuario['movil_usuario'];?>" /></td>
			</div>					
		</tr>
		

		<tr>
			<td align="right"><label> Tipo de Usuario: </label></td>
			<td>
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-users"></i></span>	
				<select name="id_user_tipo" id="id_user_tipo" class="form-control">
				 <option value="<?php echo $row_usuario['id_user_tipo'];?>"><?php echo $row_usuario['descripcion'];?></option>
             
             <option value="1">Cliente 1</option>
             <option value="2">Cliente 2</option>
             <option value="3">Cliente 3</option>
             <option value="4">Administrador</option>
             
             
             </select>
             </div>		
			</td>

							
		</tr>
		
		<tr>
			<td align="right"><label> Status: </label></td>
			<td>
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-thumbs-up"></i></span>	
				<select name="status" id="status" class="form-control">
				 <option value="<?php echo $row_usuario['status'];?>">
				   <?php if($row_usuario['status']==1) { echo "Activo"; }?>
				   <?php if($row_usuario['status']==0) { echo "Bloqueado"; }?>
				   </option>
             
             <option value="0">Bloqueado</option>
             <option value="1">Activo</option>
             
             </select>
             </div>		
		</tr>
			<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><a href="index.php?mod=gestor-usuarios" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <a href="#" id="grabar" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-refresh"></i><span> Modificar</span></a></td>
		</tr>	
		
</table>

</td>
</tr>

 		</table>

    <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $row_usuario['id_usuario'];?>">
      
</form>  
<div id="message" class="alert alert-success alert-dismissable" style="width:300px;position:relative;z-index:10 !important;">
   <i class="fa fa-check"></i><p></p></div>
   
</div>
</div>
<br /><br />



<!-- FIN DE CLIENTE NUEVO INGRESO -->	


		
</center>

</body>

</html>