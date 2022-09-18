<?php
$data = $_GET['id'];
session_start();

include("dbconnect.php");

$group_id = $_GET['id'];
$query2 = "DELETE FROM groups WHERE group_id = '$group_id'";
$result2 = mysqli_query($conn, $query2);

if($result2){
    echo '<script>alert ("Deleted successfully");</script>';
    header("Location: team_page.php");
}