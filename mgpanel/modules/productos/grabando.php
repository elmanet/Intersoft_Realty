<?php ob_start();
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');

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


if($_POST['des_espanol']==""){
    $des_espanol=$_POST['des_espanol2'];
}else{
    $des_espanol=$_POST['des_espanol'];
}


 $insertSQL = sprintf("INSERT INTO sis_anuncio(id_anuncio, id_usuario, id_categoria, id_ubicacion, titulo_espanol, titulo_ingles,  des_espanol, preciov, precioa, recama, banios, mconstru, mterreno, estacio, direccion, costo_mante, altura, anios_constru, tipo_pisos, niveles, piso_num, piscina, balcon, video, ruta, status) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s )", 
                        GetSQLValueString($_POST['id_anuncio'], "int"),
                        GetSQLValueString($_POST['id_usuario'], "bigint"),
                        GetSQLValueString($_POST['id_categoria'], "int"),
                        GetSQLValueString($_POST['id_ubicacion'], "int"),
                        GetSQLValueString($_POST['titulo_espanol'], "text"),
                        GetSQLValueString($_POST['titulo_ingles'], "text"),
                        GetSQLValueString($_POST['des_espanol'], "text"),
                        GetSQLValueString($_POST['preciov'], "double"),
                        GetSQLValueString($_POST['precioa'], "double"),
                        GetSQLValueString($_POST['recama'], "int"),
                        GetSQLValueString($_POST['banios'], "int"),
                        GetSQLValueString($_POST['mconstru'], "text"),
                        GetSQLValueString($_POST['mterreno'], "text"),
                        GetSQLValueString($_POST['estacio'], "int"),
                        GetSQLValueString($_POST['direccion'], "text"),
                        GetSQLValueString($_POST['costo_mante'], "text"),
                        GetSQLValueString($_POST['altura'], "text"),
                        GetSQLValueString($_POST['anios_constru'], "text"),
                        GetSQLValueString($_POST['tipo_pisos'], "text"),
                        GetSQLValueString($_POST['niveles'], "int"),
                        GetSQLValueString($_POST['piso_num'], "int"),
                        GetSQLValueString($_POST['piscina'], "int"),
                        GetSQLValueString($_POST['balcon'], "int"),
                        GetSQLValueString($_POST['video'], "text"),
                        GetSQLValueString($rutaDestinoBD, "text"),
                        GetSQLValueString($_POST['status'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());



$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>