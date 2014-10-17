<?php if ($totalRows_producto_des>0){ 


?>            


<?php  do { 

$descuento=$row_producto_des['descuento'];
$precio=$row_producto_des['precio'];

?>
	<div>
	<a href="index.php?mg=producto-detalle&135798642Detalle=<?php echo $row_producto_des['id']; ?>" style="color:#000;">
	  <center>
		   <?php if($row_producto_des['ruta']=="imagenes/"){ ?>
		  <img src="mgpanel/images/iconfinder/no-imagen2.png" alt=""  class="foto_peq_producto">
		  <?php } else { ?>
		  <img src="imagesmg/<?php echo $row_producto_des['ruta']; ?>" alt=""  >
		  <?php } ?>		  
		  <br>
		  <b class="p12" ><?php echo substr($row_producto_des['nombre_prod'], 0, 15)."..."; ?></b><br>
		  <span class="p17">
		  <?php 
        if($row_producto_des['descuento']>0) {
        echo "<strike>".$row_config['simbolo_moneda']." ".round($precio,2)."</strike><br>".$row_config['simbolo_moneda']." ".round($descuento,2);
        }else {		  
		   echo $row_config['simbolo_moneda']." ".round($precio,2);
		  }
		  ?></span>

     </center>
     </a>
	</div>
<?php } while ($row_producto_des = mysql_fetch_assoc($producto_des)); ?>

<?php } ?>
<?php if (($totalRows_producto_des==0)){ ?> 
<br>
<center>
<img src="mgpanel/images/iconfinder/vacio.png" alt="" width="100">
<p style="font-size:14px; text-align:center;">"No Hay productos Destacados!"</p>            
</center>
<?php } ?>

