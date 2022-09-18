<!DOCTYPE html>
<html lang="en">

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
        $faculty_email = $_POST['faculty_email'];
        $faculty_password = $_POST['faculty_password'];
        $faculty_name = $_POST['faculty_name'];

        if (!empty($faculty_email) && !empty($faculty_id) && !empty($faculty_password)) {

            //save to database
            $query = "SELECT * FROM faculty WHERE faculty_id = '$faculty_id' OR faculty_email = '$faculty_email'";
            $result1 = mysqli_query($conn, $query);

            if (mysqli_num_rows($result1)) {
                echo '<script>alert("User Already Exist")</script>';
            } else {
                $query = "insert into faculty (faculty_id, faculty_email, faculty_password,faculty_name ) values ('$faculty_id', '$faculty_email', '$faculty_password','$faculty_name')";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo '<script>alert("Successfull")</script>';
                    header("Location: login.php");
                }
            }


            die;
        } else {
            echo '<script>alert("Please enter some valid information!")</script>';
        }
    }

    ?>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="signup_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="img/logo_uiu.jpg" class="brand_logo" alt="UIU">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="signup_faculty.php" method="POST">

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <p class="h4">Signing up as Faculty</p>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="faculty_id" id="faculty_id" class="form-control  input_user" placeholder="Faculty ID" required>
                        </div>
                        <div class="input-group mb-3">
                        <input type="text" name="faculty_name" id="faculty_name" class="form-control  input_user" placeholder="Faculty name" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                            
                            
                        
                            </div>
                            <input type="email" name="faculty_email" id="faculty_email" class="form-control  input_user" placeholder="Faculty email" required>
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-append">

                            </div>
                            <input type="password" name="faculty_password" id="faculty_password" class="form-control input_pass" placeholder="Enter password" required>
                        </div>
                </div>
                <div class="d-flex justify-content-center mt-3 container">
                    <button onclick="mySFunction()" type="submit" name="button" class="btn btn">Sign Up</button>
                </div>
                </form>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        Already have an account? <a href="login.php" class="ml-2">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>