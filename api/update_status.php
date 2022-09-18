<?php

    include_once 'dbconnect.php';
    $project_id = $_POST['project_id'];
    $update_no = $_POST['update_no'];
    $status_update = $_POST['status_update'];
    $sql = "UPDATE updates SET status ='$status_update' WHERE project_id = $project_id AND update_no = $update_no ";
    $rs = $conn-> query($sql);
   if($rs){
    if($rs){
        echo '<script>alert ("Status updated!!");
        window.location.replace("../project_details_faculty.php"); </script>';
       }
        
   }
    
    
    
    
?>