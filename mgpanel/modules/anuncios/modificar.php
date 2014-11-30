<?php

// SQL PARA REGISTRO DE DATOS


$colname_anuncio = "-1";
if (isset($_GET['id'])) {
  $colname_anuncio = $_GET['id'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_anuncio = sprintf("SELECT * FROM sis_anuncio WHERE id_anuncio=%s", GetSQLValueString($colname_anuncio, "int"));
$anuncio = mysql_query($query_anuncio, $sistemai) or die(mysql_error());
$row_anuncio = mysql_fetch_assoc($anuncio);
$totalRows_anuncio = mysql_num_rows($anuncio);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<?php require_once('modules/inc/editor.inc.php'); ?>

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
 	$('#grabar').hide();

 		if (tinyMCE) tinyMCE.triggerSave(); 
 	
 	if($("#titulo_espanol").val().length < 3) {  
        $('#msgerror').show();
        $("#msgerror p").html("<strong>Error!</strong> El Anuncio debe tener un Titulo").show();
        $('#grabar').show();
      

        return false;  
    }  


   
    
 var url = "modules/anuncios/modificando.php"; // El script a dónde se realizará la petición.


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
				     url = "index.php?mod=gestor-anuncio";
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
<div id="msgerror" class="alert alert-warning alert-dismissable" style="top: 80px;width:300px;position:absolute;z-index:10 !important;right:5px;">
   <i class="fa fa-warning"></i><p></p></div>

<!-- FORMULARIO REGISTRO NUEVO USUARIO -->

<div class="box box-warning">
     <div class="box-header">
            <h3 class="box-title">Modificar Datos del Anuncio</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<form   id="captchaform" method="POST"   enctype="multipart/form-data" >

<div class="box-formulario1">
<table>

	<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="titulo_espanol" placeholder="Título en Español" name="titulo_espanol" value="<?php echo $row_anuncio['titulo_espanol'];?>"  />
			</div>
			</td>
		</tr>
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="titulo_ingles" placeholder="Título en Ingles" name="titulo_ingles" value="<?php echo $row_anuncio['titulo_ingles'];?>"  />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Precio Venta</i></span>		
			<input class="form-control fm" type="text" id="preciov" placeholder="$" name="preciov" value="<?php echo $row_anuncio['preciov'];?>" style="width:100px;" />
		
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Precio Alquiler</i></span>		
			<input class="form-control fm" type="text" id="precioa" placeholder="$" name="precioa" value="<?php echo $row_anuncio['precioa'];?>" style="width:100px;" />
	
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Recamaras</i></span>		
			<select name="recama" id="recama" class="form-control fm" style="width:75px;">
				<option value="<?php echo $row_anuncio['recama'];?>"><?php echo $row_anuncio['recama'];?></option>
          		<option value="0"> </option>
          		<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
			</select>
	
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Baños</i></span>		
			<select name="banios" id="banios" class="form-control fm" style="width:75px;">
				<option value="<?php echo $row_anuncio['banios'];?>"><?php if($row_anuncio['banios']==19){ echo "1 1/2";} if($row_anuncio['banios']==29){ echo "2 1/2";} if($row_anuncio['banios']==39){ echo "3 1/2";} if($row_anuncio['banios']==49){ echo "4 1/2";} if($row_anuncio['banios']==59){ echo "5 1/2";} if($row_anuncio['banios']<10){ echo $row_anuncio['banios'];} ?></option>
          		<option value="0"> </option>
          		<option value="1">1</option>
          		<option value="19">1 1/2</option>
				<option value="2">2</option>
				<option value="29">2 1/2</option>
				<option value="3">3</option>
				<option value="39">3 1/2</option>
				<option value="4">4</option>
				<option value="49">4 1/2</option>
				<option value="5">5</option>
				<option value="59">5 1/2</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				
				

			</select>

			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Estacionamientos</i></span>		
			<select name="estacio" id="estacio" class="form-control fm" style="width:75px;">
				<option value="<?php echo $row_anuncio['estacio'];?>"><?php echo $row_anuncio['estacio'];?></option>
          		<option value="0"> </option>
          		<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
			</select>

			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Metros de Construcción</i></span>		
			<input class="form-control fm" type="text" id="mconstru" placeholder="Mts" name="mconstru" value="<?php echo $row_anuncio['mconstru'];?>" style="width:100px;" />
	
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Metros de Terreno</i></span>		
			<input class="form-control fm" type="text" id="mterreno" placeholder="Mts" name="mterreno" value="<?php echo $row_anuncio['mterreno'];?>" style="width:100px;" />

			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Años de Construcción</i></span>		
			<input class="form-control fm" type="text" id="anios_constru" placeholder="" name="anios_constru" value="<?php echo $row_anuncio['anios_constru'];?>" style="width:100px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Costo de Mantenimiento</i></span>		
			<input class="form-control fm" type="text" id="costo_mante" placeholder="" name="costo_mante" value="<?php echo $row_anuncio['costo_mante'];?>" style="width:100px;" />

			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Altura</i></span>		
			<input class="form-control fm" type="text" id="altura" placeholder="" name="altura" value="<?php echo $row_anuncio['altura'];?>" style="width:100px;" />
	
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="tipo_pisos" placeholder="Tipo de Pisos" name="tipo_pisos" value="<?php echo $row_anuncio['tipo_pisos'];?>" style="width:300px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>

			<div class="input-group" >
			  <span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			  <textarea  class="form-control fm" name="direccion" id="direccion" placeholder="Dirección del Inmueble"  style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row_anuncio['direccion'];?></textarea>                      

			</div>
			</td>
		</tr>

		</table>
		</div>

	<div class="box-formulario2">
	<table>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Niveles</i></span>		
			<input class="form-control fm" type="text" id="niveles" placeholder="" name="niveles" value="<?php echo $row_anuncio['niveles'];?>" style="width:50px;" />

			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Piso Número</i></span>		
			<input class="form-control fm" type="text" id="piso_num" placeholder="" name="piso_num" value="<?php echo $row_anuncio['piso_num'];?>" style="width:50px;" />
			
			</div>
			</td>
		</tr>
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Balcón</i></span>		
			<select name="balcon" id="balcon" class="form-control fm" style="width:75px;">
				<option value="<?php echo $row_anuncio['balcon'];?>"><?php if($row_anuncio['balcon']==1){echo "Si";} if($row_anuncio['balcon']==0){echo "No";}?></option>
          		<option value="0">No</option>
				<option value="1">Sí</option>
			</select>

			</div>
			</td>
		</tr>
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i>Piscina</i></span>		
			<select name="piscina" id="piscina" class="form-control fm" style="width:75px;">
				<option value="<?php echo $row_anuncio['piscina'];?>"><?php if($row_anuncio['piscina']==1){echo "Si";} if($row_anuncio['piscina']==0){echo "No";}?></option>
          		<option value="0">No</option>
				<option value="1">Sí</option>
			</select>

			</div>
			</td>
		</tr>

		

		<tr>
			<td>
			<div class="input-group" id="coneditor">
			  <textarea  name="contenido" id="contenido" placeholder="Descripción larga del Producto" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row_anuncio['des_espanol'];?></textarea> 

			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="video" placeholder="Video de Youtube" name="video" value="<?php echo $row_anuncio['video'];?>"  />
			</div>
			</td>
		</tr>


		<tr><td>&nbsp;</td></tr>
		 
		 
 		</table>
		<div class="boton-modulo">
		 	<a href="index.php?mod=gestor-anuncio" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <a href="#" id="grabar" class="btn btn-primary btn-lg"><i class="fa fa-th-large"></i><span> Modificar</span></a></td>
		</div>
    
      <input type="hidden" name="id_anuncio" id="id_anuncio" value="<?php echo $_GET['id'];?>">

		</form>  

		<!-- FIN DE NUEVO INGRESO -->	
		<div id="message" class="alert alert-success alert-dismissable" style="width:300px;position:relative;z-index:10 !important;">
		   <i class="fa fa-check"></i><p></p></div>
		 </table>
		<!-- FIN DE CLIENTE NUEVO INGRESO -->	
		</div>
		</div>


				
		</center>