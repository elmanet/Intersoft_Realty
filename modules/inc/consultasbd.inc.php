<?php


mysql_select_db($database_sistemai, $sistemai);
$query_position1 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position1' ORDER BY a.orden ASC; ";
$position1 = mysql_query($query_position1, $sistemai) or die(mysql_error());
$row_position1 = mysql_fetch_assoc($position1);
$totalRows_position1 = mysql_num_rows($position1);

mysql_select_db($database_sistemai, $sistemai);
$query_position2 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position2' ORDER BY a.orden ASC; ";
$position2 = mysql_query($query_position2, $sistemai) or die(mysql_error());
$row_position2 = mysql_fetch_assoc($position2);
$totalRows_position2 = mysql_num_rows($position2);

mysql_select_db($database_sistemai, $sistemai);
$query_position3 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position3' ORDER BY a.orden ASC; ";
$position3 = mysql_query($query_position3, $sistemai) or die(mysql_error());
$row_position3 = mysql_fetch_assoc($position3);
$totalRows_position3 = mysql_num_rows($position3);

mysql_select_db($database_sistemai, $sistemai);
$query_position4 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position4' ORDER BY a.orden ASC; ";
$position4 = mysql_query($query_position4, $sistemai) or die(mysql_error());
$row_position4 = mysql_fetch_assoc($position4);
$totalRows_position4 = mysql_num_rows($position4);

mysql_select_db($database_sistemai, $sistemai);
$query_position5 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position5' ORDER BY a.orden ASC; ";
$position5 = mysql_query($query_position5, $sistemai) or die(mysql_error());
$row_position5 = mysql_fetch_assoc($position5);
$totalRows_position5 = mysql_num_rows($position5);

mysql_select_db($database_sistemai, $sistemai);
$query_position6 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position6' ORDER BY a.orden ASC; ";
$position6 = mysql_query($query_position6, $sistemai) or die(mysql_error());
$row_position6 = mysql_fetch_assoc($position6);
$totalRows_position6 = mysql_num_rows($position6);

mysql_select_db($database_sistemai, $sistemai);
$query_position7 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position7' ORDER BY a.orden ASC; ";
$position7 = mysql_query($query_position7, $sistemai) or die(mysql_error());
$row_position7 = mysql_fetch_assoc($position7);
$totalRows_position7 = mysql_num_rows($position7);

mysql_select_db($database_sistemai, $sistemai);
$query_position8 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position8' ORDER BY a.orden ASC; ";
$position8 = mysql_query($query_position8, $sistemai) or die(mysql_error());
$row_position8 = mysql_fetch_assoc($position8);
$totalRows_position8 = mysql_num_rows($position8);

mysql_select_db($database_sistemai, $sistemai);
$query_position9 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position9' ORDER BY a.orden ASC; ";
$position9 = mysql_query($query_position9, $sistemai) or die(mysql_error());
$row_position9 = mysql_fetch_assoc($position9);
$totalRows_position9 = mysql_num_rows($position9);

mysql_select_db($database_sistemai, $sistemai);
$query_position10 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position10' ORDER BY a.orden ASC; ";
$position10 = mysql_query($query_position10, $sistemai) or die(mysql_error());
$row_position10 = mysql_fetch_assoc($position10);
$totalRows_position10 = mysql_num_rows($position10);

mysql_select_db($database_sistemai, $sistemai);
$query_position11 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position11' ORDER BY a.orden ASC; ";
$position11 = mysql_query($query_position11, $sistemai) or die(mysql_error());
$row_position11 = mysql_fetch_assoc($position11);
$totalRows_position11 = mysql_num_rows($position11);

mysql_select_db($database_sistemai, $sistemai);
$query_position12 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position12' ORDER BY a.orden ASC; ";
$position12 = mysql_query($query_position12, $sistemai) or die(mysql_error());
$row_position12 = mysql_fetch_assoc($position12);
$totalRows_position12 = mysql_num_rows($position12);

