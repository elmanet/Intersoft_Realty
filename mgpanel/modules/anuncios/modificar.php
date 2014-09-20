<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

// SQL PARA REGISTRO DE DATOS


$colname_productos = "-1";
if (isset($_GET['id'])) {
  $colname_productos = $_GET['id'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_productos = sprintf("SELECT a.id, a.cod_prod, a.nombre_prod, a.id_cate, a.id_marca,  a.des_prod_corto, a.des_prod, a.existencia, a.precio, a.descuento, a.destacado, a.clave, a.ruta, a.status, b.nombre_cate, c.nombre_marca FROM sis_productos a, sis_productos_categoria b, sis_productos_fabricantes c WHERE a.id_cate=b.id AND a.id_marca=c.id AND a.id=%s", GetSQLValueString($colname_productos, "int"));
$productos = mysql_query($query_productos, $sistemai) or die(mysql_error());
$row_productos = mysql_fetch_assoc($productos);
$totalRows_productos = mysql_num_rows($productos);


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

 	CKEDITOR.instances['des_prod1'].updateElement();
 	
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
 

   
    
 var url = "modules/productos/modificando.php"; // El script a dónde se realizará la petición.


    $.ajax({

         type: "POST",
           url: url,
           data: $("#captchaform").serialize(), // Adjuntar los campos del formulario enviado.

           success: function(data) {
           		$('#message').show();
           		$('#msgerror').hide();
            	
                $("#message p").html("Guardado con Exito!").show();
                
               

                setTimeout(function() {
    				$("#divtest").load('modules/productos/admin.php');
  				},500);

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
            <h3 class="box-title">Modificar Producto</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<form   id="captchaform" method="POST"   enctype="multipart/form-data" >

<div class="box-formulario1">
<table>
 		
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="cod_prod" placeholder="Código del Producto (SKU)" name="cod_prod" value="<?php echo $row_productos['cod_prod'];?>" style="width:200px;" />
			</div>
			</td>
		</tr>
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="nombre_prod" placeholder="Título del Producto" name="nombre_prod" value="<?php echo $row_productos['nombre_prod'];?>"  />
			</div>
			</td>
		</tr>

		<tr>
			<td>

			<div class="input-group" >
			  <span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			  <textarea  class="form-control fm" name="des_prod_corto" id="des_prod_corto" placeholder="Descripción Corta del Producto"  style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row_productos['des_prod_corto'];?></textarea>                      

			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<select name="id_cate" id="id_cate" class="form-control fm" >
          		<option value="<?php echo $row_productos['id_cate'];?>">Modificar Categoría...</option>
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
          		<option value="<?php echo $row_productos['id_marca'];?>">Modificar Marca/Fabricante...</option>
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
			<input class="form-control fm" type="text" id="existencia" placeholder="Cant" name="existencia" value="<?php echo $row_productos['existencia'];?>" style="width:100px;" />
			<small> Existencia en Inventario</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="precio" placeholder="$" name="precio" value="<?php echo $row_productos['precio'];?>" style="width:100px;" />
			<small> Precio sin impuesto</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="descuento" placeholder="$" name="descuento" value="<?php echo $row_productos['descuento'];?>" style="width:100px;" />
			<small> Precio Descuento</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="clave" placeholder="Palabras Claves: Ej. carro, bolso, libro" name="clave" value="<?php echo $row_productos['clave'];?>"  />
			</div>
			</td>
		</tr>
</table>
</div>

<div class="box-formulario2">
	<table>
	<tr>
			<td>
			<div class="input-group" id="coneditor">
			  <textarea  name="des_prod1" id="des_prod1" placeholder="Descripción larga del Producto" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
			  		<?php echo $row_productos['des_prod'];?>	
			  </textarea> 
			   <br><a href="#" id="cambiar1">Cambiar a modo Sin Editor</a>

			</div>
			<div class="input-group" id="sineditor">
			  <textarea  name="des_prod2" id="des_prod2" placeholder="Descripción larga del Producto" style="width: 400px; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
			  		<?php echo $row_productos['des_prod'];?>
			  </textarea>                      
               <br><a href="#" id="cambiar2">Cambiar a modo Editor</a>

			</div>
			</td>
		</tr>

		

		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center"><a href="#" onclick="cargar('#divtest', 'modules/productos/admin.php')" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <a href="#" id="grabar" class="btn btn-primary btn-lg"><i class="fa fa-th-large"></i><span> Modificar</span></a></td>
		</tr>
 		</table>

    
      <input type="hidden" name="id" id="id" value="<?php echo $row_productos['id'];?>">
      <input type="hidden" name="status" id="status" value="<?php echo $row_productos['status'];?>">
      <input type="hidden" name="destacado" id="destacado" value="<?php echo $row_productos['destacado'];?>">

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
            	 CKEDITOR.replace('des_prod1',{
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
