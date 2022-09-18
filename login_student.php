<!DOCTYPE html>
<html>

<head>
    <title>Project Showcase</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

    <?php

    session_start();

    include("dbconnect.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //something was posted
        $student_id = $_POST['student_id'];
        $password = $_POST['password'];
        $_SESSION['student_id'] = $student_id;

        if (!empty($student_id) && !empty($password)) {

            //read from database
            $query = "select * from student where student_id = '$student_id' limit 1";
            $result = mysqli_query($conn, $query);

            if ($result) {
                if ($result && mysqli_num_rows($result) > 0) {

                    $user_data = mysqli_fetch_assoc($result);

                    if ($user_data['password'] === $password) {

                        $_SESSION['student_id'] = $user_data['student_id'];
                        header("Location: student_dashboard.php");
                        die;
                    } else {
                        $message = "Username and/or Password incorrect.\\nTry again.";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                } else {
                    $message = "Username and/or Password incorrect.\\nTry again.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            } else {
                $message = "Username and/or Password incorrect.\\nTry again.";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        } else {
            $message = "Please enter valid information.\\nTry again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
    ?>



    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="img/logo_uiu.jpg" class="brand_logo" alt="UIU">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="login_student.php" method="POST">

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <p class="h4">Logging in as Student</p>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="student_id" id="student_id" class="form-control  input_user" placeholder="Enter Your ID" required>
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
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        Don't have an account? <a href="signup_student.php" class="ml-2">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>