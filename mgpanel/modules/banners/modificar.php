<?php

// SQL PARA REGISTRO DE DATOS

  
$colname_modulo = "-1";
if (isset($_GET['id'])) {
  $colname_modulo = $_GET['id'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_modulo = sprintf("SELECT * FROM sis_banners WHERE id_foto=%s", GetSQLValueString($colname_modulo, "int"));
$modulo = mysql_query($query_modulo, $sistemai) or die(mysql_error());
$row_modulo = mysql_fetch_assoc($modulo);
$totalRows_modulo = mysql_num_rows($modulo);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />

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

 	
 	if($("#orden").val().length < 1) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Debes agregar un orden al Banner").show();
      

        return false;  
    }  

    
 var url = "modules/banners/modificando.php"; // El script a dónde se realizará la petición.


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
				     url = "index.php?mod=gestor-banner";
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
            <h3 class="box-title">Modificar Información del Banner</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<form   id="captchaform" method="POST"   enctype="multipart/form-data" >

	<table>


		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>
			  <?php if($row_modulo['ruta'] == "imagenes/") { ?>
				<img src="images/iconfinder/no-imagen2.png" alt="" width="120">
				<?php } else { ?>
				 <img src="../imagesmg/<?php echo $row_modulo['ruta'];?>" alt="" width="450" style="border:1px solid;"><br>
				<?php } ?>    
   			</div>
			</td>
		</tr>

		<tr>
			<td>
			<small>Orden del Banner</small>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="orden" placeholder="orden" name="orden" value="<?php echo $row_modulo['orden'];?>" style="width:60px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="titulo_foto" placeholder="Vinculo del Banner" name="titulo_foto" value="<?php echo $row_modulo['titulo_foto'];?>" style="width:300px;" />
			</div>
			</td>
		</tr>
		
		<tr>
			<td>
			<div class="input-group" >
			  <textarea  name="info" id="info" placeholder="Titular de la Foto" id="info" style="width: 350px; height: 80px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row_modulo['info'];?></textarea>                      
             </div>
			</td>
		</tr>

<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><a href="index.php?mod=gestor-banner" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <a href="#" id="grabar" class="btn btn-primary btn-lg"><i class="fa fa-th-large"></i><span> Modificar</span></a></td>
		</tr>
 		</table>

    
      <input type="hidden" name="id_foto" id="id_foto" value="<?php echo $row_modulo['id_foto'];?>">

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