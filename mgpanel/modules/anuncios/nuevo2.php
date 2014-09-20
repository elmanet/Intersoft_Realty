<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

mysql_select_db($database_sistemai, $sistemai);
$query_ubica = sprintf("SELECT * FROM sis_anuncio_ubicacion where catp IS NULL");
$ubica = mysql_query($query_ubica, $sistemai) or die(mysql_error());
$row_ubica = mysql_fetch_assoc($ubica);
$totalRows_ubica = mysql_num_rows($ubica);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />

<script src="js/jquery.form.js"></script> 
 
    <script> 
        $(document).ready(function() { 
          $("#grabar").hide();
        	$('#s2').hide();
        	$('#s3').hide();
    			$('#message').hide();
    			$('#msgerror2').hide();
    			$("#progress").hide();
    		 	$("form").keypress(function(e) {
       			if (e.which == 13) {
            return false;
        	}
    		});

     $('select#id_ubi').on('change',function(){

    	var vubi = $(this).val();

      localStorage.ubicacion = vubi;




    	//hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "modules/anuncios/buscar-ubicacion.php",
                    data: "1b="+vubi,
                    dataType: "html",
                    error: function(){

                          alert("error petición ajax");
                    },
                    success: function(data){ 
                         $('#s3').hide();                                                   
                    	 $('#s2').show();
                       $('#grabar').show();
                    	  $("#s2").empty();
                          $("#s2").append(data);        
                                                             
                    }
              });

	});


    $("#grabar").click(function(){
 		
    var objectParameters = {
                   cate: localStorage.cateanuncio,
                   ubica: localStorage.ubicacion
                }

      $.ajax({
                   type: "POST",   
                    url: "modules/anuncios/nuevo3.php",
                    data: objectParameters,
                    dataType: "html",
                    error: function(){

                          alert("error petición ajax");
                    },
                    success: function(data){                                                    
                          $("#wtop").empty();
                          $("#wtop").append(data);        
                                                             
                    }
              });

 	
  		
     });

    var options = {  
     
     }; 

     $("#myForm").ajaxForm(options);

     	
        }); 


  

    </script> 

</head>
<body>


<br>

<div id="msgerror2" class="alert alert-warning alert-dismissable" style="position:absolute;z-index:10 !important;right:5px;top: 144px;">
   <i class="fa fa-warning"></i><p></p></div>
<!-- FORMULARIO REGISTRO  -->
<div class="box-body">

<form   id="myForm" method="POST" action="modules/productos/nuevo2.php"  enctype="multipart/form-data" >
<h2 class="titulo-azul">Seleccionar Ubicación</h2>
<table>
 		
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<select multiple class="form-control" name="id_ubi" id="id_ubi" style="height:250px;">
          	<?php do { ?>
          		<option value="<?php echo $row_ubica['id_ubi']; ?>"><?php echo $row_ubica['des_ubi']; ?></option>
          		<?php } while ($row_ubica = mysql_fetch_assoc($ubica));
		  		$rows = mysql_num_rows($ubica);
		  	  	if($rows > 0) {
		      	mysql_data_seek($ubica, 0);
			  	$row_ubica = mysql_fetch_assoc($ubica);
				}
			    ?>
           	</select>
			</div>
			</td>
	
			<td>
			<div class="input-group" id="s2">
			
			</div>
			</td>
	
			<td>
			<div class="input-group" id="s3">
			
			</div>
			</td>

      <td>
      <div class="input-group" id="s4">
      
      </div>
      </td>
		</tr>


		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td colspan="2" align="center">

			<a href="index.php?mod=gestor-anuncio" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i><span> Cancelar</span></a>	&nbsp;&nbsp;&nbsp;	 <input type="submit" id="grabar" class="btn btn-primary btn-lg " value="Continuar >" />

			</td>
		</tr>
	</table>


	
</form> 


<br/>
    


<!-- FIN DE NUEVO INGRESO -->	

<!-- FIN DE NUEVO INGRESO -->	
		<div id="message" class="alert alert-success alert-dismissable" style="position:relative;z-index:10 !important;">
		   <i class="fa fa-check"></i><p></p>
		</div>
	
		<!-- FIN DE CLIENTE NUEVO INGRESO -->	
</div>





      <script>
     
      </script>
		</body>
		</html>