mysql_select_db($database_sistemai, $sistemai);
$query_position13 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position13' ORDER BY a.orden ASC; ";
$position13 = mysql_query($query_position13, $sistemai) or die(mysql_error());
$row_position13 = mysql_fetch_assoc($position13);
$totalRows_position13 = mysql_num_rows($position13);

mysql_select_db($database_sistemai, $sistemai);
$query_position14 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position14' ORDER BY a.orden ASC; ";
$position14 = mysql_query($query_position14, $sistemai) or die(mysql_error());
$row_position14 = mysql_fetch_assoc($position14);
$totalRows_position14 = mysql_num_rows($position14);

mysql_select_db($database_sistemai, $sistemai);
$query_position15 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position15' ORDER BY a.orden ASC; ";
$position15 = mysql_query($query_position15, $sistemai) or die(mysql_error());
$row_position15 = mysql_fetch_assoc($position15);
$totalRows_position15 = mysql_num_rows($position15);

mysql_select_db($database_sistemai, $sistemai);
$query_position16 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position16' ORDER BY a.orden ASC; ";
$position16 = mysql_query($query_position16, $sistemai) or die(mysql_error());
$row_position16 = mysql_fetch_assoc($position16);
$totalRows_position16 = mysql_num_rows($position16);

mysql_select_db($database_sistemai, $sistemai);
$query_position17 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position17' ORDER BY a.orden ASC; ";
$position17 = mysql_query($query_position17, $sistemai) or die(mysql_error());
$row_position17 = mysql_fetch_assoc($position17);
$totalRows_position17 = mysql_num_rows($position17);

mysql_select_db($database_sistemai, $sistemai);
$query_position18 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position18' ORDER BY a.orden ASC; ";
$position18 = mysql_query($query_position18, $sistemai) or die(mysql_error());
$row_position18 = mysql_fetch_assoc($position18);
$totalRows_position18 = mysql_num_rows($position18);

mysql_select_db($database_sistemai, $sistemai);
$query_position19 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position19' ORDER BY a.orden ASC; ";
$position19 = mysql_query($query_position19, $sistemai) or die(mysql_error());
$row_position19 = mysql_fetch_assoc($position19);
$totalRows_position19 = mysql_num_rows($position19);

mysql_select_db($database_sistemai, $sistemai);
$query_position20 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position20' ORDER BY a.orden ASC; ";
$position20 = mysql_query($query_position20, $sistemai) or die(mysql_error());
$row_position20 = mysql_fetch_assoc($position20);
$totalRows_position20 = mysql_num_rows($position20);

mysql_select_db($database_sistemai, $sistemai);
$query_position21 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position21' ORDER BY a.orden ASC; ";
$position21 = mysql_query($query_position21, $sistemai) or die(mysql_error());
$row_position21 = mysql_fetch_assoc($position21);
$totalRows_position21 = mysql_num_rows($position21);

mysql_select_db($database_sistemai, $sistemai);
$query_position22 = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='position22' ORDER BY a.orden ASC; ";
$position22 = mysql_query($query_position22, $sistemai) or die(mysql_error());
$row_position22 = mysql_fetch_assoc($position22);
$totalRows_position22 = mysql_num_rows($position22);


mysql_select_db($database_sistemai, $sistemai);
$query_contenido = "SELECT *  FROM sis_plantilla_modulos a, sis_plantilla_posiciones b WHERE a.posicion=b.id_pos AND a.status=1 AND b.cod_pos='contenido' ORDER BY a.orden ASC;";
$contenido = mysql_query($query_contenido, $sistemai) or die(mysql_error());
$row_contenido = mysql_fetch_assoc($contenido);
$totalRows_contenido = mysql_num_rows($contenido);

