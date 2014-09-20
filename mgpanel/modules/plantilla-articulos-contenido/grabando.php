<?php ob_start();

require_once('../inc/conexion_modules.inc.php'); 

function sanear_string($string)
{

    $string = trim($string);

    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä', '"'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', ' '),
        $string
    );

    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );

    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );

    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );

    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );

    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
    

    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(
        array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "`", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             " ",'\"'),
        '-',
        $string
    );

    return $string;
} 




// SQL PARA REGISTRO DE DATOS
srand (time());
$n=rand(1,900);
$cod=$_POST['cod_prod'];
$codlargo=9887665;

$rutaprin='../../../imagesmg/';
$rutaEnServidor='imagenes';
$rutaTemporal=$_FILES['imagen']['tmp_name'];
$nombreImagen=sanear_string($_FILES['imagen']['name']);
if($nombreImagen=="") {
$rutaDestino=$rutaprin.$rutaEnServidor.'/'.$nombreImagen;
$rutaDestinoBD=$rutaEnServidor.'/'.$nombreImagen;
}else {
    $rutaDestino=$rutaprin.$rutaEnServidor.'/'.$n.$codlargo.$nombreImagen;
    $rutaDestinoBD=$rutaEnServidor.'/'.$n.$codlargo.$nombreImagen;
    }
move_uploaded_file($rutaTemporal,$rutaDestino);  


$alias=sanear_string($_POST['titulo_articulo']);

if($_POST['contenido1']==""){
    $contenido=$_POST['contenido2'];
}else{
    $contenido=$_POST['contenido1'];
}

 $insertSQL = sprintf("INSERT INTO sis_plantilla_articulos(id_articulo,id_art_cate, titulo_articulo, alias, contenido, orden, tipo_articulo,  status, ruta) VALUES ( %s,%s,%s,%s, %s, %s, %s, %s, %s)", 
						GetSQLValueString($_POST['id_articulo'], "int"),
						GetSQLValueString($_POST['id_art_cate'], "int"),
						GetSQLValueString($_POST['titulo_articulo'], "text"),
						GetSQLValueString($alias, "text"),
						GetSQLValueString($contenido, "text"),
						GetSQLValueString($orden, "int"),
						GetSQLValueString($_POST['tipo_articulo'], "int"),
                        GetSQLValueString($_POST['status'], "int"),
                        GetSQLValueString($rutaDestinoBD, "text"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());


$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>

