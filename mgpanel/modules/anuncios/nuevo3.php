<?php

require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

$cate=$_POST['cate'];
$ubica=$_POST['ubica'];

$colname_usua = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_usua = $_SESSION['MM_Username'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_usua = sprintf("SELECT * FROM sis_users a, sis_users_cuenta b, sis_users_tipo c WHERE a.id_usuario=b.id_usuario AND a.id_user_tipo=c.id_user_tipo AND b.username = %s", GetSQLValueString($colname_usua, "text"));
$usua = mysql_query($query_usua, $sistemai) or die(mysql_error());
$row_usua = mysql_fetch_assoc($usua);
$totalRows_usua = mysql_num_rows($usua);

mysql_select_db($database_sistemai, $sistemai);
$query_cate = sprintf("SELECT * FROM sis_anuncio_categoria WHERE id_cat='$cate'");
$cate = mysql_query($query_cate, $sistemai) or die(mysql_error());
$row_cate = mysql_fetch_assoc($cate);
$totalRows_cate = mysql_num_rows($cate);

mysql_select_db($database_sistemai, $sistemai);
$query_ubica = sprintf("SELECT * FROM sis_anuncio_ubicacion WHERE id_ubi='$ubica'");
$ubica = mysql_query($query_ubica, $sistemai) or die(mysql_error());
$row_ubica = mysql_fetch_assoc($ubica);
$totalRows_ubica = mysql_num_rows($ubica);



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

<script src="js/plugins/ckeditor/ckeditor.js"></script>
      <script src="js/plugins/ckeditor/config.js"></script>
       

		<script type="text/javascript">
            $(function() {
            	 CKEDITOR.replace('des_espanol',{
            	 	    filebrowserBrowseUrl : 'modules/file/ft2.php',
            	 		uiColor: '#c3c3c3',
						allowedContent: true
						
            	 		
            	 	});
            	
            });

            
        </script>

 
    <script> 
        $(document).ready(function() {  
        	
			$('#message').hide();
			$('#msgerror3').hide();
			$("#progress").hide();
		 	$("form").keypress(function(e) {
       			if (e.which == 13) {
            return false;
        	}
    		});

    $("#grabar").click(function(){
 			
    $('#grabar').hide();
    CKEDITOR.instances['des_espanol'].updateElement();

 	

    if($("#des_espanol").val().length < 1) {  
        $('#msgerror3').show();
        $("#msgerror3 p").html("<strong>Error!</strong> Debes agregar descripcion").show();   
        $('#grabar').show();  

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
            	$('#msgerror3').hide();
                $("#message p").html("Guardado con Exito!").show();
                
                $('#myForm').hide();

                setTimeout(function() {
              url = "index.php?mod=fotos-anuncio";
              $(location).attr('href',url);
              },1000);
    },
	complete: function(response) 
	{
				
	},
	error: function()
	{
		$("#msgerror3").html("<font color='red'> ERROR: unable to upload files</font>");

	}
     
}; 

     $("#myForm").ajaxForm(options);
     	data: $("#myForm").serialize()
     	
        }); 


  

    </script> 

</head>
<body>

<br>

<div id="msgerror3" class="alert alert-warning alert-dismissable" style="position:absolute;z-index:10 !important;right:5px;top: 144px;">
   <i class="fa fa-warning"></i><p></p></div>
<!-- FORMULARIO REGISTRO  -->

<h2 class="titulo-azul">Información del Inmueble</h2>
<div class="box-body">
<span><b>Categoría:</b> </span><?php echo $row_cate['des_cat']; ?><br>
<span><b>Ubicación:</b> </span><?php echo $row_ubica['nombre_ubi']; ?><br>

<form   id="myForm" method="POST" action="modules/anuncios/grabando.php"  enctype="multipart/form-data" >

<div class="icon1"><a href="#box-formulario1">1 - Describa su Anuncio</a></div>
<div class="box-formulario1" id="box-formulario1">
<table>
 		
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="titulo_espanol" placeholder="Título en Español" name="titulo_espanol" value=""  />
			</div>
			</td>
		</tr>
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="titulo_ingles" placeholder="Título en Ingles" name="titulo_ingles" value=""  />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="preciov" placeholder="$" name="preciov" value="" style="width:100px;" />
			<small> Precio Venta</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="precioa" placeholder="$" name="precioa" value="" style="width:100px;" />
			<small> Precio Alquiler</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<select name="recama" id="recama" class="form-control fm" style="width:75px;">
          		<option value="0"> </option>
          		<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
			</select>
			<small> Recamaras</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<select name="banios" id="banios" class="form-control fm" style="width:75px;">
          		<option value="0"> </option>
          		<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
			</select>
			<small> Baños</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<select name="estacio" id="estacio" class="form-control fm" style="width:75px;">
          		<option value="0"> </option>
          		<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
			</select>
			<small> Estacionamientos</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="mconstru" placeholder="Mts" name="mconstru" value="" style="width:100px;" />
			<small> Metros de Construcción</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="mterreno" placeholder="Mts" name="mterreno" value="" style="width:100px;" />
			<small> Metros de Terreno</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="anios_constru" placeholder="" name="anios_constru" value="" style="width:100px;" />
			<small> Años de Construcción</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="costo_mante" placeholder="" name="costo_mante" value="" style="width:100px;" />
			<small> Costo de Mantenimiento</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="altura" placeholder="" name="altura" value="" style="width:100px;" />
			<small> Altura</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="tipo_pisos" placeholder="Tipo de Pisos" name="tipo_pisos" value="" style="width:300px;" />
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="niveles" placeholder="" name="niveles" value="" style="width:50px;" />
			<small> Niveles</small>
			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="piso_num" placeholder="" name="piso_num" value="" style="width:50px;" />
			<small> Piso Número</small>
			</div>
			</td>
		</tr>
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<select name="balcon" id="balcon" class="form-control fm" style="width:75px;">
          		<option value="0"> </option>
				<option value="1">Sí</option>
			</select>
			<small> Balcón</small>
			</div>
			</td>
		</tr>
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<select name="piscina" id="piscina" class="form-control fm" style="width:75px;">
          		<option value="0"> </option>
				<option value="1">Sí</option>
			</select>
			<small> Piscina</small>
			</div>
			</td>
		</tr>


</table>
</div>
<div class="icon1"><a href="#box-formulario2">2 - Foto Principal del Anuncio</a></div>
<div class="box-formulario2" id="box-formulario2">
	<table>
		<tr>
			<td>
			<small> Foto Principal del Anuncio</small>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="file" name="imagen"  />
			</div>
			</td>
		</tr>

		<tr>
			<td>

			<div class="input-group" >
			  <span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			  <textarea  class="form-control fm" name="direccion" id="direccion" placeholder="Dirección del Inmueble"  style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>                      

			</div>
			</td>
		</tr>

	<tr>
			<td>
			<div class="input-group" id="coneditor">
			  <textarea  name="des_espanol" id="des_espanol" placeholder="Descripción larga del Producto" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> 

			</div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<input class="form-control fm" type="text" id="video" placeholder="Video de Youtube" name="video" value=""  />
			</div>
			</td>
		</tr>

		

		<tr><td>&nbsp;</td></tr>
		<tr>
	

		</tr>
	</table>
</div>
<div class="icon1"><a href="#box-formulario3">3 - Tienes más Información?</a></div>
<div class="box-formulario3" id="box-formulario3">
	<table>
		<tr>
			<td>
			<h4>Beneficios</h4>
			</td>
		</tr>
		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben1" id="ben1"/>
                    Cerca de Escuela
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben2" id="ben2"/>
                    Cerca del Tráfico
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben3" id="ben3"/>
                    Vista al Mar
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben4" id="ben4"/>
                    Vista al Lago
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben5" id="ben5"/>
                    Vista a la Montaña
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben6" id="ben6"/>
                    Frente al Mar
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben7" id="ben7"/>
                    Frente al Lago
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben8" id="ben8"/>
                    Frente al Rio
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben9" id="ben9"/>
                    Estacionamientos Bajo Techo
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben10" id="ben10"/>
                    Estacionamiento de Visitas
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben11" id="ben11"/>
                    Cuarto y baño de empleada
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben12" id="ben12"/>
                    Seguridad 24 Horas
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben13" id="ben13"/>
                    2 o más elevadores
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben14" id="ben14"/>
                    Lavandería interna
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben15" id="ben15"/>
                    1 Studio
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben16" id="ben16"/>
                    2 o mas Studio
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben17" id="ben17"/>
                    Deposito
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben18" id="ben18"/>
                    Salón de fiestas
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben19" id="ben19"/>
                    Jardín o Parque
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben20" id="ben20"/>
                    Parque Infantil
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben21" id="ben21"/>
                    Gimnasio
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben22" id="ben22"/>
                    Área para desayunador
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben23" id="ben23"/>
                    Aires Acondicionados
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben24" id="ben24"/>
                    Patio
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben25" id="ben25"/>
                    Aire acondicionado central
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben26" id="ben26"/>
                    Terreno en esquina
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben27" id="ben27"/>
                    Calle sin salida
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben28" id="ben28"/>
                    Garaje techado
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben29" id="ben29"/>
                    Sala y Comedor
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben30" id="ben30"/>
                    Área Social
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben31" id="ben31"/>
                    Walk-in closet
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben32" id="ben32"/>
                   Área de barbacoa
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="ben33" id="ben33"/>
                     Elegante lobby
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<h4>Linea Blanca</h4>
			</td>
		</tr>

		
		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="lin1" id="lin1"/>
                    Nevera
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="lin2" id="lin2"/>
                     Microondas
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="lin3" id="lin3"/>
                    Estufa
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="lin4" id="lin4"/>
                     Lavaplatos
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="lin5" id="lin5"/>
                    Dispensador de agua caliente
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="lin6" id="lin6"/>
                     Calentador de agua
                </label>                                                
            </div>
			</td>
		</tr>

		<tr>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="lin7" id="lin7"/>
                    Lavadora
                </label>                                                
            </div>
			</td>
			<td>
			<div class="checkbox">
               <label>
                  <input type="checkbox" value="1" name="lin8" id="lin8"/>
                      Secadora
                </label>                                                
            </div>
			</td>
		</tr>
	</table>
</div>

    
       <input type="hidden" name="id_anuncio" id="id_anuncio" value="">
       <input type="hidden" name="status" id="status" value="1">
       <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $row_usua['id_usuario'];?>">
       <input type="hidden" name="id_categoria" id="id_categoria" value="<?php echo $row_cate['id_cat']; ?>">
       <input type="hidden" name="id_ubicacion" id="id_ubicacion" value="<?php echo $row_ubica['id_ubi']; ?>">
       
       <div style="position:absolute;top:10px;right:10px;">
       <a href="index.php?mod=gestor-anuncio" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <input type="submit" id="grabar" class="btn btn-primary btn-lg " value="Continuar >" />
	   </div>
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



		</body>
		</html>