mysql_select_db($database_sistemai, $sistemai);
$query_menu1 = "SELECT a.id_menu_link, a.titulo_link, a.tipo_link, a.id_articulo, a.id_art_cate, a.url_int, a.url_ext, a.id_menu, a.orden, a.status, b.descripcion, c.alias  FROM sis_plantilla_menu_link a, sis_plantilla_menu b, sis_plantilla_articulos c WHERE a.id_menu=b.id_menu AND a.id_articulo=c.id_articulo AND a.id_menu=1 AND a.status=1 ORDER BY a.orden ASC;";
$menu1 = mysql_query($query_menu1, $sistemai) or die(mysql_error());
$row_menu1 = mysql_fetch_assoc($menu1);
$totalRows_menu1 = mysql_num_rows($menu1);


mysql_select_db($database_sistemai, $sistemai);
$query_menu2 = "SELECT a.id_menu_link, a.titulo_link, a.tipo_link, a.id_articulo, a.id_art_cate, a.url_int, a.url_ext, a.id_menu, a.orden, a.status, b.descripcion, c.alias  FROM sis_plantilla_menu_link a, sis_plantilla_menu b, sis_plantilla_articulos c WHERE a.id_menu=b.id_menu AND a.id_articulo=c.id_articulo AND a.id_menu=2 AND a.status=1 ORDER BY a.orden ASC;";
$menu2 = mysql_query($query_menu2, $sistemai) or die(mysql_error());
$row_menu2 = mysql_fetch_assoc($menu2);
$totalRows_menu2 = mysql_num_rows($menu2);


mysql_select_db($database_sistemai, $sistemai);
$query_banner1 = "SELECT *  FROM sis_banners WHERE posicion=1 ORDER BY orden ASC;";
$banner1 = mysql_query($query_banner1, $sistemai) or die(mysql_error());
$row_banner1 = mysql_fetch_assoc($banner1);
$totalRows_banner1 = mysql_num_rows($banner1);

mysql_select_db($database_sistemai, $sistemai);
$query_banner2 = "SELECT *  FROM sis_banners WHERE posicion=2 ORDER BY orden ASC;";
$banner2 = mysql_query($query_banner2, $sistemai) or die(mysql_error());
$row_banner2 = mysql_fetch_assoc($banner2);
$totalRows_banner2 = mysql_num_rows($banner2);


$alias= $_GET['galeria'];
mysql_select_db($database_sistemai, $sistemai);
$query_modulo = "SELECT a.ruta, a.titulo_foto, b.titulo_cate FROM sis_galeria a, sis_galeria_categoria b WHERE a.id_foto_cate=b.id_cate AND b.alias='$alias'";
$modulo = mysql_query($query_modulo, $sistemai) or die(mysql_error());
$row_modulo = mysql_fetch_assoc($modulo);
$totalRows_modulo = mysql_num_rows($modulo);



/* CATEGORIA DE ARTICULOS */

/* VERIFICAMOS EN QUE PAGINA ESTAMOS */
if(isset($_GET['pagecateart'])){
    $pagecateart= $_GET['pagecateart'];
}else{

    $pagecateart=1;
}

mysql_select_db($database_sistemai, $sistemai);$query_cate_art = "SELECT * FROM sis_plantilla_articulo_categoria";
$cate_art = mysql_query($query_cate_art, $sistemai) or die(mysql_error());
$row_cate_art = mysql_fetch_assoc($cate_art);
$totalRows_cate_art = mysql_num_rows($cate_art);

if($_GET["pagina_cateart"])     
$pagina_cateart = $_GET["pagina_cateart"];    
$cate_art=$_GET['226635538465'];

mysql_select_db($database_sistemai, $sistemai);
$query_articuloscate1 = "SELECT a.id_articulo, a.id_art_cate, a.titulo_articulo, a.contenido, a.alias, a.orden, a.ruta, a.tipo_articulo, a.status, a.modificado, b.id_art_cate, b.descripcion FROM sis_plantilla_articulos a, sis_plantilla_articulo_categoria b WHERE a.id_art_cate=b.id_art_cate AND (a.tipo_articulo=0 OR a.tipo_articulo=2) AND a.id_art_cate='$cate_art' AND a.status=1 ORDER BY a.modificado DESC";
$articuloscate1 = mysql_query($query_articuloscate1, $sistemai) or die(mysql_error());
$totalRows_articuloscate1 = mysql_num_rows($articuloscate1);

