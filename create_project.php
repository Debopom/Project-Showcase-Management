<?php

session_start();

include("dbconnect.php");
	$project_title= $_POST["PROJECT_TITLE"];
	$group_id= $_POST["GROUP_ID"];
	$category= $_POST["CATEGORY"];
    $faculty_id = $_POST["FACULTY_ID"];
    $description = $_POST["description"];

    echo $project_title;
    echo $group_id;
    echo $category;
    echo $faculty_id;
    echo $description;

    $sql1 = "INSERT INTO projects (project_title, group_id,  description, category, faculty_id) VALUES ('$project_title', $group_id,'$description','$category', $faculty_id);";
    $rs = $conn-> query($sql1);
    if($rs){
        echo '<script>alert ("Deleted successfully");</script>';
        header("Location: Manage_projects_students.php");
    }
    ?>
