<?php

$id=$_GET['id'];

//FIN DE LA BUSQUEDA
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<link href="css/dropzone.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/dropzone.js"></script>
<script>
$(function() {
  // Now that the DOM is fully loaded, create the dropzone, and setup the
  // event listeners


  var myDropzone = new Dropzone("#my-dropzone");

  myDropzone.on("addedfile", function(file) {
    setTimeout(function() {
              url = "index.php?mod=gestor-contenido";
              $(location).attr('href',url);
              },1000);
  }); 


});

</script>
</head>
<body>

<div class="box box-warning">
     <div class="box-header">
            <h3 class="box-title">Cargar Foto</h3>

     </div><!-- /.box-header -->
<div class="box-body">

<div style="width:49%; display:inline-block;vertical-align: top;">

<form action="modules/plantilla-articulos-contenido/recibir_foto.php?id=<?php echo $_GET['id'];?>" class="dropzone" id="my-dropzone" method="post" enctype="multipart/form-data">
  <div class="fallback">
    <input name="imagen" type="file"/>
  </div>

</form>
</div>

</div>

</body>

</html>