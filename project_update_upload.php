<?php

session_start();

include("dbconnect.php");


//something was posted

$project_id = $_POST['project_id'];
$project_timeframe = $_POST['project_timeframe'];
$file_description = $_POST['file_description'];


$targetDir = "project_updates/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


    echo "ok";
    // Allow certain file formats
    $allowTypes = array('zip', 'rar');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert file name into database
            $sql = "INSERT into updates (project_id, file, description, update_no) VALUES ('" . $project_id . "','" ."project_updates/". $fileName . "','" . $file_description . "', '" . $project_timeframe . "')";
            $rs = $conn-> query($sql);
            
            if ($rs) {
                $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'Sorry, please select .zip or .rar file.';
    }


// Display status message
// echo $statusMsg;