$rows_per_pagecateart=6;
$lastpagecateart= ceil($totalRows_articuloscate1 / $rows_per_pagecateart);
$pagecateart=(int)$pagecateart;
if($pagecateart > $lastpagecateart){
    $pagecateart= $lastpagecateart;
}
if($pagecateart < 1){
    $pagecateart=1;
}
mysql_select_db($database_sistemai, $sistemai);
$query_articuloscate = "SELECT a.id_articulo, a.id_art_cate, a.titulo_articulo, a.contenido, a.alias, a.orden, a.ruta, a.tipo_articulo, a.status, a.modificado, b.id_art_cate, b.descripcion FROM sis_plantilla_articulos a, sis_plantilla_articulo_categoria b WHERE a.id_art_cate=b.id_art_cate AND (a.tipo_articulo=0 OR a.tipo_articulo=2) AND a.id_art_cate='$cate_art' AND a.status=1 ORDER BY a.modificado DESC LIMIT ".($pagecateart -1)*$rows_per_pagecateart.",$rows_per_pagecateart";
$articuloscate = mysql_query($query_articuloscate, $sistemai) or die(mysql_error());
$row_articuloscate = mysql_fetch_assoc($articuloscate);
$totalRows_articuloscate = $totalRows_articuloscate1;


/*   articulo destacado en seccion */
   
$cate_art=$_GET['226635538465'];
mysql_select_db($database_sistemai, $sistemai);
$query_articuloscatedes = "SELECT a.id_articulo, a.id_art_cate, a.titulo_articulo, a.contenido, a.alias, a.orden, a.ruta, a.tipo_articulo, a.status, b.id_art_cate, b.descripcion FROM sis_plantilla_articulos a, sis_plantilla_articulo_categoria b WHERE a.id_art_cate=b.id_art_cate AND a.tipo_articulo=1 AND a.id_art_cate='$cate_art' AND a.status=1";
$articuloscatedes = mysql_query($query_articuloscatedes, $sistemai) or die(mysql_error());
$row_articuloscatedes = mysql_fetch_assoc($articuloscatedes);
$totalRows_articuloscatedes = mysql_num_rows($articuloscatedes);




/* ARTICULOS PORTADA */

/* VERIFICAMOS EN QUE PAGINA ESTAMOS */
if(isset($_GET['pageportada'])){
    $pageportada= $_GET['pageportada'];
}else{

    $pageportada=1;
}
 

mysql_select_db($database_sistemai, $sistemai);
$query_articulosportada1 = "SELECT a.id_articulo, a.id_art_cate, a.titulo_articulo, a.contenido, a.alias, a.orden, a.ruta, a.tipo_articulo, a.status, a.modificado, b.id_art_cate, b.descripcion FROM sis_plantilla_articulos a, sis_plantilla_articulo_categoria b WHERE a.id_art_cate=b.id_art_cate AND a.tipo_articulo<=1 AND a.status=1 ORDER BY a.modificado DESC  ";
$articulosportada1 = mysql_query($query_articulosportada1, $sistemai) or die(mysql_error());
$totalRows_articulosportada1 = mysql_num_rows($articulosportada1);

$rows_per_pageportada=6;
$lastpageportada= ceil($totalRows_articulosportada1 / $rows_per_pageportada);
$pageportada=(int)$pageportada;
if($pageportada > $lastpageportada){
    $pageportada= $lastpageportada;
}
if($pageportada < 1){
    $pageportada=1;
}
mysql_select_db($database_sistemai, $sistemai);
$query_articulosportada = "SELECT a.id_articulo, a.id_art_cate, a.titulo_articulo, a.contenido, a.alias, a.orden, a.ruta, a.tipo_articulo, a.status, a.modificado, b.id_art_cate, b.descripcion FROM sis_plantilla_articulos a, sis_plantilla_articulo_categoria b WHERE a.id_art_cate=b.id_art_cate AND a.tipo_articulo<=1 AND a.status=1 ORDER BY a.modificado DESC LIMIT ".($pageportada -1)*$rows_per_pageportada.",$rows_per_pageportada";
$articulosportada = mysql_query($query_articulosportada, $sistemai) or die(mysql_error());
$row_articulosportada = mysql_fetch_assoc($articulosportada);
$totalRows_articulosportada = $totalRows_articulosportada1;


