<?php
$connect = mysqli_connect("localhost","root","","project_showcase_management");


if(!$connect){
    echo " Database Connection Failed!!" . mysqli_connect_error();
}


?>