<?php

    $connect = mysqli_connect("localhost","root","","project_showcase_management");

    $name = $_POST['name'];
    $s_id = $_POST['s_id'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];


    $insert = "INSERT INTO volunteer (name, s_id, email, dept) VALUES ('$name', '$s_id', '$email', '$dept')";

    $query = mysqli_query($connect, $insert);

    if($query){
        echo " Registration Completed";
    }
    else{
        echo "Registration Failed!!!";
    }


?>

