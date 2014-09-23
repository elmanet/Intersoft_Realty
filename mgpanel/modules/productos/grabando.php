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


    $des_prod=$_POST['contenido'];


 $insertSQL = sprintf("INSERT INTO sis_productos(id, cod_prod, nombre_prod, id_cate, id_marca, des_prod, des_prod_corto, existencia, precio, descuento, destacado, clave, ruta, status) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 
                        GetSQLValueString($_POST['id'], "int"),
                        GetSQLValueString($_POST['cod_prod'], "text"),
                        GetSQLValueString($_POST['nombre_prod'], "text"),
                        GetSQLValueString($_POST['id_cate'], "int"),
                        GetSQLValueString($_POST['id_marca'], "int"),
                        GetSQLValueString($des_prod, "text"),
                        GetSQLValueString($_POST['des_prod_corto'], "text"),
                        GetSQLValueString($_POST['existencia'], "int"),
                        GetSQLValueString($_POST['precio'], "double"),
                        GetSQLValueString($_POST['descuento'], "double"),
                        GetSQLValueString($_POST['destacado'], "int"),
                        GetSQLValueString($_POST['clave'], "text"),
                        GetSQLValueString($rutaDestinoBD, "text"),
                        GetSQLValueString($_POST['status'], "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());



$return_loc = "index.php";
//header("Location: ".$return_loc); 


ob_end_flush(); ?>

