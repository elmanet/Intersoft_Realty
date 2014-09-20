<?php

// SQL PARA REGISTRO DE DATOS

  
$colname_categoria = "-1";
if (isset($_GET['id'])) {
  $colname_categoria = $_GET['id'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_categoria = sprintf("SELECT * FROM sis_plantilla_articulo_categoria WHERE id_art_cate=%s", GetSQLValueString($colname_categoria, "int"));
$categoria = mysql_query($query_categoria, $sistemai) or die(mysql_error());
$row_categoria = mysql_fetch_assoc($categoria);
$totalRows_categoria = mysql_num_rows($categoria);


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
 	
 	if($("#descripcion").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Debes Agregar un Titulo a la Categoría").show();
      

        return false;  
    }  
    
    
 var url = "modules/plantilla-articulos-categoria/modificando.php"; // El script a dónde se realizará la petición.


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
              url = "index.php?mod=gestor-categoria-articulos";
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
            <h3 class="box-title">Modificar Categoría</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<form   id="captchaform" method="POST"   enctype="multipart/form-data" >

<table>
		<tr>
			
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control" type="text" id="descripcion" placeholder="Nombre de la Categoría" name="descripcion" value="<?php echo $row_categoria['descripcion'];?>" style="width:300px;" /></td>
			</div>
			</td>
		</tr>

		<tr>

			<td>
				<div class="input-group">
				<span class="input-group-addon"><i><strong class="fa fa-thumbs-up"></strong></i></span>	
				<select name="status" id="status" class="form-control" >
				 <option value="<?php echo $row_categoria['status'];?>">
				   <?php if($row_categoria['status']==1) { echo "Activo"; }?>
				   <?php if($row_categoria['status']==0) { echo "Desactivado"; }?>
				   </option>          
		           <option value="0">Desactivado</option>
		           <option value="1">Activo</option>
             	</select>		
             	</div>
             </td>
		</tr>	
		
			
		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><a href="index.php?mod=gestor-categoria-articulos" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <a href="#" id="grabar" class="btn btn-primary btn-lg"><i class="fa fa-th-large"></i><span> Grabar Nuevo</span></a></td>
		</tr>
 		</table>

    
       <input type="hidden" name="id_art_cate" id="id_art_cate" value="<?php echo $row_categoria['id_art_cate'];?>">
    

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