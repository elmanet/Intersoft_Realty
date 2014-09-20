<?php

$colname_categoria = "-1";
if (isset($_GET['id'])) {
  $colname_categoria = $_GET['id'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_categoria = sprintf("SELECT a.id, a.nombre_cate, a.des_cate, a.status, a.idcp, a.ruta,  b.nombre_catep  FROM sis_productos_categoria a, sis_productos_categoria_padre b WHERE a.idcp=b.id AND  a.id=%s", GetSQLValueString($colname_categoria, "int"));
$categoria = mysql_query($query_categoria, $sistemai) or die(mysql_error());
$row_categoria = mysql_fetch_assoc($categoria);
$totalRows_categoria = mysql_num_rows($categoria);


mysql_select_db($database_sistemai, $sistemai);
$query_categoriap = sprintf("SELECT * FROM sis_productos_categoria_padre");
$categoriap = mysql_query($query_categoriap, $sistemai) or die(mysql_error());
$row_categoriap = mysql_fetch_assoc($categoriap);
$totalRows_categoriap = mysql_num_rows($categoriap);



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

 	 CKEDITOR.instances['des_cate'].updateElement();

 	
 	if($("#nombre_cate").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Debes Agregar un Titulo a la Categoría").show();
      

        return false;  
    }  
    
    
 var url = "modules/productos-categoria/modificando.php"; // El script a dónde se realizará la petición.


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
              url = "index.php?mod=gestor-categoria-productos";
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
			<input class="form-control" type="text" id="nombre_cate" placeholder="Nombre de la Categoría" name="nombre_cate" value="<?php echo $row_categoria['nombre_cate'];?>" style="width:300px;" />
			</div>
      		</td>
	 	</tr>

	 	<tr>	
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<select name="idcp" id="idcp" class="form-control" style="width:300px;">
			<option value="<?php echo $row_categoria['idcp'];?>">...Modificar</option>
            <?php do { ?>
            <option value="<?php echo $row_categoriap['id']; ?>"><?php echo $row_categoriap['nombre_catep']; ?></option>
            <?php } while ($row_categoriap = mysql_fetch_assoc($categoriap));
		  	   $rows = mysql_num_rows($categoriap);
		  	   if($rows > 0) {
		       mysql_data_seek($categoriap, 0);
			   $row_categoriap = mysql_fetch_assoc($categoriap);
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
			<select name="status" id="status" class="form-control" style="width:300px;">
			<option value="<?php echo $row_categoria['status'];?>">
				   <?php if($row_categoria['status']==1) { echo "...Modificar Status"; }?>
				   <?php if($row_categoria['status']==0) { echo "...Modificar Status"; }?>
				   </option>
             
             <option value="0">Desactivado</option>
             <option value="1">Activo</option>	

			</select>
			</div>
      		</td>
	 	</tr>	

	 	<tr>
			<td>
			<div class="input-group" id="coneditor">
			  <textarea  name="des_cate" id="des_cate" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row_categoria['des_cate'];?></textarea>                      
             </div>
			</td>
		</tr>

		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><a href="index.php?mod=gestor-categoria-productos" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <a href="#" id="grabar" class="btn btn-primary btn-lg"><i class="fa fa-th-large"></i><span> Grabar Nuevo</span></a></td>
		</tr>
 		</table>

       
       <input type="hidden" name="id" id="id" value="<?php echo $row_categoria['id'];?>">
    

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
            	 CKEDITOR.replace('des_cate',{
            	 	    filebrowserBrowseUrl : 'modules/file/ft2.php',
            	 		uiColor: '#c3c3c3',
						allowedContent: true
						
            	 		
            	 	});
            	
            });

        </script>
</body>
</html>