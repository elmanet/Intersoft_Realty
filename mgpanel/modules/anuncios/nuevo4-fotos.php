<?php

mysql_select_db($database_sistemai, $sistemai);
$query_anuncio = "SELECT * FROM sis_anuncio ORDER BY id_anuncio DESC";
$anuncio = mysql_query($query_anuncio, $sistemai) or die(mysql_error());
$row_anuncio = mysql_fetch_assoc($anuncio);
$totalRows_anuncio = mysql_num_rows($anuncio);

$idp=$row_anuncio['id_anuncio'];

//FIN DE LA BUSQUEDA
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<link href="css/dropzone.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/dropzone.js"></script>

<script language="javascript">
$(document).ready(function() {

$("#recargado").load('modules/anuncios/recargafoto-nuevo.php?id=<?php echo $idp; ?>'); 

});
  

</script>

<script>
$(function() {
  // Now that the DOM is fully loaded, create the dropzone, and setup the
  // event listeners


  var myDropzone = new Dropzone("#my-dropzone");

myDropzone.on("addedfile", function(file) {
    setTimeout(function() {
$("#recargado").load('modules/anuncios/recargafoto-nuevo.php?id=<?php echo $idp; ?>'); 
},1000);
  });

})

</script>
</head>
<body>

<div class="box box-warning">
     <div class="box-header">
            <h3 class="box-title">Cargar Fotos</h3>
     </div><!-- /.box-header -->
<div class="box-body">

<div style="width:49%; display:inline-block;vertical-align: top;">
<form action="modules/anuncios/foto2.php?id=<?php echo $idp;?>" class="dropzone" id="my-dropzone" method="post" enctype="multipart/form-data">
  <div class="fallback">
    <input name="imagen" type="file" multiple />
  </div>

</form>
</div>

<div style="width:49%; display:inline-block;vertical-align: top;margin-left:1%;" id="recargado"></div>
</div>
</div>

</body>

</html>

