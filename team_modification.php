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

    $data = $_GET['id'];

    ?>

    <?php include('student_navbar.php') ?>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="signup_card">

                <div class="d-flex justify-content-center form_container">
                    <form action="team_edit_process.php" method="post">

                        <div>
                            <p class="h2">Edit your team.</p>
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-append">

                            </div>
                            <input type="text" name="student_id" id="student_id" class="form-control  input_user" placeholder="Member IDs" required>
                        </div>

                        <div class="input-group-append">

                        </div>
                        <input type="hidden" name="group_id" id="group_id" class="form-control  input_user" value=<?php echo $data ?> required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">

                    </div>
                    <input type="text" name="group_name" id="group_name" class="form-control  input_user" placeholder="Group name" required>
                </div>

                <div class="input-group mb-2">
                    <div class="input-group-append">

                    </div>

                    <label for="group_category">Category: </label>

                    <select class="custom-select custom-select-sm" name="group_category">
                        <option value="Electronics">Electronics</option>
                        <option value="Software">Software</option>
                        <option value="DBMS">DBMS</option>
                        <option value="CN">CN</option>
                    </select>


                </div>
            </div>
            <div class="d-flex justify-content-center mt-3 container">
                <button type="submit" name="button" class="btn btn">Update</button>
            </div>
            </form>

        </div>
    </div>
    </div>


</body>

</html>