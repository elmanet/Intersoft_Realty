<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');


$ubica1 = $_POST['1b'];
$ubica2 = $_POST['1c'];
$ubica3 = $_POST['1d'];
$ubica4 = $_POST['1e'];


mysql_select_db($database_sistemai, $sistemai);
$query_ubi2 = sprintf("SELECT * FROM sis_anuncio_ubicacion where catp='$ubica1'");
$ubi2 = mysql_query($query_ubi2, $sistemai) or die(mysql_error());
$row_ubi2 = mysql_fetch_assoc($ubi2);
$totalRows_ubi2 = mysql_num_rows($ubi2);

mysql_select_db($database_sistemai, $sistemai);
$query_ubi3 = sprintf("SELECT * FROM sis_anuncio_ubicacion where catp='$ubica2'");
$ubi3 = mysql_query($query_ubi3, $sistemai) or die(mysql_error());
$row_ubi3 = mysql_fetch_assoc($ubi3);
$totalRows_ubi3 = mysql_num_rows($ubi3);

mysql_select_db($database_sistemai, $sistemai);
$query_ubi4 = sprintf("SELECT * FROM sis_anuncio_ubicacion where catp='$ubica3'");
$ubi4 = mysql_query($query_ubi4, $sistemai) or die(mysql_error());
$row_ubi4 = mysql_fetch_assoc($ubi4);
$totalRows_ubi4 = mysql_num_rows($ubi4);

?>

<script>

$('select#id_ubi2').on('change',function(){
    	var vubi2 = $(this).val();
      
      localStorage.ubicacion = vubi2;
    	//hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "modules/anuncios/buscar-ubicacion.php",
                    data: "1c="+vubi2,
                    dataType: "html",
                    error: function(){

                          alert("error petición ajax");
                    },
                    success: function(data){                                                    
                    	 $('#s3').show();
                    	 $("#s3").empty();
                       $("#s3").append(data);        
                                                             
                    }
              });
    });

$('select#id_ubi3').on('change',function(){
      var vubi3 = $(this).val();
      localStorage.ubicacion = vubi3;
      //hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "modules/anuncios/buscar-ubicacion.php",
                    data: "1d="+vubi3,
                    dataType: "html",
                    error: function(){

                          alert("error petición ajax");
                    },
                    success: function(data){                                                    
                       $('#s4').show();
                        $("#s4").empty();
                          $("#s4").append(data);        
                                                             
                    }
                    
              });
    });

$('select#id_ubi4').on('change',function(){
      var vubi4 = $(this).val();
      localStorage.ubicacion = vubi4;
      //hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "modules/anuncios/buscar-ubicacion.php",
                    data: "1e="+vubi4,
                    dataType: "html",
                    error: function(){

                          alert("error petición ajax");
                    },
                    success: function(data){                                                    
                       $('#s5').show();
                       $("#s5").empty();
                       $("#s5").append(data);        
                                                             
                    }
                    
              });
    });

</script>

			<?php if(($ubica1>0)and($totalRows_ubi2>0)){?>
				
			<select multiple class="form-control" name="id_ubi2" id="id_ubi2" style="height:250px;">
          	<?php do { ?>
          		<option value="<?php echo $row_ubi2['id_ubi']; ?>"><?php echo $row_ubi2['des_ubi']; ?></option>
          		<?php } while ($row_ubi2 = mysql_fetch_assoc($ubi2));
		  		$rows = mysql_num_rows($ubi2);
		  	  	if($rows > 0) {
		      	mysql_data_seek($ubi2, 0);
			  	$row_ubi2 = mysql_fetch_assoc($ubi2);
				}
			    ?>
           	</select>
           	<?php } ?>

           	<?php if(($ubica2>0)and($totalRows_ubi3>0)){?>
          	
			     <select multiple class="form-control" name="id_ubi3" id="id_ubi3" style="height:250px;">
          	<?php do { ?>
          		<option value="<?php echo $row_ubi3['id_ubi']; ?>"><?php echo $row_ubi3['des_ubi']; ?></option>
          		<?php } while ($row_ubi3 = mysql_fetch_assoc($ubi3));
		  		$rows = mysql_num_rows($ubi3);
		  	  	if($rows > 0) {
		      	mysql_data_seek($ubi3, 0);
			  	$row_ubi3 = mysql_fetch_assoc($ubi3);
				}
			    ?>
           	</select>
           	<?php } ?>

            <?php if(($ubica3>0)and($totalRows_ubi4>0)){?>
            
           <select multiple class="form-control" name="id_ubi4" id="id_ubi4" style="height:250px;">
            <?php do { ?>
              <option value="<?php echo $row_ubi4['id_ubi']; ?>"><?php echo $row_ubi4['des_ubi']; ?></option>
              <?php } while ($row_ubi4 = mysql_fetch_assoc($ubi4));
          $rows = mysql_num_rows($ubi4);
            if($rows > 0) {
            mysql_data_seek($ubi4, 0);
          $row_ubi4 = mysql_fetch_assoc($ubi4);
        }
          ?>
            </select>
            <?php } ?>