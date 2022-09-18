<?php

    $connect = mysqli_connect("localhost","root","","project_showcase_management");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $dept = $_POST['dept'];


    $insert = "INSERT INTO  oganizers (name,  email, phone,role, dept) VALUES ('$name', '$email','$phone','$role', '$dept')";

    $query = mysqli_query($connect, $insert);

    if($query){
        echo " Registration Completed";
    }
    else{
        echo "Registration Failed!!!";
    }


?>

