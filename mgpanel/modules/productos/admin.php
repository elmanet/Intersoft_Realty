<?php


mysql_select_db($database_sistemai, $sistemai);
$query_producto = "SELECT a.id, a.cod_prod, a.nombre_prod, b.nombre_cate, a.precio, a.descuento, a.destacado, a.status, a.ruta  FROM sis_productos a, sis_productos_categoria b WHERE a.id_cate=b.id  ORDER BY a.modificado DESC";
$producto = mysql_query($query_producto, $sistemai) or die(mysql_error());
$row_producto = mysql_fetch_assoc($producto);
$totalRows_producto = mysql_num_rows($producto);
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

<?php if ($totalRows_producto>0){ ?>            
<div class="box">
   <div class="box-header">
    <h3 class="box-title">GESTOR DE PRODUCTOS</h3> 
    <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:10px;"><a href="index.php?mod=nuevo-producto" style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Agregar Producto</span></a></small>                                   
   </div><!-- /.box-header -->
  <div class="box-body table-responsive">
    <table id="example2" class="table table-bordered table-striped">
				<thead>

            <tr >
            <th><b>Cod</b></th>
 				    <th><b>Imagen</b></th>
            <th><b>Descripci&oacute;n del Producto</b></th>
				    <th><b>Categor&iacute;a</b></th>
            <th><b>Precio sin Impuesto</b></th>
            <th><b>Fotos</b></th>
            <th><b>Destacado</b></th>
					  <th><b>Status</b></th>
            <th><b>Opciones</b></th>
            </tr>
        </thead>
             
              <?php do { ?>
              <tr class="odd">
              <td align="center" ><?php echo $row_producto['cod_prod']; ?></td>
              <td  height="26" align="center" >
              <?php if($row_producto['ruta']=="imagenes/"){ ?>
               <a href="javascript:cargar('#divtest', 'modules/productos/cargar_foto.php?&id=<?php echo $row_producto['id'];?>')"><span class="glyphicon glyphicon-picture" style="font-size:2em;"></span></a>
              <?php } else { ?>
              <a href="javascript:cargar('#divtest', 'modules/productos/eliminar_foto.php?id=<?php echo $row_producto['id'];?>&ruta=<?php echo '../../../imagesmg/'.$row_producto['ruta'];?>')"  class="ask-custom">
                 <img src="../imagesmg/<?php echo $row_producto['ruta']; ?>" alt="" height="40" >
              </a>
              <?php } ?>
              </td>
              <td  height="26" align="center" ><?php echo strtoupper($row_producto['nombre_prod']); ?></td>
				  <td align="center" ><?php echo $row_producto['nombre_cate']; ?></td>
              <td  align="center" >
              	<?php if($row_producto['descuento']>0) { echo "<strike>".$row_producto['precio'].$row_config['simbolo_moneda']."</strike><br>".$row_producto['descuento'].$row_config['simbolo_moneda']; } else { echo $row_producto['precio'].$row_config['simbolo_moneda']; } ?></td>
              <td  align="center" >
              <a href="#" onclick="cargar('#divtest', 'modules/productos/fotos.php?id=<?php echo $row_producto['id'];?>')"  ><span class="glyphicon glyphicon-camera" style="font-size:2em;"></span></a></td>
              <td  align="center" >
       <?php //CAMBIAR EL STATUS ?>
          <form action="#"  id="cstatus" method="GET" enctype="multipart/form-data" >
          <?php if ($row_producto['destacado']==0){ ?><a href="javascript:cargar('#divtest', 'modules/productos/cambiando-status.php?destacado=<?php echo $row_producto['destacado'];?>&id=<?php echo $row_producto['id'];?>')"><span class="glyphicon glyphicon-th" style="font-size:2em;"></span></a><?php }  ?>
          <?php if ($row_producto['destacado']==1){ ?><a href="javascript:cargar('#divtest', 'modules/productos/cambiando-status.php?destacado=<?php echo $row_producto['destacado'];?>&id=<?php echo $row_producto['id'];?>')"><span class="glyphicon glyphicon-star" style="font-size:2em;"></span></a><?php }  ?>

              </form>
         <?php //FIN DE CAMBIAR EL STATUS ?>  
              </td>
              <td  align="center" >
        <?php //CAMBIAR EL STATUS ?>
          <form action="#"  id="cstatus" method="GET" enctype="multipart/form-data" >
          <?php if ($row_producto['status']==0){ ?><a href="javascript:cargar('#divtest', 'modules/productos/cambiando-status.php?status=<?php echo $row_producto['status'];?>&id=<?php echo $row_producto['id'];?>')"><span class="glyphicon glyphicon-thumbs-down" style="font-size:2em;"></span></a><?php }  ?>
          <?php if ($row_producto['status']==1){ ?><a href="javascript:cargar('#divtest', 'modules/productos/cambiando-status.php?status=<?php echo $row_producto['status'];?>&id=<?php echo $row_producto['id'];?>')"><span class="glyphicon glyphicon-thumbs-up" style="font-size:2em;"></span></a><?php }  ?>

              </form>
         <?php //FIN DE CAMBIAR EL STATUS ?>        

        
              </td>
             <td  align="center" ><a href="index.php?mod=modificar-producto&id=<?php echo $row_producto['id'];?>"><span class="glyphicon glyphicon-pencil" style="font-size:2em;"></span></a>&nbsp;<a href="javascript:cargar('#divtest', 'modules/productos/eliminar.php?id=<?php echo $row_producto['id'];?>&ruta=<?php echo '../../../imagesmg/'.$row_producto['ruta'];?>')"  class="ask-custom"><span class="glyphicon glyphicon-trash" style="font-size:2em;"></span></a></td> 
				  
        
              </tr>
              <?php } while ($row_producto = mysql_fetch_assoc($producto)); ?>
            </table>
            
             </div><!-- /.box-body -->
         </div><!-- /.box -->
            <?php } ?>
            <?php if (($totalRows_producto==0)){ ?> 
            <br>
            <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:110px;"><a href="index.php?mod=nuevo-producto" style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Agregar Producto</span></a></small>                                   
            <center>
            <img src="images/iconfinder/vacio.png" alt="" width="200">
				<p style="font-size:19px;">"No Hay productos Registrados!"</p>            
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
                    "bPaginate": false,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": false,
                    "bInfo": true,
                    "bAutoWidth": true,
                    
                });

            });
        </script>
    
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
</body>

</html>