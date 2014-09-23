<?php

mysql_select_db($database_sistemai, $sistemai);
$query_articulos = "SELECT a.id_articulo, a.id_art_cate, a.titulo_articulo, a.alias, a.orden,a.tipo_articulo, a.modificado, a.status, a.ruta, b.id_art_cate, b.descripcion FROM sis_plantilla_articulos a, sis_plantilla_articulo_categoria b WHERE a.id_art_cate=b.id_art_cate AND a.tipo_articulo < 3 ORDER by a.modificado DESC";
$articulos = mysql_query($query_articulos, $sistemai) or die(mysql_error());
$row_articulos = mysql_fetch_assoc($articulos);
$totalRows_articulos = mysql_num_rows($articulos);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />


<?php /* FUNCION PREGUNTAR ANTES */ ?>         
<script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
        <script type="text/javascript">
          
          $(document).ready(function() {
            
            
            $('.ask-plain').click(function(e) {
              
              e.preventDefault();
              thisHref  = $(this).attr('href');
              
              if(confirm('Are you sure')) {
                window.location = thisHref;
              }
              
            });
            
            $('.ask-custom').jConfirmAction({question : "Quieres Eliminarlo?", yesAnswer : "Si", cancelAnswer : "Cancelar"});
            $('.ask').jConfirmAction();
          });
          
        </script>
 <?php /* FUNCION PREGUNTAR ANTES */ ?> 

</head>

<body>


<?php if ($totalRows_articulos>0){ ?>

<div class="box">
   <div class="box-header">
    <h3 class="box-title">GESTOR DE ARTICULOS</h3> 
    <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:10px;"><a href="index.php?mod=nuevo-articulo-blog"  style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Nuevo Artículo</span></a></small>                                   
   </div><!-- /.box-header -->
  <div class="box-body table-responsive">
    <table id="example2" class="table table-bordered table-striped">
				
        <thead>
              <tr >
 				<th  ><b>ID</b></th>
        <th><b>Imagen</b></th>
 				<th  ><b>Categor&iacute;a</b></th>
               	<th ><b>Titulo del Art&iacute;culo</b></th>
				<th  ><b>Alias</b></th>
				<th><b>Fotos</b></th>
				<th ><b>Status</b></th>
				<th ><b>Tipo</b></th>
             	<th ><b>Opciones</b></th>
              </tr>
        </thead>


          
              <?php  do { ?>
              <tr class="odd">
				  <td align="center" ><?php echo $row_articulos['id_articulo']; ?></td>
				   
             <td  height="26" align="center" >
              <?php if($row_articulos['ruta']=="imagenes/"){ ?>
               <a href="javascript:cargar('#divtest', 'modules/plantilla-articulos/cargar_foto.php?&id=<?php echo $row_articulos['id_articulo'];?>')"><span class="glyphicon glyphicon-picture" style="font-size:2em;"></span></a>
              <?php } else { ?>
              <a href="javascript:cargar('#divtest', 'modules/plantilla-articulos/eliminar_foto.php?id=<?php echo $row_articulos['id_articulo'];?>&ruta=<?php echo '../../../imagesmg/'.$row_articulos['ruta'];?>')"  class="ask-custom">
                 <img src="../imagesmg/<?php echo $row_articulos['ruta']; ?>" alt="" height="40" >
              </a>
              <?php } ?>
              </td>
              <td align="center" ><?php echo $row_articulos['descripcion']; ?></td>
              <td  height="26" align="center" ><?php echo strtoupper($row_articulos['titulo_articulo']); ?></td>
				  <td align="center" ><a href="../index.php?mod=<?php echo $row_articulos['alias']; ?>" target="_blank" style="color:#424242;"><?php echo $row_articulos['alias']; ?></a></td>
              <td  align="center" >
              <a href="#" onclick="cargar('#divtest', 'modules/plantilla-articulos/fotos.php?id=<?php echo $row_articulos['id_articulo'];?>')"  ><span class="glyphicon glyphicon-camera" style="font-size:2em;"></span></a></td>
              <td  align="center" >
			<?php //CAMBIAR EL STATUS ?>
              <form action="#"  id="cstatus" method="GET" enctype="multipart/form-data" >
					<?php if ($row_articulos['status']==0){ ?><a href="javascript:cargar('#divtest', 'modules/plantilla-articulos/cambiando-status.php?status=<?php echo $row_articulos['status'];?>&id_articulo=<?php echo $row_articulos['id_articulo'];?>')"><span class="glyphicon glyphicon-thumbs-down" style="font-size:2em;"></span></a><?php }  ?>
					<?php if ($row_articulos['status']==1){ ?><a href="javascript:cargar('#divtest', 'modules/plantilla-articulos/cambiando-status.php?status=<?php echo $row_articulos['status'];?>&id_articulo=<?php echo $row_articulos['id_articulo'];?>')"><span class="glyphicon glyphicon-thumbs-up" style="font-size:2em;"></span></a><?php }  ?>
					<input type="hidden" name="status" id="status" value="<?php echo $row_articulos['status'];?>">
					<input type="hidden" name="id_articulo" id="id_articulo" value="<?php echo $row_articulos['id_articulo'];?>">
						           
              </form>
         <?php //FIN DE CAMBIAR EL STATUS ?>            
              </td>
              <td  align="center" ><?php if($row_articulos['tipo_articulo']==1) {?><span class="glyphicon glyphicon-star" style="font-size:2em;color: rgb(173, 173, 44);"></span><?php }?><?php if($row_articulos['tipo_articulo']==2) {?><span class="glyphicon glyphicon-bookmark" style="font-size:2em;color: red;"></span><?php }?></td>
				  <td  align="center" ><a href="index.php?mod=modificar-articulo-blog&id=<?php echo $row_articulos['id_articulo'];?>"><span class="glyphicon glyphicon-pencil" style="font-size:2em;"></span></a>&nbsp;<a href="javascript:cargar('#divtest', 'modules/plantilla-articulos/eliminar.php?id=<?php echo $row_articulos['id_articulo'];?>&ruta=<?php echo '../../../imagesmg/'.$row_articulos['ruta'];?>')"  class="ask-custom"><span class="glyphicon glyphicon-trash" style="font-size:2em;"></span></a></td>
        
              </tr>
              <?php } while ($row_articulos = mysql_fetch_assoc($articulos)); ?>
            </table>
            </div><!-- /.box-body -->
         </div><!-- /.box -->

            <?php } ?>
            <?php if (($totalRows_articulos==0)){ ?> 
            <br>
            <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:110px;"><a href="index.php?mod=nuevo-articulo-blog"  style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Agregar Artículo</span></a></small>                                   
            <center>
            <img src="images/iconfinder/vacio.png" alt="" width="200">
				<p style="font-size:19px;">"No Hay Art&iacute;culos Publicados!"</p>            
            </center>
            <?php } ?>
            <br />
            <br />
				<br />
           <br />
            <br />
				<br />
           <br />
            <br />
				<br />
           <br />
            <br />
				<br />

</center>	
<!-- DATA TABES SCRIPT -->

        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        
                 <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                     "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": false,
                    "bInfo": true,
                    "bAutoWidth": true,
                    
                });

            });
        </script>
</body>

</html>
