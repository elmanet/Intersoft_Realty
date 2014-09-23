<?php

// SQL PARA REGISTRO DE DATOS

mysql_select_db($database_sistemai, $sistemai);
$query_posicion = sprintf("SELECT * FROM sis_plantilla_posiciones WHERE status=1");
$posicion = mysql_query($query_posicion, $sistemai) or die(mysql_error());
$row_posicion = mysql_fetch_assoc($posicion);
$totalRows_posicion = mysql_num_rows($posicion);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />

<?php require_once('modules/inc/editor.inc.php'); ?>
<script src="js/jquery.form.js"></script> 

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

 if (tinyMCE) tinyMCE.triggerSave(); 


 	if($("#titulo").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Debes agregar un Título al Módulo").show();
      

        return false;  
    }  

    if($("#posicion").val().length < 1) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Tienes que seleccionar una posición para el Módulo").show();
      

        return false;  
    }

    if($("#orden").val().length < 1) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Agrega un Orden para el Módulo").show();
      

        return false;  
    }  
    
    if($("#contenido").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> El Módulo debe tener un contenido").show();
      

        return false;  
    }
    
 var url = "modules/plantilla/grabando.php"; // El script a dónde se realizará la petición.


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
             url = "index.php?mod=gestor-modulos";
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
            <h3 class="box-title">Agregar un nuevo Módulo</h3>
     </div><!-- /.box-header -->
<div class="box-body">

 <form   id="captchaform" method="POST"  enctype="multipart/form-data" >


<table style="width: 100%;">

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>
			<input class="form-control" type="text" id="titulo" placeholder="Titulo del Modulo" name="titulo" value="" style="width:300px;" />
			</div>
			</td>
		</tr>

			
		<tr>
			<td>
				<small>Posición del Módulo</small>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>
			<select name="posicion" id="posicion" class="form-control">
            <option value="">Selecciona...</option>
            <?php do { ?>
            <option value="<?php echo $row_posicion['id_pos']; ?>"><?php echo $row_posicion['des_pos']; ?></option>
            <?php } while ($row_posicion = mysql_fetch_assoc($posicion));
		  	   $rows = mysql_num_rows($posicion);
		  	   if($rows > 0) {
		           mysql_data_seek($posicion, 0);
			  $row_posicion = mysql_fetch_assoc($posicion);
				 }
			   ?>
             </select>
            </div>
            </td>
		</tr>


		<tr>
			<td>
				<small>Orden del módulo</small>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>
			<input class="form-control" type="text" id="orden" placeholder="Orden" name="orden" value="" style="width:80px;" />
			</div>
			</td>
		</tr>	

		<tr>
      <td>
      <div class="input-group" id="coneditor" style="width: 100%;">
        <textarea  name="contenido" id="contenido" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>                      
             </div>
      </td>
    </tr>
			
		<tr><td>&nbsp;</td></tr>
		
    
 		</table>

    <div class="boton-modulo">
      <a href="index.php?mod=gestor-modulos" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a> &nbsp;&nbsp;&nbsp;   <a href="#" id="grabar" class="btn btn-primary btn-lg"><i class="fa fa-th-large"></i><span> Grabar Nuevo</span></a>
    </div>
    
      <input type="hidden" name="id" id="id" value="">
      <input type="hidden" name="hecho" id="hecho" value="<?php echo $row_usua['id_usuario'];?> ">
      <input type="hidden" name="nivel" id="nivel" value="1">
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
