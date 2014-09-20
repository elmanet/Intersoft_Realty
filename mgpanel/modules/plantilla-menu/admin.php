<?php

mysql_select_db($database_sistemai, $sistemai);
$query_menu = "SELECT a.id_menu_link, a.titulo_link, a.tipo_link, a.status, a.id_menu, a.orden, b.descripcion  FROM sis_plantilla_menu_link a, sis_plantilla_menu b WHERE a.id_menu=b.id_menu ORDER BY b.descripcion, a.orden ASC;";
$menu = mysql_query($query_menu, $sistemai) or die(mysql_error());
$row_menu = mysql_fetch_assoc($menu);
$totalRows_menu = mysql_num_rows($menu);

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

<?php if ($totalRows_menu>0){ ?>     

<div class="box">
   <div class="box-header">
    <h3 class="box-title">GESTOR DE MENUS</h3> 
    <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:10px;"><a href="index.php?mod=nuevo-menu" style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Nuevo Link</span></a></small>                                   
   </div><!-- /.box-header -->
  <div class="box-body table-responsive">
  <table id="example1" class="table table-bordered table-striped">


  	<thead>
        <tr >
 		<th><b>Titulo del Link</b></th>
		<th><b>Men&uacute;</b></th>
		<th><b>Tipo Men&uacute;</b></th>
		<th><b>Orden</b></th>
		<th><b>Status</b></th>
        <th><b>Opciones</b></th>
        </tr>
    </thead>
             
              <?php do { ?>
              <tr class="odd">
              <td  height="26" align="center" ><?php echo strtoupper($row_menu['titulo_link']); ?></td>
				  <td align="center" ><?php echo $row_menu['descripcion']; ?></td>
				   <td align="center" ><?php if($row_menu['tipo_link']==1){ echo "Art&iacute;culo Simple";} if($row_menu['tipo_link']==2){ echo "Categor&iacute;a Art&iacute;culos";} if($row_menu['tipo_link']==3){ echo "URL Interna";} if($row_menu['tipo_link']==4){ echo "URL Externa";}?></td>

				  <td align="center" ><?php echo $row_menu['orden']; ?></td>
              <td  align="center" >
              	<?php //CAMBIAR EL STATUS ?>
              <form action="#"  id="cstatus" method="GET" enctype="multipart/form-data" >
					<?php if ($row_menu['status']==0){ ?><a href="javascript:cargar('#divtest', 'modules/plantilla-menu/cambiando-status.php?status=<?php echo $row_menu['status'];?>&id=<?php echo $row_menu['id_menu_link'];?>')"><span class="glyphicon glyphicon-thumbs-down" style="font-size:2em;"></span></a><?php }  ?>
					<?php if ($row_menu['status']==1){ ?><a href="javascript:cargar('#divtest', 'modules/plantilla-menu/cambiando-status.php?status=<?php echo $row_menu['status'];?>&id=<?php echo $row_menu['id_menu_link'];?>')"><span class="glyphicon glyphicon-thumbs-up" style="font-size:2em;"></span></a><?php }  ?>
					<input type="hidden" name="status" id="status" value="<?php echo $row_menu['status'];?>">
					<input type="hidden" name="id_menu_link" id="id_menu_link" value="<?php echo $row_menu['id_menu_link'];?>">
						           
              </form>
         <?php //FIN DE CAMBIAR EL STATUS ?>

            
              </td>
                <td  align="center" ><a href="index.php?mod=modificar-menu&id=<?php echo $row_menu['id_menu_link'];?>')"><span class="glyphicon glyphicon-pencil" style="font-size:2em;"></span></a>&nbsp;<a href="javascript:cargar('#divtest', 'modules/plantilla-menu/eliminar.php?id=<?php echo $row_menu['id_menu_link'];?>')"  class="ask-custom"><span class="glyphicon glyphicon-trash" style="font-size:2em;"></span></a></td>
				
        
              </tr>
              <?php } while ($row_menu = mysql_fetch_assoc($menu)); ?>
            </table>
            
           </div><!-- /.box-body -->
         </div><!-- /.box -->
            <?php } ?>
            <?php if (($totalRows_menu==0)){ ?> 
            <br>
            <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:110px;"><a href="index.php?mod=nuevo-menu" style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Agregar Link</span></a></small>                                   
            <center>
            <img src="images/iconfinder/vacio.png" alt="" width="200">
				<p style="font-size:19px;">"No Hay Links Registrados!"</p>            
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