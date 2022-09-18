<?php 
session_start();

include("dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 
    //something was posted
    $judge_id = $_POST['id'];
    $judge_password = $_POST['password'];

    if (!empty($judge_id) && !empty($judge_password)) {

        //read from database
        $query = "SELECT * from judge where judge_id = '$judge_id' AND password=$judge_password limit 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                    $_SESSION['judge_category'] = $user_data['category'];
                    header("Location: Projects_view_judge.php");
                   
                }
                else{
                    $message = "Username and/or Password incorrect.\\nTry again.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
            }
        } 
            
        
    } 
}?>
<!DOCTYPE html>
<html>

<head>
    <title>Project Showcase</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body>




    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="../img/logo_uiu.jpg" class="brand_logo" alt="UIU">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="index.php" method="POST">

                        

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="id" id="id" class="form-control  input_user" placeholder="Enter ID" required>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control input_pass" placeholder="Enter Your Password" required>
                        </div>
                </div>
                <div class="d-flex justify-content-center mt-3 container">
                    <button type="submit" name="button" class="btn btn">Login</button>
                </div>
                </form>
                
            </div>
        </div>
    </div>

</body>

</html>