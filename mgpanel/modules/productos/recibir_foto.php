<?php
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




$ds          = DIRECTORY_SEPARATOR;  //1

srand (time());
$n=rand(1,900);

$codlargo=988766544322;
$dirmg='imagesmg';
$storeFolder = 'imagenes';   //2
 
if (!empty($_FILES)) {


     
    $tempFile = $_FILES['file']['tmp_name']; 

    $nombreImagen = sanear_string($_FILES['file']['name']);      

    $rutatemp=   $n.$codlargo.$nombreImagen;     
      
    $targetPath = dirname(__FILE__).'/'.'../../../'.$dirmg.'/'.$storeFolder.'/';  //4
     
    $targetFile =  $targetPath. $rutatemp;  //5

    

    $rutaDestino=$storeFolder.'/'.$rutatemp;
 
    move_uploaded_file($tempFile,$targetFile); //6
     


$id=$_GET['id'];

	
	$updateSQL = sprintf("UPDATE sis_productos SET ruta=%s WHERE id=%s",  
							 
					GetSQLValueString($rutaDestino, "text"),
                    GetSQLValueString($id, "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($updateSQL, $sistemai) or die(mysql_error());

  }
?>  