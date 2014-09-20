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


 $insertSQL = sprintf("INSERT INTO sis_anuncio(id_anuncio, id_usuario, id_categoria, id_ubicacion, titulo_espanol, titulo_ingles, des_espanol, preciov, precioa, recama, banios, mconstru, mterreno, estacio, direccion, costo_mante, altura, anios_constru, tipo_pisos, niveles, piso_num, piscina, balcon, video, ruta, status) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 
                        GetSQLValueString($_POST['id_anuncio'], "int"),
                        GetSQLValueString($_POST['id_usuario'], "int"),
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

mysql_select_db($database_sistemai, $sistemai);
$query_anuncio = "SELECT * FROM sis_anuncio ORDER BY id_anuncio DESC";
$anuncio = mysql_query($query_anuncio, $sistemai) or die(mysql_error());
$row_anuncio = mysql_fetch_assoc($anuncio);
$totalRows_anuncio = mysql_num_rows($anuncio);

$idp=$row_anuncio['id_anuncio'];
$idbene="";
$insertSQL = sprintf("INSERT INTO sis_anuncio_beneficios(id_beneficio, id_anuncio, ben1, ben2, ben3, ben4, ben5, ben6, ben7, ben8, ben9, ben10, ben11, ben12, ben13, ben14, ben15, ben16, ben17, ben18, ben19, ben20, ben21, ben22, ben23, ben24, ben25, ben26, ben27, ben28, ben29, ben30, ben31, ben32, ben33, lin1, lin2, lin3, lin4, lin5, lin6, lin7, lin8, lin9 ) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 
                        GetSQLValueString($idbene, "int"),
                        GetSQLValueString($idp, "int"),
                        GetSQLValueString($_POST['ben1'], "int"),
                        GetSQLValueString($_POST['ben2'], "int"),
                        GetSQLValueString($_POST['ben3'], "int"),
                        GetSQLValueString($_POST['ben4'], "int"),
                        GetSQLValueString($_POST['ben5'], "int"),
                        GetSQLValueString($_POST['ben6'], "int"),
                        GetSQLValueString($_POST['ben7'], "int"),
                        GetSQLValueString($_POST['ben8'], "int"),
                        GetSQLValueString($_POST['ben9'], "int"),
                        GetSQLValueString($_POST['ben10'], "int"),
                        GetSQLValueString($_POST['ben11'], "int"),
                        GetSQLValueString($_POST['ben12'], "int"),
                        GetSQLValueString($_POST['ben13'], "int"),
                        GetSQLValueString($_POST['ben14'], "int"),
                        GetSQLValueString($_POST['ben15'], "int"),
                        GetSQLValueString($_POST['ben16'], "int"),
                        GetSQLValueString($_POST['ben17'], "int"),
                        GetSQLValueString($_POST['ben18'], "int"),
                        GetSQLValueString($_POST['ben19'], "int"),
                        GetSQLValueString($_POST['ben20'], "int"),
                        GetSQLValueString($_POST['ben21'], "int"),
                        GetSQLValueString($_POST['ben22'], "int"),
                        GetSQLValueString($_POST['ben23'], "int"),
                        GetSQLValueString($_POST['ben24'], "int"),
                        GetSQLValueString($_POST['ben25'], "int"),
                        GetSQLValueString($_POST['ben26'], "int"),
                        GetSQLValueString($_POST['ben27'], "int"),
                        GetSQLValueString($_POST['ben28'], "int"),
                        GetSQLValueString($_POST['ben29'], "int"),
                        GetSQLValueString($_POST['ben30'], "int"),
                        GetSQLValueString($_POST['ben31'], "int"),
                        GetSQLValueString($_POST['ben32'], "int"),
                        GetSQLValueString($_POST['ben33'], "int"),
                        GetSQLValueString($_POST['lin1'], "int"),
                        GetSQLValueString($_POST['lin2'], "int"),
                        GetSQLValueString($_POST['lin3'], "int"),
                        GetSQLValueString($_POST['lin4'], "int"),
                        GetSQLValueString($_POST['lin5'], "int"),
                        GetSQLValueString($_POST['lin6'], "int"),
                        GetSQLValueString($_POST['lin7'], "int"),
                        GetSQLValueString($_POST['lin8'], "int"),
                        GetSQLValueString($_POST['lin9'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result2 = mysql_query($insertSQL, $sistemai) or die(mysql_error());





 ?>

