<?php

mysql_select_db($database_sistemai, $sistemai);
$query_cate = sprintf("SELECT * FROM sis_anuncio_categoria where catp IS NULL");
$cate = mysql_query($query_cate, $sistemai) or die(mysql_error());
$row_cate = mysql_fetch_assoc($cate);
$totalRows_cate = mysql_num_rows($cate);
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



<script src="js/jquery.form.js"></script> 
 
    <script> 
        $(document).ready(function() { 
          $("#grabar").hide();
        	$('#s2').hide();
        	$('#s3').hide();
        	$("#sineditor").hide();
    			$('#message').hide();
    			$('#msgerror').hide();
    			$("#progress").hide();
    		 	$("form").keypress(function(e) {
       			if (e.which == 13) {
            return false;
        	}
    		});

     $('select#id_cate').on('change',function(){

    	var valor = $(this).val();
      localStorage.cateanuncio = valor;


    	//hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "modules/anuncios/buscar-categoria.php",
                    data: "b="+valor,
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
 			

      $.ajax({
                   type: "POST",
                    url: "modules/anuncios/nuevo2.php",
                    data: "catea="+localStorage.cateanuncio,
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

<div id="msgerror" class="alert alert-warning alert-dismissable" style="position:absolute;z-index:10 !important;right:5px;top: 144px;">
   <i class="fa fa-warning"></i><p></p></div>
<!-- FORMULARIO REGISTRO  -->
<div class="box box-warning" id="wtop">
     <div class="box-header">
            <h3 class="box-title">Nuevo Anuncio</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<form   id="myForm" method="POST" action="modules/productos/nuevo2.php"  enctype="multipart/form-data" >
<h2 class="titulo-azul">Seleccionar Categoría</h2>
<table>
 		
		<tr>
			<td>
			<div class="input-group">
			<span class="input-group-addon"><i><strong class="fa fa-th-large"></strong></i></span>		
			<select multiple class="form-control" name="id_cate" id="id_cate">
          	<?php do { ?>
          		<option value="<?php echo $row_cate['id_cat']; ?>"><?php echo $row_cate['des_cat']; ?></option>
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

       <td>
      <div class="input-group" id="s5">
      
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
		   	 <div id="progress">
		        <div id="bar"></div>
		        <div id="percent">0%</div >
			</div>

		</div>
	
		<!-- FIN DE CLIENTE NUEVO INGRESO -->	
</div>


</div>



      <script>
     
      </script>
		</body>
		</html>