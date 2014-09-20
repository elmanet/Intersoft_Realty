<?php
require_once('modules/inc/usuario.inc.php');

mysql_select_db($database_sistemai, $sistemai);
$query_categoria = "SELECT * FROM sis_plantilla_articulo_categoria ORDER by modificado DESC";
$categoria = mysql_query($query_categoria, $sistemai) or die(mysql_error());
$row_categoria = mysql_fetch_assoc($categoria);
$totalRows_categoria = mysql_num_rows($categoria);


?>
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

            
<?php if ($totalRows_categoria>0){ ?>            

<div class="box">
   <div class="box-header">
    <h3 class="box-title">CATEGORIA DE ARTICULOS</h3> 
    <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:10px;"><a href="index.php?mod=nueva-categoria-articulo" style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Nueva Categoría</span></a></small>                                   
   </div><!-- /.box-header -->
  <div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
				
        <thead>
              <tr >
              <th ><b>T&iacute;tulo de la Categor&iacute;a</b></th>
              <th><b>Status</b></th>
              <th ><b>Opciones</b></th>
              </tr>
        </thead>
             
              <?php do { ?>
              <tr class="odd">
              <td  height="26" align="center" ><?php echo $row_categoria['descripcion']; ?></td>
             
              <td  align="center" >
                <?php if ($row_categoria['status']==0){ ?><span class="glyphicon glyphicon-thumbs-down" style="font-size:2em;"></span><?php }  ?>
                <?php if ($row_categoria['status']==1){ ?><span class="glyphicon glyphicon-thumbs-up" style="font-size:2em;"></span><?php }  ?>
    					   </td>
                 <td  align="center" ><a href="index.php?mod=modificar-categoria-articulo&id=<?php echo $row_categoria['id_art_cate'];?>"><span class="glyphicon glyphicon-pencil" style="font-size:2em;"></span></a>&nbsp;<a href="javascript:cargar('#divtest', 'modules/plantilla-articulos-categoria/eliminar.php?id=<?php echo $row_categoria['id_art_cate'];?>&ruta=<?php echo '../../../imagesmg/'.$row_categoria['ruta'];?>')"  class="ask-custom"><span class="glyphicon glyphicon-trash" style="font-size:2em;"></span></a></td>
              
    				  
            
              </tr>
              <?php } while ($row_categoria = mysql_fetch_assoc($categoria)); ?>
            </table>
          </div><!-- /.box-body -->
         </div><!-- /.box -->
            <?php } ?>
           <?php if (($totalRows_categoria==0)){ ?> 
            <br>
            <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:110px;"><a href="index.php?mod=nueva-categoria-articulo" style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Agregar Categoría</span></a></small>                                   
            <center>
            <img src="../../images/iconfinder/vacio.png" alt="" width="200">
				<p style="font-size:19px;">"No Hay Categor&iacute;as Registradas!"</p>            
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
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false,
                    
                });

            });
        </script>