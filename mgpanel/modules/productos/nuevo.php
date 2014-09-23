<?php


mysql_select_db($database_sistemai, $sistemai);
$query_cate = sprintf("SELECT * FROM sis_productos_categoria");
$cate = mysql_query($query_cate, $sistemai) or die(mysql_error());
$row_cate = mysql_fetch_assoc($cate);
$totalRows_cate = mysql_num_rows($cate);

mysql_select_db($database_sistemai, $sistemai);
$query_marca = sprintf("SELECT * FROM sis_productos_fabricantes");
$marca = mysql_query($query_marca, $sistemai) or die(mysql_error());
$row_marca = mysql_fetch_assoc($marca);
$totalRows_marca = mysql_num_rows($marca);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />


<style>

#progress { position:relative; width:200px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
#bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
#percent { position:absolute; display:inline-block; top:3px; left:48%; }
</style>

<?php require_once('modules/inc/editor.inc.php'); ?>

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
 			
			 
    if (tinyMCE) tinyMCE.triggerSave(); 

 	if($("#cod_prod").val().length < 2) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Debes agregar un SKU").show();
      

        return false;  
    } 
    if($("#nombre_prod").val().length < 2) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> El Producto debe Tener un Titulo").show();
      

        return false;  
    } 
    if($("#id_cate").val().length < 1) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Selecciona una Categoría para el Producto").show();
      

        return false;  
    }

    if($("#id_marca").val().length < 1) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Selecciona una marca para el Producto").show();
      

        return false;  
    }
    if($("#precio").val().length < 1) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> El Producto debe tener un Precio").show();     

        return false;  
    }
 

    if($("#des_prod1").val().length < 1) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> Debes agregar descripcion").show();     

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
              url = "index.php?mod=gestor-productos";
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
<body>

<center>
<br>

<div id="msgerror" class="alert alert-warning alert-dismissable" style="position:absolute;z-index:10 !important;right:5px;top: 80px;">
   <i class="fa fa-warning"></i><p></p></div>
<!-- FORMULARIO REGISTRO  -->
<div class="box box-warning" id="wtop">
     <div class="box-header">
            <h3 class="box-title">Agregar Nuevo Producto</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<form   id="myForm" method="POST" action="modules/productos/grabando.php"  enctype="multipart/form-data" >

<div class="box-formulario1">
<table>
 		
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="cod_prod" placeholder="Código del Producto (SKU)" name="cod_prod" value="" style="width:200px;" />
			</div>
			</td>
		</tr>
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="nombre_prod" placeholder="Título del Producto" name="nombre_prod" value=""  />
			</div>
			</td>
		</tr>

		<tr>
			<td>

			<div class="input-group" >
			  <span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			  <textarea  class="form-control fm" name="des_prod_corto" id="des_prod_corto" placeholder="Descripción Corta del Producto"  style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>                      

			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<select name="id_cate" id="id_cate" class="form-control fm" >
          		<option value="">Selecciona Categoría...</option>
         		<?php do { ?>
          		<option value="<?php echo $row_cate['id']; ?>"><?php echo $row_cate['nombre_cate']; ?></option>
          		<?php } while ($row_cate = mysql_fetch_assoc($cate));
		  		$rows = mysql_num_rows($cate);
		  	  	if($rows > 0) {
		      	mysql_data_seek($cate, 0);
			  	$row_cate = mysql_fetch_assoc($cate);
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
			<select name="id_marca" id="id_marca" class="form-control fm" >
          		<option value="">Selecciona Marca/Fabricante...</option>
         		<?php do { ?>
          		<option value="<?php echo $row_marca['id']; ?>"><?php echo $row_marca['nombre_marca']; ?></option>
          		<?php } while ($row_marca = mysql_fetch_assoc($marca));
		  		$rows = mysql_num_rows($marca);
		  	  	if($rows > 0) {
		      	mysql_data_seek($marca, 0);
			  	$row_marca = mysql_fetch_assoc($marca);
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
			<input class="form-control fm" type="text" id="existencia" placeholder="Cant" name="existencia" value="" style="width:100px;" />
			<small> Existencia en Inventario</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="precio" placeholder="$" name="precio" value="" style="width:100px;" />
			<small> Precio sin impuesto</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="descuento" placeholder="$" name="descuento" value="" style="width:100px;" />
			<small> Precio Descuento</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="file" name="imagen"  />
			</div>
			</td>
		</tr>
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="clave" placeholder="Palabras Claves: Ej. carro, bolso, libro" name="clave" value=""  />
			</div>
			</td>
		</tr>
</table>
</div>

<div class="box-formulario2">
	<table>

		<tr>
			<td>
			<div class="input-group" id="coneditor" style="width: 100%;">
			  <textarea  name="contenido" id="contenido" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>                      
             </div>
			</td>
		</tr>
		

		<tr><td>&nbsp;</td></tr>
		

	</table>
</div>

    	<div class="boton-modulo">
			<a href="index.php?mod=gestor-productos" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <input type="submit" id="grabar" class="btn btn-primary btn-lg " value="Grabar Nuevo" />
		</div>

       <input type="hidden" name="id" id="id" value="">
       <input type="hidden" name="status" id="status" value="1">
       <input type="hidden" name="destacado" id="destacado" value="0">
       <input type="hidden" name="ruta" id="ruta" value="imagenes/">
	
</form>  


<br/>
    


<!-- FIN DE NUEVO INGRESO -->	

<!-- FIN DE NUEVO INGRESO -->	
		<div id="message" class="alert alert-success alert-dismissable" style="position:relative;z-index:10 !important;">
		   <i class="fa fa-check"></i><p></p>
		   	 <div id="progress">
		        <div id="bar"></div>
		        <div id="percent">0%</div >
			</div>

		</div>
	
		<!-- FIN DE CLIENTE NUEVO INGRESO -->	
</div>


</div>


				
		</center>

		</body>
		</html>