/*   articulo destacado en seccion */

mysql_select_db($database_sistemai, $sistemai);
$query_articuloportadades = "SELECT a.id_articulo, a.id_art_cate, a.titulo_articulo, a.contenido, a.alias, a.orden, a.ruta, a.tipo_articulo, a.status, b.id_art_cate, b.descripcion FROM sis_plantilla_articulos a, sis_plantilla_articulo_categoria b WHERE a.id_art_cate=b.id_art_cate AND a.tipo_articulo=2 AND a.status=1";
$articuloportadades = mysql_query($query_articuloportadades, $sistemai) or die(mysql_error());
$row_articuloportadades = mysql_fetch_assoc($articuloportadades);
$totalRows_articuloportadades = mysql_num_rows($articuloportadades);


/**** CONSULTA DEL TITULO DE ARTICULOS***/
$alias=$_GET['mod'];
mysql_select_db($database_sistemai, $sistemai);
$query_titleart = "SELECT *  FROM sis_plantilla_articulos WHERE alias='$alias' AND status=1";
$titleart = mysql_query($query_titleart, $sistemai) or die(mysql_error());
$row_titleart = mysql_fetch_assoc($titleart);
$totalRows_titleart = mysql_num_rows($titleart);



/******************** CONSULTAS TIENDA VIRTUAL ************************/

/* PRODCUTOS GENERAL */

/* VERIFICAMOS EN QUE PAGINA ESTAMOS */
if(isset($_GET['page'])){
    $page= $_GET['page'];
}else{

    $page=1;
}

mysql_select_db($database_sistemai, $sistemai);
$query_producto_gen_cant = "SELECT a.id, a.nombre_prod, b.nombre_cate, a.precio, a.descuento, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.status=1 AND a.id_cate=b.id";
$producto_gen_cant = mysql_query($query_producto_gen_cant, $sistemai) or die(mysql_error());
$totalRows_producto_gen_cant = mysql_num_rows($producto_gen_cant);
$rows_per_page=9;
$lastpage= ceil($totalRows_producto_gen_cant / $rows_per_page);
$page=(int)$page;
if($page > $lastpage){
    $page= $lastpage;
}
if($page < 1){
    $page=1;
}

$query_producto_gen = "SELECT a.id, a.nombre_prod, b.nombre_cate, a.precio, a.descuento, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.status=1 AND a.id_cate=b.id LIMIT ".($page -1)*$rows_per_page.",$rows_per_page";
$producto_gen = mysql_query($query_producto_gen, $sistemai) or die(mysql_error());
$row_producto_gen = mysql_fetch_assoc($producto_gen);
$totalRows_producto_gen = $totalRows_producto_gen_cant;



/* PRODUCTOS DESTACADOS */
mysql_select_db($database_sistemai, $sistemai);
$query_producto_des1 = "SELECT a.id, a.nombre_prod, b.nombre_cate, a.precio, a.descuento, a.destacado, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.status=1 AND a.destacado=1 AND  a.id_cate=b.id";
$producto_des1 = mysql_query($query_producto_des1, $sistemai) or die(mysql_error());
$totalRows_producto_des1 = mysql_num_rows($producto_des1);
$query_producto_des = "SELECT a.id, a.nombre_prod, b.nombre_cate, a.precio, a.descuento, a.destacado, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.status=1 AND a.destacado=1 AND  a.id_cate=b.id";
$producto_des = mysql_query($query_producto_des, $sistemai) or die(mysql_error());
$row_producto_des = mysql_fetch_assoc($producto_des);
$totalRows_producto_des = $totalRows_producto_des1;


