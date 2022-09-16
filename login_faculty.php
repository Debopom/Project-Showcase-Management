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
        $faculty_id = $_POST['faculty_id'];
        $faculty_password = $_POST['faculty_password'];

        if (!empty($faculty_id) && !empty($faculty_password)) {

            //read from database
            $query = "select * from faculty where faculty_id = '$faculty_id' limit 1";
            $result = mysqli_query($conn, $query);

            if ($result) {
                if ($result && mysqli_num_rows($result) > 0) {

                    $user_data = mysqli_fetch_assoc($result);

                    if ($user_data['faculty_password'] === $faculty_password) {

                        $_SESSION['faculty_id'] = $user_data['faculty_id'];
                        header("Location: faculty_dashboard.php");
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
                    <form action="login_faculty.php" method="POST">

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <p class="h4">Logging in as Faculty</p>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="faculty_id" id="faculty_id" class="form-control  input_user" required>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="faculty_password" name="faculty_password" id="faculty_password" class="form-control input_pass" required>
                        </div>
                </div>
                <div class="d-flex justify-content-center mt-3 container">
                    <button type="submit" name="button" class="btn btn">Login</button>
                </div>
                </form>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        Don't have an account? <a href="signup_faculty.php" class="ml-2">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>