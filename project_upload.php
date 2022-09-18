<?php

session_start();

include("dbconnect.php");


//something was posted

$project_id = $_POST['project_id'];

$targetDir = "final_uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


    
    // Allow certain file formats
    $allowTypes = array('zip', 'rar');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert file name into database
            $sql = "UPDATE projects SET final_file =  'final_uploads/$fileName' WHERE project_id = $project_id";
            $rs = $conn-> query($sql);
            
            if ($rs) {
                $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                
                
            } else {
                $statusMsg = "File upload failed, please try again.";
                echo '<script>alert("File upload failed, please try again.");</script>'; 
                echo  '<script> window.location.replace("project_submission_page.php");</script>';
                $statusMsg = "Sorry, there was an error uploading your file.";
                die;
            }
        } else {
            echo '<script>alert("Sorry, there was an error uploading your file.");</script>'; 
            echo  '<script> window.location.replace("project_submission_page.php");</script>';
            $statusMsg = "Sorry, there was an error uploading your file.";
            die;
        }
    } else {
        echo '<script>alert("Sorry, please select .zip or .rar file.");</script>'; 
        echo  '<script> window.location.replace("project_submission_page.php");</script>';
        $statusMsg = '';
        die;
    }

   

// Display status message
echo '<script>alert("Uploaded Successfully");</script>'; 
echo  '<script> window.location.replace("project_submission_page.php");</script>';
