<?php
$zip_file_name_with_location = $_GET['link']; 

header('Content-type: application/zip');  
header('Content-Disposition: attachment; filename="'.$zip_file_name_with_location.'"');  
readfile($zip_file_name_with_location);
?>