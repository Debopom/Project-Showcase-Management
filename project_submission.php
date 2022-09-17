<?php


session_start();
include 'dbconnect.php';



if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
}
?>

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
    $data = $_GET['id'];
    ?>

    <?php include('student_navbar.php') ?>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="signup_card">

                <form action="project_upload.php" method="post" enctype="multipart/form-data">

                    <div>
                        <p class="h2">Upload Your Final Project</p>
                        <p>Please upload all the files along with <em>Slides</em> and <em>Reports</em>.</p>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload ZIP file here</label>
                        <input class="form-control" type="file" id="formFile">
                        <input type="hidden" name="project_id" id="project_id" class="form-control  input_user" value=<?php echo $data ?> required>
                    </div>
                    <button type="submit" name="button" class="btn btn">Submit</button>
                </form>

            </div>
        </div>
    </div>


</body>

</html>