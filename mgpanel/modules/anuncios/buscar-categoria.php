<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

$buscar1 = $_POST['b'];
$buscar2 = $_POST['c'];
$buscar3 = $_POST['d'];


mysql_select_db($database_sistemai, $sistemai);
$query_cate2 = sprintf("SELECT * FROM sis_anuncio_categoria where catp='$buscar1'");
$cate2 = mysql_query($query_cate2, $sistemai) or die(mysql_error());
$row_cate2 = mysql_fetch_assoc($cate2);
$totalRows_cate2 = mysql_num_rows($cate2);

mysql_select_db($database_sistemai, $sistemai);
$query_cate3 = sprintf("SELECT * FROM sis_anuncio_categoria where catp='$buscar2'");
$cate3 = mysql_query($query_cate3, $sistemai) or die(mysql_error());
$row_cate3 = mysql_fetch_assoc($cate3);
$totalRows_cate3 = mysql_num_rows($cate3);

mysql_select_db($database_sistemai, $sistemai);
$query_cate4 = sprintf("SELECT * FROM sis_anuncio_categoria where catp='$buscar3'");
$cate4 = mysql_query($query_cate4, $sistemai) or die(mysql_error());
$row_cate4 = mysql_fetch_assoc($cate4);
$totalRows_cate4 = mysql_num_rows($cate4);

?>
<script>

$('select#id_cate2').on('change',function(){
    	var valor2 = $(this).val();
      localStorage.cateanuncio = valor2;
    	//hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "modules/anuncios/buscar-categoria.php",
                    data: "c="+valor2,
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

$('select#id_cate3').on('change',function(){
      var valor3 = $(this).val();
      localStorage.cateanuncio = valor3;
      //hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "modules/anuncios/buscar-categoria.php",
                    data: "d="+valor3,
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

</script>

			<?php if(($buscar1>0)and($totalRows_cate2>0)){?>
				
			<select multiple class="form-control" name="id_cate2" id="id_cate2">
          	<?php do { ?>
          		<option value="<?php echo $row_cate2['id_cat']; ?>"><?php echo $row_cate2['des_cat']; ?></option>
          		<?php } while ($row_cate2 = mysql_fetch_assoc($cate2));
		  		$rows = mysql_num_rows($cate2);
		  	  	if($rows > 0) {
		      	mysql_data_seek($cate2, 0);
			  	$row_cate2 = mysql_fetch_assoc($cate2);
				}
			    ?>
           	</select>
           	<?php } ?>

           	<?php if(($buscar2>0)and($totalRows_cate3>0)){?>
          	
			     <select multiple class="form-control" name="id_cate3" id="id_cate3">
          	<?php do { ?>
          		<option value="<?php echo $row_cate3['id_cat']; ?>"><?php echo $row_cate3['des_cat']; ?></option>
          		<?php } while ($row_cate3 = mysql_fetch_assoc($cate3));
		  		$rows = mysql_num_rows($cate3);
		  	  	if($rows > 0) {
		      	mysql_data_seek($cate3, 0);
			  	$row_cate3 = mysql_fetch_assoc($cate3);
				}
			    ?>
           	</select>
           	<?php } ?>