/* CATEGORIA DE PRODUCTOS */

/* VERIFICAMOS EN QUE PAGINA ESTAMOS */
if(isset($_GET['pagecate'])){
    $pagecate= $_GET['pagecate'];
}else{

    $pagecate=1;
}


mysql_select_db($database_sistemai, $sistemai);
$query_cate_gen = "SELECT * FROM sis_productos_categoria";
$cate_gen = mysql_query($query_cate_gen, $sistemai) or die(mysql_error());
$row_cate_gen = mysql_fetch_assoc($cate_gen);
$totalRows_cate_gen = mysql_num_rows($cate_gen);

if($_GET["pagina_cate"]) 
    $pagina_cate = $_GET["pagina_cate"];
    $cate=$_GET['135798642'];

mysql_select_db($database_sistemai, $sistemai);
$query_producto1 = "SELECT a.id, a.nombre_prod, b.nombre_cate, a.precio, a.descuento, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.id_cate='$cate' AND a.status=1 AND a.id_cate=b.id ORDER BY a.cod_prod ASC;";
$producto1 = mysql_query($query_producto1, $sistemai) or die(mysql_error());
$totalRows_producto1 = mysql_num_rows($producto1);
$rows_per_pagecate=9;
$lastpagecate= ceil($totalRows_producto1 / $rows_per_pagecate);
$pagecate=(int)$pagecate;
if($pagecate > $lastpagecate){
    $pagecate= $lastpagecate;
}
if($pagecate < 1){
    $pagecate=1;
}
mysql_select_db($database_sistemai, $sistemai);
$query_producto = "SELECT a.id, a.nombre_prod, b.nombre_cate, a.precio, a.descuento, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.id_cate='$cate' AND a.status=1 AND a.id_cate=b.id ORDER BY a.id ASC LIMIT ".($pagecate -1)*$rows_per_pagecate.",$rows_per_pagecate";
$producto = mysql_query($query_producto, $sistemai) or die(mysql_error());
$row_producto = mysql_fetch_assoc($producto);
$totalRows_producto = $totalRows_producto1;

/* BUSQUEDA DE PRODUCTOS */
/* VERIFICAMOS EN QUE PAGINA ESTAMOS */
if(isset($_GET['pagebusca'])){
    $pagebusca= $_GET['pagebusca'];
}else{

    $pagebusca=1;
}


if($_GET["paginab"])
    $paginab = $_GET["paginab"];
    $buscar=$_GET['buscar'];
mysql_select_db($database_sistemai, $sistemai);
$query_producto_buscar1 = "SELECT a.id, a.nombre_prod, a.des_prod, a.clave, b.nombre_cate,  a.precio, a.descuento, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.nombre_prod like '%$buscar%' or a.des_prod like '%$buscar%' or a.clave like '%$buscar%' AND a.status=1 AND a.id_cate=b.id GROUP BY a.id ORDER BY a.cod_prod ASC;";
$producto_buscar1 = mysql_query($query_producto_buscar1, $sistemai) or die(mysql_error());
$totalRows_producto_buscar1 = mysql_num_rows($producto_buscar1);
$rows_per_pagebusca=9;
$lastpagebusca= ceil($totalRows_producto_buscar1 / $rows_per_pagebusca);
$pagebusca=(int)$pagebusca;
if($pagebusca > $lastpagebusca){
    $pagebusca= $lastpagebusca;
}
if($pagebusca < 1){
    $pagebusca=1;
}

