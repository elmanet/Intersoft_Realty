<?php require_once('modules/inc/barra_buscar.inc.php'); ?>
<hr>
<?php if ($totalRows_anuncio_gen>0){ ?>            
<div class="tablaestilo" >
<div style="width:100%">
<?php  do { 
$preciov=$row_anuncio_gen['preciov'];
$precioa=$row_anuncio_gen['precioa'];
?>
	<div class="anuncios">
    <div class="foto-anuncio">
		  <?php if($row_anuncio_gen['ruta']=="imagenes/"){ ?>
		    <a href="index.php?mg=anuncios-detalle&135798642Detalle=<?php echo $row_anuncio_gen['id_anuncio']; ?>"><img src="mgpanel/images/iconfinder/no-imagen2.png" alt="" width="100%" class="foto_peq_anuncio" ></a>
		  <?php } else { ?>
		    <a href="index.php?mg=anuncios-detalle&135798642Detalle=<?php echo $row_anuncio_gen['id_anuncio']; ?>"><img src="imagesmg/<?php echo $row_anuncio_gen['ruta']; ?>" width="100%" alt=""  class="foto_peq_anuncio" ></a>
		  <?php } ?>
    </div> <!-- FIN FOTO ANUNCIO -->  
		
    <div class="texto-inicial-anuncio"> 
      <div class="titulo-principal"> 
		    <span class="p17"> <?php echo $row_anuncio_gen['titulo_espanol']; ?> </span>
      </div>
		  
		  <h3 class="p17">
		  <?php 
        if($preciov>0) {	  
		      echo "Sale: ".$row_config['simbolo_moneda']." ".number_format($preciov,2,'.',',');
		     } ?>
         <?php 
        if($precioa>0) {    
          echo "<br>Rental: ".$row_config['simbolo_moneda']." ".number_format($precioa,2,'.',',');
         } ?>
      </h3>
  			<br>
	   		<a href="index.php?mg=anuncios-detalle&135798642Detalle=<?php echo $row_anuncio_gen['id_anuncio']; ?>" class="boton-anuncio">View Details</a>
	  </div>
  </div>
<?php } while ($row_anuncio_gen = mysql_fetch_assoc($anuncio_gen)); ?>
</div>

                          
</div>
<div style="float:left;width:100%;">
<?php 

if($totalRows_anuncio_gen != 0){
   $nextpage= $page +1;
   $prevpage= $page -1;
?>
<ul id="pagination-digg">
<?php 
 if ($page == 1) {
    ?>
      <li class="previous-off">&laquo; Previous</li>
      <li class="active">1</li> 
      <?php
    for($i= $page+1; $i<= $lastpage ; $i++){?>
            <li><a href="index.php?mg=anuncios&page=<?php echo $i;?>"><?php echo $i;?></a></li>
 <?php }
    if($lastpage >$page ){?>       
      <li class="next"><a href="index.php?mg=anuncios&page=<?php echo $nextpage;?>" >Next &raquo;</a></li>
      <?php 
    }else{?>
      <li class="next-off">Next &raquo;</li>
<?php  }
 } else {
    ?>
       <li class="previous"><a href="index.php?mg=anuncios&page=<?php echo $prevpage;?>"  >&laquo; Previous</a></li>
       <?php
      for($i= 1; $i<= $lastpage ; $i++){
                      
            if($page == $i){
        ?>  <li class="active"><?php echo $i;?></li>
        <?php
            }else{
        ?>  <li><a href="index.php?mg=anuncios&page=<?php echo $i;?>" ><?php echo $i;?></a></li>
        <?php
            }
      } 
      if($lastpage >$page ){    ?> 
      <li class="next"><a href="index.php?mg=anuncios&page=<?php echo $nextpage;?>">Next &raquo;</a></li>
      <?php
      }else{
    ?> <li class="next-off">Next &raquo;</li>
    <?php
      }
 }   
?>
</ul>
<?php
} 
?>
</div>
<br><br><br>

<?php } ?>
<?php if (($totalRows_anuncio_gen==0)){ ?> 
<br>
<center>
<img src="mgpanel/images/iconfinder/vacio.png" alt="" width="200">
<p style="font-size:19px; text-align:center;">"No Announcements Available!"</p>            
</center>
<?php } ?>