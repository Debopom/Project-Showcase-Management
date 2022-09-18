<?php 
include_once 'dbconnect.php';
    $project_id = $_POST['project_id'];
    $sql1 = "DELETE FROM projects WHERE project_id = $project_id ";
    $rs1 = $conn-> query($sql1);
if($rs1){
    header("Location: Manage_projects_faculty.php");
}