mysql_select_db($database_sistemai, $sistemai);
$query_producto_buscar = "SELECT a.id, a.nombre_prod, a.des_prod, a.clave, b.nombre_cate,  a.precio, a.descuento, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.nombre_prod like '%$buscar%' or a.des_prod like '%$buscar%' or a.clave like '%$buscar%' AND a.status=1 AND a.id_cate=b.id GROUP BY a.id ORDER BY a.cod_prod ASC LIMIT ".($pagebusca -1)*$rows_per_pagebusca.",$rows_per_pagebusca";
$producto_buscar = mysql_query($query_producto_buscar, $sistemai) or die(mysql_error());
$row_producto_buscar = mysql_fetch_assoc($producto_buscar);
$totalRows_producto_buscar = $totalRows_producto_buscar1;

/* CONSULTA DE CATEGORIAS */
$categoria=$_GET['135798642'];
mysql_select_db($database_sistemai, $sistemai);
$query_cate = "SELECT * FROM sis_productos_categoria WHERE id='$categoria'";
$cate = mysql_query($query_cate, $sistemai) or die(mysql_error());
$row_cate = mysql_fetch_assoc($cate);
$totalRows_cate = mysql_num_rows($cate);
mysql_select_db($database_sistemai, $sistemai);
$query_cate_gen2 = "SELECT * FROM sis_productos_categoria";
$cate_gen2 = mysql_query($query_cate_gen2, $sistemai) or die(mysql_error());
$row_cate_gen2 = mysql_fetch_assoc($cate_gen2);
$totalRows_cate_gen2 = mysql_num_rows($cate_gen2);



/******************** CONSULTAS SISTEMA REALTY ************************/

/* anuncio GENERAL */

/* VERIFICAMOS EN QUE PAGINA ESTAMOS */
if(isset($_GET['page'])){
    $page= $_GET['page'];
}else{

    $page=1;
}

mysql_select_db($database_sistemai, $sistemai);
$query_anuncio_gen_cant = "SELECT * FROM sis_anuncio a, sis_anuncio_categoria b WHERE a.status=1 AND a.id_categoria=b.id_cat";
$anuncio_gen_cant = mysql_query($query_anuncio_gen_cant, $sistemai) or die(mysql_error());
$totalRows_anuncio_gen_cant = mysql_num_rows($anuncio_gen_cant);
$rows_per_page=9;
$lastpage= ceil($totalRows_anuncio_gen_cant / $rows_per_page);
$page=(int)$page;
if($page > $lastpage){
    $page= $lastpage;
}
if($page < 1){
    $page=1;
}

$query_anuncio_gen = "SELECT * FROM sis_anuncio a, sis_anuncio_categoria b WHERE a.status=1 AND a.id_categoria=b.id_cat LIMIT ".($page -1)*$rows_per_page.",$rows_per_page";
$anuncio_gen = mysql_query($query_anuncio_gen, $sistemai) or die(mysql_error());
$row_anuncio_gen = mysql_fetch_assoc($anuncio_gen);
$totalRows_anuncio_gen = $totalRows_anuncio_gen_cant;



/* CATEGORIA DE anuncio */

/* VERIFICAMOS EN QUE PAGINA ESTAMOS */
if(isset($_GET['pagecate'])){
    $pagecate= $_GET['pagecate'];
}else{

    $pagecate=1;
}


mysql_select_db($database_sistemai, $sistemai);
$query_cate_gen = "SELECT * FROM sis_anuncio_categoria";
$cate_gen = mysql_query($query_cate_gen, $sistemai) or die(mysql_error());
$row_cate_gen = mysql_fetch_assoc($cate_gen);
$totalRows_cate_gen = mysql_num_rows($cate_gen);

if($_GET["pagina_cate"]) 
    $pagina_cate = $_GET["pagina_cate"];
    $cate=$_GET['135798642'];

