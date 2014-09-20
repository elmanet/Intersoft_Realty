<?php
  
require_once('modules/inc/usuario.inc.php');

mysql_select_db($database_sistemai, $sistemai);
$query_usuario = "SELECT * FROM sis_users a, sis_users_tipo b WHERE a.id_user_tipo=b.id_user_tipo ORDER by a.modificado DESC";
$usuario = mysql_query($query_usuario, $sistemai) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);

?>
 

<?php if ($totalRows_usuario>0){ ?> 

  <div class="box">
   <div class="box-header">
    <h3 class="box-title">LISTADO DE USUARIOS</h3> 
    <small class="btn btn-success btn-lg" style="position:absolute; right:10px;top:10px;"><a href="index.php?mod=nuevo-usuario"  style="color:#fff;"><i class="glyphicon glyphicon-plus"></i><span> Nuevo Usuario</span></a></small>                                   
   </div><!-- /.box-header -->
  <div class="box-body table-responsive">
		<table id="example1" class="table table-bordered table-striped">

        <thead>
         <tr >
 				    <th><b>Imagen</b></th>
            <th ><b>Nombre del Usuario</b></th>
				    <th ><b>Email</b></th>
            <th ><b>Tipo Usuario</b></th>
					  <th><b>Status</b></th>
            <th><b>Opciones</b></th>
          </tr>
        </thead>
        <tbody>
             
              <?php do { ?>
              <?php if(($row_usuario['cod']==5) and ($row_usua['cod']==5) or ($row_usuario['cod']<5)) { ?>
              <tr>
               <td  height="26" align="center" >
              <?php if($row_usuario['ruta']=="imagenes/"){ ?>
               <a href="javascript:cargar('#divtest', 'modules/usuarios/cargar_foto.php?&id=<?php echo $row_usuario['id_usuario'];?>')"><span class="glyphicon glyphicon-picture" style="font-size:2em;"></span></a>
              <?php } else { ?>
              <a href="javascript:cargar('#divtest', 'modules/usuarios/eliminar_foto.php?id=<?php echo $row_usuario['id_usuario'];?>&ruta=<?php echo '../../../imagesmg/'.$row_usuario['ruta'];?>')"  class="ask-custom">
                 <img src="../imagesmg/<?php echo $row_usuario['ruta']; ?>" alt="" height="40" >
              </a>
              <?php } ?>
              </td>


              <td  height="26" align="center" ><?php echo strtoupper($row_usuario['nombre_usuario']); ?> <?php echo strtoupper($row_usuario['apellido_usuario']); ?></td>
				       <td align="center" ><?php echo $row_usuario['email_usuario']; ?></td>
              <td  align="center" >
              	<?php echo $row_usuario['descripcion']; ?></td>
              <td  align="center" >
					<?php if ($row_usuario['status']==0){ ?><span class="glyphicon glyphicon-thumbs-down" style="font-size:2em;"></span><?php }  ?>
					<?php if ($row_usuario['status']==1){ ?><span class="glyphicon glyphicon-thumbs-up" style="font-size:2em;"></span><?php }  ?>           
              </td>
              <td  align="center" ><a href="index.php?mod=modificar-usuario&id_usuario=<?php echo $row_usuario['id_usuario'];?>"><span class="glyphicon glyphicon-pencil" style="font-size:2em;"></span></a>&nbsp;<a href="javascript:cargar('#divtest', 'modules/usuarios/eliminar.php?id_usuario=<?php echo $row_usuario['id_usuario'];?>&ruta=<?php echo '../../../imagesmg/'.$row_usuario['ruta'];?>')"  class="ask-custom"><span class="glyphicon glyphicon-trash" style="font-size:2em;"></span></a></td>
				  
        
              </tr>
              <?php } ?>
              <?php } while ($row_usuario = mysql_fetch_assoc($usuario)); ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
         </div><!-- /.box -->
            

            <?php } ?>
            <?php if (($totalRows_usuario==0)){ ?> 
            <br>
            <center>
            <img src="images/iconfinder/vacio.png" alt="" width="200">
				      <p style="font-size:19px;">"No Hay usuarios Registrados!"</p>            
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
