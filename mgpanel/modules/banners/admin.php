<?php

mysql_select_db($database_sistemai, $sistemai);
$query_modulo = "SELECT * FROM sis_banners";
$modulo = mysql_query($query_modulo, $sistemai) or die(mysql_error());
$row_modulo = mysql_fetch_assoc($modulo);
$totalRows_modulo = mysql_num_rows($modulo);

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
<center>
<?php if ($totalRows_modulo>0){ ?>     

<div class="box">
   <div class="box-header">
    <h3 class="box-title">GESTOR DE BANNERS</h3> 
    <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:10px;"><a href="index.php?mod=nuevo-banner" style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Nuevo Banners</span></a></small>                                   
   </div><!-- /.box-header -->
  <div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">


				<thead>
        <tr >
   				<th><b>Foto</b></th>
   				<th><b>Orden</b></th>
          <th><b>Informaci&oacute;n</b></th>
          <th><b>V&iacute;nculo de la Foto</b></th>
  				<th><b>Fecha Subida</b></th>
          <th><b>Opciones</b></th>
        </tr>
        </thead>
             
              <?php do { ?>
              <tr class="odd">
              <td  height="26" align="center" >
              <?php if($row_modulo['ruta']=="imagenes/"){ ?>
               <a href="javascript:cargar('#divtest', 'modules/banners/cargar_foto.php?&id=<?php echo $row_modulo['id_foto'];?>')"><span class="glyphicon glyphicon-picture" style="font-size:2em;"></span></a>
              <?php } else { ?>
              <a href="javascript:cargar('#divtest', 'modules/banners/eliminar_foto.php?id=<?php echo $row_modulo['id_foto'];?>&ruta=<?php echo '../../../imagesmg/'.$row_modulo['ruta'];?>')"  class="ask-custom">
                 <img src="../imagesmg/<?php echo $row_modulo['ruta']; ?>" alt="" height="40" >
              </a>
              <?php } ?>
              </td>

              <td  height="26" align="center" ><?php echo $row_modulo['orden']; ?></td>
              <td  height="26" align="center" ><?php echo strtoupper($row_modulo['info']); ?></td>
              <td  height="26" align="center" ><?php echo $row_modulo['titulo_foto']; ?></td>
				  <td align="center" ><?php echo $row_modulo['creado']; ?></td>
          
          <td  align="center" ><a href="index.php?mod=modificar-banner&id=<?php echo $row_modulo['id_foto'];?>"><span class="glyphicon glyphicon-pencil" style="font-size:2em;"></span></a>&nbsp;<a href="javascript:cargar('#divtest', 'modules/banners/eliminar.php?id=<?php echo $row_modulo['id_foto'];?>&ruta=<?php echo '../../../imagesmg/'.$row_modulo['ruta'];?>')"  class="ask-custom"><span class="glyphicon glyphicon-trash" style="font-size:2em;"></span></a></td>              
				  
        
              </tr>
              <?php } while ($row_modulo = mysql_fetch_assoc($modulo)); ?>
            </table>
            </div><!-- /.box-body -->
         </div><!-- /.box -->


            <?php } ?>
            <?php if (($totalRows_modulo==0)){ ?> 
            <br>
            <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:110px;"><a href="index.php?mod=nuevo-banner" style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span>Nuevo Banner</span></a></small>                                   
            <center>
            <img src="images/iconfinder/vacio.png" alt="" width="200">
        <p style="font-size:19px;">"No Hay Banners Publicados!"</p>            
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
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false,
                    
                });

            });
        </script>
</body>

</html>
