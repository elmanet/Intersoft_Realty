<?php
mysql_select_db($database_sistemai, $sistemai);
$query_anuncio = "SELECT * FROM sis_anuncio a, sis_anuncio_categoria b, sis_anuncio_ubicacion c WHERE a.id_categoria=b.id_cat AND a.id_ubicacion=c.id_ubi  ORDER BY a.creado DESC";
$anuncio = mysql_query($query_anuncio, $sistemai) or die(mysql_error());
$row_anuncio = mysql_fetch_assoc($anuncio);
$totalRows_anuncio = mysql_num_rows($anuncio);
//FIN DE LA BUSQUEDA
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

<?php if ($totalRows_anuncio>0){ ?>            
<div class="box">
   <div class="box-header">
    <h3 class="box-title">GESTOR DE ANUNCIOS</h3> 
    <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:10px;"><a href="index.php?mod=nuevo-anuncio" style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Nuevo Anuncio</span></a></small>                                   
   </div><!-- /.box-header -->
  <div class="box-body table-responsive">
    <table id="example2" class="table table-bordered table-striped">
				<thead>

            <tr >
            <th><b>Cod</b></th>
 				    <th><b>Imagen</b></th>
            <th><b>Descripci&oacute;n del Anuncio</b></th>
				    <th><b>Categor&iacute;a</b></th>
            <th><b>Precio</b></th>
            <th><b>Fotos</b></th>
					  <th><b>Status</b></th>
            <th><b>Opciones</b></th>
            </tr>
        </thead>
             
              <?php do { ?>
              <tr class="odd">
              <td align="center" ><?php echo $row_anuncio['id_anuncio']; ?></td>
              <td  height="26" align="center" >
              <?php if($row_anuncio['ruta']=="imagenes/"){ ?>
               <a href="javascript:cargar('#divtest', 'modules/anuncios/cargar_foto.php?&id=<?php echo $row_anuncio['id'];?>')"><span class="glyphicon glyphicon-picture" style="font-size:2em;"></span></a>
              <?php } else { ?>
              <a href="javascript:cargar('#divtest', 'modules/anuncios/eliminar_foto.php?id=<?php echo $row_anuncio['id'];?>&ruta=<?php echo '../../../imagesmg/'.$row_anuncio['ruta'];?>')"  class="ask-custom">
                 <img src="../imagesmg/<?php echo $row_anuncio['ruta']; ?>" alt="" height="40" >
              </a>
              <?php } ?>
              </td>
              <td  height="26" align="center" ><?php echo strtoupper($row_anuncio['titulo_espanol']); ?></td>
				  <td align="center" ><?php echo $row_anuncio['des_cat']; ?><br> En:<?php echo $row_anuncio['nombre_ubi']; ?> </td>
              <td  align="center" >
              	<?php  echo "Venta: ".$row_anuncio['preciov'].$row_config['simbolo_moneda']; ?><br>
                <?php  echo "Alquiler: ".$row_anuncio['precioa'].$row_config['simbolo_moneda']; ?></td>
              <td  align="center" >
              <a href="index.php?mod=foto-anuncio&id=<?php echo $row_anuncio['id_anuncio'];?>"  ><span class="glyphicon glyphicon-camera" style="font-size:2em;"></span></a></td>

              <td  align="center" >
        <?php //CAMBIAR EL STATUS ?>
          <form action="#"  id="cstatus" method="GET" enctype="multipart/form-data" >
          <?php if ($row_anuncio['status']==0){ ?><a href="javascript:cargar('#divtest', 'modules/anuncios/cambiando-status.php?status=<?php echo $row_anuncio['status'];?>&id=<?php echo $row_anuncio['id_anuncio'];?>')"><span class="glyphicon glyphicon-thumbs-down" style="font-size:2em;"></span></a><?php }  ?>
          <?php if ($row_anuncio['status']==1){ ?><a href="javascript:cargar('#divtest', 'modules/anuncios/cambiando-status.php?status=<?php echo $row_anuncio['status'];?>&id=<?php echo $row_anuncio['id_anuncio'];?>')"><span class="glyphicon glyphicon-thumbs-up" style="font-size:2em;"></span></a><?php }  ?>

              </form>
         <?php //FIN DE CAMBIAR EL STATUS ?>        

        
              </td>
             <td  align="center" ><a href="#" onclick="cargar('#divtest', 'modules/anuncios/modificar.php?id=<?php echo $row_anuncio['id_anuncio'];?>')"><span class="glyphicon glyphicon-pencil" style="font-size:2em;"></span></a>&nbsp;<a href="javascript:cargar('#divtest', 'modules/anuncios/eliminar.php?id=<?php echo $row_anuncio['id_anuncio'];?>&ruta=<?php echo '../../../imagesmg/'.$row_anuncio['ruta'];?>')"  class="ask-custom"><span class="glyphicon glyphicon-trash" style="font-size:2em;"></span></a></td> 
				  
        
              </tr>
              <?php } while ($row_anuncio = mysql_fetch_assoc($anuncio)); ?>
            </table>
            
             </div><!-- /.box-body -->
         </div><!-- /.box -->
            <?php } ?>
            <?php if (($totalRows_anuncio==0)){ ?> 
            <br>
            <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:110px;"><a href="index.php?mod=nuevo-anuncio" style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Nuevo Anuncio</span></a></small>                                   
            <center>
            <img src="images/iconfinder/vacio.png" alt="" width="200">
				<p style="font-size:19px;">"No Hay Anuncios Publicados!"</p>            
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