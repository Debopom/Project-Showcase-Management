<?php

    include_once 'dbconnect.php';
    $project_id = $_POST['project_id'];
    $update_no = $_POST['update_no'];
    $feedback = $_POST['feedback'];
    $sql = "UPDATE updates SET feedback ='$feedback' WHERE project_id = $project_id AND update_no = '$update_no' ";
    $rs = $conn-> query($sql);
   if($rs){
    echo '<script>alert ("Feedback updated!!");
    window.location.replace("../project_details_faculty.php"); </script>';
   }
    
    
    
    
    ?>