mysql_select_db($database_sistemai, $sistemai);
$query_anuncio1 = "SELECT * FROM sis_anuncio a, sis_anuncio_categoria b WHERE a.id_categoria='$cate' AND a.status=1 AND a.id_categoria=b.id_cat ORDER BY a.creado DESC;";
$anuncio1 = mysql_query($query_anuncio1, $sistemai) or die(mysql_error());
$totalRows_anuncio1 = mysql_num_rows($anuncio1);
$rows_per_pagecate=9;
$lastpagecate= ceil($totalRows_anuncio1 / $rows_per_pagecate);
$pagecate=(int)$pagecate;
if($pagecate > $lastpagecate){
    $pagecate= $lastpagecate;
}
if($pagecate < 1){
    $pagecate=1;
}
mysql_select_db($database_sistemai, $sistemai);
$query_anuncio = "SELECT * FROM sis_anuncio a, sis_anuncio_categoria b WHERE a.id_categoria='$cate' AND a.status=1 AND a.id_categoria=b.id_cat ORDER BY a.creado DESC LIMIT ".($pagecate -1)*$rows_per_pagecate.",$rows_per_pagecate";
$anuncio = mysql_query($query_anuncio, $sistemai) or die(mysql_error());
$row_anuncio = mysql_fetch_assoc($anuncio);
$totalRows_anuncio = $totalRows_anuncio1;


/* BUSQUEDA DE anuncio */
/* VERIFICAMOS EN QUE PAGINA ESTAMOS */
if(isset($_GET['pagebusca'])){
    $pagebusca= $_GET['pagebusca'];
}else{

    $pagebusca=1;
}


if($_GET["paginab"])
    $paginab = $_GET["paginab"];
    $buscar=$_GET['buscar'];
mysql_select_db($database_sistemai, $sistemai);
$query_anuncio_buscar1 = "SELECT * FROM sis_anuncio a, sis_anuncio_categoria b WHERE a.titulo_espanol like '%$buscar%' or a.des_espanol like '%$buscar%' or a.titulo_ingles like '%$buscar%' AND a.status=1 AND a.id_categoria=b.id_cat GROUP BY a.id_anuncio ORDER BY a.creado DESC;";
$anuncio_buscar1 = mysql_query($query_anuncio_buscar1, $sistemai) or die(mysql_error());
$totalRows_anuncio_buscar1 = mysql_num_rows($anuncio_buscar1);
$rows_per_pagebusca=9;
$lastpagebusca= ceil($totalRows_anuncio_buscar1 / $rows_per_pagebusca);
$pagebusca=(int)$pagebusca;
if($pagebusca > $lastpagebusca){
    $pagebusca= $lastpagebusca;
}
if($pagebusca < 1){
    $pagebusca=1;
}

mysql_select_db($database_sistemai, $sistemai);
$query_anuncio_buscar = "SELECT * FROM sis_anuncio a, sis_anuncio_categoria b WHERE a.titulo_espanol like '%$buscar%' or a.des_espanol like '%$buscar%' or a.titulo_ingles like '%$buscar%' AND a.status=1 AND a.id_categoria=b.id_cat GROUP BY a.id_anuncio ORDER BY a.creado DESC LIMIT ".($pagebusca -1)*$rows_per_pagebusca.",$rows_per_pagebusca";
$anuncio_buscar = mysql_query($query_anuncio_buscar, $sistemai) or die(mysql_error());
$row_anuncio_buscar = mysql_fetch_assoc($anuncio_buscar);
$totalRows_anuncio_buscar = $totalRows_anuncio_buscar1;

/* CONSULTA DE CATEGORIAS */
$categoria=$_GET['135798642'];
mysql_select_db($database_sistemai, $sistemai);
$query_cate = "SELECT * FROM sis_anuncio_categoria WHERE id_cat='$categoria'";
$cate = mysql_query($query_cate, $sistemai) or die(mysql_error());
$row_cate = mysql_fetch_assoc($cate);
$totalRows_cate = mysql_num_rows($cate);

mysql_select_db($database_sistemai, $sistemai);
$query_cate_gen2 = "SELECT * FROM sis_anuncio_categoria";
$cate_gen2 = mysql_query($query_cate_gen2, $sistemai) or die(mysql_error());
$row_cate_gen2 = mysql_fetch_assoc($cate_gen2);
$totalRows_cate_gen2 = mysql_num_rows($cate_gen2);
?>